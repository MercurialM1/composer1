<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\sliderControl;

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
    });

