<?php

namespace App\Http\Controllers\Adm;

use App\Capacity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CapacityController extends Controller
{
    public function index()
    {
        $capacidades = Capacity::orderBy('order')->get();
        return view('adm.capacities.index',compact('capacidades'));
    }

    public function create()
    {
        return view('adm.capacities.create');
    }

    public function store(Request $request)
    {
        Capacity::create($request->all());
        return back()->with('status','Capacidad creadó correctamente');
    }

    public function edit($id)
    {
        $capacidad = Capacity::find($id);
        return view('adm.capacities.edit',compact('capacidad'));
    }

    public function update(Request $request,$id)
    {
        $capacidad = Capacity::find($id);
        $capacidad->fill($request->all())->save();
        return back()->with('status','Capacidad actualizadó correctamente');
    }

    public function destroy($id)
    {
        $capacidad = Capacity::find($id);
        $capacidad->delete();
        return back()->with('status','Capacidad eliminada correctamente');
    }
}
