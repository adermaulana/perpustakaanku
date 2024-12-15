<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('admin.pengembalian.index', [
            'title' => 'Pengembalian',
            'subtitle' => 'Pengembalian',
            'peminjaman' => Peminjaman::paginate(10),
        ]);
    }

    public function kembali(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = 'dikembalikan';

        $peminjaman->save();

        $buku = $peminjaman->buku;
        $buku->increment('stok');
        $buku->save();

        return redirect('admin/pengembalian');
    }

    public function hapus(Peminjaman $peminjaman)
    {
        Peminjaman::destroy($peminjaman->id);
        return redirect('admin/pengembalian');
    }
}
