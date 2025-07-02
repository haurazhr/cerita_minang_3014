<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerita Rakyat Minangkabau - @yield('title', 'Beranda')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-copper { background-color: #b56633; }
        .bg-martinique { background-color: #323659; }
        .bg-kashmir { background-color: #5474a1; }
        .bg-redwood { background-color: #5b1f11; }
        .bg-goldsand { background-color: #e7b480; }

        .text-copper { color: #b56633; }
        .text-martinique { color: #323659; }
        .text-kashmir { color: #5474a1; }
        .text-redwood { color: #5b1f11; }
        .text-goldsand { color: #e7b480; }

        .btn-copper {
            background-color: #b56633;
            color: white;
            border: none;
        }
        .btn-copper:hover {
            background-color: #934f26;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #5b1f11, #b56633);
        }

        .footer-custom {
            background-color: #5b1f11;
            color: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="/">Cerita Minang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>

                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="/cerita/create">Tambah Cerita</a></li>
                        <li class="nav-item"><a class="nav-link" href="/kategori">Kelola Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="/daerah">Kelola Daerah</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link disabled">{{ Auth::user()->name }}</a></li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit" style="padding: 0; border: none; background: none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endauth
            </ul>

            <form class="d-flex" method="GET" action="/cerita">
                <input class="form-control me-2" type="search" name="q" placeholder="Cari cerita..." value="{{ request('q') }}">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<footer class="footer-custom text-center py-2">
    &copy; 2025 - Sistem Cerita Rakyat Minangkabau by Haura
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
