@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header_title', 'Dashboard Admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="dashboard-wrapper">
    {{-- STATS GRID --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <p>Event Aktif</p>
                <h2>7</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> 3 item baru</div>
            </div>
            <div class="stat-icon emas">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <p>Total Berita</p>
                <h2>24</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> 2 hari ini</div>
            </div>
            <div class="stat-icon merah">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>

    {{-- QUICK ACCESS --}}
    <div class="quick-grid">
        <a class="quick-card" href="#">
            <div class="quick-icon"><i class="fas fa-calendar-plus" style="color: #16a34a;"></i></div>
            <p>Buat Event</p>
            <span>Jadwalkan kegiatan</span>
        </a>
        <a href="#" class="quick-card">
            <div class="quick-icon"><i class="fas fa-edit" style="color: #16a34a;"></i></div>
            <p>Buat Berita</p>
            <span>Update Artikel</span>
        </a>
    </div>

    {{-- BOTTOM SECTION --}}
    <div class="grid-2">
        <div class="card">
            <div class="card-header">
                <h3>Event Mendatang</h3>
                <span>Lihat Semua <i class="fas fa-arrow-right"></i></span>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="activity-item">
                        <div class="act-dot-wrap"><div class="act-dot merah"></div><div class="act-line"></div></div>
                        <div class="act-content">
                            <p><strong>Latihan Rutin Tari Gandrung</strong> - Lokasi Sanggar JEB</p>
                            <span>10 Maret 2026 · 15:00 WIB</span>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        {{-- AKTIVITAS --}}
        <div class="card">
            <div class="card-header">
                <h3>Aktivitas Terbaru</h3>
                <span>Lihat Semua <i class="fas fa-arrow-right"></i></span>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="act-dot-wrap"><div class="act-dot merah"></div><div class="act-line"></div></div>
                        <div class="act-content">
                            <p><strong>Admin baru</strong> ditambahkan — Rizky Pratama</p>
                            <span>2 jam yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection