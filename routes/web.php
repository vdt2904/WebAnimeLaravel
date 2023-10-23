<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
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

Route::get('/', function () {
    return view('HomeLayout');
})->name('HomeLayout');
Route::get('/login', function () {
    return view('LoginHome');
})->name('LoginHome');
Route::get('/admin/login', function () {
    return view('LoginAdmin');
});
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/signup', [UserRegisterController::class, 'index'])->name('signup');
//---------------------------------------
Route::post('/signup/add', [UserRegisterController::class, 'insertuser'])->name('adduser');
//---------------------------------------
use Laravel\Socialite\Facades\Socialite;

Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/callback/google', [LoginController::class, 'handleGoogleCallback']);
