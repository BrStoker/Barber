<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ServiceController;
use \App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use \App\Http\Controllers\Auth\RegisterController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/home', [MainController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::match(['get', 'post'], '/history', [HistoryController::class, 'index'])->name('main-history');
Route::match(['get', 'post'], '/service', [ServiceController::class, 'index'])->name('main-service');
Route::match(['get', 'post'], '/gallery', [GalleryController::class, 'index'])->name('main-gallery');
Route::match(['get', 'post'], '/profile', [UserController::class, 'profile'])->name('user,profile');

Route::get('/get-appointments', [Controller::class, 'get_appointments'])->name('get-appointments');
Route::get('/get-user', [Controller::class, 'getUser'])->name('get-user');
