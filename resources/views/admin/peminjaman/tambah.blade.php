@extends('admin.layouts.main')

@section('container')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $subtitle }}</div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form class="g-3" method="post" action="/admin/peminjaman/tambah" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Judul Buku</label>
                                <select class="form-select" name="id_buku" required>
                                    <option value="" disabled selected>Pilih Buku</option>
                                    @foreach ($buku as $data)
                                        <option value="{{ $data->id }}">{{ $data->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="id_anggota" class="form-label">Nama Anggota</label>
                                <select class="form-select" name="id_anggota" required>
                                    <option value="" disabled selected>Pilih Anggota</option>
                                    @foreach ($anggota as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="tanggal_rencana_pengembalian" class="form-label">Tanggal Rencana Pengembalian</label>
                                <input type="date" class="form-control" name="tanggal_rencana_pengembalian">
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Tambah</button>
                                    <a href="/admin/kategori" class="btn btn-light px-4">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
