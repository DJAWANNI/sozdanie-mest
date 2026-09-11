<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZayavkiController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('registerpage',[UserController::class, 'registerPage'])->name('registerPage');
Route::get('authpage',[UserController::class, 'authPage'])->name('authPage');
Route::get('admin',[UserController::class, 'admin'])->name('admin');
Route::post('/placecreate', [PlaceController::class, 'placeCreate'])->name('placeCreate');
Route::get('zayavka',[UserController::class, 'zayavka'])->name('zayavka');
Route::post('/orderCreate', [ZayavkiController::class, 'orderCreate'])->name('orderCreate');