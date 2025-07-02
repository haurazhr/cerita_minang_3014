{{-- resources/views/cerita/index.blade.php --}}
@extends('layouts.template')

@section('title', 'Daftar Cerita')

@section('content')
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
    </style>

    <h1 class="mb-4 text-center fw-bold text-copper">Cerita Rakyat Minangkabau</h1>

    @if($ceritas->count() > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($ceritas as $cerita)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 bg-goldsand">
                        @if($cerita->gambar)
                            <img src="{{ asset($cerita->gambar) }}" class="card-img-top" alt="{{ $cerita->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/400x200?text=Tanpa+Gambar" class="card-img-top" alt="Tanpa Gambar">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-martinique">{{ $cerita->judul }}</h5>
                            <p class="card-text text-redwood mb-1">
                                <strong>Kategori:</strong> {{ $cerita->kategori->nama_kategori ?? '-' }}<br>
                                <strong>Daerah:</strong> {{ $cerita->daerah->nama_daerah ?? '-' }}<br>
                                <strong>Rating:</strong> {{ number_format($cerita->feedbacks->avg('rating'), 1) ?? '-' }} ⭐
                            </p>
                            <p class="text-dark">{{ Str::limit($cerita->isi_cerita, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="#" class="btn btn-copper btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert bg-copper text-white text-center">
            Belum ada cerita tersedia.
        </div>
    @endif
@endsection
