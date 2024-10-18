<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SubcategoryController, ItemController};

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('item', ItemController::class);
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'search'])->name('items.search');
    Route::get('/search-subcategory', [App\Http\Controllers\SubcategoryController::class, 'search'])->name('subcategory.search');
});
