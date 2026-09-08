<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryShop;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryShop::all();
        return view('admin.product.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort' => 'required|integer',
            'is_active' => 'boolean',
        ]);
        CategoryShop::create([
            'name' => $request->name,
            'sort' => $request->sort,
            'is_active' => $request->boolean('is_active'),
        ]);
        return redirect()->route('admin.productcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.productcategory.show', []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CategoryShop::findOrFail($id);
        return view('admin.product.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort' => 'required|integer',
            'is_active' => 'boolean',
        ]);
        $category = CategoryShop::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'sort' => $request->sort,
            'is_active' => $request->boolean('is_active'),

        ]);
        return redirect()->route('admin.productcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoryShop::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.productcategory.index');
    }
}
