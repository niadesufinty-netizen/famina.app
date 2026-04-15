<x-layout>
    <div style="max-width: 1200px; margin: 40px auto; padding: 20px; font-family: 'Poppins', sans-serif;">
        
        {{-- Header Halaman --}}
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="color: #2d3436; font-weight: 800; font-size: 2.2rem; margin-bottom: 10px;">Pusat Tips Kesehatan</h2>
            @if(isset($cari) && $cari != '')
                <p style="color: #636e72;">Hasil pencarian: <strong style="color: #ff9fb5;">"{{ $cari }}"</strong></p>
                <a href="/semua-artikel" style="text-decoration: none; color: #ff9fb5; font-size: 13px; font-weight: bold;">[ Lihat Semua ]</a>
            @else
                <p style="color: #636e72;">Edukasi kesehatan harian untuk gaya hidup yang lebih baik.</p>
            @endif
        </div>

        {{-- Grid Artikel --}}
        <div class="article-grid">
            @forelse($artikels as $item)
                <a href="/artikel/{{ $item->id }}" class="article-card">
                    {{-- 1. Gambar di Atas --}}
                    <div class="card-image">
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}">
                        <span class="card-category">{{ $item->kategori }}</span>
                    </div>

                    {{-- 2. Judul & Deskripsi di Bawah --}}
                    <div class="card-body">
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ Str::limit($item->deskripsi, 80) }}</p>
                        <span class="read-more">Baca Selengkapnya →</span>
                    </div>
                </a>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 50px; background: #f9f9f9; border-radius: 20px;">
                    <p style="color: #636e72;">Maaf, artikel tidak ditemukan.</p>
                </div>
            @endforelse
        </div>
    </div>
     @if(isset($keyword))
    <p>Hasil pencarian untuk: <strong>{{ $keyword }}</strong></p>
@endif

<div class="list-artikel">
    @forelse($artikels as $item)
        <div class="card">
            <h3>{{ $item->judul }}</h3>
            <a href="/artikel/{{ $item->id }}">Baca Selengkapnya</a>
        </div>
    @empty
        <p>Artikel tidak ditemukan.</p>
    @endforelse
</div>

    <style>
        .article-grid {
            display: grid;
            gap: 25px;
            grid-template-columns: repeat(1, 1fr);
        }

        @media (min-width: 600px) {
            .article-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .article-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .article-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f2f6;
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(255, 159, 181, 0.2);
        }

        /* Gambar */
        .card-image {
            width: 100%;
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .article-card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255, 159, 181, 0.9);
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Konten */
        .card-body {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-body h3 {
            margin: 0 0 10px;
            font-size: 16px;
            color: #2d3436;
            line-height: 1.4;
            font-weight: 700;
        }

        .card-body p {
            margin: 0 0 15px;
            font-size: 12px;
            color: #636e72;
            line-height: 1.5;
        }

        .read-more {
            margin-top: auto;
            color: #ff9fb5;
            font-weight: 800;
            font-size: 12px;
        }
    </style>
</x-layout>