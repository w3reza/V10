<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegisterController::class, 'index'])->name('profile')->middleware('auth');

Route::get('/profile', [RegisterController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/profile/{id}', [RegisterController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/{id}', [RegisterController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('user.store');

Route::get('/logout', LogoutController::class)->name('logout')->middleware('auth');
