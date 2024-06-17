<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TrolleyController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' =>['auth']], function() {

	Route::group(['prefix' => 'users'], function () {
		Route::get('/', [UserController::class, 'index'])->name('users.index');
		Route::get('/create', [UserController::class, 'create'])->name('users.create');
		Route::post('/', [UserController::class, 'store'])->name('users.store');
		Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
		Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
		Route::delete('/{user}', [UserController::class, 'edit'])->name('users.destroy');
	});
});