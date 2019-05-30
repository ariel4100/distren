<?php

namespace App\Http\Controllers\adm;

use App\Galery;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index($id)
    {
        $news = Product::find($id);
        $galery = Galery::all();
        return view('adm.news.galery.index',compact('galery','news'));
    }

    public function create($id)
    {
        return view('adm.news.galery.create',compact('id'));
    }

    public function store(Request $request)
    {
        $novedades = Product::find($request->new_id);
        $galery = Galery::create($request->all());

        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/galeria/'.strtolower($novedades->Category->title).'',$request->file('image'));
            $galery->fill(['image' => $path])->save();
        }
        return redirect()->route('galeria.index',$request->new_id)->with('status','Creado correctamente');
    }
    public function edit($id)
    {
        $galery = Galery::find($id);
        $news = Product::find($galery->new_id);
        return view('adm.news.galery.edit',compact('galery','news'));
    }

    public function update(Request $request, $id)
    {
        $novedades = Product::find($request->new_id);
        $galery = Galery::create($request->all());

        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/galeria/'.strtolower($novedades->Category->title).'',$request->file('image'));
            $galery->fill(['image' => $path])->save();
        }
        return redirect()->route('galeria.index',$request->new_id)->with('status','Creado correctamente');
    }

    public function destroy($id)
    {
        Galery::find($id)->delete();
        return back()->with('status','Eliminado correctamente');
    }
}
