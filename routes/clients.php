<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\apilayoutController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\categoryController;
use App\Http\Controllers\clients\animewatchController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('home/trending', [categoryController::class, 'trending']);
Route::get('home/popular', [categoryController::class, 'popular']);
Route::get('home/liveaction', [categoryController::class, 'liveaction']);
Route::get('home/recently', [categoryController::class, 'recently']);
Route::get('home/category/{id}', [categoryController::class, 'category'])->name('category');

Route::get('home/watch/{maanime}/{matp}', [animewatchController::class, 'watch'])->name('watch');
Route::get('api/getcomments/{matp}/{page}/{perpage}', [animewatchController::class, 'comments']);
Route::post('api/comment/{ma}', [animewatchController::class, 'insertcmt']);
Route::post('api/view/{ma}', [animewatchController::class, 'insertView']);

Route::get('api/topday', [apilayoutController::class, 'topday']);
Route::get('api/topweek', [apilayoutController::class, 'topweek']);
Route::get('api/topmonth', [apilayoutController::class, 'topmonth']);
Route::get('api/topyear', [apilayoutController::class, 'topyear']);
Route::get('api/newcomments', [apilayoutController::class, 'newcomments']);