<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrolleyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MenuController::class, 'index']);

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('search');

//Product
Route::group(['prefix' => 'product'], function () {
	Route::get('/page', [ProductController::class, 'page'])->name('product.page');
	Route::get('/{id}', [ProductController::class, 'show'])->name('product.products');
});

Route::group(['middleware' => ['auth']], function () {

	// Users
	Route::group(['prefix' => 'users', 'middleware' => ['role:admin'], 'controller' => UserController::class], function () {
		Route::get('/', 'index')->name('users.index')->middleware('can:users.index');
		Route::get('/create', 'create')->name('users.create')->middleware('can:users.create');
		Route::post('/', 'store')->name('users.store')->middleware('can:users.store');
		Route::get('/{user}/edit', 'edit')->name('users.edit')->middleware('can:users.edit');
		Route::put('/{user}', 'update')->name('users.update')->middleware('can:users.update');
		Route::delete('/{user}', 'destroy')->name('users.destroy')->middleware('can:users.destroy');
	});

	//Cart
	Route::group(['prefix' => 'cart'], function () {
		Route::get('/', [TrolleyController::class, 'index'])->name('cart.index');
		Route::post('/create', [TrolleyController::class, 'create'])->name('cart.create');
		Route::post('/add/{product_id}', [TrolleyController::class, 'addToCart'])->name('cart.add');
		Route::put('/item/{id}', [TrolleyController::class, 'update'])->name('cart.update');
	});

	//Product and Category
	Route::group(['prefix' => 'category', 'controller' => CategoryController::class], function () {
		Route::get('/', 'index')->name('category.index');
		Route::get('/show/{product}', 'show')->name('category.show');
		Route::post('/store', 'store')->name('category.store');
		Route::post('/update/{product}', 'update')->name('category.update');
		// Route::put('/{product}', 'update')->name('category.update');
		Route::delete('/{product}', 'destroy')->name('category.destroy');
	});
});
