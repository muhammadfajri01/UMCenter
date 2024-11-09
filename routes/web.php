<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\kasirController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/pasien', [AdminController::class, 'index'])->middleware('checkUserType')->name('admin.index');
Route::get('/pasien/create', [AdminController::class, 'create'])->middleware('checkUserType')->name('admin.create');
Route::post('/pasien/store', [AdminController::class, 'store'])->middleware('checkUserType')->name('admin.store');

Route::get('/konsultasi', [DokterController::class, 'index'])->middleware('checkUserType')->name('dokter.index');
Route::get('/konsultasi/create', [DokterController::class, 'create'])->middleware('checkUserType')->name('dokter.create');
Route::post('/konsultasi/store', [DokterController::class, 'store'])->middleware('checkUserType')->name('dokter.store');

Route::get('/transaksi', [KasirController::class, 'index'])->middleware('checkUserType')->name('kasir.index');
Route::get('/transaksi/bayar/{id}', [KasirController::class, 'bayar'])->middleware('checkUserType')->name('kasir.bayar');
Route::post('/transaksi/bayar/post/{id}', [KasirController::class, 'update'])->middleware('checkUserType')->name('kasir.bayar.post');

Route::get('/rekapitulasi', [KasirController::class, 'rekapitulasi'])->middleware('checkUserType')->name('kasir.rekapitulasi');


