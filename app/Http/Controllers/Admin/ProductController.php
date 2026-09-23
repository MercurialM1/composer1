<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\CategoryShop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $products = Product::with('categories')->get();
        return view('admin.product.product.index', compact('products',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryShop::all();
        return view('admin.product.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $path = $request->file('image')->store('products', 'public');
        $photo = Product::create([
            'name' => $request->name,
            'image' => $path,
            'is_active' => $request->boolean('is_active'),
            'sort' => $request->sort,
            'count' => $request->count,
            'description' => $request->description,
            'price' => $request->price,
            'delivery' => $request->delivery,
        ]);
        $categories = $request->input('productcategories',[]);
        $photo->categories()->sync($categories);
        return redirect()->route('admin.product.index');
    }
    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        return view('admin.product.product.create');
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = CategoryShop::all();
        $product = Product::findOrFail($id);
        return view('admin.product.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {

         $product = Product::findOrFail($id);
        $path = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : $product->image;
        $product->update([
           'name' => $request->name,
           'image' => $path,
           'is_active' => $request->boolean('is_active'),
           'sort' => $request->sort,
           'count' => $request->count,
           'description' => $request->description,
           'price' => $request->price,
           'delivery' => $request->delivery,

        ]);
        $categories = $request->input('productcategories',[]);
        $product->categories()->sync($categories);
        return redirect()->route('admin.product.index')->with('success',"Товар  {$product->name} обновлён");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
