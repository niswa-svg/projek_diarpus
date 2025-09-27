@extends('admin.layout')

@section('title', 'Dashboard')
@section('dashboard-active', 'active')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card stat-card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Berita</h5>
                            <h2 class="mb-0">{{ $newsCount }}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-newspaper fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card stat-card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Galeri</h5>
                            <h2 class="mb-0">{{ $galleryCount }}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-images fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card stat-card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Arsip</h5>
                            <h2 class="mb-0">{{ $archiveCount }}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-archive fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Aksi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.news.create') }}" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Berita
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.gallery.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Galeri
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.archives.create') }}" class="btn btn-warning w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Arsip
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.settings') }}" class="btn btn-info w-100">
                                <i class="fas fa-cog me-2"></i>Pengaturan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection