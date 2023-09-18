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
// Route::get('My-invest',[HomeController::class,'myInvestPage'])->name('my-invest');


// ********** otp verification *********

Route::get('/verification/{id}',[AuthController::class,'verification']);
Route::post('/verified',[AuthController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp',[AuthController::class,'resendOtp'])->name('resendOtp');



// ********** login & registration *********


Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::post('register', [AuthController::class, 'updateRegisterByFamilyMember'])->name
('register.update');

Route::get('user/verify/{token}', [AuthController::class, 'verifyEmail'])->name('user.verify');

// ********** Manage Passwords *********

Route::get('forget-password', [AuthController::class, 'forgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [AuthController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'resetPasswordPost'])->name
('reset.password.post');

Route::get('invite/{token}', [AuthController::class, 'inviteLink'])->name
('invite.link');

Route::middleware('auth:web')->group(function(){

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        // Route::get('change-password', [AuthController::class, 'changePasswordForm'])->name('password.change.form');
        // Route::post('change-password', [AuthController::class, 'changePasswordPost'])->name('password.change.post');

});

 // ********** Social login *********
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

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');

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
        Route::get('/add-family-member',[HeadFamilyController::class,'addFamilyMember'])->name
        ('add.family.member');
        Route::post('/add-family-member',[HeadFamilyController::class,'invitefamilyMember'])->name('invite.member.post');
        Route::get('/add-post', [HeadFamilyController::class, 'postPage'])->name
        ('post');
        Route::post('/timeline',[HeadFamilyController::class,'uploadPost'])->name
        ('posts');
        Route::get('/timeline',[HeadFamilyController::class,'showTimelineHead'])->name
        ('get.timeline.head');
        Route::get('/profile-view',[HeadFamilyController::class,'showProfile'])->name
        ('profile.view');

        Route::delete('/posts/{postId}/comments/{comment}',[HeadFamilyController::class,'deleteComment'])->name('comments.destroy');
        Route::delete('/post/{postId}',[HeadFamilyController::class,'deletePost'])->name('post.delete');

        Route::delete('/event/{postId}/comments/{comment}',[HeadFamilyController::class,'commentDelete'])->name('comments.destroy.without.model');

        Route::get('/posts/{post}/edit', [HeadFamilyController::class,'editPost'])->name('post.edit');
        Route::put('/posts/{id}', [HeadFamilyController::class,'updatePost'])->name('post.update');

        Route::post('/post/{id}/comments', [HeadFamilyController::class,'CommentOnPostHead'])->name('post.comments.head');
        Route::get('/posts/{postId}', [HeadFamilyController::class, 'getPostContent'])->name('post.get');

        Route::get('my-ikvest',[HeadFamilyController::class,'myIkvestPage'])->name('my-ikvest');

        Route::get('/search-family-member',[HeadFamilyController::class,'searchFamilyMember'])->name('search.family.member');

        Route::get('member-profile/{id}',[HeadFamilyController::class,'memberProfile'])->name
        ('member.profile');

        // Route::get('/load-more-family-members', [HeadFamilyController::class, 'loadMoreFamilyMembers'])
        // ->name('load.more.family.members');
    });



// ********** Family Member Routes *********
    Route::group(['prefix' => 'family-member','middleware'=>['web','familyMember']],function(){

         Route::get('/dashboard',[FamilyMemberController::class,'dashboard'])->name('family-member.dashboard');
         Route::any('/timline',[FamilyMemberController::class,'showTimeline'])->name
         ('get.timeline');
         Route::get('/profile-update',[FamilyMemberController::class,'profileUpdate'])->name('familyprofile.page');
         Route::post('/profile-update',[FamilyMemberController::class,'profileUpdatePost'])
         ->name ('profile.family');

        //  Route::get('/profile-view',[FamilyMemberController::class,'showProfile'])->name
        //  ('profile.view');

        //  Route::get('/delete-timeline/{id}', [FamilyMemberController::class, 'deleteTimeline'])->name('delete-timeline');

        Route::post('/post/{id}/comments', [FamilyMemberController::class,'CommentOnPost'])->name('post.comments');
        Route::delete('/post/{id}/comments/{comment}',[FamilyMemberController::class,'deleteComment'])->name('post.comments.destroy');
    });


    // ********** Email otp template *********
   Route::get('emails.otp_verify', [AuthController::class, 'emailVerifyPage'])->name('emails.otp_verify');

