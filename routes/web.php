<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Social\GoogleController;
use App\Http\Controllers\Social\FacebookController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\HeadFamilyController;
use App\Http\Controllers\FamilyMemberController;


// ********** Home Page *********

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('About-us',[HomeController::class,'aboutUsPage'])->name('about-us');
Route::get('Family-tree',[HomeController::class,'familyTreePage'])->name('family-tree');
Route::get('Investing',[HomeController::class,'investingPage'])->name('investing');
Route::get('My-invest',[HomeController::class,'myInvestPage'])->name('my-invest');


// ********** otp verification *********

Route::get('/verification/{id}',[AuthController::class,'verification']);
Route::post('/verified',[AuthController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp',[AuthController::class,'resendOtp'])->name('resendOtp');
  
// ********** jquery routes *********

// Route::get('head-family/dashboard', [AuthController::class, 'headFamilyDashboard'])->name('head-family.dashboard');
// Route::get('family-member/dashboard', [AuthController::class, 'familyMemberDashboard'])->name('family-member.dashboard');
// Route::get('admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');


// ********** login & registration *********
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::get('user/verify/{token}', [AuthController::class, 'verifyEmail'])->name('user.verify');
Route::get('page/error', [AuthController::class, 'showErrorPage'])->name('page.error');


Route::get('forget-password', [AuthController::class, 'forgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [AuthController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'resetPasswordPost'])->name('reset.password.post');

Route::middleware('auth:web')->group(function(){

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('change-password', [AuthController::class, 'changePasswordForm'])->name('password.change.form');
        Route::post('change-password', [AuthController::class, 'changePasswordPost'])->name('password.change.post');
        
});

 // ********** Social login *********

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::any('callback/google', [GoogleController::class, 'handleGoogleCallback']);

    Route::controller(FacebookController::class)->group(function(){

        Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
        Route::get('auth/facebook/callback', 'handleFacebookCallback');
        
    });


    // ********** Admin Routes *********
    
     Route::group(['prefix' => 'admin','middleware'=>['web','isSuperAdmin']],function(){

        // Route::get('login', [SuperAdminController::class, 'index'])->name('admin.login');
        // Route::post('login', [SuperAdminController::class, 'postLogin'])->name('admin.login.post');  
        Route::get('/dashboard',[SuperAdminController::class,'dashboard']);   
       
    });

// ********** Head family Routes *********
    Route::group(['prefix' => 'head-family','middleware'=>['web','headFamily']],function(){
        Route::get('/dashboard',[HeadFamilyController::class,'dashboard']);
    });
    
// ********** Family Member Routes *********
    Route::group(['prefix' => 'family-member','middleware'=>['web','familyMember']],function(){
        Route::get('/dashboard',[FamilyMemberController::class,'dashboard']);
    });
    
   Route::get('emails.otp_verify', [AuthController::class, 'emailVerifyPage'])->name('emails.otp_verify');

