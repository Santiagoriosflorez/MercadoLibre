<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TrolleyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MenuController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'cart'], function () {
	Route::get('/', [TrolleyController::class, 'index'])->name('cart.index');
	Route::post('/create', [TrolleyController::class, 'create'])->name('cart.create');
	Route::post('/add/{product_id}', [TrolleyController::class, 'addToCart'])->name('cart.add');
});
