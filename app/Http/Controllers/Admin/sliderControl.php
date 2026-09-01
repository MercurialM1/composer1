<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\slider;

class sliderControl extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
    $sliders = \App\Models\slider::all(); // список слайдеров
        return view('admin.slider.index',compact('sliders')); // показать их
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');//
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request) //проверка,создание,перенаправление
    {
        $request->validate([ //параметры
            'Zagalovok' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $path = $request->file('Image')->store('sliders', 'public');//путь
        Slider::create([ // создание
            'Zagalovok' => $request->Zagalovok,
            'Description' => $request->Description,
            'Image' => $path,
            'Active' => $request->Active,
            'sort' => $request->sort,]);

        return redirect()->route('admin.slider.index'); //перенаправление
    }

    /**
     * Display the specified resource.
     */
    public function show(sliderControl $slider): View
    {
        return view('admin.slider.create');//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) // poisk

    {
     $slider =Slider::find($id);
     return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([ //только такие парамметры?
            'Zagalovok' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Active' => 'required',
            'sort' => 'required|integer',
        ]);
        $slider = Slider::find($id);
        $slider->update([
            'Zagalovok' => $request->Zagalovok,
            'Description' => $request->Description,
            'Image' => $request->hasFile('Image') ? $request->file('Image')->store('sliders', 'public') : $slider->Image, //бля спасибо php storm
            'Active' => $request->Active,
            'sort' => $request->sort,
        ]);//
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('public')->delete($slider->Image);
        $slider->delete();
        return redirect()->route('admin.slider.index');//
    }
}
