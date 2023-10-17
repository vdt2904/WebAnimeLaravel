<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\theloaiController;
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

Route::get('/admin/theloai', [theloaiController::class, 'Index'])->name('theloai.index');
Route::get('/admin/theloai/create', [theloaiController::class, 'create']);
Route::post('/admin/theloai/store', [theloaiController::class, 'store']);
Route::delete('/admin/theloai/destroy/{id}', [TheloaiController::class, 'destroy'])->name('theloai.destroy');
Route::get('/admin/theloai/edit/{MaTL}', [TheloaiController::class, 'edit'])->name('theloai.edit');
Route::put('/admin/theloai/update/{MaTL}', [TheloaiController::class, 'update'])->name('theloai.update');
// Route::put('/admin/theloai/edit/{id}', [TheloaiController::class, 'update'])->name('theloai.update');