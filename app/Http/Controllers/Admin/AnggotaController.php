<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use Carbon\Carbon;
use TCPDF;

class AnggotaController extends Controller
{
     public function index()
    {
        return view('admin.anggota.index', [
            'title' => 'Anggota',
            'subtitle' => 'Anggota',
            'anggota' => Anggota::paginate(10),
        ]);
    }

    public function cetakKartu($id)
    {
      
    }

    public function tambah()
    {
        $lastMember = Anggota::latest('id')->first();
        $lastId = $lastMember ? $lastMember->id + 1 : 1;
        $nomor_anggota = date('Y') . str_pad($lastId, 3, '0', STR_PAD_LEFT);

        return view('admin.anggota.tambah', [
            'title' => 'Tambah Anggota',
            'subtitle' => 'Tambah Anggota',
            'nomor_anggota' => $nomor_anggota,
        ]);
    }

    public function proses(Request $request)
    {
        $anggota = new Anggota();

        $anggota->nomor_anggota = $request->nomor_anggota;
        $anggota->nama = $request->nama;
        $anggota->telepon = $request->telepon;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;
        $anggota->tanggal_bergabung = Carbon::now()->toDateString();

        $anggota->save();

        return redirect('admin/anggota');
    }

    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', [
            'title' => 'Edit Anggota',
            'subtitle' => 'Edit Anggota',
            'anggota' => $anggota,
        ]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $anggota->nomor_anggota = $request->nomor_anggota;
        $anggota->nama = $request->nama;
        $anggota->telepon = $request->telepon;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;

        $anggota->save();

        return redirect('admin/anggota');
    }

    public function hapus(Anggota $anggota)
    {
        Anggota::destroy($anggota->id);
        return redirect('admin/anggota');
    }
}
