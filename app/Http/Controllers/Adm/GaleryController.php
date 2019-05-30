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
        $producto = Product::find($id);
        $galery = Galery::all();
        return view('adm.products.galery.index',compact('galery','producto'));
    }

    public function create($id)
    {
        return view('adm.products.galery.create',compact('id'));
    }

    public function store(Request $request)
    {
        $galery = Galery::create($request->all());

        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/galeria',$request->file('image'));
            $galery->fill(['image' => $path])->save();
        }
        return redirect()->route('galeria.index',$request->product_id)->with('status','Creado correctamente');
    }
    public function edit($id)
    {
        $galery = Galery::find($id);
        $producto = Product::find($galery->product_id);
        return view('adm.products.galery.edit',compact('galery','producto'));
    }

    public function update(Request $request, $id)
    {
        $galery = Galery::find($id);
        $galery->fill($request->all());

        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/galeria',$request->file('image'));
            $galery->fill(['image' => $path]);
        }
        $galery->save();
        return redirect()->route('galeria.index',$request->product_id)->with('status','Creado correctamente');
    }

    public function destroy($id)
    {
        Galery::find($id)->delete();
        return back()->with('status','Eliminado correctamente');
    }
}
