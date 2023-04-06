<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
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

Route::get('/', function () {
    return view('login',[
        'title' => 'Halaman Login'
    ]);
});

Route::get('/home', function() {
    return view('admin.home');
});

Route::get('/login', function() {
    return view('login',[
        'title' => 'Halaman Login'
    ]);
});

Route::get('/login',[AuthController::class,'viewLogin']);
Route::post('/prosesLogin',[AuthController::class,'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
        Route::get('/panel-admin', [AdminController::class, 'index']);
        Route::get('/panel-admin/master-data-buku',[BukuController::class,'viewBuku'])->name('viewBuku');
        Route::get('/panel-admin/tambah-data-buku',[BukuController::class,'viewTambahBuku']);
        Route::post('/panel-admin/simpan-data-buku',[BukuController::class,'simpanBuku']);
        Route::get('/panel-admin/edit-buku-{slug}',[BukuController::class,'viewEdit'])->name('viewEdit');
        Route::post('/panel-admin/update-buku-{id}',[BukuController::class,'updateBuku']);
        Route::post('/panel-admin/hapus-data-buku-{id}',[BukuController::class,'hapusBuku']);
        Route::get('/panel-admin/master-data-anggota-perpustakaan',[AnggotaController::class,'viewAnggota']);
        Route::get('/panel-admin/tambah-data-anggota',[AnggotaController::class,'viewTambahAnggota']);
        Route::post('/panel-admin/simpan-data-anggota',[AnggotaController::class,'simpanAnggota']);
        Route::get('/panel-admin/edit-anggota-{no}',[AnggotaController::class,'viewEdit']);
        Route::post('/panel-admin/update-anggota-{no}',[AnggotaController::class,'updateAnggota']);
        Route::get('/panel-admin/tambah-peminjaman',[PeminjamanController::class,'viewTambahPeminjaman']);
        Route::get('/panel-admin/peminjaman',[PeminjamanController::class,'viewPeminjaman'])->name('viewPeminjaman');
        Route::post('/panel-admin/simpan-peminjaman',[PeminjamanController::class,'simpanPeminjaman']);
        Route::post('/panel-admin/pengembalian-peminjaman-{id}',[PeminjamanController::class,'pengembalianPeminjaman']);
        Route::post('/panel-admin/periksa-peminjaman-{id}',[PeminjamanController::class,'periksaPeminjaman']);
        Route::get('/panel-admin/pengembalian',[PengembalianController::class,'viewPengembalian']);
});
