<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    public function index()
    {
        $items = GalleryItem::with('category')
            ->orderBy('order')
            ->get();
        return view('admin.gallery.items.index', compact('items'));
    }

    public function create()
    {
        $categories = GalleryCategory::where('is_active', true)
            ->where('slug', '!=', 'all')
            ->orderBy('order')
            ->get();
        return view('admin.gallery.items.create', compact('categories'));
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'category_id' => 'required|exists:gallery_categories,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        'client' => 'nullable|string|max:255',
        'project_date' => 'nullable|date',
        'link' => 'nullable|url|max:255',
        'categories' => 'nullable|array',
        'categories.*' => 'string|max:100',
        'order' => 'nullable|integer',
        'is_active' => 'nullable|boolean',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('gallery', 'public');
    }

    $validated['is_active'] = $request->has('is_active');
    $validated['order'] = $validated['order'] ?? 0;

    // Собираем slug'и категорий в tags
    if (!empty($validated['categories'])) {
        $validated['tags'] = implode(',', $validated['categories']);
    } else {
        // Если ничего не отмечено — используем slug основной категории
        $category = GalleryCategory::find($validated['category_id']);
        $validated['tags'] = $category ? $category->slug : '';
    }
    unset($validated['categories']);

    GalleryItem::create($validated);

    return redirect()->route('admin.gallery.items.index')
        ->with('success', 'Работа успешно добавлена в галерею!');
}    public function edit(GalleryItem $item)
    {
        $categories = GalleryCategory::where('is_active', true)
            ->where('slug', '!=', 'all')
            ->orderBy('order')
            ->get();
        return view('admin.gallery.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, GalleryItem $item)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:gallery_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'link' => 'nullable|url|max:255',
            'categories' => 'nullable|array',
            'categories.*' => 'string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        // Собираем slug'и категорий в tags
        if (!empty($validated['categories'])) {
            $validated['tags'] = implode(',', $validated['categories']);
        } else {
            // Если ничего не отмечено — используем slug основной категории
            $category = GalleryCategory::find($validated['category_id']);
            $validated['tags'] = $category ? $category->slug : '';
        }
        unset($validated['categories']);

        $item->update($validated);

        return redirect()->route('admin.gallery.items.index')
            ->with('success', 'Работа успешно обновлена!');
    }    public function destroy(GalleryItem $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.gallery.items.index')
            ->with('success', 'Работа удалена из галереи!');
    }
}
