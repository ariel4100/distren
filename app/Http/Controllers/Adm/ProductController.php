<?php

namespace App\Http\Controllers\Adm;

use App\Capacity;
use App\Category;
use App\Closure;
use App\GroupProduct;
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
        $categorias = Category::with('subcategory')->with('subcategory.group_product')->get();
        $productos = Product::all();
        $terminaciones = Termination::all();
        $cierres = Closure::all();
        $capacidades = Capacity::all();
        // $categorias = Category::all();
        $subcategorias = Subcategory::all();
         $grupoproductos = GroupProduct::all();
        // dd($grupoproductos);
        return view('adm.products.create',compact('cierres','capacidades','categorias','subcategorias','terminaciones','productos','grupoproductos'));
    }

    public function store(Request $request)
    {

//        dd($request->all());
    $item['price'] = $request->price ?? 0;
    $item['price_offer'] = $request->price_offer ?? 0;
        //relacion de Many to Many con las terminaciones , cierres y capacidades
//        $apiProductos = Session::get('productos');
////        dd($apiProductos);
//        $capacidad = collect($apiProductos['capacidad']);
//        $cierres = collect($apiProductos['cierre']);
//        $terminacion = collect($apiProductos['terminacion']);
        $product = new Product();
        $related =  $request->related_id;
        $gallery = $request->gallery;

        $item['price'] = str_replace(".","",$item["price"]);
        $item['price'] = str_replace(",","",$item["price"]);
        $item['price'] = str_replace("$","",$item["price"]);
        $item['price_offer'] = str_replace(".","",$item["price_offer"]);
        $item['price_offer'] = str_replace(",","",$item["price_offer"]);
        $item['price_offer'] = str_replace("$","",$item["price_offer"]);
        $product->price = $item['price'];
        $product->price_offer = $item['price_offer'];
//        dd($item['price']);
        if (isset($gallery))
        {
//            dd($gallery);
            foreach ($gallery as $k => $item) {
//                dd($item['image']);
                if ( $item['image'] )
                {
//                    dd($item['image']);
                    $path = $item['image']->store("uploads/productos");
                    $gallery[$k]['image'] = $path;
                }
            }
        }


        // dd($item['price']);
        $product->image = $gallery;
        $product->title = $request->title;
        $product->text = $request->text;

        $product->featured = isset($request->featured) ? true : false;
        $product->offer = isset($request->offer) ? true : false;
        $product->status = isset($request->listado) ? true : false;
        $product->order = $request->order;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->group_product_id = $request->group_product_id;
//        if ($request->file('image'))
//        {
//            $path = Storage::disk('public')->put("uploads/productos",$request->file('image'));
//            $product->fill(['image' => $path]);
//        }
        $product->save();
        $product->related()->sync($related);
//        dd($product);
//
////        $idCapacidad = $capacidad->pluck('id');
////        $idCierres = $cierres->pluck('id');
////        $idTerminacion = $terminacion->pluck('id');
//
////        $product->subcategory()->sync($request->subcategory_id);
////        $product->capacity()->sync($idCapacidad);
//        $product->closure()->sync($idCierres);
//        $product->termination()->sync($idTerminacion);

//        foreach ($request->capacity as $item) {
////            dd($item['price']);
//            $item['price'] = str_replace(".","",$item["price"]);
//            $item['price'] = str_replace(",",".",$item["price"]);
//            $item['price'] = str_replace("$","",$item["price"]);
//            $item['price_offer'] = str_replace(".","",$item["price_offer"]);
//            $item['price_offer'] = str_replace(",","",$item["price_offer"]);
//            $item['price_offer'] = str_replace("$","",$item["price_offer"]);
//
//            Capacity::create([
//                'cc' => $item['cc'],
//                'price' => $item['price'],
//                'price_offer' => $item['price_offer'],
//                'offer' => isset($item['offer']) ? true : false,
//                'product_id' => $product->id,
//            ]);
//
//        }
        //dd($product->capacity()->first()->precio);
//        Session::forget('productos');

        return back()->with('status','Se creó correctamente');
    }

    public function edit($id)
    {
        $categorias = Category::with('subcategory')->with('subcategory.group_product')->get();
        $producto = Product::find($id);
        $productos = Product::all();
        $subcategorias = Subcategory::all();
        $cierres = Closure::all();
        $grupoproductos = GroupProduct::all();
//        dd($categorias);
        return view('adm.products.edit',compact('producto','categorias','subcategorias','grupoproductos','cierres','productos'));
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $item['price'] = $request->price ?? 0;
        $item['price_offer'] = $request->price_offer ?? 0;
        $related =  $request->related_id;
//        dd($item['price']);
//        $related->pluck('id');
        $product = Product::find($id);

        $product->related()->sync($related);
//        return 'aca';
        $gallery = $request->gallery;

//        dd($item['price']);
        $item['price'] = str_replace(".","",$item["price"]);
        $item['price'] = str_replace(",","",$item["price"]);
        $item['price'] = str_replace("$","",$item["price"]);
        $item['price_offer'] = str_replace(".","",$item["price_offer"]);
        $item['price_offer'] = str_replace(",","",$item["price_offer"]);
        $item['price_offer'] = str_replace("$","",$item["price_offer"]);
        $product->price = $item['price'];
        $product->price_offer = $item['price_offer'];

        if (isset($gallery))
        {
            //dd($gallery);
            foreach ($gallery as $k => $item) {
//                dd($item['image']);
                if (is_string($item['image']))
                {
//                    dd($product->image[$k]);
                    $gallery[$k]['image'] = $product->image[$k]['image'];
                }else{
//                    dd($item['image']);
                    $path = $item['image']->store("productos/imagenes");
                    $gallery[$k]['image'] = $path;
                }
            }
        }


        $product->title = $request->title;

        $product->image = $gallery;
        $product->text = $request->text;
        $product->featured = isset($request->featured) ? true : false;
        $product->offer = isset($request->offer) ? true : false;
        $product->status = isset($request->listado) ? true : false;
        $product->order = $request->order;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->group_product_id = $request->group_product_id;

//        if ($request->file('image'))
//        {
//            $path = Storage::disk('public')->put("uploads/productos",$request->file('image'));
//            $product->fill(['image' => $path]);
//        }
        $product->save();

//        dd($request->capacity);

//        Capacity::where('product_id', $product->id)->delete();
//        foreach ($request->capacity as $item) {
////            dd($item);
//            $item['price'] = str_replace(".","",$item["price"]);
//            $item['price'] = str_replace(",",".",$item["price"]);
//            $item['price'] = str_replace("$","",$item["price"]);
//            $item['price_offer'] = str_replace(".","",$item["price_offer"]);
//            $item['price_offer'] = str_replace(",",".",$item["price_offer"]);
//            $item['price_offer'] = str_replace("$","",$item["price_offer"]);
//
//            Capacity::create([
//                'cc' => $item['cc'],
//                'price' => $item['price'],
//                'price_offer' => $item['price_offer'],
//                'offer' => isset($item['offer']) ? true : false,
//                'product_id' => $product->id,
//            ]);
//        }
//        $product->closure()->sync($request->cierre_id);
//        $product->termination()->sync($request->terminacion_id);


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
