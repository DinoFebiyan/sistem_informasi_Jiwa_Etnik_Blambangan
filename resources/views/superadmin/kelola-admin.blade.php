@extends('layouts.superadmin')

@section('title', 'Kelola Admin — JEB')
@section('header_title', 'Kelola Admin')

@section('content')
<style>
  /* ══ CONTAINER UTAMA ══ */
  .adm-wrapper {
    width: 100%;
    font-family: 'Poppins', sans-serif;
    color: #333;
  }

  /* ══ HEADER ══ */
  .adm-header {
    margin-bottom: 24px;
  }
  .adm-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: #333;
    margin: 0 0 4px 0;
  }
  .adm-header p {
    color: #999;
    font-size: 0.85rem;
    margin: 0;
  }

  /* ══ STATS GRID (4 KOTAK ATAS) ══ */
  .adm-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 24px;
  }
  .adm-stat-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  }
  .adm-icon-box {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
  }
  .adm-icon-blue { background: #eff6ff; color: #3b82f6; }
  .adm-icon-green { background: #f0fdf4; color: #16a34a; }
  .adm-icon-red { background: #fef2f2; color: #ef4444; }
  
  .adm-stat-text h4 {
    margin: 0;
    font-size: 0.7rem;
    color: #999;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .adm-stat-text h2 {
    margin: 0;
    font-size: 1.5rem;
    color: #333;
    font-weight: 700;
  }

  /* TOMBOL TAMBAH ADMIN (PINK) */
  .adm-btn-tambah {
    background: #e2c0c0; /* Warna pink pudar persis di figma */
    color: #5a1a1a;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-weight: 700;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.2s;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  }
  .adm-btn-tambah:hover {
    background: #d4aeae;
  }

  /* ══ SEARCH & FILTER ══ */
  .adm-search-row {
    display: flex;
    gap: 15px;
    margin-bottom: 24px;
  }
  .adm-search-box {
    flex: 1;
    position: relative;
  }
  .adm-search-box input {
    width: 100%;
    padding: 16px 20px;
    border-radius: 12px;
    border: none;
    outline: none;
    font-family: 'Poppins', sans-serif;
    font-size: 0.95rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    box-sizing: border-box;
  }
  .adm-search-box .fa-search {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #eab308; /* Ikon kuning */
    font-size: 1.2rem;
  }
  .adm-btn-filter {
    background: #b91c1c; /* Merah pekat */
    color: #ffffff;
    border: none;
    padding: 0 35px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    font-family: 'Poppins', sans-serif;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  }

  /* ══ TABEL ADMIN ══ */
  .adm-table-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    overflow-x: auto;
  }
  .adm-table-card h3 {
    margin: 0 0 20px 0;
    font-size: 1.1rem;
    color: #333;
  }
  .adm-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
  }
  .adm-table th {
    text-align: left;
    padding: 12px 10px;
    color: #b07d7d; /* Warna coklat/merah pudar */
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 2px solid #f9f9f9;
  }
  .adm-table td {
    padding: 15px 10px;
    border-bottom: 1px solid #f9f9f9;
    vertical-align: middle;
    font-size: 0.85rem;
  }
  
  .adm-foto {
    width: 35px;
    height: 35px;
    background: #2563eb; /* Placeholder biru */
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.8rem;
    object-fit: cover;
  }
  
  .adm-badge-aktif {
    background: #dcfce7;
    color: #16a34a;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
  }
  
  .adm-action-btns button {
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.7rem;
    font-weight: 600;
    margin-right: 5px;
  }
  .adm-btn-edit { background: #eff6ff; color: #3b82f6; }
  .adm-btn-hapus { background: #fef2f2; color: #ef4444; margin-right: 0 !important; }

  /* ══ PAGINASI ══ */
  .adm-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
  }
  .adm-pagination p {
    font-size: 0.8rem;
    color: #999;
    margin: 0;
  }
  .adm-page-controls {
    display: flex;
    gap: 5px;
  }
  .adm-page-controls button {
    border: 1px solid #eee;
    background: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  .adm-page-controls button.active {
    background: #5B1A1A;
    color: #fff;
    border: none;
    font-weight: 700;
  }
</style>

<div class="adm-wrapper">
    
    <!-- HEADER -->
    <div class="adm-header">
        <h2>Kelola Admin</h2>
        <p>Senin, 01 Januari 2026 - Selamat datang kembali!</p>
    </div>

    <!-- STATS GRID -->
    <div class="adm-stats-grid">
        <div class="adm-stat-card">
            <div class="adm-icon-box adm-icon-blue"><i class="fas fa-user"></i></div>
            <div class="adm-stat-text">
                <h4>Total Admin</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="adm-stat-card">
            <div class="adm-icon-box adm-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="adm-stat-text">
                <h4>Aktif</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="adm-stat-card">
            <div class="adm-icon-box adm-icon-red"><i class="fas fa-ban"></i></div>
            <div class="adm-stat-text">
                <h4>Nonaktif</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <!-- TOMBOL TAMBAH ADMIN MENUJU FORM -->
        <a href="{{ url('/superadmin/tambah-admin') }}" class="adm-btn-tambah">
            <span>+</span> Tambah Admin
        </a>
    </div>

    <!-- SEARCH & FILTER -->
    <div class="adm-search-row">
        <div class="adm-search-box">
            <input type="text" placeholder="Cari nama Admin...">
            <i class="fas fa-search"></i>
        </div>
        <button class="adm-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </div>

    <!-- TABEL -->
    <div class="adm-table-card">
        <h3>Daftar Admin</h3>
        
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. Handphone</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- BARIS 1 -->
                <tr>
                    <td><div class="adm-foto">RP</div></td>
                    <td style="font-weight: 600;">Rizky Pratama</td>
                    <td>rizky@jeb.id</td>
                    <td>081234567890</td>
                    <td><span class="adm-badge-aktif">Aktif</span></td>
                    <td class="adm-action-btns">
                        <button class="adm-btn-edit">Edit</button>
                        <button class="adm-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 2 -->
                <tr>
                    <td><div class="adm-foto">RP</div></td>
                    <td style="font-weight: 600;">Rizky Pratama</td>
                    <td>rizky@jeb.id</td>
                    <td>081234567890</td>
                    <td><span class="adm-badge-aktif">Aktif</span></td>
                    <td class="adm-action-btns">
                        <button class="adm-btn-edit">Edit</button>
                        <button class="adm-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 3 -->
                <tr>
                    <td><div class="adm-foto">RP</div></td>
                    <td style="font-weight: 600;">Rizky Pratama</td>
                    <td>rizky@jeb.id</td>
                    <td>081234567890</td>
                    <td><span class="adm-badge-aktif">Aktif</span></td>
                    <td class="adm-action-btns">
                        <button class="adm-btn-edit">Edit</button>
                        <button class="adm-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 4 -->
                <tr>
                    <td><div class="adm-foto">RP</div></td>
                    <td style="font-weight: 600;">Rizky Pratama</td>
                    <td>rizky@jeb.id</td>
                    <td>081234567890</td>
                    <td><span class="adm-badge-aktif">Aktif</span></td>
                    <td class="adm-action-btns">
                        <button class="adm-btn-edit">Edit</button>
                        <button class="adm-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 5 -->
                <tr>
                    <td><div class="adm-foto">RP</div></td>
                    <td style="font-weight: 600;">Rizky Pratama</td>
                    <td>rizky@jeb.id</td>
                    <td>081234567890</td>
                    <td><span class="adm-badge-aktif">Aktif</span></td>
                    <td class="adm-action-btns">
                        <button class="adm-btn-edit">Edit</button>
                        <button class="adm-btn-hapus">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- PAGINASI -->
        <div class="adm-pagination">
            <p>Menampilkan 5 dari 5 admin</p>
            <div class="adm-page-controls">
                <button>&lsaquo;</button>
                <button class="active">1</button>
                <button>&rsaquo;</button>
            </div>
        </div>
    </div>

</div>
@endsection