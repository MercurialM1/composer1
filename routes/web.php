<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Photo;
use App\Models\slider;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use App\Models\User;
use App\Models\contact;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\sliderControl;

//сортировка и что бы видел $slider
Route::get('/', function () {
    $sliders = slider::where('Active',true);
    $sliders = $sliders->orderBy('sort','ASC');
    $sliders = $sliders->get();
    $photos = Photo::where('is_active',true);
    $photos = $photos->orderBy('sort','ASC');
    $photos = $photos->get();
    $categories = Category::all();
    $categories = $categories->sortBy('sort');
//    $categories=$categories->get();
    return view('index-all',compact('sliders','photos','categories'));
});

route::get('/blog-post', function () {
    return view('pages.blog-post');
})->name('blog-post');


Route::get('/about1', function () {
    return view('pages.about');
})->name('about1');http://localhost/

Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');// использует контроллер

Route::post('/contact', [ContactController::class, 'store'])->name('contactus.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
Route::middleware('auth')->prefix('cabinet')->as('cabinet.')->group(function () {
Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy','update']);
Route::get('shop', [ClientController::class, 'shop'])->name('shop');
Route::post('add', [CartController::class, 'add'])->name('cart.add');
Route::get('checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
Route::post('order', [OrderController::class, 'order'])->name('cart.order');
Route::get('index',[OrderController::class,'index'])->name('index');
});


Route::get('/cabinet',[ClientController::class,'index'])->middleware(['auth'])->name('cabinet');
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
