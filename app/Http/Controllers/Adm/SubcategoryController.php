<?php

namespace App\Http\Controllers\Adm;

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
        return view('adm.subcategories.create');
    }

    public function store(Request $request)
    {
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
        return view('adm.subcategories.edit',compact('subcategoria'));
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
        //
    }
}
