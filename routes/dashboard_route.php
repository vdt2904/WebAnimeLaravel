<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\BlogsController;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\BlogAniController;
use App\Http\Controllers\admin\AnimeController;
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