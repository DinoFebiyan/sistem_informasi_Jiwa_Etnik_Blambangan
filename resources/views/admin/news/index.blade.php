@extends('layouts.admin')

@section('title', 'Publikasi Berita')

@section('header', 'Publikasi Berita')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    .news-container {
        font-family: 'Poppins', sans-serif;
    }

    /* --- HEADER SECTION --- */
    .news-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 25px;
    }
    .news-title-area h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 4px;
        color: #1a0000;
    }
    .news-title-area p {
        color: #8a7070;
        font-size: 0.85rem;
        margin: 0;
    }
    .btn-tambah {
        background: var(--merah-gelap);
        color: white;
        padding: 10px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-tambah:hover {
        background: var(--merah);
        box-shadow: 0 4px 12px rgba(139,0,0,0.2);
    }

    /* --- CONTENT CARD --- */
    .content-card {
        background: white;
        border-radius: 18px;
        border: 1px solid var(--abu-border);
        padding: 25px;
    }
    .filter-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    .filter-row h3 { font-size: 1.1rem; font-weight: 700; margin: 0; }
    
    .filter-controls {
        display: flex;
        gap: 12px;
    }
    .search-input {
        padding: 8px 15px;
        border-radius: 8px;
        border: 1px solid var(--abu-border);
        font-size: 0.85rem;
        width: 200px;
    }
    .select-filter {
        padding: 8px 15px;
        border-radius: 8px;
        border: 1px solid var(--abu-border);
        font-size: 0.85rem;
        color: var(--teks);
        background: white;
    }

    /* --- NEWS LIST ITEM --- */
    .news-item {
        display: flex;
        align-items: center;
        padding: 20px 0;
        border-bottom: 1px solid #f5f0f0;
        gap: 20px;
    }
    .news-item:last-child { border-bottom: none; }

    .news-thumbnail {
        width: 140px;
        height: 90px;
        background: #8B0000; /* Placeholder warna merah sesuai desain */
        border-radius: 10px;
        flex-shrink: 0;
        overflow: hidden;
    }
    .news-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .news-info { flex: 1; }
    .news-info h4 {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #1a0000;
    }
    .news-info p {
        font-size: 0.82rem;
        color: #777;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    .status-tayang {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 3px 12px;
        border-radius: 20px;
    }
    .meta-date { color: #333; }
    .meta-author { color: #333; }

    /* --- ACTIONS --- */
    .news-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .btn-outline {
        padding: 5px 20px;
        border-radius: 6px;
        border: 1px solid #ddd;
        text-decoration: none;
        color: #666;
        font-size: 0.75rem;
        text-align: center;
        transition: 0.2s;
    }
    .btn-outline:hover {
        background: #f9f9f9;
        border-color: #bbb;
    }
</style>

<div class="news-container">
    <div class="news-header">
        <div class="news-title-area">
            <h2>Publikasi Berita</h2>
            <p>12 berita tayang, 4 draft</p>
        </div>
        <a href="#" class="btn-tambah">+ Tambah berita</a>
    </div>

    <div class="content-card">
        <div class="filter-row">
            <h3>Semua Berita</h3>
            <div class="filter-controls">
                <input type="text" class="search-input" placeholder="Cari berita...">
                <select class="select-filter">
                    <option>Semua</option>
                    <option>Tayang</option>
                    <option>Draft</option>
                </select>
            </div>
        </div>

        <div class="news-list">
            @php
                $newsList = [
                    ['Latihan Perdana Anggota Baru 2026', 'Sanggar JEB kembali membuka latihan perdana untuk anggota baru yang telah mendaftar', 'Tayang', '05 Mar 2026', 'Rizky Pratama'],
                    ['Latihan Perdana Anggota Baru 2026', 'Sanggar JEB kembali membuka latihan perdana untuk anggota baru yang telah mendaftar', 'Tayang', '05 Mar 2026', 'Rizky Pratama'],
                    ['Latihan Perdana Anggota Baru 2026', 'Sanggar JEB kembali membuka latihan perdana untuk anggota baru yang telah mendaftar', 'Tayang', '05 Mar 2026', 'Rizky Pratama'],
                    ['Latihan Perdana Anggota Baru 2026', 'Sanggar JEB kembali membuka latihan perdana untuk anggota baru yang telah mendaftar', 'Tayang', '05 Mar 2026', 'Rizky Pratama'],
                    ['Latihan Perdana Anggota Baru 2026', 'Sanggar JEB kembali membuka latihan perdana untuk anggota baru yang telah mendaftar', 'Tayang', '05 Mar 2026', 'Rizky Pratama'],
                ];
            @endphp

            @foreach($newsList as $news)
            <div class="news-item">
                <div class="news-thumbnail">
                    </div>
                <div class="news-info">
                    <h4>{{ $news[0] }}</h4>
                    <p>{{ $news[1] }}</p>
                    <div class="news-meta">
                        <span class="status-tayang">{{ $news[2] }}</span>
                        <span class="meta-date">{{ $news[3] }}</span>
                        <span class="meta-author">{{ $news[4] }}</span>
                    </div>
                </div>
                <div class="news-actions">
                    <a href="#" class="btn-outline">Edit</a>
                    <a href="#" class="btn-outline">Hapus</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection