<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;

use App\Models\Buku;
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
    return view('index');
});

Route::get('/buku', function () {
    
    $buku = Buku::all();

    return view('buku',[
        'buku' => $buku
    ]);
});

Route::get('/detail/{buku:judul}', function (Buku $buku){
    
    return view('detail',[
        'buku' => $buku
    ]);

});

Route::get('/admin', function () {

    return view('admin.index',[
        'title' => 'Perpustakaan Admin',
    ]);
});

//Login
Route::get('login',[LoginController::class,'index'])->middleware('guest');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout']);


//Kategori
Route::get('admin/kategori', [KategoriController::class, 'index']);
Route::get('admin/kategori/tambah', [KategoriController::class, 'tambah']);
Route::post('admin/kategori/tambah', [KategoriController::class, 'proses'])->name('tambah.kategori');
Route::get('admin/kategori/{kategori}/edit', [KategoriController::class, 'edit']);
Route::put('admin/kategori/{kategori}/edit', [KategoriController::class, 'update'])->name('edit.kategori');
Route::delete('admin/kategori/{kategori}/delete', [KategoriController::class, 'hapus']);

//Buku
Route::get('admin/buku', [BukuController::class, 'index']);
Route::get('admin/buku/tambah', [BukuController::class, 'tambah']);
Route::post('admin/buku/tambah', [BukuController::class, 'proses'])->name('tambah.buku');
Route::get('admin/buku/{buku}/edit', [BukuController::class, 'edit']);
Route::put('admin/buku/{buku}/edit', [BukuController::class, 'update'])->name('edit.buku');
Route::delete('admin/buku/{buku}/delete', [BukuController::class, 'hapus']);


//Anggota
Route::get('admin/anggota', [AnggotaController::class, 'index']);
Route::get('admin/anggota/{id}/cetak-kartu', [AnggotaController::class, 'cetakKartu']);
Route::get('admin/anggota/tambah', [AnggotaController::class, 'tambah']);
Route::post('admin/anggota/tambah', [AnggotaController::class, 'proses'])->name('tambah.anggota');
Route::get('admin/anggota/{anggota}/edit', [AnggotaController::class, 'edit']);
Route::put('admin/anggota/{anggota}/edit', [AnggotaController::class, 'update'])->name('edit.anggota');
Route::delete('admin/anggota/{anggota}/delete', [AnggotaController::class, 'hapus']);

//Peminjaman
Route::get('admin/peminjaman', [PeminjamanController::class, 'index']);
Route::get('admin/peminjaman/tambah', [PeminjamanController::class, 'tambah']);
Route::post('admin/peminjaman/tambah', [PeminjamanController::class, 'proses'])->name('tambah.peminjaman');
Route::get('admin/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit']);
Route::put('admin/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'update'])->name('edit.peminjaman');
Route::delete('admin/peminjaman/{peminjaman}/delete', [PeminjamanController::class, 'hapus']);


//Pengembalian
Route::get('admin/pengembalian', [PengembalianController::class, 'index']);
Route::put('admin/pengembalian/{peminjaman}', [PengembalianController::class, 'kembali'])->name('pengembalian.buku');
Route::delete('admin/pengembalian/{peminjaman}/delete', [PengembalianController::class, 'hapus']);