<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('admin.peminjaman.index', [
            'title' => 'Peminjaman',
            'subtitle' => 'Peminjaman',
            'peminjaman' => Peminjaman::where('status', 'dipinjam')->paginate(10),
        ]);
    }

    public function tambah()
    {
        return view('admin.peminjaman.tambah', [
            'title' => 'Tambah Peminjaman',
            'subtitle' => 'Tambah Peminjaman',
            'anggota' => Anggota::all(),
            'buku' => Buku::all(),
        ]);
    }

    public function proses(Request $request)
    {
        $buku = Buku::findOrFail($request->id_buku);

        if ($buku && $buku->stok > 0) {
            $buku->stok -= 1;
            $buku->save();

            // Membuat entri peminjaman baru
            $peminjaman = new Peminjaman();

            $peminjaman->id_buku = $request->id_buku;
            $peminjaman->id_anggota = $request->id_anggota;
            $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
            $peminjaman->tanggal_rencana_pengembalian = $request->tanggal_rencana_pengembalian;
            $peminjaman->status = 'dipinjam';

            $peminjaman->save(); // Simpan peminjaman

            return redirect('admin/peminjaman');
        } else {
            return back()->with('error', 'Stok buku tidak cukup');
        }
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('admin.peminjaman.edit', [
            'title' => 'Edit Peminjaman',
            'subtitle' => 'Edit Peminjaman',
            'peminjaman' => $peminjaman,
            'anggota' => Anggota::all(),
            'buku' => Buku::all(),
        ]);
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_rencana_pengembalian = $request->tanggal_rencana_pengembalian;

        $peminjaman->save();

        return redirect('admin/peminjaman');
    }

    public function hapus(Peminjaman $peminjaman)
    {

        $buku = $peminjaman->buku;
        $buku->increment('stok');
        $buku->save();

        Peminjaman::destroy($peminjaman->id);
        return redirect('admin/peminjaman');
    }
}
