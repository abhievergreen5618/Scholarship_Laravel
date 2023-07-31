<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidateController;
use App\Http\Controller\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthOtpController;

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

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('my-form', [ValidateController::class, 'myformPost'])->name('my.form');

Auth::routes();

Route::controller(App\Http\Controllers\Auth\AuthOtpController::class)->group(function(){
    Route::get('otp/login', 'login')->name('otp.login');
    Route::post('otp/generate', 'generate')->name('otp.generate');
    Route::get('otp/verification/{user_id}', 'verification')->name('otp.verification');
    Route::post('otp/login', 'loginWithOtp')->name('otp.getlogin');
});
