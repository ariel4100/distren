<?php

namespace App\Http\Controllers\adm;

use App\Category;
use App\GroupProduct;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GroupProductController extends Controller
{
    public function index()
    {
        $terminaciones = GroupProduct::orderBy('order')->get();
        return view('adm.grupoproducto.index',compact('terminaciones'));
    }

    public function create()
    {
        $categorias = Category::get();
        $subcategorias = Subcategory::get();
//        dd($categorias);
        return view('adm.grupoproducto.create',compact('categorias','subcategorias'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $terminacion = GroupProduct::create($request->all());
        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/terminacion',$request->file('image'));
            $terminacion->fill(['image' => $path])->save();
        }
        return back()->with('status','Grupo del producto creadó correctamente');
    }

    public function edit($id)
    {
//        dd('s');
        $terminacion = GroupProduct::find($id);
        $categorias = Category::get();
        $subcategorias = Subcategory::get();
        return view('adm.grupoproducto.edit',compact('terminacion','categorias','subcategorias'));
    }

    public function update(Request $request,$id)
    {
//        dd($request->all());
        $terminacion = GroupProduct::find($id);

        $terminacion->fill($request->all())->save();

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/terminacion',$request->file('image'));
            $terminacion->fill(['image' => $path])->save();
        }

        return back()->with('status','Grupo del producto actualizadó correctamente');
    }

    public function destroy($id)
    {
        $terminacion = GroupProduct::find($id);
        $terminacion->delete();
        return back()->with('Terminación','Grupo del producto eliminado correctamente');
    }
}
