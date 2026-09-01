<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Photo;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $photos = Photo::all();
        return view('admin.gallery.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view ('admin.gallery.photos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
            'sort' => 'required|integer',

        ]);
        $path = $request->file('path')->store('photos', 'public');
        $photo = Photo::create([ //создание
            'title' => $request->title,
            'description' => $request->description,
            'path' => $path,
            'is_active' => $request->is_active,
            'sort' => $request->sort,

        ]);
        if ($request->has('categories')) {//Привязка категории
            $photo->categories()->attach($request->categories);
        }
        return redirect()->route('photo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.gallery.photos.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $photo = Photo::findOrFail($id);
        return view('admin.gallery.photos.edit', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)//проверка,поиск,путь,апдейт,
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_active' => 'nullable|boolean',//бля я дебил
                'sort' => 'required|integer',
            ]
        );
        $photo = Photo::find($id);
        $path = $request->hasFile('path') ? $request->file('path')->store('photos', 'public') : $photo->path;//путь

        $photo->update([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $path,
            'is_active' => $request->is_active,
            'sort' => $request->sort,

        ]);
        if ($request->input('categories',[])) {//категория
            $photo->categories()->sync($request->categories); //обновление связей
        }
        return redirect()->route('photo.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        Storage::disk('public')->delete($photo->path);//удаление файла из папки
        $photo->delete();
        return redirect()->route('photo.index');
    }
}
