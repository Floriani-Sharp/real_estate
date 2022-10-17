<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LodgingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  [HomeController::class , 'index'])->name('home');

Route::get('/connexion' , [LoginController::class , 'index'])->name('login');
Route::post('/connexion/authenticate' , [LoginController::class , 'authenticate'])->name('login.authenticate');
Route::get('/inscription' , [RegisterController::class , 'create'])->name('register');
Route::post('/inscription/store' , [RegisterController::class , 'store'])->name('register.store');

Route::middleware('auth')->group(function() {
    Route::resource('logements' , LodgingController::class)->except(['index']);
    Route::get('/mes/logements' , [LodgingController::class , 'index'])->name('lodgings.own');
    Route::get('/get/cities' , [LodgingController::class , 'getCities'])->name('getCities');

    // 
    Route::post('/logout' , [HomeController::class , 'logout'])->name('logout');
});