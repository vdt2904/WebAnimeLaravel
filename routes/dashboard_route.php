<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\BlogsController;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\BlogAniController;
use App\Http\Controllers\admin\AnimeController;
use App\Http\Controllers\admin\TheLoaiController;
use App\Http\Controllers\admin\HangPhimController;
use App\Http\Controllers\admin\loginAdminController;
use App\Http\Controllers\admin\logoutAdminController;
use App\Http\Controllers\admin\GoiController;
use App\Http\Controllers\admin\LoaiPhimController;
use App\Http\Controllers\admin\TapPhimController;

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
});
Route::get('/login', function () {
    return view('LoginHome');
});
//dashboad
Route::get('/admin/dashboard', [dashboardController::class, 'Index'])->name('dashboard')->middleware('checkAdminLogin');
Route::get('/admin/users', [dashboardController::class, 'userlist']);
//blogs
Route::get('/admin/blogs', [BlogsController::class, 'blogslist'])->name('admin.blogs')->middleware('checkAdminLogin');
Route::get('/admin/blogs/add', [BlogsController::class, 'create']);
Route::post('uploadblogs', [BlogsController::class, 'uploadblogs'])->name('Blogs.uploadblogs');
Route::get('/admin/blogs/edit/{id}', [BlogsController::class, 'edit']);
Route::put('updateblogs', [BlogsController::class, 'editblog'])->name('Blogs.updateblogs');
//blog
Route::get('/admin/bloganime', [BlogAniController::class,'BAlist'])->name('admin.bloganime');
Route::get('/admin/bloganime/add', [BlogAniController::class,'create']);
Route::post('uploadbloganime', [BlogAniController::class,'uploadtrailer'])->name('bloganime.uploadbloganime');
Route::get('/admin/bloganime/edit/{id}', [BlogAniController::class,'edit']);
Route::put('updateblogani', [BlogAniController::class,'editbla'])->name('bloganime.updateblogani');
//anime
Route::get('/admin/animes', [AnimeController::class,'animelist'])->name('admin.animes');
Route::get('/admin/animes/add', [AnimeController::class,'create']);
Route::post('uploadanime', [AnimeController::class,'uploadanimes'])->name('animes.uploadanime');
Route::get('/admin/animes/edit/{id}', [AnimeController::class,'edit']);
Route::put('updateanime', [AnimeController::class,'edita'])->name('animes.updateanime');
//theloai
Route::get('/admin/theloai', [TheLoaiController::class, 'index'])->name('admin.theloai')->middleware('checkAdminLogin');
Route::get('/admin/theloai/add', [TheLoaiController::class, 'create']);
Route::post('addtheloai', [TheLoaiController::class, 'adddata'])->name('addtheloai');
Route::get('/admin/theloai/edit/{id}', [TheLoaiController::class, 'edit']);
Route::put('updatetheloai', [TheLoaiController::class, 'edittl'])->name('theloai.updatetheloai');
//hangphim
Route::get('/admin/hangphim', [HangPhimController::class, 'index'])->name('admin.hangphim')->middleware('checkAdminLogin');
Route::get('/admin/hangphim/add', [HangPhimController::class, 'create']);
Route::post('addhangphim', [HangPhimController::class, 'adddata'])->name('addhangphim');
Route::get('/admin/hangphim/edit/{id}', [HangPhimController::class, 'edit']);
Route::put('updatehangphim', [HangPhimController::class, 'edithp'])->name('hangphim.updatehangphim');
//loginAdmin
Route::get('/admin/loginadmin', [loginAdminController::class, 'index']);
Route::post('/admin/loginadmin/login', [loginAdminController::class, 'login'])->name('login');
//logout
Route::get('/admin/logoutadmin', [logoutAdminController::class, 'index']);
Route::post('/admin/logoutadmin/logout', [logoutAdminController::class, 'logout'])->name('admin.logout');
//goi
Route::get('/admin/goi', [GoiController::class,'index'])->name('admin.goi');
Route::get('/admin/goi/add', [GoiController::class,'create']);
Route::post('addgoi',[GoiController::class,'adddata'])->name('addgoi');
Route::get('/admin/goi/edit/{id}', [GoiController::class,'edit']);
Route::put('updategoi', [GoiController::class,'editg'])->name('goi.updategoi');
//loaiphim
Route::get('/admin/loaiphim', [LoaiPhimController::class,'index'])->name('admin.loaiphim');
Route::get('/admin/loaiphim/add', [LoaiPhimController::class,'create']);
Route::post('addloaiphim',[LoaiPhimController::class,'adddata'])->name('addloaiphim');
Route::get('/admin/loaiphim/edit/{id}', [LoaiPhimController::class,'edit']);
Route::put('updateloaiphim', [LoaiPhimController::class,'editlp'])->name('loaiphim.updateloaiphim');
//TapPhim
Route::get('/admin/tapphim', [TapPhimController::class,'index'])->name('admin.tapphim');
Route::get('/admin/tapphim/add', [TapPhimController::class,'create']);
Route::post('addtapphim',[TapPhimController::class,'adddata'])->name('addtapphim');
Route::get('/admin/tapphim/edit/{id}', [TapPhimController::class,'edit']);
Route::put('updatetapphim', [TapPhimController::class,'edittp'])->name('tapphim.updatetapphim');

