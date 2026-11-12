<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products.index', [
        'products' => Product::query()->orderBy('id')->get(),
    ]);
})->name('products.index');

Route::resource('products', ProductController::class)->only(['create', 'store']);
