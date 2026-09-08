<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category; //БЛЯ ЗАБЫЛ

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $categories = Category::all(); //spisok epta
        return view('admin.gallery.category.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.category.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'sort' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);
        Category::create([
            'name' => $request->name,
            'sort' => $request->sort,
            'is_active' => $request->is_active,

        ]);
        return redirect()->route('admin.category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $category): View
    {
        return view('admin.gallery.category.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.gallery.category.edit', compact('category'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'sort' => 'required|integer',
                'is_active' => 'required|boolean',
            ]
        );
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'sort' => $request->sort,
            'is_active' => $request->is_active,

        ]);
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
