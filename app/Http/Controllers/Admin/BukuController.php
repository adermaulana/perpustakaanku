<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('admin.buku.index', [
            'title' => 'Buku',
            'subtitle' => 'Buku',
            'buku' => Buku::paginate(10),
        ]);
    }

    public function tambah()
    {
        return view('admin.buku.tambah', [
            'title' => 'Tambah Buku',
            'subtitle' => 'Tambah Buku',
            'kategori' => Kategori::all(),
        ]);
    }

    public function proses(Request $request)
    {
        $buku = new Buku();

        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->isbn = $request->isbn;
        $buku->kategori_id = $request->kategori_id;
        $buku->stok = $request->stok;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/buku'), $namaFile);

            // Simpan path relatif gambar di database
            $buku->gambar = 'uploads/buku/' . $namaFile;
        }

        $buku->save();

        return redirect('admin/buku');
    }

    public function edit(Buku $buku)
    {
        return view('admin.buku.edit', [
            'title' => 'Edit Buku',
            'subtitle' => 'Edit Buku',
            'buku' => $buku,
            'kategori' => Kategori::all(),
        ]);
    }

    public function update(Request $request, Buku $buku)
    {
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->isbn = $request->isbn;
        $buku->kategori_id = $request->kategori_id;
        $buku->stok = $request->stok;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->status = $request->status;

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if it exists
            if ($buku->gambar && file_exists(public_path($buku->gambar))) {
                unlink(public_path($buku->gambar));
            }

            // Upload new image
            $gambar = $request->file('gambar');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/buku'), $namaFile);

            // Save new image path
            $buku->gambar = 'uploads/buku/' . $namaFile;
        }

        // Save the updated book
        $buku->save();

        return redirect('admin/buku');
    }

    public function hapus(Buku $buku)
    {
        if ($buku->gambar && file_exists(public_path($buku->gambar))) {
            unlink(public_path($buku->gambar));
        }

        $buku->delete();
        return redirect('admin/buku');
    }
}