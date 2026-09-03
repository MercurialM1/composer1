<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\sliderControl;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ContactController;

Route::prefix('admin')
    ->middleware("auth")
    ->name('admin.')
    ->group(function () {

//        Route::get('/', function () {
//            return view('admin.index');
//        })->name('index');
//
//        route::get('/slider', function () {
//            return view('admin.slider.index');
//        })->name('slider');
//
//        route::get('/slider/edit', function () {
//            return view('admin.slider.edit');
//        })->name('slider.edit');
//
//        route::get('/slider/create', function () {
//            return view('admin.slider.create');
//        })->name('slider.create');
//передаёт ресурсы из контроллера
        Route::resource('slider', \App\Http\Controllers\Admin\sliderControl::class)->names([
            'index' => 'slider.index',
            'create' => 'slider.create',
            'edit' => 'slider.edit',
        ]);

        Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->names([
            'index' => 'category.index',
            'create' => 'category.create',
            'edit' => 'category.edit',
        ]);

        Route::resource('photo', \App\Http\Controllers\Admin\PhotoController::class)->names([
            'index' => 'photo.index',
            'create' => 'photo.create',
            'edit' => 'photo.edit',
        ]);
        //потом вернусь сюда
        Route::get('/contactus', [ContactController::class, 'index'])->name('contactus.index');

        Route::delete('/contactus/{id}', [ContactController::class, 'destroy'])->name('contactus.destroy');
    });
