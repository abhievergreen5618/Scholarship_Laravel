<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

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

Route::controller(ScholarshipController::class)->group(function () {
    Route::get('/','index')->name('start');
    Route::post('/personalinfosubmit','create')->name('personalinfosubmit');
});

Route::post('/register',[UserController::class,'create'])->name('register')->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/login',[UserController::class,'login'])->name('login')->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

