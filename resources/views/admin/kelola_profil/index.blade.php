@extends('layouts.superadmin')

@section('title', 'Kelola Profil Sanggar — JEB')
@section('header_title', 'Kelola Profil Sanggar')

@section('content')
<style>
  /* ══ CONTAINER UTAMA ══ */
  .prof-wrapper { 
    width: 100%; 
    font-family: 'Poppins', sans-serif; 
    color: #333; 
  }

  /* ══ HEADER (Perbaikan Posisi Tombol) ══ */
  .prof-header { 
    margin-bottom: 24px; 
    display: flex; 
    justify-content: space-between; /* Judul di kiri, tombol di kanan */
    align-items: center; 
    width: 100%;
  }

  .prof-header h2 { 
    font-family: 'Playfair Display', serif; 
    font-size: 1.8rem; 
    margin: 0; 
    color: #1a0000;
  }

  .prof-header p { 
    color: #999; 
    font-size: 0.85rem; 
    margin: 4px 0 0 0; 
  }

  /* ══ TOMBOL EDIT PROFIL ══ */
  .btn-edit-prof { 
    background: #5B1A1A; 
    color: #fff !important; 
    border: none; 
    padding: 10px 20px; 
    border-radius: 8px; 
    font-weight: 600; 
    display: flex; 
    align-items: center; 
    gap: 8px; 
    font-size: 0.85rem; 
    text-decoration: none; 
    transition: 0.3s;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }

  .btn-edit-prof:hover {
    background: #8B0000;
    transform: translateY(-2px);
  }

  /* ══ CARD & INFO UMUM ══ */
  .prof-card { 
    background: #ffffff; 
    border-radius: 12px; 
    padding: 25px; 
    box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
    margin-bottom: 24px; 
  }

  .prof-card h3 { 
    font-size: 1.1rem; 
    font-weight: 700; 
    margin: 0 0 20px 0; 
    border-bottom: 1px solid #f0f0f0; 
    padding-bottom: 10px; 
    color: #5B1A1A;
  }

  .info-grid { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 20px; 
  }

  .info-group { display: flex; flex-direction: column; gap: 8px; }
  .info-group.full { grid-column: 1 / -1; }
  .info-group label { font-size: 0.8rem; font-weight: 700; color: #555; }
  
  .info-box { 
    background: #fff; 
    border: 1.5px solid #eee; 
    border-radius: 8px; 
    padding: 12px; 
    font-size: 0.85rem; 
    color: #333; 
    line-height: 1.5; 
    min-height: 45px; 
  }

  /* ══ TOMBOL TAMBAH DATA ══ */
  .btn-tambah-data { 
    background: #5B1A1A; 
    color: #fff; 
    border: none; 
    padding: 8px 16px; 
    border-radius: 8px; 
    font-weight: 600; 
    display: flex; 
    align-items: center; 
    gap: 8px; 
    font-size: 0.8rem; 
    text-decoration: none; 
    margin-left: auto; 
  }

  /* ══ TABEL ══ */
  .prof-table { width: 100%; border-collapse: collapse; }
  .prof-table th { text-align: left; padding: 12px 10px; color: #b07d7d; font-weight: 600; font-size: 0.8rem; border-bottom: 2px solid #f9f9f9; text-transform: uppercase; }
  .prof-table td { padding: 12px 10px; border-bottom: 1px solid #f9f9f9; vertical-align: middle; font-size: 0.8rem; }
  
  .avatar-table { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; background: #eee; }
  .badge-aktif { background: #dcfce7; color: #16a34a; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
  
  .btn-table { border: 1px solid #eee; padding: 4px 10px; border-radius: 5px; background: #fff; cursor: pointer; font-size: 0.7rem; color: #888; transition: 0.2s; }
  .btn-table:hover { border-color: #5B1A1A; color: #5B1A1A; }

  .pagination-wrap { display: flex; justify-content: space-between; align-items: center; margin-top: 15px; font-size: 0.75rem; color: #999; }
</style>

<div class="prof-wrapper">
    <!-- HEADER -->
    <div class="prof-header">
        <div>
            <h2>Kelola Profil Sanggar</h2>
            <p>Senin, 01 Januari 2026 - Selamat datang kembali!</p>
        </div>
        <a href="{{ url('/superadmin/edit-profil') }}" class="btn-edit-prof">
            <i class="fas fa-edit"></i> Edit Profil
        </a>
    </div>

    <!-- INFORMASI UMUM -->
    <div class="prof-card">
        <h3>Informasi Umum</h3>
        <div class="info-grid">
            <div class="info-group full">
                <label>Deskripsi Sanggar</label>
                <div class="info-box">Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara...</div>
            </div>
            <div class="info-group">
                <label>Visi</label>
                <div class="info-box">Menjadi sanggar seni yang unggul, berkarakter, dan memiliki keunikan tersendiri serta mampu menghasilkan karya nyata.</div>
            </div>
            <div class="info-group">
                <label>Misi</label>
                <div class="info-box">Mengembangkan potensi anggota agar memiliki kemampuan yang terampil dan profesional di bidang seni budaya.</div>
            </div>
            <div class="info-group">
                <label>Sambutan Pimpinan Sanggar</label>
                <div class="info-box">Selamat datang di Sanggar Tari Jiwa Etnik Blambangan. Kami hadir untuk melestarikan seni dan budaya daerah...</div>
            </div>
            <div class="info-group">
                <label>Sejarah Sanggar</label>
                <div class="info-box">Sanggar Tari Jiwa Etnik Blambangan berdiri sejak tahun 2010 sebagai bentuk kepedulian terhadap seni tradisional...</div>
            </div>
            <div class="info-group">
                <label>Logo Sanggar</label>
                <div class="info-box">Logo_Sanggar_JEB.png</div>
            </div>
            <div class="info-group">
                <label>Foto Pembina</label>
                <div class="info-box">IMG-20240112-WA0035.jpg</div>
            </div>
        </div>
    </div>

    <!-- DAFTAR PENGURUS -->
    <div class="prof-card">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
            <h3 style="margin: 0; border: none; padding: 0;">Daftar Pengurus</h3>
            <a href="{{ url('/superadmin/tambah-pengurus') }}" class="btn-tambah-data">
                <i class="fas fa-plus"></i> Tambah Pengurus
            </a>
        </div>
        
        <table class="prof-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Instagram</th>
                    <th>No. Handphone</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 3; $i++)
                <tr>
                    <td><div class="avatar-table"></div></td>
                    <td style="font-weight: 600;">Rizky Pratama</td>
                    <td>Ketua</td>
                    <td>@rizkyprat</td>
                    <td>081234567890</td>
                    <td><span class="badge-aktif">AKTIF</span></td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <button class="btn-table">Edit</button>
                            <button class="btn-table">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
        <div class="pagination-wrap">
            <p>Menampilkan 3 pengurus</p>
        </div>
    </div>

    <!-- DAFTAR PELATIH -->
    <div class="prof-card">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
            <h3 style="margin: 0; border: none; padding: 0;">Daftar Pelatih</h3>
            <a href="{{ url('/superadmin/tambah-pelatih') }}" class="btn-tambah-data">
                <i class="fas fa-plus"></i> Tambah Pelatih
            </a>
        </div>
        
        <table class="prof-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Instagram</th>
                    <th>No. Handphone</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 3; $i++)
                <tr>
                    <td><div class="avatar-table"></div></td>
                    <td style="font-weight: 600;">Budi Santoso</td>
                    <td>Pelatih Tari</td>
                    <td>@buditaridance</td>
                    <td>081234567891</td>
                    <td><span class="badge-aktif">AKTIF</span></td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <button class="btn-table">Edit</button>
                            <button class="btn-table">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
        <div class="pagination-wrap">
            <p>Menampilkan 3 pelatih</p>
        </div>
    </div>
</div>
@endsection