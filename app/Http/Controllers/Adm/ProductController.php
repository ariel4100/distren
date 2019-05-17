<?php

namespace App\Http\Controllers\Adm;

use App\Capacity;
use App\Category;
use App\Closure;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        //creo sesion para guardar los cierres, terminaciones y capacidades de los productos al momento de crear uno. mediante una api
        if(!Session::has('productos'))
        {
            Session::put('productos',array());
        }
    }

    public function index()
    {
        $productos = Product::all();
        return view('adm.products.index',compact('productos'));
    }

    public function create()
    {
        $cierres = Closure::all();
        $capacidades = Capacity::all();
        $categorias = Category::all();
        return view('adm.products.create',compact('cierres','capacidades','categorias'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->except('featured'));
        //$product->price()->save(['price'=>1,'quantity'=>5]);
        dd($product->price);

        isset($request->featured) ? $product->fill(['featured' => true]) : null;
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put("uploads/productos",$request->file('image'));
            $product->fill(['image' => $path]);
        }
        $product->save();

        //relacion de Many to Many con las terminaciones , cierres y capacidades
        $apiProductos = Session::get('productos');
        $capacidad = collect($apiProductos['capacidad']);
        $cierres = collect($apiProductos['cierre']);

        $idCapacidad = $capacidad->pluck('id');
        $idCierres = $cierres->pluck('id');
        $product->capacity()->sync($idCapacidad);
        $product->closure()->sync($idCierres);

        //Session::flush();

        return back()->with('status','Se creó correctamente');
    }

    public function edit($id)
    {
        $cierres = Closure::all();
        $capacidades = Capacity::all();
        $categorias = Category::all();
        $producto = Product::find($id);
        return view('adm.products.edit',compact('producto','categorias','capacidades','cierres'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        isset($request->featured) ? $product->fill(['featured' => true]) : null;
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put("uploads/productos",$request->file('image'));
            $product->fill(['image' => $path]);
        }
        $product->save();

        //relacion de Many to Many con las terminaciones , cierres y capacidades
        $apiProductos = Session::get('productos');
        $capacidad = collect($apiProductos['capacidad']);
        $cierres = collect($apiProductos['cierre']);

        $idCapacidad = $capacidad->pluck('id');
        $idCierres = $cierres->pluck('id');

        $product->capacity()->sync($idCapacidad);
        $product->closure()->sync($idCierres);
        return back()->with('status','Se actualizó correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('status','Se eliminó correctamente');
    }



    public function apiAddProduct(Request $request)
    {

        $product = Session::get('productos');
        $product['capacidad'] = $request->capacidad;
        $product['cierre'] =  $request->cierre;
        //$product['terminacion'] = $request->terminacion;
        Session::put('productos',$product);

    }

    public function apiUpdateProduct(Request $request){
        $product = Session::get('productos');
        $product['capacidad'] = $request->capacidad;
        $product['cierre'] =  $request->cierre;
        //$product['terminacion'] = $request->terminacion;
        Session::put('productos',$product);
    }

    public function productos(){

        //return
    }
}
