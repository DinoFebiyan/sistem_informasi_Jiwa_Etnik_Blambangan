@extends('layouts.Superadmin') {{-- Pastikan mengarah ke layout yang sama --}}

@section('title', 'Dashboard Super Admin')
@section('header_title', 'Dashboard Super Admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="dashboard-wrapper">
    {{-- STATS GRID --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <p>Total Admin</p>
                <h2>5</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> 1 bulan ini</div>
            </div>
            <div class="stat-icon merah">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <p>Total Katalog</p>
                <h2>24</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> 3 item baru</div>
            </div>
            <div class="stat-icon emas">
                <i class="fas fa-book"></i>
            </div>
        </div>

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
        <a class="quick-card" href="javascript:void(0)" onclick="openModalTambahAdmin()">
        <div class="quick-icon"><i class="fas fa-user-plus" style="color: var(--merah);"></i></div>
        <p>Tambah Admin</p>
        <span>Buat akun baru</span>
      </a>
        <a class="quick-card" href="#">
            <div class="quick-icon"><i class="fas fa-folder-plus" style="color: var(--emas);"></i></div>
            <p>Tambah Katalog</p>
            <span>Upload tari baru</span>
        </a>
        <a class="quick-card" href="#">
            <div class="quick-icon"><i class="fas fa-calendar-plus" style="color: #16a34a;"></i></div>
            <p>Buat Event</p>
            <span>Jadwalkan kegiatan</span>
        </a>
        <a href="#" class="quick-card">
            <div class="quick-icon"><i class="fas fa-user-circle" style="color: var(--merah-muda);"></i></div>
            <p>Kelola Profil</p>
            <span>Update Data Diri</span>
        </a>
    </div>

    <div class="grid-2">
        {{-- TABLE ADMIN --}}
        <div class="card">
            <div class="card-header">
                <h3>Daftar Admin</h3>
                <span>Kelola Semua <i class="fas fa-arrow-right"></i></span>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Rizky Pratama</strong></td>
                                <td>rizky@jeb.id</td>
                                <td><span class="badge badge-aktif">Aktif</span></td>
                            </tr>
                            <tr>
                                <td><strong>Bagas Nugroho</strong></td>
                                <td>bagas@jeb.id</td>
                                <td><span class="badge badge-pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
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
@include('partials.superadmin.tambah-admin')

@endsection