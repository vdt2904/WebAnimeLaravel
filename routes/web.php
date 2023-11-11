<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\FilmDetailsController;

Route::get('/admin/login', function () {
    return view('LoginAdmin');
});
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
Route::get('/signup', [UserRegisterController::class, 'index'])->name('signup');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//---------------------------------------
Route::post('/signup/add', [UserRegisterController::class, 'insertuser'])->name('adduser');
//---------------------------------------
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');
Route::get('/auth/callback/facebook', [LoginController::class, 'handleFacebookCallback']);


//Login by google
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/auth/callback/google', [LoginController::class, 'handleGoogleCallback']);

// Login by Facebook

Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');

//Login by X
Route::get('/auth/twitter', function () {
    return Socialite::driver('twitter')->redirect();
})->name('login.X');
Route::get('/auth/callback/twitter', [LoginController::class, 'handleTwitterCallback']);
Route::get('/blog', [BlogController::class, 'index'])->name('BlogLayout');
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::post('/blog/{id}', [BlogController::class, 'SendReview'])->name('blog.SendReview');
// Contact
Route::get('/contact', function () {
    return view('ContactLayout');
})->name('contact');

Route::get('/forgotpassword', function () {
    return view('ForgotPassword');
})->name('ForgotPassword');
Route::post('/forgotpassword', [LoginController::class, 'SendEmail'])->name('SendEmail');
Route::get('/resetpassword/{token}', function () {
    return view('ResetPassword');
})->name('GetResetPassword');
Route::post('/resetpassword', [LoginController::class, 'ChangePassword'])->name('ResetPassword');
//FilmDetails
Route::get('/filmdetails/{id}', [FilmDetailsController::class, 'index'])->name('filmdetails');
Route::post('/rate-anime/{id}', [YourController::class, 'rateAnime'])->name('rate-anime');
Route::post('/review-anime/{id}', [FilmDetailsController::class, 'SendReview'])->name('SendReview');
