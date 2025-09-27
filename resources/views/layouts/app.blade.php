<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ $settings->site_name ?? 'Diarpus Kota Bogor' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --secondary-blue: #3b82f6;
            --accent-green: #10b981;
            --light-bg: #f8fafc;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative; /* biar anak element bisa absolute */
            z-index: 1000;
        }

        /*buat collapse menu jadi overlay */
        .navbar-collapse {
            position: absolute;
            top: 100%; /* tepat di bawah navbar */
            left: 0;
            width: 100%;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            z-index: 9999;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
        }

        /* biar link keliatan jelas */
        .navbar-nav .nav-link {
            color: #fff !important;
            padding: 10px 15px;
        }

        
        .hero-section {
            background: linear-gradient(rgba(30, 58, 138, 0.8), rgba(30, 58, 138, 0.8)), 
                        url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .btn-primary {
            background-color: var(--secondary-blue);
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-blue);
        }
        
        .footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 40px 0;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--accent-green);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-book me-2"></i>
                {{ $settings->site_name ?? 'Diarpus Kota Bogor' }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">Berita & Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('archives') }}">Arsip</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-book me-2"></i> {{ $settings->site_name ?? 'Diarpus Kota Bogor' }}</h5>
                    <p class="mt-3">{{ $settings->address ?? 'Jl. Contoh No. 123, Bogor' }}</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-phone me-2"></i> {{ $settings->phone ?? '(0251) 123456' }}</p>
                    <p><i class="fas fa-envelope me-2"></i> {{ $settings->email ?? 'info@diarpus-bogor.go.id' }}</p>
                </div>
                <div class="col-md-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Beranda</a></li>
                        <li><a href="{{ route('news') }}" class="text-white">Berita & Pengumuman</a></li>
                        <li><a href="{{ route('archives') }}" class="text-white">Arsip Publik</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; 2024 {{ $settings->site_name ?? 'Diarpus Kota Bogor' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>