<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;

// Guest Route
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post_register', [AuthController::class, 'post_register'])->name('post.register');

    Route::post('/post-login', [AuthController::class, 'login']);
})->middleware('guest');

// Admin Route
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Product Route
Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');


    Route::get('/admin-logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
})->middleware('admin');

// User Route
Route::group(['middleware' => 'web'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/user-logout', [AuthController::class, 'userLogout'])->name('user.logout');
})->middleware('web');