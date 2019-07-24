<?php

namespace App\Http\Controllers\adm;

use App\GroupProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupProductController extends Controller
{
    public function index()
    {
        $terminaciones = GroupProduct::all();
        return view('adm.termination.index',compact('terminaciones'));
    }

    public function create()
    {
        return view('adm.grupoproducto.create');
    }

    public function store(Request $request)
    {
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
        $terminacion = GroupProduct::find($id);
        return view('adm.grupoproducto.edit',compact('terminacion'));
    }

    public function update(Request $request,$id)
    {
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
