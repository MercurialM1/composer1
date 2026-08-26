<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Models\slider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use App\Models\User;
//сортировка и что бы видел $slider
Route::get('/', function () {
    $sliders=slider::where('Active',true);
    $sliders=$sliders->orderBy('sort','ASC');
    $sliders=$sliders->get();
    return view('index-all',compact('sliders'));
});

Route::get('/das', function () {
    return view('index-all');
})->name('home');

route::get('/blog-post', function () {
    return view('pages.blog-post');
})->name('blog-post');


Route::get('/about1', function () {
    return view('pages.about');
})->name('about1');

Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/sliderControl', function () {
    return view('pages.slider');
})->name('sliderControl');

Route::get('/elements', function () {
    return view('pages.elements');
})->name('elements');

Route::get('/header', function () {
    return view('pages.header');
})->name('header');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/charts', function () {
    return view('pages.charts');
})->name('charts');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/headings', function () {
    return view('pages.headings');
})->name('headings');

Route::get('/disqus', function () {
    return view('pages.disqus');
})->name('disqus');

Route::get('/icon-lulu', function () {
    return view('pages.icon-lulu');
})->name('icon-lulu');

Route::get('/icon-budicon', function () {
    return view('pages.icon-budicon');
})->name('icon-budicon');

Route::get('/icon-fontello', function () {
    return view('pages.icon-fontello');
})->name('icon-fontello');

Route::get('/headings', function () {
    return view('pages.headings');
})->name('headings');

Route::get('/animation', function () {
    return view('pages.animation');
})->name('animation');

Route::get('/onepage', function () {
    return view('pages.onepage');
})->name('onepage');


Route::redirect('/1','/das');

use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/profile', function () {
    // ...
})->middleware(EnsureTokenIsValid::class);


Route::get('/users/{id}', function ($id) {
    return "Пользователь: " . $id;
});

Route::get('/users/{userId}/posts/{postId}/he/{heId}', function ($userId, $postId, $heId) {
    return "Пользователь: $userId, пост: $postId,Он: $heId,";
})->where("id", "[0-9]+");

Route::get('/user/profile', function () {
})->name('profile');

//Route::get('/', function () {
//    return view('welcome');
//});

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



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
