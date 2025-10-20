<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DyqaniController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dyqani.index');
});

Route::get('dyqani/about', function () {
    return view('dyqani.about');
})->name('dyqani.about');

Route::get('dyqani/contact', function () {
    return view('dyqani.contact');
})->name('dyqani.contact');

Route::get('/dyqani', [DyqaniController::class, 'index'])->name('dyqani.index');
Route::get('/product/{id}', [DyqaniController::class, 'show'])->name('dyqani.product.show');
Route::get('/dyqani/kategorite', [DyqaniController::class, 'kategorite'])->name('dyqani.kategorite');
Route::get('/search-products', [DyqaniController::class, 'searchAjax'])->name('dyqani.search');



Route::middleware([
    'auth:sanctum'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category}/products', [CategoryController::class, 'categoryProducts'])->name('categories.products');
    Route::resource('products', ProductController::class);
});