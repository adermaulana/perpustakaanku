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
                        <form class="row g-3" method="post" action="{{ route('edit.buku', $buku->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" name="judul" id="judul"
                                    value="{{ $buku->judul, old('judul') }}" autofocus required>
                            </div>
                            <div class="col-md-6">
                                <label for="penulis" class="form-label">Nama Penulis</label>
                                <input type="text" class="form-control" name="penulis" id="penulis"
                                    value="{{ $buku->penulis, old('penulis') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" name="isbn" id="isbn"
                                    value="{{ $buku->isbn, old('isbn') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id" id="" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $buku->kategori_id == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" id="stok"
                                    value="{{ $buku->stok, old('stok') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" id="penerbit"
                                    value="{{ $buku->penerbit, old('penerbit') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit"
                                    value="{{ $buku->tahun_terbit, old('tahun_terbit') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tahun_terbit" class="form-label">Gambar Sampul</label>
                                <input type="file" class="form-control" name="gambar" id="gambar"
                                    value="{{ old('gambar') }}">
                                @if ($buku->gambar)
                                    <small class="text-muted">Gambar Sekarang: {{ $buku->gambar }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="tersedia"
                                        {{ old('status', $buku->status) == 'tersedia' ? 'selected' : '' }}>
                                        Tersedia
                                    </option>
                                    <option value="tidak tersedia"
                                        {{ old('status', $buku->status) == 'tidak tersedia' ? 'selected' : '' }}>
                                        Tidak Tersedia
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" required>{{ $buku->deskripsi }}</textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Edit</button>
                                    <a href="/admin/buku" class="btn btn-light px-4">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
