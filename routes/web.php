<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserRegisterController;

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

Route::get('/admin/login', function () {
    return view('LoginAdmin');
});
Route::get('/login/authenticare', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/signup', [UserRegisterController::class, 'index'])->name('signup');
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
