@extends('layouts.main')

@section('container')
    <main class="main">
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">

                    @foreach($buku as $data)

                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 shadow-sm">
                            <img src="/{{ $data->gambar }}" class="card-img-top img-fluid" alt="Buku 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->judul }}</h5>
                                <p class="card-text text-muted">{{ $data->penulis }}</p>
                                <p class="card-text">{{ $data->deskripsi }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-primary">{{ $data->kategori->nama }}</span>
                                    <a href="/detail/{{ $data->judul }}" class="btn btn-sm btn-outline-secondary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>

                <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-lg-6 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="stat-content">
                                <h4>50,000+ Buku</h4>
                                <p class="mb-0">Koleksi Lengkap</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-person-lines-fill"></i>
                            </div>
                            <div class="stat-content">
                                <h4>12,000+ Anggota</h4>
                                <p class="mb-0">Komunitas Aktif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
