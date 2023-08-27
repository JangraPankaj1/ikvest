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
  



// ********** login & registration *********
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::get('user/verify/{token}', [AuthController::class, 'verifyEmail'])->name('user.verify');

// ********** Manage Passwords *********

Route::get('forget-password', [AuthController::class, 'forgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [AuthController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'resetPasswordPost'])->name('reset.password.post');

Route::middleware('auth:web')->group(function(){

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        // Route::get('change-password', [AuthController::class, 'changePasswordForm'])->name('password.change.form');
        // Route::post('change-password', [AuthController::class, 'changePasswordPost'])->name('password.change.post');
        
});

 // ********** Social login *********

    // ********** for login page *********
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::any('callback/google', [GoogleController::class, 'handleGoogleCallback']);

    Route::controller(FacebookController::class)->group(function(){

        Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
        Route::get('auth/facebook/callback', 'handleFacebookCallback');
        
    });




    // Route::get('login', [SuperAdminController::class, 'index'])->name('admin.login');
    // Route::post('login', [SuperAdminController::class, 'postLogin'])->name('admin.login.post'); 


// ********** Super Admin Routes *********
    
    Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
         
        Route::get('/dashboard',[SuperAdminController::class,'dashboard'])->name('super-admin.dashboard');
       
    });


// ********** Head family Routes *********
    Route::group(['prefix' => 'head-family','middleware'=>['web','headFamily']],function(){

        Route::get('/dashboard',[HeadFamilyController::class,'dashboard'])->name('head-family.dashboard');
        Route::get('/password-change',[HeadFamilyController::class,'changePassword'])->name('change.password');
        Route::post('/password-change',[HeadFamilyController::class,'changePasswordPost'])->name('password.change.post');
        Route::get('/profile-update',[HeadFamilyController::class,'profileUpdate'])->name('profile.page');
        Route::post('/profile-update',[HeadFamilyController::class,'profileUpdatePost'])->name('profile.post');
        Route::get('/add-event',[HeadFamilyController::class,'eventPage'])->name('event.page');
        Route::post('/add-event',[HeadFamilyController::class,'eventPagePost'])->name('event.post');

        Route::any('/all-event',[HeadFamilyController::class,'allEvents'])->name('get.events');
    
        Route::get('/edit-event/{id}', [HeadFamilyController::class, 'editEvent'])->name('edit-event');
        Route::put('/edit-event/{id}', [HeadFamilyController::class, 'updateEvent'])->name('update.event');

        Route::get('/delete-event/{id}', [HeadFamilyController::class, 'deleteEvent'])->name('delete-event');


        // Route::get('delete-records','StudDeleteController@index');
        // Route::get('delete/{id}','StudDeleteController@destroy');


    });



// ********** Family Member Routes *********
    Route::group(['prefix' => 'family-member','middleware'=>['web','familyMember']],function(){

         Route::get('/dashboard',[FamilyMemberController::class,'dashboard'])->name('family-member.dashboard');
        //  Route::get('/', function () {
        //     return redirect()->refresh();

        //  });



    });


    // ********** Email otp template *********
   Route::get('emails.otp_verify', [AuthController::class, 'emailVerifyPage'])->name('emails.otp_verify');

