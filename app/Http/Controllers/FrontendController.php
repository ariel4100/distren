<?php

namespace App\Http\Controllers;

use App\Capacity;
use App\Category;
use App\Content;
use App\Galery;
use App\GroupProduct;
use App\Price;
use App\Product;
use App\Slider;
use App\Subcategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $contenido = Content::seccionTipo('home','imagen')->orderBy('order')->get();
        $home = Content::seccionTipo('home','texto')->first();
        $slider = Slider::where('section','home')->orderBy('order')->get();
        $productos = Product::where('featured',true)->limit(4)->orderBy('order')->get();
        $ofertas = Product::where('offer',true)->orderBy('order')->get();
        return view('page.home',compact('home','slider','contenido','productos','ofertas'));
    }

    public function empresa()
    {
        $data = Content::seccionTipo('empresa','texto')->first();
        $empresa = json_decode($data->text);
        $slider = Slider::where('section','empresa')->orderBy('order')->get();
        return view('page.empresa',compact('empresa','slider'));
    }

    public function categorias()
    {
        $categorias = Category::all();
        return view('page.productos.categorias',compact('categorias'));
    }

    public function categoriaproductos($id)
    {
        $categorias = Category::with('group_product')->with('group_product.product')->with('subcategory')->with('subcategory.group_product')->with('subcategory.group_product.product')->get();
        $categoria = Category::with('subcategory')->with('group_product')->with('group_product.product')->where('id',$id)->first();
//        dd($categoria);
        //$subcategorias = Subcategory::where('category_id',$categoria->id)->orderBy('order')->limit(2)->orderBy('order')->get();
        return view('page.productos.categoria',compact('categoria','categorias'));
    }

//    public function subcategoria($id)
//    {
//        $categorias = Category::all();
//        $subcategoria = Subcategory::find($id);
//        $subcategorias = Subcategory::orderBy('order')->limit(2)->orderBy('order')->get();
//        return view('page.productos.subcategoria',compact('categorias','subcategoria','subcategorias'));
//    }

    public function grupo_productos($id)
    {
        $categorias = Category::with('group_product')->with('group_product.product')->with('subcategory')->with('subcategory.group_product')->with('subcategory.group_product.product')->get();
        $grupo_productos = GroupProduct::with('product')->where('id',$id)->first();
        $categoria = Category::find($grupo_productos->category_id);
//        dd($grupo_productos);
        $subcategorias = Subcategory::orderBy('order')->limit(2)->orderBy('order')->get();
        return view('page.productos.grupoproductos',compact('categorias','subcategorias','grupo_productos','categoria'));
    }

    public function producto($id)
    {
        $producto = Product::with('category')->with('group_product')->where('id',$id)->first();
        $categorias = Category::with('group_product')->with('group_product.product')->with('subcategory')->with('subcategory.group_product')->with('subcategory.group_product.product')->get();
        $categoria = Category::find($producto->category_id);
        $grupo_productos = GroupProduct::with('product')->where('id',$producto->group_product_id)->first();
//        $capacidad = Capacity::where('product_id',$id)->get();
//        $galery = Galery::where('product_id',$producto->id)->get();
        return view('page.productos.producto',compact('producto','categorias','categoria','grupo_productos'));
    }

    public function ofertas()
    {
        $ofertas = Product::where('offer',true)->orderBy('order')->get();
        $precio = [];//Price::with("capacity",'product')->where('product_id',$producto->id)->get();
        return view('page.ofertas',compact('ofertas','precio'));
    }



    public function contacto()
    {
        $data = Content::seccionTipo('contacto','texto')->first();
        $contacto = json_decode($data->text);
        return view('page.contacto',compact('contacto'));
    }

    public function carrito()
    {
        return view('page.carrito');
    }

    public function confirmar()
    {
        return view('page.confirmar');
    }

    public function buscador(Request $request)
    {
//        dd($request->name);
        if (isset($request->name))
        {
            $resultado = Product::Orwhere('title', 'LIKE', "%$request->name%")->get();
        }else{
            $resultado = [];
        }
        //$resultado = Product::whereLike(['text->title_'.App::getLocale(), 'text->text_'.App::getLocale()], $request->name)->get();
        //dd($resultado);
        return view('page.buscador',compact('resultado'));
    }
}
