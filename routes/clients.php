<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\apilayoutController;
use App\Http\Controllers\clients\HomeController;
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
Route::get('/', [HomeController::class, 'index']);

Route::get('api/topday', [apilayoutController::class, 'topday']);
Route::get('api/topweek', [apilayoutController::class, 'topweek']);
Route::get('api/topmonth', [apilayoutController::class, 'topmonth']);
Route::get('api/topyear', [apilayoutController::class, 'topyear']);
Route::get('api/newcomments', [apilayoutController::class, 'newcomments']);