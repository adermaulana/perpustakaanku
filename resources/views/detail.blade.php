@extends('layouts.main')

@section('container')
    <main class="main">
        <section id="hero" class="hero section">
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="/{{ $buku->gambar }}" class="card-img-top img-fluid" alt="{{ $buku->judul }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h1 class="card-title mb-4">{{ $buku->judul }}</h1>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h5>Detail Buku</h5>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th class="ps-0">Penulis</th>
                                                <td>{{ $buku->penulis }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0">Kategori</th>
                                                <td>{{ $buku->kategori->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0">Penerbit</th>
                                                <td>{{ $buku->penerbit }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0">Tahun Terbit</th>
                                                <td>{{ $buku->tahun_terbit }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0">ISBN</th>
                                                <td>{{ $buku->isbn }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0">Stok</th>
                                                <td>
                                                    <span class="badge {{ $buku->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $buku->stok }} tersedia
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0">Status</th>
                                                <td>
                                                    <span
                                                        class="badge {{ $buku->status == 'tersedia' ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $buku->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <h5 class="mt-4">Deskripsi</h5>
                                <p class="text-muted">{{ $buku->deskripsi }}</p>
                                <div class="mt-4">
                                    <a href="/buku" class="btn btn-secondary me-2">
                                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Buku
                                    </a>
                                    @if ($buku->stok > 0)
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#peminjamanModal">
                                            <i class="bi bi-book me-1"></i> Ajukan Peminjaman
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @if ($buku->stok > 0)
        <!-- Modal Peminjaman -->
        <div class="modal fade" id="peminjamanModal" tabindex="-1" aria-labelledby="peminjamanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="peminjamanModalLabel">Ajukan Peminjaman Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Untuk melanjutkan peminjaman, silakan hubungi admin dengan informasi berikut:</p>
                        <ul class="list-unstyled">
                            <li><strong>Judul Buku:</strong> {{ $buku->judul }}</li>
                            <li><strong>Penulis:</strong> {{ $buku->penulis }}</li>
                        </ul>
                        <div class="alert alert-warning" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Proses peminjaman dilakukan secara manual melalui admin perpustakaan.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="https://wa.me/6281342271602" class="btn btn-success">
                            <i class="bi bi-whatsapp me-1"></i> Hubungi Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
