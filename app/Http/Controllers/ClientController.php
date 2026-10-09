<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use App\Models\CategoryShop;
use App\Models\Product;
class ClientController extends Controller
{
    public function index(SeoService $seoService)
    {
        $seo = $seoService->getSeoForPage('home');
        $categories = CategoryShop::where('is_active', true)->get();//берёт активные
        $products = Product::with('categories')->where('is_active', true)->get();
        return view('client.dashboard', compact('categories', 'products','seo'));
    }

    public function shop()
    {
        $categories = CategoryShop::all();//берёт просто всё
        $products = Product::with('categories')->get();
        return view('client.shop.index', compact('categories', 'products'));
    }
}
