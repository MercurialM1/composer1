<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\sliderControl;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ContactController;

Route::prefix('admin')
    ->middleware("auth")
    ->name('admin.')
    ->group(function () {
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

        Route::resource('productcategory',ProductCategoryController::class)->names([
            'index' => 'productcategory.index',
            'create' => 'productcategory.create',
            'edit' => 'productcategory.edit',
        ]);


        //потом вернусь сюда
        Route::get('/contactus', [ContactController::class, 'index'])->name('contactus.index');

        Route::delete('/contactus/{id}', [ContactController::class, 'destroy'])->name('contactus.destroy');

        Route::post('/contactus/{id}/create-user', [ContactController::class, 'createUser'])
            ->name('contactus.createUser');
        //удаление имменно аккаунта
        Route::delete('/contactus/{id}/deleteUser', [ContactController::class, 'deleteUser'])->name('contactus.deleteUser');
    });
