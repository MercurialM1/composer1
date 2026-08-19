<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryItemController;

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



        Route::resource('videos', VideoController::class)->except(['show']);

        // Галерея - категории
        Route::resource('gallery/categories', GalleryCategoryController::class)
            ->except(['show'])
            ->names([
                'index' => 'gallery.categories.index',
                'create' => 'gallery.categories.create',
                'store' => 'gallery.categories.store',
                'edit' => 'gallery.categories.edit',
                'update' => 'gallery.categories.update',
                'destroy' => 'gallery.categories.destroy',
            ]);

        // Галерея - работы
        Route::resource('gallery/items', GalleryItemController::class)
            ->except(['show'])
            ->names([
                'index' => 'gallery.items.index',
                'create' => 'gallery.items.create',
                'store' => 'gallery.items.store',
                'edit' => 'gallery.items.edit',
                'update' => 'gallery.items.update',
                'destroy' => 'gallery.items.destroy',]);
    });
