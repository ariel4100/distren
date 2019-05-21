<?php

namespace App\Http\Controllers\Adm;

use App\Capacity;
use App\Category;
use App\Closure;
use App\Price;
use App\Product;
use App\Subcategory;
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
        $subcategorias = Subcategory::all();
        return view('adm.products.create',compact('cierres','capacidades','categorias','subcategorias'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->except(['featured','subcategory_id']));
        ////$product->price()->save(['price'=>1,'quantity'=>5]);



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

        $product->subcategory()->sync($request->subcategory_id);
        $product->capacity()->sync($idCapacidad);
        $product->closure()->sync($idCierres);
        foreach ($capacidad as $item) {
            $item['price'] = str_replace(".","",$item["price"]);
            $item['price'] = str_replace(",",".",$item["price"]);
            $item['price'] = str_replace("$","",$item["price"]);
            $item['offerprice'] = str_replace(".","",$item["offerprice"]);
            $item['offerprice'] = str_replace(",",".",$item["offerprice"]);
            $item['offerprice'] = str_replace("$","",$item["offerprice"]);

            Price::create([
                'product_id' => $product->id,
                'capacity_id' => $item['id'],
                'price' => $item['price'],
                'offer_price' => $item['offerprice'],
                'quantity' => $item['quantity'],
            ]);

        }
        //dd($product->capacity()->first()->precio);
        Session::flush();

        return back()->with('status','Se creó correctamente');
    }

    public function edit($id)
    {
        $cierres = Closure::all();
        $capacidades = Capacity::all();
        $categorias = Category::all();
        $producto = Product::find($id);
        $precio = Price::with("capacity")->where('product_id',$producto->id)->get();
        $subcategorias = Subcategory::all();
//        dd(json_encode($productos));
        return view('adm.products.edit',compact('producto','categorias','capacidades','cierres','precio','subcategorias'));
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

        $product->subcategory()->sync($request->subcategory_id);
        $product->capacity()->sync($idCapacidad);
        $product->closure()->sync($idCierres);
        Price::where('product_id', $product->id)->delete();
        foreach ($capacidad as $item) {
            $item['price'] = str_replace(".","",$item["price"]);
            $item['price'] = str_replace(",",".",$item["price"]);
            $item['price'] = str_replace("$","",$item["price"]);
            $item['offerprice'] = str_replace(".","",$item["offerprice"]);
            $item['offerprice'] = str_replace(",",".",$item["offerprice"]);
            $item['offerprice'] = str_replace("$","",$item["offerprice"]);
            Price::create([
                'product_id' => $product->id,
                'capacity_id' => $item['id'],
                'price' => $item['price'],
                'offer_price' => $item['offerprice'],
                'quantity' => $item['quantity'],
            ]);
            //dd($item['id']);
        }
        return back()->with('status','Se actualizó correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('status','Se eliminó correctamente');
    }



    public function apiAddProduct(Request $request)
    {
        //str_replace("$ ","",$dataRequest["precio"]);
        $product = Session::get('productos');
        $product['capacidad'] = $request->capacidad;

        //return str_replace("$","",$product['capacidad'][0]['price']);
        $product['cierre'] =  $request->cierre;
        //$product['terminacion'] = $request->terminacion;
        Session::put('productos',$product);
        $product = Session::get('productos');
        return $product;

    }

    public function apiUpdateProduct(Request $request){
        $product = Session::get('productos');
        $product['capacidad'] = $request->capacidad;
        $product['cierre'] =  $request->cierre;
        //$product['terminacion'] = $request->terminacion;
        Session::put('productos',$product);
        $product = Session::get('productos');
        return $product;
    }

    public function productos(){

        //return
    }
}
