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
                        <form class="row g-3" method="post" action="{{ route('edit.anggota', $anggota->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nomor Anggota</label>
                                <input type="text" class="form-control" value="{{ $anggota->nomor_anggota }}" readonly
                                    style="background-color: #cccccc;">
                                <input type="hidden" name="nomor_anggota" value="{{ $anggota->nomor_anggota }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Anggota</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="{{ $anggota->nama, old('nama') }}" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Telepon</label>
                                <input type="number" class="form-control" name="telepon"
                                    value="{{ $anggota->telepon, old('telepon') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="aktif"
                                        {{ old('status', $anggota->status) == 'aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>
                                    <option value="tidak aktif"
                                        {{ old('status', $anggota->status) == 'tidak aktif' ? 'selected' : '' }}>
                                        Tidak Aktif
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{ $anggota->alamat }}</textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Edit</button>
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
