<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// user
Route::get('/', [UserController::class, 'index'])->name('home');
// Route::post('/select-seats', [UserController::class, 'selectSeats'])->name('selectSeats');
Route::post('/submit-order', [UserController::class, 'selectSeats']);

Route::post('/pesan', [UserController::class, 'pesan'])->name('pesan');
Route::get('/pilihkursi', [UserController::class, 'pilihkursi'])->name('pilihkursi');
Route::post('/simpankursi', [UserController::class, 'simpanKursi'])->name('simpankursi');
Route::get('/detail', [UserController::class, 'detail'])->name('detail');
Route::get('/cekji', [UserController::class, 'cekji'])->name('cekji');

Route::get('/jalur', [UserController::class, 'jalur'])->name('jalur');
Route::get('/reservasi', [UserController::class, 'reservasi'])->name('reservasi');
Route::post('/reservasi', [UserController::class, 'reservasi'])->name('reservasi');
Route::get('/cekproses', [UserController::class, 'cekproses'])->name('cekproses');
Route::get('/konfirmasi', [UserController::class, 'konfirmasi'])->name('konfirmasi');
Route::post('/konfirmasi', [UserController::class, 'upload'])->name('upload');

Route::get('/cetaktiket/{id}', [UserController::class, 'cetaktiket'])->name('cetaktiket');
// Route::post('/cek2', [UserController::class, 'cekk'])->name('cek');

// login
Route::get('/login', [AuthController::class, 'formlogin'])->name('formlogin');
Route::get('/register', [AuthController::class, 'daftar'])->name('daftar');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'proses_login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// admin
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('/admin', [AdminController::class, 'index']);
        Route::get('/konfirmasi-admin', [AdminController::class, 'konfirmasiAdmin'])->name('ad_konfirmasi');
        Route::get('/tolakkonfirmasi', [AdminController::class, 'ditolak'])->name('ad_tolak');
        Route::get('/datapesanan-admin', [AdminController::class, 'datapesanan'])->name('datapesanan');
        Route::get('/delete-pesanan/{id}', [AdminController::class, 'hapus_pesanan'])->name('hapus_pesanan');
        Route::get('/accept/{id}/{idk}', [AdminController::class, 'accept'])->name('accept');
        Route::get('/riject/{resi}/{id}', [AdminController::class, 'riject'])->name('riject');
        Route::get('/hapus-konfirmasi-ditolak/{id}', [AdminController::class, 'hapus_tolak'])->name('hapus_tolak');
        Route::post('/cetak-laporan', [AdminController::class, 'cetakLaporan'])->name('cetak_laporan');
        Route::get('/datajadwal', [AdminController::class, 'datajadwal'])->name('datajadwal');
        Route::get('/datakursii', [AdminController::class, 'kkursi'])->name('kkursi');
        Route::get('/jadwal/edit/{id}', [AdminController::class, 'editJadwal'])->name('edit_jadwal');
        Route::get('/datakursii/{id}', [AdminController::class, 'kosong'])->name('kosong');
        Route::put('/jadwal/update/{id}', [AdminController::class, 'updateJadwal'])->name('update_jadwal');
    });
    // Route::group(['middleware' => ['cek_login:user']], function () {
    //     Route::resource('user', UserController::class);
    // });
});
