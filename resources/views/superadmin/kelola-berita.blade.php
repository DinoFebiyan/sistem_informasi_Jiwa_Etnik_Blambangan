@extends('layouts.superadmin')

@section('title', 'Kelola Berita — JEB')
@section('header_title', 'Kelola Berita')

@section('content')
<style>
  /* ══ CONTAINER UTAMA ══ */
  .ber-wrapper {
    width: 100%;
    font-family: 'Poppins', sans-serif;
    color: #333;
  }

  /* ══ HEADER ══ */
  .ber-header {
    margin-bottom: 24px;
  }
  .ber-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: #333;
    margin: 0 0 4px 0;
  }
  .ber-header p {
    color: #999;
    font-size: 0.85rem;
    margin: 0;
  }

  /* ══ STATS GRID (4 KOTAK ATAS) ══ */
  .ber-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 24px;
  }
  .ber-stat-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  }
  .ber-icon-box {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
  }
  .ber-icon-blue { background: #eff6ff; color: #3b82f6; }
  .ber-icon-green { background: #f0fdf4; color: #16a34a; }
  .ber-icon-red { background: #fef2f2; color: #ef4444; }
  
  .ber-stat-text h4 {
    margin: 0;
    font-size: 0.7rem;
    color: #999;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .ber-stat-text h2 {
    margin: 0;
    font-size: 1.5rem;
    color: #333;
    font-weight: 700;
  }

  /* TOMBOL TAMBAH BERITA (PINK) */
  .ber-btn-tambah {
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
  .ber-btn-tambah:hover {
    background: #d4aeae;
  }

  /* ══ SEARCH & FILTER ══ */
  .ber-search-row {
    display: flex;
    gap: 15px;
    margin-bottom: 24px;
  }
  .ber-search-box {
    flex: 1;
    position: relative;
  }
  .ber-search-box input {
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
  .ber-search-box .fa-search {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #eab308; /* Ikon kuning */
    font-size: 1.2rem;
  }
  .ber-btn-filter {
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

  /* ══ TABEL BERITA ══ */
  .ber-table-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    overflow-x: auto;
  }
  .ber-table-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }
  .ber-table-card-header h3 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
  }
  .ber-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
  }
  .ber-table th {
    text-align: left;
    padding: 12px 10px;
    color: #b07d7d;
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 2px solid #f9f9f9;
  }
  .ber-table td {
    padding: 15px 10px;
    border-bottom: 1px solid #f9f9f9;
    vertical-align: middle;
    font-size: 0.85rem;
  }
  
  .ber-foto {
    width: 50px;
    height: 40px;
    background: #d3c4c4; /* Warna placeholder gambar berita */
    border-radius: 6px;
    object-fit: cover;
  }
  
  .ber-badge-tayang {
    background: #dcfce7;
    color: #16a34a;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
  }
  
  .ber-action-btns button {
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.7rem;
    font-weight: 600;
    margin-right: 5px;
  }
  .ber-btn-edit { background: #eff6ff; color: #3b82f6; }
  .ber-btn-hapus { background: #fef2f2; color: #ef4444; margin-right: 0 !important; }

  /* ══ PAGINASI ══ */
  .ber-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
  }
  .ber-pagination p {
    font-size: 0.8rem;
    color: #999;
    margin: 0;
  }
  .ber-page-controls {
    display: flex;
    gap: 5px;
  }
  .ber-page-controls button {
    border: 1px solid #eee;
    background: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  .ber-page-controls button.active {
    background: #5B1A1A;
    color: #fff;
    border: none;
    font-weight: 700;
  }
</style>

<div class="ber-wrapper">
    
    <!-- HEADER -->
    <div class="ber-header">
        <h2>Kelola Berita</h2>
        <p>Senin, 01 Januari 2026 - Selamat datang kembali!</p>
    </div>

    <!-- STATS GRID -->
    <div class="ber-stats-grid">
        <div class="ber-stat-card">
            <div class="ber-icon-box ber-icon-blue"><i class="fas fa-newspaper"></i></div>
            <div class="ber-stat-text">
                <h4>Total Berita</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="ber-stat-card">
            <div class="ber-icon-box ber-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="ber-stat-text">
                <h4>Ditayangkan</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <div class="ber-stat-card">
            <div class="ber-icon-box ber-icon-red"><i class="fas fa-ban"></i></div>
            <div class="ber-stat-text">
                <h4>Tidak Ditayangkan</h4>
                <h2>5</h2>
            </div>
        </div>
        
        <!-- TOMBOL TAMBAH BERITA MENUJU FORM -->
        <a href="{{ url('/superadmin/tambah-berita') }}" class="ber-btn-tambah">
            <span>+</span> Tambah Berita
        </a>
    </div>

    <!-- SEARCH & FILTER -->
    <div class="ber-search-row">
        <div class="ber-search-box">
            <input type="text" placeholder="Cari Berita...">
            <i class="fas fa-search"></i>
        </div>
        <button class="ber-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </div>

    <!-- TABEL -->
    <div class="ber-table-card">
        <div class="ber-table-card-header">
            <h3>Semua Berita</h3>
            <select style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.8rem; color: #888; outline: none;">
                <option>Semua</option>
                <option>Tayang</option>
                <option>Draft</option>
            </select>
        </div>
        
        <table class="ber-table">
            <thead>
                <tr>
                    <th>Header</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- BARIS 1 -->
                <tr>
                    <td><div class="ber-foto"></div></td>
                    <td style="font-weight: 600;">Latihan Perdana Anggota<br>Baru 2026</td>
                    <td style="color: #666; font-family: monospace;">&lt;h2&gt;Latihan Tari Sanggar&lt;/h2&gt;<br>&lt;p&gt;Hari ini sanggar...</td>
                    <td>Rizky Pratama</td>
                    <td><span class="ber-badge-tayang">Tayang</span></td>
                    <td class="ber-action-btns">
                        <button class="ber-btn-edit">Edit</button>
                        <button class="ber-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 2 -->
                <tr>
                    <td><div class="ber-foto"></div></td>
                    <td style="font-weight: 600;">Latihan Perdana Anggota<br>Baru 2026</td>
                    <td style="color: #666; font-family: monospace;">&lt;h2&gt;Latihan Tari Sanggar&lt;/h2&gt;<br>&lt;p&gt;Hari ini sanggar...</td>
                    <td>Rizky Pratama</td>
                    <td><span class="ber-badge-tayang">Tayang</span></td>
                    <td class="ber-action-btns">
                        <button class="ber-btn-edit">Edit</button>
                        <button class="ber-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 3 -->
                <tr>
                    <td><div class="ber-foto"></div></td>
                    <td style="font-weight: 600;">Latihan Perdana Anggota<br>Baru 2026</td>
                    <td style="color: #666; font-family: monospace;">&lt;h2&gt;Latihan Tari Sanggar&lt;/h2&gt;<br>&lt;p&gt;Hari ini sanggar...</td>
                    <td>Rizky Pratama</td>
                    <td><span class="ber-badge-tayang">Tayang</span></td>
                    <td class="ber-action-btns">
                        <button class="ber-btn-edit">Edit</button>
                        <button class="ber-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 4 -->
                <tr>
                    <td><div class="ber-foto"></div></td>
                    <td style="font-weight: 600;">Latihan Perdana Anggota<br>Baru 2026</td>
                    <td style="color: #666; font-family: monospace;">&lt;h2&gt;Latihan Tari Sanggar&lt;/h2&gt;<br>&lt;p&gt;Hari ini sanggar...</td>
                    <td>Rizky Pratama</td>
                    <td><span class="ber-badge-tayang">Tayang</span></td>
                    <td class="ber-action-btns">
                        <button class="ber-btn-edit">Edit</button>
                        <button class="ber-btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- BARIS 5 -->
                <tr>
                    <td><div class="ber-foto"></div></td>
                    <td style="font-weight: 600;">Latihan Perdana Anggota<br>Baru 2026</td>
                    <td style="color: #666; font-family: monospace;">&lt;h2&gt;Latihan Tari Sanggar&lt;/h2&gt;<br>&lt;p&gt;Hari ini sanggar...</td>
                    <td>Rizky Pratama</td>
                    <td><span class="ber-badge-tayang">Tayang</span></td>
                    <td class="ber-action-btns">
                        <button class="ber-btn-edit">Edit</button>
                        <button class="ber-btn-hapus">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- PAGINASI -->
        <div class="ber-pagination">
            <p>Menampilkan 5 dari 5 berita</p>
            <div class="ber-page-controls">
                <button>&lsaquo;</button>
                <button class="active">1</button>
                <button>&rsaquo;</button>
            </div>
        </div>
    </div>

</div>
@endsection