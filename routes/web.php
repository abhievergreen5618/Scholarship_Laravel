<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\UserController;

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


Route::controller(UserController::class)->group(function () {
    Route::post('/register','create')->name('register');
});
