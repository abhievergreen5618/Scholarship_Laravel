<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ScholarshipController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ScholarshipType;
use App\Http\Controllers\Admin\UserDetail;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\PaymentRevenue;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
        Route::get('/form','index')->name('start');
        Route::post('/personalinfosubmit','create')->name('personalinfosubmit');
        Route::post('/educationinfosubmit','educationInfoStore')->name('educationinfosubmit');
        Route::post('/bankdetails','bankinfo')->name('bankdetails');
        Route::any('/applicationsummarysubmit','applicationsummarysubmit')->name('applicationsummarysubmit');
        Route::post('/savepaymentdetails','savepaymentdetails')->name('savepaymentdetails');
    });
    Route::get('get-fee/{feetype}', [ScholarshipController::class,'getFee']);

    Route::post('districtslist',[ScholarshipController::class,'getDistricts']);

    Route::get('/download-pdf',[ScholarshipController::class,'downloadpdf'])->name('downloadpdf');


    // Admin Routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard','index')->name('admin.dashboard');
    });


    Route::controller(ClassController::class)->group(function () {
        Route::get('/classlist','index')->name('admin.class.index');
        Route::get('/addclass','create')->name('admin.classes');
        Route::post('/createclass','store')->name('admin.class.store');
        Route::post('/classdetails', 'display')->name('admin.class.details');
        Route::get('/classedit/{id}', 'edit')->name('admin.class.edit');
        Route::get('/classeditdata', 'editdata')->name('admin.class.editdata');
        Route::post('/classupdate', 'update')->name('admin.class.update');
        Route::post('/classdelete', 'destroy')->name('classdelete');
        Route::post('/class-status-update', 'status')->name('class-status-update');
    });


    Route::controller(SubjectController::class)->group(function () {
        Route::get('/subjectslist','index')->name('admin.subjects.index');
        Route::get('/addsubject','create')->name('admin.subject.add');
        Route::post('/createsubject','store')->name('admin.subject.store');
        Route::post('/subjectsdetails', 'display')->name('admin.subjects.details');
        Route::get('/subjectsedit/{id}', 'edit')->name('admin.subject.edit');
        Route::get('/subjectseditdata', 'editdata')->name('admin.subject.editdata');
        Route::post('/subjectsupdate', 'update')->name('admin.subject.update');
        Route::post('/subjectdelete', 'destroy')->name('subjectdelete');
        Route::post('/subject-status-update', 'status')->name('subject-status-update');
    });

    Route::controller(ScholarshipType::class)->group(function () {
        Route::get('/scholarshipslist','index')->name('admin.scholarshiptype.index');
        Route::get('/addscholarships','create')->name('admin.scholarshiptype.add');
        Route::post('/storescholarships','store')->name('admin.scholarshiptype.store');
        Route::post('/scholarshipdetails','display')->name('admin.scholarshiptype.details');
        Route::get('/scholarshipedit/{id}','edit')->name('admin.scholarshiptype.edit');
        Route::get('/scholarshipeditdata', 'editdata')->name('admin.scholarshiptype.editdata');
        Route::post('/scholarshipsupdate', 'update')->name('admin.scholarshiptype.update');
        Route::post('/scholarshipdelete', 'destroy')->name('scholarshiptypedelete');
        Route::post('/scholarship-status-update', 'status')->name('scholarship-status-update');
    });

    Route::controller(UserDetail::class)->group(function () {
        Route::get('/userlist','index')->name('admin.user.index');
        Route::get('/adduser','create')->name('admin.user.add');
        Route::post('/storesuser','store')->name('admin.user.store');
        Route::post('/userdetails','display')->name('admin.user.details');
        Route::get('/useredit/{id}','edit')->name('admin.user.edit');
        Route::get('/viewdata/{id}','view')->name('admin.user.viewdata');
        Route::post('/userupdate', 'update')->name('admin.user.update');
        Route::post('/userdelete', 'destroy')->name('userdelete');
        Route::post('/user-status-update', 'status')->name('user-status-update');
    });

    Route::controller(FeeController::class)->group(function () {
        Route::get('/feelist','index')->name('admin.fee.index');
        Route::get('/addfee','create')->name('admin.fee.add');
        Route::post('/storesfee','store')->name('admin.fee.store');
        Route::post('/feedetails','display')->name('admin.fee.details');
        Route::get('/feeedit/{id}','edit')->name('admin.fee.edit');
        Route::get('/feeeditdata', 'editdata')->name('admin.fee.editdata');
        Route::post('/feeupdate', 'update')->name('admin.fee.update');
        Route::post('/feedelete', 'destroy')->name('feedelete');
        Route::post('/fee-status-update', 'status')->name('fee-status-update');
    });


    Route::controller(PaymentRevenue::class)->group(function () {
        Route::get('/paymentdata','index')->name('admin.payment.index');
        Route::post('/paymentdetails', 'display')->name('admin.payment.details');
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

    Route::post('/login',function(){
        return redirect()->to(env("WORDPRESS_URL")."/login");
    });
    Route::get('/register',function(){
        return redirect()->to(env("WORDPRESS_URL")."/signup");
    });
});


Route::post('/', 'LoginController@login')->name('login');

