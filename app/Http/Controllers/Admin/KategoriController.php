<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.index', [
            'title' => 'Kategori',
            'subtitle' => 'Kategori',
            'kategori' => Kategori::paginate(10),
        ]);
    }

    public function tambah()
    {
        return view('admin.kategori.tambah', [
            'title' => 'Tambah Kategori',
            'subtitle' => 'Tambah Kategori'
        ]);
    }

    public function proses(Request $request)
    {
        $kategori = new Kategori();

        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();

        return redirect('admin/kategori');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', [
            'title' => 'Edit Kategori',
            'subtitle' => 'Tambah Kategori',
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();

        return redirect('admin/kategori');
    }

    public function hapus(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('admin/kategori');
    }
}
