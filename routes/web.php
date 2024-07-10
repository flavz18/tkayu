<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanController;
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

// Fungsi Index dan Login di SesiController hanya bisa diakses bila belum dalam keadaan login
Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

// Mengalihkan user(guest) dari halaman home ke halaman admin atau gudang, tergantung role saat login
Route::get('/home', function() {
    $role = auth()->user()->role;
    
    switch ($role) {
        case 'admin':
            return redirect('/admin');
        case 'gudang':
            return redirect('/gudang');
    }
})->name('home');

// Route untuk membatasi hak akses sesuai role admin atau gundang, dan logout hanya bisa diakses apabila sudah melakukan login
Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/gudang', [GudangController::class, 'index'])->middleware('userAkses:gudang');
    Route::get('/logout', [SesiController::class, 'logout']);
});

// Data User
Route::middleware(['auth'])->group(function() {
    Route::get('/user', [UserController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/user/store', [UserController::class, 'store'])->middleware('userAkses:admin');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->middleware('userAkses:admin');
});

// Data Kategori
Route::middleware(['auth'])->group(function() {
    Route::get('/kategori', [KategoriController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->middleware('userAkses:admin');
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->middleware('userAkses:admin');
});

// Data Barang
Route::middleware(['auth'])->group(function() {
    Route::get('/barang', [BarangController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/barang/store', [BarangController::class, 'store'])->middleware('userAkses:admin');
    Route::post('/barang/update/{id}', [BarangController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy'])->middleware('userAkses:admin');
});

// Data Barang Masuk
Route::middleware(['auth'])->group(function() {
    Route::get('/barangmasuk', [BarangMasukController::class, 'index']);
    Route::get('/barangmasuk/create', [BarangMasukController::class, 'create']);
    Route::post('/barangmasuk/store', [BarangMasukController::class, 'store']);
});

// Data Barang Keluar
Route::middleware(['auth'])->group(function() {
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index']);
    Route::get('/barangkeluar/create', [BarangKeluarController::class, 'create']);
    Route::post('/barangkeluar/store', [BarangKeluarController::class, 'store']);
});

// laporan Barang Masuk dan Barang Keluar
Route::middleware(['auth'])->group(function() {
    Route::get('/laporan/barangMasuk', [LaporanController::class, 'barangMasuk']);
    Route::post('/laporan/barangMasuk/filterMasuk', [LaporanController::class, 'filterMasuk']);
    Route::get('/laporan/barangMasuk/exportMasuk', [LaporanController::class, 'exportMasuk'])->name('laporan.barangMasuk.exportMasuk');
    Route::get('/laporan/barangKeluar', [LaporanController::class, 'barangKeluar']);
    Route::post('/laporan/barangKeluar/filterKeluar', [LaporanController::class, 'filterKeluar']);
    Route::get('/laporan/barangMasuk/exportKeluar', [LaporanController::class, 'exportKeluar'])->name('laporan.barangKeluar.exportKeluar');
});
