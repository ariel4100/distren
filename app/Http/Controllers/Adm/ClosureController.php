<?php

namespace App\Http\Controllers\Adm;

use App\Capacity;
use App\Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClosureController extends Controller
{
    public function index()
    {
        $cierres = Closure::all();
        return view('adm.closures.index',compact('cierres'));
    }

    public function create()
    {
        return view('adm.closures.create');
    }

    public function store(Request $request)
    {
        $cierre = Closure::create($request->all());
        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/cierre',$request->file('image'));
            $cierre->fill(['image' => $path])->save();
        }
        return back()->with('status','Cierre creadó correctamente');
    }

    public function edit($id)
    {
        $cierre = Closure::find($id);
        return view('adm.closures.edit',compact('cierre'));
    }

    public function update(Request $request,$id)
    {
        $cierre = Closure::find($id);

        $cierre->fill($request->all())->save();

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/cierre',$request->file('image'));
            $cierre->fill(['image' => $path])->save();
        }

        return back()->with('status','Cierre actualizadó correctamente');
    }

    public function destroy($id)
    {
        $cierre = Closure::find($id);
        $cierre->delete();
        return back()->with('status','Cierre eliminada correctamente');
    }
}
