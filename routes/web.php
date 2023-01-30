<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\ListLaporanController;
use App\Http\Controllers\JjRusakController;


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
    return view('layouts.global');
});

// Auth::routes();

// // Route Login
// Route::get('/login', [LoginController::class, 'index']);
Route::resource('/login', LoginController::class);
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get("/test-logout", [LoginController::class, "logout"])->name('test-logout');

// Route Register
Route::resource('/register', RegisterController::class);
// Route::post('/register', RegisterController::class);

Route::resource('/dashboard', DashboardController::class);
Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');


// Route Lapor
Route::resource('lapors', LaporController::class);

// Tidak dibutuhkan sementara
// Route::resource('list_laporan', ListLaporanController::class);
Route::get('/list_laporan', [App\Http\Controllers\LaporController::class, 'list_laporan'])->name('list_laporan');

// Route Jalan & Jembatan
Route::resource('jj_rusak', JjRusakController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
