@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Selamat Datang test 1 di Diarpus Kota Bogor</h1>
            <p class="lead mb-4">Portal Informasi Dinas Arsip & Perpustakaan Kota Bogor</p>
            <a href="{{ route('news') }}" class="btn btn-light btn-lg">Lihat Berita Terbaru</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h4>Berita & Pengumuman</h4>
                    <p>Informasi terbaru seputar kegiatan dan pengumuman resmi dari Diarpus Kota Bogor.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <h4>Galeri Kegiatan</h4>
                    <p>Dokumentasi foto dan video berbagai kegiatan yang diselenggarakan oleh Diarpus.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-archive"></i>
                    </div>
                    <h4>Arsip Publik</h4>
                    <p>Koleksi dokumen dan arsip publik yang dapat diakses dan diunduh oleh masyarakat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Berita Terbaru</h2>
            <div class="row">
                @foreach($latestNews as $news)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">{{ $news->category->name }}</span>
                            <h5 class="card-title">{{ Str::limit($news->title, 50) }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($news->content), 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">{{ $news->created_at->format('d M Y') }}</small>
                            <a href="{{ route('news.detail', $news->id) }}" class="btn btn-sm btn-primary float-end">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('news') }}" class="btn btn-primary">Lihat Semua Berita</a>
            </div>
        </div>
    </section>
@endsection