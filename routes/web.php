<?php

use App\Http\Controllers\ProductController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [ProductController::class, 'Index'])->name('product.index');

Route::get('/products/create', [ProductController::class, 'Create'])->name('product.create');

Route::post('/products/store', [ProductController::class, 'Store'])->name('product.store');

Route::get('/products/edit/{id}', [ProductController::class, 'Edit'])->name('product.edit');

Route::post('/products/update/{id}', [ProductController::class, 'Update'])->name('product.update');

Route::get('/products/delete/{id}', [ProductController::class, 'Delete'])->name('product.delete');

Route::get('/products/show/{id}', [ProductController::class, 'Show'])->name('product.show');