<?php

namespace App\Http\Controllers\Adm;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategory::all();
        return view('adm.subcategories.index',compact('subcategorias'));
    }

    public function create()
    {
        $categories  = Category::all();
        return view('adm.subcategories.create',compact('categories'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $subcategoria = Subcategory::create($request->all());

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put("uploads/categorias",$request->file('image'));
            $subcategoria->fill(['image' => $path])->save();
        }
        return back()->with('status','Subcategoria creadó correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $subcategoria = Subcategory::find($id);
        $categories  = Category::all();
//        dd($subcategoria);
        return view('adm.subcategories.edit',compact('subcategoria','categories'));
    }

    public function update(Request $request, $id)
    {
        $subcategoria = Subcategory::find($id);
        $subcategoria->fill($request->all());
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put("uploads/subcategorias",$request->file('image'));
            $subcategoria->fill(['image' => $path]);
        }
        $subcategoria->save();
        return back()->with('status','Subcategoria actualizado correctamente');
    }

    public function destroy($id)
    {
        $subcategoria = Subcategory::find($id);
        $subcategoria->delete();
        return back()->with('Subcategoria','Cierre eliminada correctamente');
    }
}
