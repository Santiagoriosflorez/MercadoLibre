<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login',[AuthUserController::class, 'login']);
Route::post('/register',[UserController::class, 'store']);

// Rutas protegidas
Route::group(['middleware' => 'auth:sanctum'], function(){
	Route::post('/logout',[AuthUserController::class, 'logout']);
	Route::get('/profile',[AuthUserController::class, 'profile']);

	Route::group(['prefix' => 'users', 'controller' => UserController::class], function () {
		Route::get('/', 'index');
		Route::get('/{user}', 'show');
		Route::post('/', 'store');
		Route::put('/{user}', 'update');
		Route::delete('/{user}', 'destroy');
	});
});
