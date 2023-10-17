<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\hangphimController;
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

Route::get('/admin/hangphim', [hangphimController::class, 'Index'])->name('hangphim.index');
Route::get('/admin/hangphim/create', [hangphimController::class, 'create']);
Route::post('/admin/hangphim/store', [hangphimController::class, 'store']);
Route::delete('/admin/hangphim/destroy/{id}', [hangphimController::class, 'destroy'])->name('hangphim.destroy');
Route::get('/admin/hangphim/edit/{MaHP}', [hangphimController::class, 'edit'])->name('hangphim.edit');
Route::put('/admin/hangphim/update/{MaHP}', [hangphimController::class, 'update'])->name('hangphim.update');
