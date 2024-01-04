<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/items', [HomePageController::class, 'index']);

Route::get('/items/add', [HomePageController::class, 'add']);
Route::post('/items/add', [HomePageController::class, 'create']);

Route::get('/items/update/{id}', [HomePageController::class, 'edit']);
Route::post('/items/update/{id}', [HomePageController::class, 'update']);

Route::get('/items/delete/{id}', [HomePageController::class, 'delete']);

Route::get('/', [HomePageController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'category']);

Route::get('/categories/add', [CategoryController::class, 'add']);
Route::post('/categories/add', [CategoryController::class, 'create']);

Route::get('/categories/delete/{id}', [CategoryController::class, 'delete']);

Route::get('/categories/update/{id}', [CategoryController::class, 'edit']);
Route::post('/categories/update/{id}', [CategoryController::class, 'update']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

