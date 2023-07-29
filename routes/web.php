<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichj s
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('form');
});


Route::post('my-form', [ValidateController::class, 'myformPost'])->name('my.form');


Route::get('register', [OtpController::class, 'register_form']);