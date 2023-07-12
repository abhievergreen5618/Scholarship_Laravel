<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;

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
