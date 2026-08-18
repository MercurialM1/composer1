<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\SlideController;

Route::prefix('admin')
//    ->middleware("auth")
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        Route::get("datatable", function () {
            $users = User::all();
            return view('admin.datatable', compact('users'));
        })->name('datatable');

        Route::resource('slides', SlideController::class)->except(['show']);

    });
