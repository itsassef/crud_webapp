<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Product CRUD routes
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('createProduct');
Route::post('/product/add', [App\Http\Controllers\ProductController::class, 'store'])->name('addProduct');
Route::get('/product/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editProduct');
Route::get('/product/delete/{product}', [App\Http\Controllers\ProductController::class, 'delete'])->name('deleteProduct');
Route::post('/product/delete_multiple', [App\Http\Controllers\ProductController::class, 'deleteMultiple'])->name('deleteMultiple');
