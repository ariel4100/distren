<?php

namespace App\Http\Controllers;

use App\Content;
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

    public function productos()
    {
        $productos = Content::seccionTipo('servicios','imagen')->get();
        return view('page.productos',compact('productos'));
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
        return view('page.contacto');
    }
}
