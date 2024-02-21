<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DudiController;
use App\Http\Controllers\PklController;

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
Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);
Route::resource('/dudi', \App\Http\Controllers\DudiController::class);
Route::resource('/pkl', \App\Http\Controllers\PklController::class);
