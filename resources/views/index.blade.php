@extends('layouts.main')

@section('container')
    <main class="main">
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="company-badge mb-4">
                                <i class="bi bi-book me-2"></i>
                                Membuka Dunia Pengetahuan
                            </div>

                            <h1 class="mb-4">
                                Perpustakaan <br>
                                XX <br>
                                <span class="accent-text">Pusat Literasi</span>
                            </h1>

                            <p class="mb-4 mb-md-5">
                                Menyediakan ribuan koleksi buku, jurnal, dan sumber informasi terkini.
                                Kami berkomitmen untuk mendukung pendidikan dan pengembangan ilmu pengetahuan.
                            </p>

                            <div class="hero-buttons">
                                <a href="/buku" class="btn btn-link mt-2 mt-sm-0">
                                    <i class="bi bi-book-half me-1"></i>
                                    Jelajahi Koleksi
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="/home/img/illustration-1.webp" alt="Perpustakaan XX" class="img-fluid">

                            <div class="customers-badge">
                                <div class="customer-avatars">
                                    <img src="/home/img/avatar-1.webp" alt="Customer 1" class="avatar">
                                    <img src="/home/img/avatar-2.webp" alt="Customer 2" class="avatar">
                                    <img src="/home/img/avatar-3.webp" alt="Customer 3" class="avatar">
                                    <img src="/home/img/avatar-4.webp" alt="Customer 4" class="avatar">
                                    <img src="/home/img/avatar-5.webp" alt="Customer 5" class="avatar">
                                    <span class="avatar more">12+</span>
                                </div>
                                <p class="mb-0 mt-2">12,000+ anggota aktif mendukung literasi</p>
                            </div>
                        </div>
                    </div>
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
