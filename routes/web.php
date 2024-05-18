<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Program_PenggunaController;
use App\Http\Controllers\Kelas_PenggunaController;
use App\Http\Controllers\Berita_PenggunaController;
use App\Http\Controllers\Pengajar_penggunaController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AdminAuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('program', Program_PenggunaController::class);

Route::resource('kelas', Kelas_PenggunaController::class);

Route::resource('berita', Berita_PenggunaController::class);

Route::resource('pengajar', Pengajar_PenggunaController::class);

Route::get('/admin', [AdminAuthController::class, 'index']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);