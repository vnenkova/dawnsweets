<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CakeController;

Route::get('/', [UserController::class, 'showWelcomeView'])->name('welcome');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerSubmit'])->name('registerSubmit');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::post('/logout', [UserController::class, 'logoutSubmit'])->name('logoutSubmit');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.destroy');
    Route::post('/cart/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/orders/{id}/complete', [OrderController::class, 'complete'])->name('orders.complete');
    Route::put('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::delete('/orders/{id}/delete', [OrderController::class, 'destroy'])->name('orders.delete');
    Route::get('/cakes/{id}/edit', [CakeController::class, 'edit'])->name('cakes.edit');
    Route::put('/cakes/{id}', [CakeController::class, 'update'])->name('cakes.update');
    Route::delete('/cakes/{id}', [CakeController::class, 'destroy'])->name('cakes.delete');
});