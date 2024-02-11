<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ServiceController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/home', [MainController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/history', [HistoryController::class, 'index'])->name('main-history');
Route::match(['get', 'post'], '/service', [HistoryController::class, 'index'])->name('main-history');
Route::match(['get', 'post'], '/service', [ServiceController::class, 'index'])->name('main-service');
