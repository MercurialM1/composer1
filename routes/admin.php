<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::prefix('admin')
    ->middleware("auth")
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        route::get('/slider',function(){
            return view('admin.slider.index');
        })->name('slider');

        route::get('/slider/edit',function(){
            return view('admin.slider.edit');
        })->name('slider.edit');

        route::get('/slider/create',function(){
            return view('admin.slider.create');
        })->name('slider.create');
    });
