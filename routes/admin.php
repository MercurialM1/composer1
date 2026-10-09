<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\sliderControl;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ContactController;

Route::prefix('admin')
    ->middleware(["admin",'auth'])
    ->name('admin.')
    ->group(function () {
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
        Route::resource('order',\App\Http\Controllers\Admin\AdminOrderController::class)->only(['index','destroy', 'update','show']);

        Route::resource('seo', \App\Http\Controllers\Admin\SeoController::class)->only(['update', 'edit'])->names(['edit' => 'seo.edit', 'update' => 'seo.update']);

        Route::resource('productcategory',ProductCategoryController::class)->names([
            'index' => 'productcategory.index',
            'create' => 'productcategory.create',
            'edit' => 'productcategory.edit',

        ]);

        Route::resource('product', ProductController::class)->names([
            'index' => 'product.index',
            'create' => 'product.create',
            'edit' => 'product.edit',
        ]);

        //потом вернусь сюда
        Route::get('/contactus', [ContactController::class, 'index'])->name('contactus.index');

        Route::delete('/contactus/{id}', [ContactController::class, 'destroy'])->name('contactus.destroy');

        Route::post('/contactus/{id}/create-user', [ContactController::class, 'createUser'])
            ->name('contactus.createUser');
        //удаление имменно аккаунта
        Route::delete('/contactus/{id}/deleteUser', [ContactController::class, 'deleteUser'])->name('contactus.deleteUser');
    });
