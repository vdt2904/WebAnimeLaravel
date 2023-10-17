<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\BlogsController;
use Illuminate\Http\Request;
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

Route::get('/admin/dashboard', [dashboardController::class,'Index']);
Route::get('/admin/users', [dashboardController::class,'userlist']);
Route::get('/admin/animes', [dashboardController::class,'animelist']);

Route::get('/admin/blogs', [BlogsController::class,'blogslist'])->name('admin.blogs');
Route::get('/admin/blogs/add', [BlogsController::class,'create']);
Route::post('uploadblogs', [BlogsController::class,'uploadblogs'])->name('Blogs.uploadblogs');
Route::get('/admin/blogs/edit/{id}', [BlogsController::class,'edit']);
Route::put('updateblogs', [BlogsController::class,'editblog'])->name('Blogs.updateblogs');