<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ScholarshipController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClassController;

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


Route::middleware(['auth'])->group(function () {

    // Student Routes
    Route::controller(ScholarshipController::class)->group(function () {
        Route::get('/','index')->name('start');
        Route::post('/personalinfosubmit','create')->name('personalinfosubmit');
        Route::post('/educationinfosubmit','educationInfoStore')->name('educationinfosubmit');
        Route::post('/applicationsummarysubmit','applicationsummarysubmit')->name('applicationsummarysubmit');
        Route::post('/savepaymentdetails','savepaymentdetails')->name('savepaymentdetails');
        Route::get('/get-districts/{statecode}','getDistricts');
    });


    // Admin Routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard','index')->name('admin.dashboard');
    });


    Route::controller(ClassController::class)->group(function () {
        Route::get('/classlist','index')->name('admin.class.index');
        Route::get('/addclass','create')->name('admin.classes');
        Route::post('/createclass','store')->name('admin.class.store');
        Route::post('/classdetails', 'display')->name('admin.class.details');
        Route::get('/classupdate', 'update')->name('admin.class.edit');
    });
});


Route::controller(LoginController::class)->group(function(){
    Route::get('/logout','logout')->name('logout');
    Route::get('/login/google','redirectToGoogle')->name('redirectToGoogle');
    Route::get('/login/google/callback','handleGoogleCallback')->name('handleGoogleCallback');
    Route::get('/login/facebook','redirectFacebook')->name('redirectToFacebook');
    Route::get('/login/facebook/callback','facebookCallback')->name('handleFacebookCallback');
    Route::post('/register','create')->name('register')->withoutMiddleware([VerifyCsrfToken::class]);
    Route::post('/login','login')->name('login')->withoutMiddleware([VerifyCsrfToken::class]);
    Route::get('/login',function(){
        return redirect()->to(env("WORDPRESS_URL")."/login");
    });
    Route::get('/register',function(){
        return redirect()->to(env("WORDPRESS_URL")."/signup");
    });
});

