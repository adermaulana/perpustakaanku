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
                        <form class="row g-3" method="post" action="/admin/anggota/tambah" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nomor_anggota" class="form-label">Nomor Anggota</label>
                                <input type="text" class="form-control" value="{{ $nomor_anggota }}" readonly style="background-color: #cccccc;">
                                <input type="hidden" name="nomor_anggota" value="{{ $nomor_anggota }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Anggota</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="{{ old('nama') }}" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="number" class="form-control" name="telepon" value="{{ old('telepon') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Tambah</button>
                                    <a href="/admin/anggota" class="btn btn-light px-4">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
