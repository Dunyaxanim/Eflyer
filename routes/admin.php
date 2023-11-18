<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.home');
})->name('home');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categorylist', "index")->name('categorylist');
    Route::get('/category-create', 'create')->name('categorycreate');
    Route::post('/category-create', 'store')->name('categorycreate');
    Route::get('/category-show/{data}', 'show')->name('categoryshow');
    Route::put('/category-show/{data}', 'update')->name('categoryupdate');
    Route::delete('/delete-item{data}', 'destroy')->name('deleteitem');
    Route::delete('/categorydestroyAll', "destroyAll")->name('categorydestroyAll');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/productlist', "index")->name('productlist');
    Route::get('/product-create', 'create')->name('productcreate');
    Route::post('/product-create', 'store')->name('productcreate');
    Route::get('/product-show/{data}', 'show')->name('productshow');
    Route::put('/category-show/{data}', 'update')->name('categoryupdate');
    Route::delete('/delete-item{data}', 'destroy')->name('deleteitem');
    Route::delete('/destroyAll', "destroyAll")->name('productdestroyAll');
});