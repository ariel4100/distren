<?php

namespace App\Http\Controllers\Adm;

use App\Capacity;
use App\Category;
use App\Closure;
use App\Imports\ProductImport;
use App\Price;
use App\Product;
use App\Subcategory;
use App\Termination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

//    //API
//    public function apiAddProduct(Request $request)
//    {
//        //str_replace("$ ","",$dataRequest["precio"]);
//        $product = Session::get('productos');
//        $product['capacidad'] = $request->capacidad;
//
//        //return str_replace("$","",$product['capacidad'][0]['price']);
//        $product['cierre'] =  $request->cierre;
//        $product['terminacion'] = $request->terminacion;
//        Session::put('productos',$product);
//        $product = Session::get('productos');
//        return $product;
//
//    }

//    public function apiUpdateProduct(Request $request){
//        $product = Session::get('productos');
//        $product['capacidad'] = $request->capacidad;
//        $product['cierre'] =  $request->cierre;
//        $product['terminacion'] = $request->terminacion;
//        Session::put('productos',$product);
//        $product = Session::get('productos');
//        return $product;
//    }

    //FIN DE API

    public function index()
    {
        $productos = Product::all();
        return view('adm.products.index',compact('productos'));
    }

    public function create()
    {
        $terminaciones = Termination::all();
        $cierres = Closure::all();
        $capacidades = Capacity::all();
        $categorias = Category::all();
        $subcategorias = Subcategory::all();
        return view('adm.products.create',compact('cierres','capacidades','categorias','subcategorias','terminaciones'));
    }

    public function store(Request $request)
    {

       //dd($request->all());
        //relacion de Many to Many con las terminaciones , cierres y capacidades
//        $apiProductos = Session::get('productos');
////        dd($apiProductos);
//        $capacidad = collect($apiProductos['capacidad']);
//        $cierres = collect($apiProductos['cierre']);
//        $terminacion = collect($apiProductos['terminacion']);

        $product = new Product();
        $product->title = $request->title;
        $product->text = $request->text;
        $product->featured = isset($request->featured) ? true : false;
        $product->offer = isset($request->offer) ? true : false;
        $product->order = $request->order;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
//        if ($request->file('image'))
//        {
//            $path = Storage::disk('public')->put("uploads/productos",$request->file('image'));
//            $product->fill(['image' => $path]);
//        }
        $product->save();
//
////        $idCapacidad = $capacidad->pluck('id');
////        $idCierres = $cierres->pluck('id');
////        $idTerminacion = $terminacion->pluck('id');
//
////        $product->subcategory()->sync($request->subcategory_id);
////        $product->capacity()->sync($idCapacidad);
//        $product->closure()->sync($idCierres);
//        $product->termination()->sync($idTerminacion);

        foreach ($request->capacity as $item) {
//            dd($item['price']);
            $item['price'] = str_replace(".","",$item["price"]);
            $item['price'] = str_replace(",",".",$item["price"]);
            $item['price'] = str_replace("$","",$item["price"]);
            $item['price_offer'] = str_replace(".","",$item["price_offer"]);
            $item['price_offer'] = str_replace(",","",$item["price_offer"]);
            $item['price_offer'] = str_replace("$","",$item["price_offer"]);

            Capacity::create([
                'cc' => $item['cc'],
                'price' => $item['price'],
                'price_offer' => $item['price_offer'],
                'offer' => isset($item['offer']) ? true : false,
                'product_id' => $product->id,
            ]);

        }
        //dd($product->capacity()->first()->precio);
//        Session::forget('productos');

        return back()->with('status','Se creó correctamente');
    }

    public function edit($id)
    {
        $categorias = Category::all();
        $producto = Product::find($id);
        $subcategorias = Subcategory::all();
        $cierres = Closure::all();
        $terminaciones = Termination::all();
//        dd(json_encode($productos));
        return view('adm.products.edit',compact('producto','categorias','subcategorias','terminaciones','cierres'));
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $product = Product::find($id);
        $product->title = $request->title;
        $product->text = $request->text;
        $product->featured = isset($request->featured) ? true : false;
        $product->offer = isset($request->offer) ? true : false;
        $product->order = $request->order;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;

//        if ($request->file('image'))
//        {
//            $path = Storage::disk('public')->put("uploads/productos",$request->file('image'));
//            $product->fill(['image' => $path]);
//        }
        $product->save();

//        dd($request->capacity);

        Capacity::where('product_id', $product->id)->delete();
        foreach ($request->capacity as $item) {
//            dd($item);
            $item['price'] = str_replace(".","",$item["price"]);
            $item['price'] = str_replace(",",".",$item["price"]);
            $item['price'] = str_replace("$","",$item["price"]);
            $item['price_offer'] = str_replace(".","",$item["price_offer"]);
            $item['price_offer'] = str_replace(",",".",$item["price_offer"]);
            $item['price_offer'] = str_replace("$","",$item["price_offer"]);

            Capacity::create([
                'cc' => $item['cc'],
                'price' => $item['price'],
                'price_offer' => $item['price_offer'],
                'offer' => isset($item['offer']) ? true : false,
                'product_id' => $product->id,
            ]);
        }
        $product->closure()->sync($request->cierre_id);
        $product->termination()->sync($request->terminacion_id);


        return back()->with('status','Se actualizó correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('status','Se eliminó correctamente');
    }


    public function presentaciones()
    {
        $terminaciones = Termination::all();
        $cierres = Closure::all();
        $capacidades = Capacity::all();
        return response()->json([
            'terminaciones' => $terminaciones,
            'cierres' => $cierres,
            'capacidades' => $capacidades
        ]);
    }

    public function cargapostal() {

        return view('adm.carrito.carga');
    }
    public function carga(Request $request) {
        dd($request->all());
        set_time_limit(0);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('productos')->truncate();
        DB::table('productooem')->truncate();
        DB::table('productoimage')->truncate();
        DB::table('productoaplicaciones')->truncate();

        $archivo = $request->file("archivo");
        dd($archivo);
        try {
            Excel::import(new ProductImport,$request->file('archivo'));
        } catch (Exception $e) {
            return back()->withErrors(['status' => "Ocurrió un error"]);
        }
        return back()->withSuccess(['status' => "Carga finalizada"]);
    }
}
