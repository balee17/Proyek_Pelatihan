<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('login');
});
Route::get('/admin', function () {
    return view('loginadmin');
});
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/cekregis', [AuthController::class, 'cekregis'])->name('cekregis');
Route::post('/ceklogin', [AuthController::class, 'ceklogin'])->name('ceklogin');
Route::post('/ceklogin2', [AuthController::class, 'ceklogin2'])->name('ceklogin2');
Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/adminhome', [AdminController::class, 'admindashboard'])->name('admindashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

#User
Route::get('/listroom', [UserController::class, 'listroom'])->name('listroom');
Route::get('/profile', [UserController::class, 'profileuser'])->name('profileuser');
Route::post('/updateprof', [UserController::class, 'updateprof'])->name('updateprof');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/bayar', [UserController::class, 'bayar'])->name('bayar');
Route::get('/bayar/{id}', [UserController::class, 'bayar'])->name('bayar');
Route::post('/checkout', [UserController::class, 'pay'])->name('pay');
Route::get('/riwayat/{id}', [UserController::class, 'riwayat'])->name('riwayat');
Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');
Route::put('/status/{id}', [UserController::class, 'status'])->name('status');

#Admin
Route::get('/adminroom', [AdminController::class, 'adminroom'])->name('adminroom');
Route::delete('/adminroom/{id}', [AdminController::class, 'roomdelete'])->name('roomdelete');
Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('transaksi');
Route::get('/transaksi/{id}/konfirmasi', [AdminController::class, 'showKonfirmasiForm'])->name('transaksi.konfirmasi');
Route::post('/transaksi/{id}/konfirmasi', [AdminController::class, 'konfirmasi'])->name('transaksi.konfirmasi.update');
Route::get('/storeroom', [AdminController::class, 'storeroom'])->name('storeroom');
Route::post('/addroom', [AdminController::class, 'addroom'])->name('addroom');