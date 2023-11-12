<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserRegisterController;
use Laravel\Socialite\Facades\Socialite;
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
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
Route::get('/signup', [UserRegisterController::class, 'index'])->name('signup');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//---------------------------------------
Route::post('/signup/add', [UserRegisterController::class, 'insertuser'])->name('adduser');
//---------------------------------------


Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');
Route::get('/auth/callback/facebook', [LoginController::class, 'handleFacebookCallback']);

//Login by google
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');
Route::get('/auth/callback/google', [LoginController::class, 'handleGoogleCallback']);
Route::get('/blog', function () {
    return view('BlogLayout');
});
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::post('/blog/{id}', [BlogController::class, 'SendReview'])->name('blog.SendReview');

