<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ScholarshipController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ScholarshipType;
use App\Http\Controllers\Admin\UserDetail;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\PaymentRevenue;
use App\Http\Controllers\Admin\ExcelImportController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\VenueController;

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
        Route::post('/applicationsummarysubmit','applicationsummarysubmit')->name('applicationsummarysubmit');
        Route::post('/savepaymentdetails','savepaymentdetails')->name('savepaymentdetails');
        Route::post('/savefailurepaymentdetails','savefailurepaymentdetails')->name('savefailurepaymentdetails');
        Route::post('/submitapplication','submitapplication')->name('submitapplication');
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
        Route::any('/storesuser','store')->name('admin.user.store');
        Route::post('/storesdocument','storedocument')->name('admin.user.storedocument');
        Route::post('/storebankdata','storebankdata')->name('admin.user.storebankdata');
        Route::post('/userdetails','display')->name('admin.user.details');
        Route::get('/useredit/{id}','edit')->name('admin.user.edit');
        Route::get('/viewdata/{id}','view')->name('admin.user.viewdata');
        Route::post('/userupdate', 'update')->name('admin.user.update');
        Route::post('/userdelete', 'destroy')->name('userdelete');
        Route::post('/user-status-update', 'status')->name('user-status-update');
        Route::get('/userresult', 'result')->name('admin.user.result');
        Route::any('/showresult', 'showresult')->name('admin.user.showresult');
        Route::post('/uploadressult','uploadresult')->name('admin.user.uploadresult');
        Route::get('/admitcard/{id}','admitcarddownload')->name('admin.user.admitcard');
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
        Route::get('/payment','index')->name('admin.payment.index');
        Route::post('/revenuepaymentdetails', 'displayrevenue')->name('admin.payment.revenue.details');
        Route::post('/failurepaymentdetails', 'displayfailure')->name('admin.payment.failure.details');
        Route::post('/successpaymentdetails', 'displaysuccess')->name('admin.payment.success.details');
    });

    Route::controller(EmailTemplateController::class)->group(function () {
        Route::get('/emailtemplate','index')->name('admin.emailtemplate.index');
        Route::post('/emailtemplatestore','store')->name('admin.emailtemplate.store');
    });

    Route::controller(StateController::class)->group(function () {
        Route::get('/states','index')->name('admin.state.index');
        Route::get('/addstate','create')->name('admin.state.add');
        Route::post('/statesstore','store')->name('admin.state.store');
        Route::get('/stateedit/{id}','edit')->name('admin.state.edit');
        Route::post('/statedetails','display')->name('admin.state.details');
        Route::post('/stateupdate','update')->name('admin.state.update');
        Route::post('/statedelete','destroy')->name('admin.state.delete');
        Route::post('/state-status-update','status')->name('admin.state.status.update');
        Route::post('/stateexam','setexamdatetime')->name('admin.state.exam.update');
    });

    Route::controller(DistrictController::class)->group(function () {
        Route::get('/districts','index')->name('admin.district.index');
        Route::get('/adddistrict','create')->name('admin.district.add');
        Route::post('/districtstore','store')->name('admin.district.store');
        Route::get('/districtedit/{id}','edit')->name('admin.district.edit');
        Route::post('/districtdetails','display')->name('admin.district.details');
        Route::post('/districtupdate','update')->name('admin.district.update');
        Route::post('/districtdelete','destroy')->name('admin.district.delete');
        Route::post('/district-status-update','status')->name('admin.district.status.update');
        Route::post('/districtexam','setexamdatetime')->name('admin.district.exam.update');
    });

    
    Route::controller(VenueController::class)->group(function () {
        Route::get('/venues','index')->name('admin.venue.index');
        Route::get('/addvenue','create')->name('admin.venue.add');
        Route::post('/venuestore','store')->name('admin.venue.store');
        Route::get('/venueedit/{id}','edit')->name('admin.venue.edit');
        Route::post('/venuedetails','display')->name('admin.venue.details');
        Route::post('/venueupdate','update')->name('admin.venue.update');
        Route::post('/venuedelete','destroy')->name('admin.venue.delete');
        Route::post('/venue-status-update','status')->name('admin.venue.status.update');
    });


    Route::controller(SessionController::class)->group(function () {
        Route::get('/sessionlist','index')->name('admin.session.index');
        Route::get('/addsession','create')->name('admin.session.add');
        Route::post('/sessioncreate','store')->name('admin.session.store');
        Route::post('/sessiondetails','display')->name('admin.session.details');
        Route::get('/sessionedit/{id}','edit')->name('admin.session.edit');
        Route::post('/sessionupdate','update')->name('admin.session.update');
        Route::post('/sessiondelete','destroy')->name('admin.session.delete');
        Route::post('/session-status-update','status')->name('admin.session.status.update');
        Route::post('/admitcardupdate','admitcardupdate')->name('admin.session.admitcard.update');
        Route::post('/current-session-update','currentsessionupdate')->name('admin.session.current.update');
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
        // return redirect()->to(env("WORDPRESS_URL")."/login");
        return redirect()->to(route('loginpage'));
    })->name('loginurl');
    Route::get('/register',function(){
        return redirect()->to(env("WORDPRESS_URL")."/signup");
    });

    Route::get('/','index')->name('loginpage');

    Route::post('/auth','directlogin')->name('mainlogin');
});





