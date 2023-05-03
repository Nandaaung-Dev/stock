<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemContrller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', function() {
    return redirect()->route('items.index');
});
// Category Routes
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemContrller::class);
    Route::post('/items/{id}/change', [ItemContrller::class, 'changeStatus'])->name('items.changeStatus');
    Route::post('/categories/{id}/change', [CategoryController::class, 'changeStatus'])->name('categories.changeStatus');
});
// Route::get('/categories', [CategoryController::class, 'index']);
// Route::get('/categories/create', [CategoryController::class, 'create']);
// Route::post('/categories', [CategoryController::class, 'store']);
// Route::get('/categories/{category}', [CategoryController::class, 'show']);
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
// Route::put('/categories/{category}', [CategoryController::class, 'update']);
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
