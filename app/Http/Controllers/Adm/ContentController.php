<?php

namespace App\Http\Controllers\Adm;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index($section, $type) {
        if ($type == 'imagen') {
            $contenido = Content::seccionTipo($section, $type)->get();
            return view('adm.content.lista', compact('contenido', 'section','type'));
        }else{
            $contenido = Content::seccionTipo($section, $type)->first();
            $section == 'empresa' ? $data = json_decode($contenido->text,true) : $data = [];
            $section == 'logos' ? $logos = json_decode($contenido->text,true) : $logos = [];
            return view('adm.content.index', compact('contenido', 'section','type','data','logos'));
        }

    }

    public function create($section, $type) {
        return view('adm.content.create', compact('section','type'));
    }

    public function store(Request $request) {
        $contenido = Content::create($request->all());

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put("uploads/$request->section",$request->file('image'));
            $contenido->fill(['image' => $path])->save();
        }
        if ($request->destacado)
        {
            $contenido->fill(['destacado' => true])->save();
        }

        return back()->with('status', 'Creado correctamente');

    }
    public function edit($section, Content $contenido) {
        if ($section) {
            return view('adm.content.edit', compact('contenido','section'));
        }
    }

    public function update(Request $request, Content $contenido) {
        if ( $request->type == 'texto' && $request->section == 'empresa' || $request->section == 'logos')
        {
            $content = json_decode($contenido->text);
            $data = $request->all();
            $data['image'] = isset($content->image) ? $content->image : null;
            $data['image_2'] = isset($content->image_2) ? $content->image_2 : null;
            $data['image_3'] = isset($content->image_3) ? $content->image_3 : null;

            //datos
            if($request->file('image'))
            {
                $path = Storage::disk('public')->put("uploads/$request->section/$request->type",$request->file('image'));
                $data['image'] = $path;
            }
            if($request->file('image_2'))
            {
                $path = Storage::disk('public')->put("uploads/$request->section/$request->type",$request->file('image_2'));
                $data['image_2'] = $path;
            }
            if($request->file('image_3'))
            {
                $path = Storage::disk('public')->put("uploads/$request->section/$request->type",$request->file('image_3'));
                $data['image_3'] = $path;
            }
            $contenido->update(['text'=> json_encode($data)]);
        }else{
            $data = $request->all();
            if ($request->file('image'))
            {
                $path = Storage::disk('public')->put("uploads/$request->section/$request->type",$request->file('image'));
                $data['image'] = $path;
            }

            isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;

            if ($request->file('ficha')) {
                $path = Storage::disk('public')->put("uploads/$request->section/$request->type",$request->file('ficha'));
                $data['ficha'] = $path;
            }
            $contenido->update($data);
        }

        return back()->with('status', 'Actualizado correctamente');

    }

    public function delete($section, Content $contenido)
    {
        $contenido->delete();

        return back()->with('status', 'Eliminado correctamente');
    }
}
