<?php

namespace App\Http\Controllers\Adm;

use App\Termination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TerminationController extends Controller
{
    public function index()
    {
        $terminaciones = Termination::all();
        return view('adm.termination.index',compact('terminaciones'));
    }

    public function create()
    {
        return view('adm.termination.create');
    }

    public function store(Request $request)
    {
        $terminacion = Termination::create($request->all());
        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/terminacion',$request->file('image'));
            $terminacion->fill(['image' => $path])->save();
        }
        return back()->with('status','Terminación creadó correctamente');
    }

    public function edit($id)
    {
        $terminacion = Termination::find($id);
        return view('adm.termination.edit',compact('terminacion'));
    }

    public function update(Request $request,$id)
    {
        $terminacion = Termination::find($id);

        $terminacion->fill($request->all())->save();

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/terminacion',$request->file('image'));
            $terminacion->fill(['image' => $path])->save();
        }

        return back()->with('status','Terminación actualizadó correctamente');
    }
}
