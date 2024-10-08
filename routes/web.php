<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

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


Route::get('/', [WeatherController::class, 'index'])->name('index');
Route::post('/', [WeatherController::class, 'showResults'])->name('search');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



// Route::get('/', [IndexController::class, 'index']);
// Route::get('/home', [WeatherController::class, 'home']);

