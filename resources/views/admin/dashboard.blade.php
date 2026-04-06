@extends('layouts.admin') {{-- Memanggil layout admin yang baru kamu buat --}}

@section('title', 'Dashboard')

@section('content')
{{-- 1. Font Poppins agar tulisan bersih sesuai desain --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* Reset font khusus area konten agar pakai Poppins seperti desain */
    .dashboard-content {
        font-family: 'Poppins', sans-serif;
        color: #3e3e3e;
    }

    /* --- STATS CARDS --- */
    .jeb-stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }
    .jeb-stat-card {
        background: white;
        padding: 20px 25px;
        border-radius: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #e8dede;
    }
    .jeb-stat-info p {
        color: #9e9e9e;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        margin: 0;
    }
    .jeb-stat-info h2 {
        font-size: 32px;
        margin: 5px 0;
        color: #2e2e2e;
        font-weight: 700;
    }
    .jeb-stat-label {
        font-size: 12px;
        color: #16a34a;
        font-weight: 600;
    }
    .jeb-stat-icon-box {
        width: 45px;
        height: 45px;
        border: 1.5px solid;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
    .border-orange { border-color: #ffe8cc; color: #ffa94d; }
    .border-green { border-color: #d3f9d8; color: #69db7c; }
    .border-blue { border-color: #d0ebff; color: #74c0fc; }

    /* --- QUICK ACTION CARDS --- */
    .jeb-action-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 30px;
    }
    .jeb-action-card {
        background: white;
        padding: 30px 15px;
        border-radius: 18px;
        text-align: center;
        text-decoration: none;
        border: 1px solid #e8dede;
        transition: all 0.3s ease;
    }
    .jeb-action-card:hover {
        border-color: #8B0000;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.1);
    }
    .jeb-action-card i { font-size: 26px; margin-bottom: 12px; display: block; }
    .jeb-action-card h4 { font-size: 14px; font-weight: 600; margin: 0; color: #333; }
    .jeb-action-card p { font-size: 10px; color: #aaa; margin-top: 4px; }

    /* --- EVENT SECTION --- */
    .jeb-event-section {
        background: white;
        padding: 25px;
        border-radius: 20px;
        border: 1px solid #e8dede;
    }
    .jeb-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .jeb-section-header h3 { font-size: 17px; font-weight: 700; margin: 0; }
    .jeb-see-all { color: #8B4513; font-weight: 700; text-decoration: none; font-size: 13px; }

    .jeb-event-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .jeb-event-card {
        background: #fdf5f5;
        padding: 12px 18px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 2px solid transparent;
        text-decoration: none;
    }
    .jeb-event-card.active {
        border-color: #339af0;
        background: white;
    }
    .jeb-event-left { display: flex; align-items: center; gap: 12px; }
    .jeb-date-box {
        background: #8B0000;
        color: white;
        padding: 6px;
        border-radius: 10px;
        text-align: center;
        min-width: 42px;
    }
    .jeb-date-box strong { font-size: 16px; display: block; line-height: 1; }
    .jeb-date-box span { font-size: 9px; text-transform: uppercase; }

    .jeb-event-info h4 { font-size: 13px; font-weight: 600; margin: 0; color: #333; }
    .jeb-event-info p { font-size: 11px; color: #999; margin-top: 2px; }

    .jeb-badge-upcoming {
        background: #f3e5f5;
        color: #9c27b0;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 700;
    }
</style>

<div class="dashboard-content">
    <div class="jeb-stats-grid">
        <div class="jeb-stat-card">
            <div class="jeb-stat-info">
                <p>Event Aktif</p>
                <h2>7</h2>
                <div class="jeb-stat-label"><i class="fas fa-caret-up"></i> 3 item baru</div>
            </div>
            <div class="jeb-stat-icon-box border-orange">
                <i class="far fa-calendar-alt"></i>
            </div>
        </div>
        <div class="jeb-stat-card">
            <div class="jeb-stat-info">
                <p>Tambah Berita</p>
                <h2>24</h2>
                <div class="jeb-stat-label"><i class="fas fa-caret-up"></i> 2 event baru</div>
            </div>
            <div class="jeb-stat-icon-box border-green">
                <i class="far fa-newspaper"></i>
            </div>
        </div>
        <div class="jeb-stat-card">
            <div class="jeb-stat-info">
                <p>Pengunjung Web</p>
                <h2>1.2K</h2>
                <div class="jeb-stat-label"><i class="fas fa-caret-up"></i> 18% minggu ini</div>
            </div>
            <div class="jeb-stat-icon-box border-blue">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="jeb-action-grid">
        <a href="#" class="jeb-action-card">
            <i class="fas fa-file-medical" style="color: #ffa94d;"></i>
            <h4>Tambah Event</h4>
            <p>Upload Tari Baru</p>
        </a>
        <a href="#" class="jeb-action-card">
            <i class="fas fa-edit" style="color: #69db7c;"></i>
            <h4>Buat Berita</h4>
            <p>Jadwalkan Kegiatan</p>
        </a>
        <a href="#" class="jeb-action-card">
            <i class="fas fa-cog" style="color: #74c0fc;"></i>
            <h4>Pengaturan</h4>
            <p>Konfigurasi sistem</p>
        </a>
        <a href="#" class="jeb-action-card">
            <i class="far fa-user-circle" style="color: #ff8787;"></i>
            <h4>Kelola Profil</h4>
            <p>Buat akun baru</p>
        </a>
    </div>

    <div class="jeb-event-section">
        <div class="jeb-section-header">
            <h3>Event terdekat</h3>
            <a href="#" class="jeb-see-all">Lihat Semua <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="jeb-event-grid">
    {{-- Perulangan untuk menampilkan 8 item event secara seragam --}}
    @for ($i = 0; $i < 8; $i++)
        {{-- MENGHAPUS 'active' agar semua kotak seragam putih/abu pudar --}}
        <a href="#" class="jeb-event-card">
            <div class="jeb-event-left">
                <div class="jeb-date-box">
                    <strong>10</strong>
                    <span>Mar</span>
                </div>
                <div class="jeb-event-info">
                    <h4>Pentas Gandrung</h4>
                    <p>Pendopo BWI</p>
                </div>
            </div>
            <span class="jeb-badge-upcoming">Upcoming</span>
        </a>
    @endfor
</div>
    </div>
</div>
@endsection