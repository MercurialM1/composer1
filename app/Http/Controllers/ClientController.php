<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryShop;
use App\Models\Product;
class ClientController extends Controller
{
    public function index(){
        $categories = CategoryShop::where('is_active', true)->get();//берёт активные
        $products = Product::with('categories')->where('is_active', true)->get();
        return view('client.dashboard',compact('categories', 'products'));
    }
    public function shop(){
        $categories = CategoryShop::all();//берёт просто всё
        $products = Product::with('categories')->get();
        return view('client.shop.index',compact('categories', 'products'));
    }
//    public function shop(){
//        $categories = CategoryShop::where('is_active', true)->get();//берёт активные
//        $products = Product::with('categories')->where('is_active', true)->get();//ууууу жадная загрузка типо сначава все связи товара по id потом категории с этим id
//        return view('client.shop.components.store', compact('categories', 'products'));
//    }
//
}


//namespace App\Http\Controllers;
//
//use App\Models\Category;
//use App\Models\CategoryShop;
//use App\Models\Product;
//use Illuminate\Http\Request;
//
//class ClientController extends Controller
//{
//    public function index()
//    {
//        $categories = CategoryShop::where('is_active', true)->get();
//        $products = Product::with('categories')->where('is_active', true)->get();
//        return view('client.shop.components.store', compact('categories', 'products'));
//    }
//}
