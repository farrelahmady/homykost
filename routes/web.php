<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'beranda')->name('beranda');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/kos', 'kos')->middleware('auth')->name('kos');
    Route::get('/kos/{id}', 'pesan')->middleware('auth')->name('pesan');
    Route::get('/pesanan', 'pesanan')->middleware('auth')->name('pesanan');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/register', 'register')->name('auth.register');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/penghuni', 'penghuni')->name('dashboard.penghuni');
    Route::get('/dashboard/kos', 'kos')->name('dashboard.kos');
    Route::get('/dashboard/kos/add', 'addKos')->name('dashboard.kos.add');
    Route::get('/dashboard/kos/edit/{id}', 'editKos')->name('dashboard.kos.edit');
});

Route::controller(KosController::class)->group(function () {
    Route::get('/dashboard/kos/delete/{id}', 'delete')->name('kos.delete');
    Route::post('/kos', 'store')->name('kos.store');
    Route::post('/kos/{id}', 'pesan')->name('kos.pesan');
    Route::post('/pesanan/{id}', 'uploadBukti')->name('pesanan.upload');
    Route::get('/pesanan/konfirmasi/{id}', 'konfirmasi')->name('pesanan.konfirmasi');
});
