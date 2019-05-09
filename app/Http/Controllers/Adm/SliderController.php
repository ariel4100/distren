<?php

namespace App\Http\Controllers\Adm;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function list($section)
    {
        $slider = Slider::where('section', $section)->orderBy('order', 'ASC')->paginate(20);
        return view('adm.slider.index',compact('section','slider'));
    }
    public function create($section)
    {
        return view('adm.slider.create', ['section' => $section]);
    }


    public function store(Request $request, Slider $slider)
    {
        $slider = Slider::create($request->all());
        //IMAGE
        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/sliders',$request->file('image'));//$request->file('image')->store('public/sliders');
            $slider->fill(['image' => $path])->save();
        }

        return redirect()->route('slider.list', ['seccion' => $slider->section])->with('status', 'Slider creado correctamente');
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        $section = $slider->section;
        return view('adm.slider.edit', compact('slider','section'));
        //return view('adm.slider.edit', ['section' => $item->section, 'element' => $item]);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        $slider->fill($request->all())->save();

        if ($request->file('image'))
        {
            $path = Storage::disk('public')->put('uploads/sliders',$request->file('image'));
            $slider->fill(['image' => $path])->save();
        }

        return redirect()->route('slider.list', ['seccion' => $slider->section])->with('status', 'Slider actualizado correctamente');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $section = $slider->section;
        $slider->delete();
        return redirect()->route('slider.list', compact('section'))->with('status', 'Slider eliminado correctamente.');
    }
}
