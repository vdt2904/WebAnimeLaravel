<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\registerController;
use App\Models\TBGoi;

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
    return view('welcome');
});


Route::get('/register',[registerController::class,'Index']);
Route::post('/addregister',[registerController::class,'store'])->name('addregister');