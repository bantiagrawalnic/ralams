<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\LandAllocationTempController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::get('/', function () {
    if(\Auth::guest()){
    	return view('auth.logins');
    }else{ return redirect('applicant_form'); }
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/applicant_form', function () {
//     return view('land_allotment.applicant_form');
// })->name('applicant_form');

// Applicant Form 
// Route::get('/applicant_form', [ApplicantController::class, 'create'])->name('applicant_form');
// Route::post('/applicant_form', [ApplicantController::class, 'store'])->name('applicant.store');

Route::get('/applicant_form', [LandAllocationTempController::class, 'create'])->name('temporary_land_allocation.create');
Route::post('/temporary-land-allocation', [LandAllocationTempController::class, 'store'])->name('temporary_land_allocation.store');

Route::get('/dashboards', function () {
    return view('dashboard');
});

Route::get('register', [AuthController::class, 'showRegisterForm']);
Route::get('bhumi_chayan', [LandAllocationTempController::class, 'bhumi_chayan'])->middleware('auth')->name('bhumi_chayan.form');
Route::get('bhumi_vivran', [LandAllocationTempController::class, 'bhumi_vivran'])->name('bhumi_vivran.form');
Route::get('documents_upload', [LandAllocationTempController::class, 'documentation'])->name('documentation.form');
Route::get('preview', [LandAllocationTempController::class, 'preview'])->name('preview.form');
Route::get('sanstha_viivran', [LandAllocationTempController::class, 'sanstha_viivran'])->name('sanstha_viivran.form');
Route::get('land_selection', [AuthController::class, 'land_selection'])->name('land_selection.form');
Route::get('getlocation', [AuthController::class, 'getlocation'])->name('getlocation.form');
Route::get('getlocationland', [AuthController::class, 'getlocationland'])->name('getlocationland.form');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/get-khasra', [AuthController::class, 'getKhasra']);
Route::post('/get-khasra-details', [AuthController::class, 'getKhasraDetails'])->name('get.khasra.details');

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::get('/get-all-applications/{status}', [ApplicantController::class, 'getAllApplications'])->name('get.all.application');
    Route::get('/application-details/{id}', [ApplicantController::class, 'getApplicationDetails'])->name('application.details');
    Route::post('/update-application-status', [ApplicantController::class, 'updateApplicationStatus'])->name('update.applicationSatatus');
});

Route::get('logins', [AuthController::class, 'showLoginForms'])->name('login.form');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login/send-otp', [AuthController::class, 'sendOtp'])->name('login.sendotp');
Route::post('login/verify', [AuthController::class, 'verifyOtp'])->name('login.verify');
Route::post('loginsubmit', [AuthController::class, 'submoitlogin'])->name('login.submit');

Route::get('dashboard', function () {
    return view('user_portal.applicant_form');
})->middleware('auth')->name('dashboard');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register/send-otp', [RegisterController::class, 'sendOtp'])->name('register.sendOtp');
Route::get('/captcha-image', [RegisterController::class, 'generateCaptcha'])->name('captcha.image');
Route::get('/sso_details_view', [RegisterController::class, 'sso_details_view']);
Route::post('/sso_details', [RegisterController::class, 'sso_details'])->name('sso.store');
Route::post('/register/verify-otp', [RegisterController::class, 'verifyOtp'])->name('register.verifyOtp');


Route::get('/ssologin', function () {
    include base_path('raj_sso_project/login.php');
});

Route::get('test',function(){
    return view('form2');
});



