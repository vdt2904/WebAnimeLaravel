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
use App\Http\Controllers\admin\TLAnimeController;

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
//loginAdmin
Route::get('/admin/loginadmin', [loginAdminController::class, 'index']);
Route::post('/admin/loginadmin/login', [loginAdminController::class, 'login'])->name('login');
//logout
Route::get('/admin/logoutadmin', [logoutAdminController::class, 'index']);
Route::post('/admin/logoutadmin/logout', [logoutAdminController::class, 'logout'])->name('admin.logout');
//group admin
Route::prefix('admin')->group(function () {
    // Đặt tất cả các route bạn muốn gắn vào nhóm "admin" ở đây
    // ->middleware('checkAdminLogin')
    // Dashboard
    Route::get('/dashboard', [dashboardController::class, 'Index'])->name('dashboard');
    Route::get('/users', [dashboardController::class, 'userlist']);
    // Blogs
    Route::get('/blogs', [BlogsController::class, 'blogslist'])->name('admin.blogs');
    Route::get('/blogs/add', [BlogsController::class, 'create']);
    Route::post('uploadblogs', [BlogsController::class, 'uploadblogs'])->name('Blogs.uploadblogs');
    Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit']);
    Route::put('updateblogs', [BlogsController::class, 'editblog'])->name('Blogs.updateblogs');

    // Blog Anime
    Route::get('/bloganime', [BlogAniController::class, 'BAlist'])->name('admin.bloganime');
    Route::get('/bloganime/add', [BlogAniController::class, 'create']);
    Route::post('uploadbloganime', [BlogAniController::class, 'uploadtrailer'])->name('bloganime.uploadbloganime');
    Route::get('/bloganime/edit/{id}', [BlogAniController::class, 'edit']);
    Route::put('updateblogani', [BlogAniController::class, 'editbla'])->name('bloganime.updateblogani');
    Route::delete('deleteblogani/{id}',[BlogAniController::class, 'delete']);
    // Anime
    Route::get('/animes', [AnimeController::class, 'animelist'])->name('admin.animes');
    Route::get('/animes/add', [AnimeController::class, 'create']);
    Route::post('uploadanime', [AnimeController::class, 'uploadanimes'])->name('animes.uploadanime');
    Route::get('/animes/edit/{id}', [AnimeController::class, 'edit']);
    Route::put('updateanime', [AnimeController::class, 'edita'])->name('animes.updateanime');
    Route::delete('deleteanime/{id}',[AnimeController::class, 'delete']);
    // Thể loại
    Route::get('/theloai', [TheLoaiController::class, 'index'])->name('admin.theloai');
    Route::get('/theloai/add', [TheLoaiController::class, 'create']);
    Route::post('addtheloai', [TheLoaiController::class, 'adddata'])->name('addtheloai');
    Route::get('/theloai/edit/{id}', [TheLoaiController::class, 'edit']);
    Route::put('updatetheloai', [TheLoaiController::class, 'edittl'])->name('theloai.updatetheloai');

    //thể loại cho anime
    Route::get('/tlanime', [TLAnimeController::class, 'index'])->name('admin.tlanime');
    Route::get('/tlanime/add', [TLAnimeController::class, 'create']);
    Route::post('addtla', [TLAnimeController::class, 'adddata'])->name('addtla');
    Route::get('/tlanime/edit/{id}', [TLAnimeController::class, 'edit']);
    Route::put('updatetla', [TLAnimeController::class, 'edittla'])->name('tlanime.updatetla');
    // Hãng phim
    Route::get('/hangphim', [HangPhimController::class, 'index'])->name('admin.hangphim');
    Route::get('/hangphim/add', [HangPhimController::class, 'create']);
    Route::post('addhangphim', [HangPhimController::class, 'adddata'])->name('addhangphim');
    Route::get('/hangphim/edit/{id}', [HangPhimController::class, 'edit']);
    Route::put('updatehangphim', [HangPhimController::class, 'edithp'])->name('hangphim.updatehangphim');

    // Goi
    Route::get('/goi', [GoiController::class, 'index'])->name('admin.goi');
    Route::get('/goi/add', [GoiController::class, 'create']);
    Route::post('addgoi', [GoiController::class, 'adddata'])->name('addgoi');
    Route::get('/goi/edit/{id}', [GoiController::class, 'edit']);
    Route::put('updategoi', [GoiController::class, 'editg'])->name('goi.updategoi');

    // LoaiPhim
    Route::get('/loaiphim', [LoaiPhimController::class, 'index'])->name('admin.loaiphim');
    Route::get('/loaiphim/add', [LoaiPhimController::class, 'create']);
    Route::post('addloaiphim', [LoaiPhimController::class, 'adddata'])->name('addloaiphim');
    Route::get('/loaiphim/edit/{id}', [LoaiPhimController::class, 'edit']);
    Route::put('updateloaiphim', [LoaiPhimController::class, 'editlp'])->name('loaiphim.updateloaiphim');

    // TapPhim
    Route::get('/tapphim', [TapPhimController::class, 'index'])->name('admin.tapphim');
    Route::get('/tapphim/add', [TapPhimController::class, 'create']);
    Route::post('addtapphim', [TapPhimController::class, 'adddata'])->name('addtapphim');
    Route::get('/tapphim/edit/{id}', [TapPhimController::class, 'edit']);
    Route::put('updatetapphim', [TapPhimController::class, 'edittp'])->name('tapphim.updatetapphim');
});
