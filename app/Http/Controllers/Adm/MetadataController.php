<?php

namespace App\Http\Controllers\adm;

use App\Metadata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetadataController extends Controller
{

    function index()
    {
        $metadatos = Metadata::all();
        return view('adm.metadata.index',  compact('metadatos'));
    }

    function create()
    {
        return view('adm.metadata.create');
    }

    function store(Request $request)
    {
        Metadata::create($request->all());
        return back()->with('status', 'Metadato creadó correctamente');
    }

    function edit($id)
    {
        $metadato = Metadata::find($id);

        return view('adm.metadata.edit', compact('metadato'));
    }

    public function update(Request $request,$id)
    {
        $metadato = Metadata::find($id);
        $metadato->fill($request->all())->save();

        return back()->with('status', 'Metadato actualizadó correctamente');
    }
}
