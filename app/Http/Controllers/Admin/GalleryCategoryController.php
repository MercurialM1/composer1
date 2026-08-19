<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::orderBy('order')->get();
        return view('admin.gallery.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:gallery_categories,slug',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        GalleryCategory::create($validated);

        return redirect()->route('admin.gallery.categories.index')
            ->with('success', 'Категория успешно создана!');
    }

    public function edit(GalleryCategory $category)
    {
        return view('admin.gallery.edit', compact('category'));
    }

    public function update(Request $request, GalleryCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:gallery_categories,slug,' . $category->id,
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $category->update($validated);

        return redirect()->route('admin.gallery.categories.index')
            ->with('success', 'Категория успешно обновлена!');
    }

    public function destroy(GalleryCategory $category)
    {
        if ($category->items()->count() > 0) {
            return redirect()->route('admin.gallery.categories.index')
                ->with('error', 'Нельзя удалить категорию, в которой есть работы!');
        }

        $category->delete();

        return redirect()->route('admin.gallery.categories.index')
            ->with('success', 'Категория удалена!');
    }
}
