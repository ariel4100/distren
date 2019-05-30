<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
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
        $categorias = Category::all();
        $categoria = Category::find($id);
        $subcategorias = Subcategory::orderBy('order')->limit(2)->orderBy('order')->get();
        return view('page.productos.categoria',compact('categoria','categorias','subcategorias'));
    }

    public function subcategoria($id)
    {
        $categorias = Category::all();
        $subcategoria = Subcategory::find($id);
        $subcategorias = Subcategory::orderBy('order')->limit(2)->orderBy('order')->get();
        return view('page.productos.subcategoria',compact('categorias','subcategoria','subcategorias'));
    }

    public function producto($id)
    {
        $producto = Product::find($id);
        $categorias = Category::all();
        $categoria = Category::find($producto->category_id);
        $precio = Price::with("capacity",'product')->where('product_id',$producto->id)->get();
        return view('page.productos.producto',compact('producto','categorias','categoria','precio'));
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
}
