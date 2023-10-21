<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\BlogsController;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\BlogAniController;
use App\Http\Controllers\admin\AnimeController;
use App\Http\Controllers\admin\TheLoaiController;
use App\Http\Controllers\admin\HangPhimController;
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
//dashboad
Route::get('/admin/dashboard', [dashboardController::class,'Index']);
Route::get('/admin/users', [dashboardController::class,'userlist']);

//blogs
Route::get('/admin/blogs', [BlogsController::class,'blogslist'])->name('admin.blogs');
Route::get('/admin/blogs/add', [BlogsController::class,'create']);
Route::post('uploadblogs', [BlogsController::class,'uploadblogs'])->name('Blogs.uploadblogs');
Route::get('/admin/blogs/edit/{id}', [BlogsController::class,'edit']);
Route::put('updateblogs', [BlogsController::class,'editblog'])->name('Blogs.updateblogs');
//blog
Route::get('/admin/bloganime', [BlogAniController::class,'BAlist'])->name('admin.bloganime');
//anime
Route::get('/admin/animes', [AnimeController::class,'animelist']);
//theloai
Route::get('/admin/theloai', [TheLoaiController::class,'index'])->name('admin.theloai');
Route::get('/admin/theloai/add', [TheLoaiController::class,'create']);
Route::post('addtheloai',[TheLoaiController::class,'adddata'])->name('addtheloai');
Route::get('/admin/theloai/edit/{id}', [TheLoaiController::class,'edit']);
Route::put('updatetheloai', [TheLoaiController::class,'edittl'])->name('theloai.updatetheloai');
//hangphim
Route::get('/admin/hangphim', [HangPhimController::class,'index'])->name('admin.hangphim');
Route::get('/admin/hangphim/add', [HangPhimController::class,'create']);
Route::post('addhangphim',[HangPhimController::class,'adddata'])->name('addhangphim');
Route::get('/admin/hangphim/edit/{id}', [HangPhimController::class,'edit']);
Route::put('updatehangphim', [HangPhimController::class,'edithp'])->name('hangphim.updatehangphim');