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
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('item', ItemController::class);
});