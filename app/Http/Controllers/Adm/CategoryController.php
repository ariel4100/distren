<?php

namespace App\Http\Controllers\Adm;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        return view('adm.categories.index',compact('categorias'));
    }

    public function create()
    {
        return view('adm.categories.create');
    }

    public function store(Request $request)
    {
        $categoria = Category::create($request->all());

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put("uploads/categorias",$request->file('image'));
            $categoria->fill(['image' => $path])->save();
        }
        return back()->with('status','Categoria creadó correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
        return view('adm.categories.edit',compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
