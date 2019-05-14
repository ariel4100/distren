<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $contenido = Content::seccionTipo('home','imagen')->get();
        $home = Content::seccionTipo('home','texto')->first();
        $slider = Slider::where('section','home')->get();
        return view('page.home',compact('home','slider','contenido'));
    }

    public function empresa()
    {
        $data = Content::seccionTipo('empresa','texto')->first();
        $empresa = json_decode($data->text);
        $slider = Slider::where('section','empresa')->get();
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
        return view('page.productos.categoria',compact('categoria','categorias'));
    }

    public function producto($id)
    {
        $producto = Product::find($id);
        $categorias = Category::all();
        $categoria = Category::find($producto->category_id);
        return view('page.productos.producto',compact('producto','categorias','categoria'));
    }

    public function flota()
    {
        $flota = Content::seccionTipo('flota','texto')->first();
        $flotas = Content::seccionTipo('flota','imagen')->get();
        $slider = Slider::where('section','flota')->get();
        return view('page.flota',compact('flota','slider','flotas'));
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
}
