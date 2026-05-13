@extends('layouts.superadmin')

@section('title', 'Kelola Katalog — JEB')
@section('header_title', 'Kelola Katalog')

@section('content')
<style>
  /* ══ CONTAINER UTAMA ══ */
  .kat-wrapper {
    width: 100%;
    font-family: 'Poppins', sans-serif;
    color: #333;
  }

  /* ══ HEADER ══ */
  .kat-header {
    margin-bottom: 24px;
  }
  .kat-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: #333;
    margin: 0 0 4px 0;
  }
  .kat-header p {
    color: #999;
    font-size: 0.85rem;
    margin: 0;
  }

  /* ══ STATS GRID (4 KOTAK ATAS) ══ */
  .kat-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 24px;
  }
  .kat-stat-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  }
  .kat-icon-box {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
  }
  .kat-icon-blue { background: #eff6ff; color: #3b82f6; }
  .kat-icon-green { background: #f0fdf4; color: #16a34a; }
  .kat-icon-red { background: #fef2f2; color: #ef4444; }
  
  .kat-stat-text h4 {
    margin: 0;
    font-size: 0.7rem;
    color: #999;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .kat-stat-text h2 {
    margin: 0;
    font-size: 1.5rem;
    color: #333;
    font-weight: 700;
  }

  /* TOMBOL TAMBAH KATALOG (PINK) */
  .kat-btn-tambah {
    background: #e2c0c0; 
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
  .kat-btn-tambah:hover {
    background: #d4aeae;
  }

  /* ══ SEARCH & FILTER ══ */
  .kat-search-row {
    display: flex;
    gap: 15px;
    margin-bottom: 24px;
  }
  .kat-search-box {
    flex: 1;
    position: relative;
  }
  .kat-search-box input {
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
  .kat-search-box .fa-search {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #eab308; /* Ikon kuning */
    font-size: 1.2rem;
  }
  .kat-btn-filter {
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

  /* ══ TABEL KATALOG ══ */
  .kat-table-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    overflow-x: auto;
  }
  .kat-table-card h3 {
    margin: 0 0 20px 0;
    font-size: 1.1rem;
    color: #333;
  }
  .kat-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
  }
  .kat-table th {
    text-align: left;
    padding: 12px 10px;
    color: #b07d7d;
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 2px solid #f9f9f9;
  }
  .kat-table td {
    padding: 15px 10px;
    border-bottom: 1px solid #f9f9f9;
    vertical-align: middle;
    font-size: 0.85rem;
  }
  
  .kat-foto {
    width: 50px;
    height: 50px;
    background: #e67e22; /* Placeholder warna oren menyesuaikan gambar baju */
    border-radius: 8px;
    object-fit: cover;
  }
  
  .kat-action-btns button {
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.7rem;
    font-weight: 600;
    margin-right: 5px;
  }
  .kat-btn-edit { background: #eff6ff; color: #3b82f6; }
  .kat-btn-hapus { background: #fef2f2; color: #ef4444; margin-right: 0 !important; }

  /* ══ PAGINASI ══ */
  .kat-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
  }
  .kat-pagination p {
    font-size: 0.8rem;
    color: #999;
    margin: 0;
  }
  .kat-page-controls {
    display: flex;
    gap: 5px;
  }
  .kat-page-controls button {
    border: 1px solid #eee;
    background: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  .kat-page-controls button.active {
    background: #5B1A1A;
    color: #fff;
    border: none;
    font-weight: 700;
  }
</style>

<div class="kat-wrapper">
    
    <!-- HEADER -->
    <div class="kat-header">
        <h2>Kelola Katalog</h2>
        <p>Senin, 01 Januari 2026 - Selamat datang kembali!</p>
    </div>

    <!-- STATS GRID -->
    <div class="kat-stats-grid">
        <div class="kat-stat-card">
            <div class="kat-icon-box kat-icon-blue"><i class="fas fa-box"></i></div>
            <div class="kat-stat-text">
                <h4>Total Katalog</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="kat-stat-card">
            <div class="kat-icon-box kat-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="kat-stat-text">
                <h4>Tersedia</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="kat-stat-card">
            <div class="kat-icon-box kat-icon-red"><i class="fas fa-ban"></i></div>
            <div class="kat-stat-text">
                <h4>Tidak Tersedia</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <!-- TOMBOL TAMBAH KATALOG MENUJU FORM -->
        <a href="{{ url('/superadmin/tambah-katalog') }}" class="kat-btn-tambah">
            <span>+</span> Tambah Katalog
        </a>
    </div>

    <!-- SEARCH & FILTER -->
    <div class="kat-search-row">
        <div class="kat-search-box">
            <input type="text" placeholder="Cari Katalog...">
            <i class="fas fa-search"></i>
        </div>
        <button class="kat-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </div>

    <!-- TABEL -->
    <div class="kat-table-card">
        <h3>Daftar Katalog</h3>
        
        <table class="kat-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- BARIS 1 -->
                <tr>
                    <td><div class="kat-foto"></div></td>
                    <td style="font-weight: 600;">Baju Tari Gandrung</td>
                    <td>Baju Tari</td>
                    <td style="color: #666; line-height: 1.4;">Baju tari gandrung khas banyuwangi, dengan<br>bahan kain halus dan nyaman dipakai</td>
                    <td style="font-weight: 700;">5</td>
                    <td class="kat-action-btns">
                        <button class="kat-btn-edit">Edit</button>
                        <button class="kat-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 2 -->
                <tr>
                    <td><div class="kat-foto"></div></td>
                    <td style="font-weight: 600;">Baju Tari Gandrung</td>
                    <td>Baju Tari</td>
                    <td style="color: #666; line-height: 1.4;">Baju tari gandrung khas banyuwangi, dengan<br>bahan kain halus dan nyaman dipakai</td>
                    <td style="font-weight: 700;">5</td>
                    <td class="kat-action-btns">
                        <button class="kat-btn-edit">Edit</button>
                        <button class="kat-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 3 -->
                <tr>
                    <td><div class="kat-foto"></div></td>
                    <td style="font-weight: 600;">Baju Tari Gandrung</td>
                    <td>Baju Tari</td>
                    <td style="color: #666; line-height: 1.4;">Baju tari gandrung khas banyuwangi, dengan<br>bahan kain halus dan nyaman dipakai</td>
                    <td style="font-weight: 700;">5</td>
                    <td class="kat-action-btns">
                        <button class="kat-btn-edit">Edit</button>
                        <button class="kat-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 4 -->
                <tr>
                    <td><div class="kat-foto"></div></td>
                    <td style="font-weight: 600;">Baju Tari Gandrung</td>
                    <td>Baju Tari</td>
                    <td style="color: #666; line-height: 1.4;">Baju tari gandrung khas banyuwangi, dengan<br>bahan kain halus dan nyaman dipakai</td>
                    <td style="font-weight: 700;">5</td>
                    <td class="kat-action-btns">
                        <button class="kat-btn-edit">Edit</button>
                        <button class="kat-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 5 -->
                <tr>
                    <td><div class="kat-foto"></div></td>
                    <td style="font-weight: 600;">Baju Tari Gandrung</td>
                    <td>Baju Tari</td>
                    <td style="color: #666; line-height: 1.4;">Baju tari gandrung khas banyuwangi, dengan<br>bahan kain halus dan nyaman dipakai</td>
                    <td style="font-weight: 700;">5</td>
                    <td class="kat-action-btns">
                        <button class="kat-btn-edit">Edit</button>
                        <button class="kat-btn-hapus">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- PAGINASI -->
        <div class="kat-pagination">
            <p>Menampilkan 5 dari 5 event</p>
            <div class="kat-page-controls">
                <button>&lsaquo;</button>
                <button class="active">1</button>
                <button>&rsaquo;</button>
            </div>
        </div>
    </div>

</div>
@endsection