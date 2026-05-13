@extends('layouts.superadmin')

@section('title', 'Kelola Event — JEB')
@section('header_title', 'Kelola Event')

@section('content')
<style>
  /* ══ CONTAINER UTAMA ══ */
  .ev-wrapper {
    width: 100%;
    font-family: 'Poppins', sans-serif;
    color: #333;
  }

  /* ══ HEADER ══ */
  .ev-header {
    margin-bottom: 24px;
  }
  .ev-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: #333;
    margin: 0 0 4px 0;
  }
  .ev-header p {
    color: #999;
    font-size: 0.85rem;
    margin: 0;
  }

  /* ══ STATS GRID (4 KOTAK ATAS) ══ */
  .ev-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 24px;
  }
  .ev-stat-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  }
  .ev-icon-box {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
  }
  .ev-icon-blue { background: #eff6ff; color: #3b82f6; }
  .ev-icon-green { background: #f0fdf4; color: #16a34a; }
  .ev-icon-red { background: #fef2f2; color: #ef4444; }
  
  .ev-stat-text h4 {
    margin: 0;
    font-size: 0.7rem;
    color: #999;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .ev-stat-text h2 {
    margin: 0;
    font-size: 1.5rem;
    color: #333;
    font-weight: 700;
  }

  /* TOMBOL TAMBAH EVENT (PINK) */
  .ev-btn-tambah {
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
  .ev-btn-tambah:hover {
    background: #d4aeae;
  }

  /* ══ SEARCH & FILTER ══ */
  .ev-search-row {
    display: flex;
    gap: 15px;
    margin-bottom: 24px;
  }
  .ev-search-box {
    flex: 1;
    position: relative;
  }
  .ev-search-box input {
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
  .ev-search-box .fa-search {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #eab308; /* Ikon kuning */
    font-size: 1.2rem;
  }
  .ev-btn-filter {
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

  /* ══ TABEL EVENT ══ */
  .ev-table-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    overflow-x: auto;
  }
  .ev-table-card h3 {
    margin: 0 0 20px 0;
    font-size: 1.1rem;
    color: #333;
  }
  .ev-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px; /* Mencegah tabel terlalu tergencet */
  }
  .ev-table th {
    text-align: left;
    padding: 12px 10px;
    color: #b07d7d; /* Warna coklat/merah pudar */
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 2px solid #f9f9f9;
  }
  .ev-table td {
    padding: 15px 10px;
    border-bottom: 1px solid #f9f9f9;
    vertical-align: middle;
    font-size: 0.85rem;
  }
  
  .ev-foto {
    width: 50px;
    height: 50px;
    background: #5B1A1A; /* Placeholder gelap */
    border-radius: 8px;
    object-fit: cover;
  }
  .ev-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
    display: block;
  }
  .ev-desc {
    color: #888;
    font-size: 0.75rem;
    line-height: 1.4;
  }
  
  .ev-badge-selesai {
    background: #dcfce7;
    color: #16a34a;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
  }
  
  .ev-action-btns button {
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.7rem;
    font-weight: 600;
    margin-right: 5px;
  }
  .ev-btn-edit { background: #eff6ff; color: #3b82f6; }
  .ev-btn-hapus { background: #fef2f2; color: #ef4444; margin-right: 0 !important; }

  /* ══ PAGINASI ══ */
  .ev-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
  }
  .ev-pagination p {
    font-size: 0.8rem;
    color: #999;
    margin: 0;
  }
  .ev-page-controls {
    display: flex;
    gap: 5px;
  }
  .ev-page-controls button {
    border: 1px solid #eee;
    background: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  .ev-page-controls button.active {
    background: #5B1A1A;
    color: #fff;
    border: none;
    font-weight: 700;
  }
</style>

<div class="ev-wrapper">
    
    <!-- HEADER -->
    <div class="ev-header">
        <h2>Kelola Event</h2>
        <p>Senin, 01 Januari 2026 - Selamat datang kembali!</p>
    </div>

    <!-- STATS GRID -->
    <div class="ev-stats-grid">
        <div class="ev-stat-card">
            <div class="ev-icon-box ev-icon-blue"><i class="fas fa-calendar-alt"></i></div>
            <div class="ev-stat-text">
                <h4>Total Event</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="ev-stat-card">
            <div class="ev-icon-box ev-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="ev-stat-text">
                <h4>Selesai</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="ev-stat-card">
            <div class="ev-icon-box ev-icon-red"><i class="fas fa-ban"></i></div>
            <div class="ev-stat-text">
                <h4>Belum Selesai</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <!-- TOMBOL TAMBAH EVENT MENUJU FORM -->
        <a href="{{ url('/superadmin/tambah-event') }}" class="ev-btn-tambah">
            <span>+</span> Tambah Event
        </a>
    </div>

    <!-- SEARCH & FILTER -->
    <div class="ev-search-row">
        <div class="ev-search-box">
            <input type="text" placeholder="Cari Event...">
            <i class="fas fa-search"></i>
        </div>
        <button class="ev-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </div>

    <!-- TABEL -->
    <div class="ev-table-card">
        <h3>Daftar Event</h3>
        
        <table class="ev-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Event</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- BARIS 1 -->
                <tr>
                    <td><div class="ev-foto"></div></td>
                    <td><span class="ev-title">Banyuwangi Culture Hub</span></td>
                    <td><div class="ev-desc">Pada Event ini JEB menampilkan<br>tari gandrung yang ...</div></td>
                    <td>Pertunjukan</td>
                    <td>12 Jan 2026</td>
                    <td>Pendopo Sabha<br>Swagata</td>
                    <td><span class="ev-badge-selesai">Selesai</span></td>
                    <td class="ev-action-btns">
                        <button class="ev-btn-edit">Edit</button>
                        <button class="ev-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 2 -->
                <tr>
                    <td><div class="ev-foto"></div></td>
                    <td><span class="ev-title">Banyuwangi Culture Hub</span></td>
                    <td><div class="ev-desc">Pada Event ini JEB menampilkan<br>tari gandrung yang ...</div></td>
                    <td>Pertunjukan</td>
                    <td>12 Jan 2026</td>
                    <td>Pendopo Sabha<br>Swagata</td>
                    <td><span class="ev-badge-selesai">Selesai</span></td>
                    <td class="ev-action-btns">
                        <button class="ev-btn-edit">Edit</button>
                        <button class="ev-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 3 -->
                <tr>
                    <td><div class="ev-foto"></div></td>
                    <td><span class="ev-title">Banyuwangi Culture Hub</span></td>
                    <td><div class="ev-desc">Pada Event ini JEB menampilkan<br>tari gandrung yang ...</div></td>
                    <td>Pertunjukan</td>
                    <td>12 Jan 2026</td>
                    <td>Pendopo Sabha<br>Swagata</td>
                    <td><span class="ev-badge-selesai">Selesai</span></td>
                    <td class="ev-action-btns">
                        <button class="ev-btn-edit">Edit</button>
                        <button class="ev-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 4 -->
                <tr>
                    <td><div class="ev-foto"></div></td>
                    <td><span class="ev-title">Banyuwangi Culture Hub</span></td>
                    <td><div class="ev-desc">Pada Event ini JEB menampilkan<br>tari gandrung yang ...</div></td>
                    <td>Pertunjukan</td>
                    <td>12 Jan 2026</td>
                    <td>Pendopo Sabha<br>Swagata</td>
                    <td><span class="ev-badge-selesai">Selesai</span></td>
                    <td class="ev-action-btns">
                        <button class="ev-btn-edit">Edit</button>
                        <button class="ev-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 5 -->
                <tr>
                    <td><div class="ev-foto"></div></td>
                    <td><span class="ev-title">Banyuwangi Culture Hub</span></td>
                    <td><div class="ev-desc">Pada Event ini JEB menampilkan<br>tari gandrung yang ...</div></td>
                    <td>Pertunjukan</td>
                    <td>12 Jan 2026</td>
                    <td>Pendopo Sabha<br>Swagata</td>
                    <td><span class="ev-badge-selesai">Selesai</span></td>
                    <td class="ev-action-btns">
                        <button class="ev-btn-edit">Edit</button>
                        <button class="ev-btn-hapus">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- PAGINASI -->
        <div class="ev-pagination">
            <p>Menampilkan 5 dari 5 event</p>
            <div class="ev-page-controls">
                <button>&lsaquo;</button>
                <button class="active">1</button>
                <button>&rsaquo;</button>
            </div>
        </div>
    </div>

</div>
@endsection