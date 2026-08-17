<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

Route::prefix('admin')
//    ->middleware("auth")
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');



});
