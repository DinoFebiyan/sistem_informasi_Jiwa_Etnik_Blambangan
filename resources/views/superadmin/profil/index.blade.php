@extends('layouts.superadmin')

@section('title', 'Kelola Profil Sanggar — JEB')
@section('header_title', 'Kelola Profil Sanggar')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    /* ================= GLOBAL ================= */
    .prof-page {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #1e1e1e;
        background: #FFFFFF;
    }

    /* Header */
    .prof-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
        flex-wrap: wrap;
    }
    .prof-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #2d0a0a;
        margin: 0;
    }
    .prof-header p {
        color: #8b5a5a;
        font-size: 0.85rem;
        margin: 4px 0 0;
    }
    .btn-edit-profil {
        background: #5B1A1A;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 8px 24px;
        font-weight: 600;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: 0.2s;
    }
    .btn-edit-profil:hover {
        background: #3f0f0f;
    }

    /* Kartu informasi umum */
    .info-card {
        background: #fff;
        border-radius: 20px;
        border: 1px solid #f0e0e0;
        box-shadow: 0 8px 20px rgba(0,0,0,0.02);
        margin-bottom: 32px;
        overflow: hidden;
    }
    .card-title {
        font-size: 1.2rem;
        font-weight: 700;
        padding: 18px 24px;
        border-bottom: 1px solid #f0e0e0;
        background: #fffbfb;
        color: #5B1A1A;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        padding: 24px;
    }
    .info-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .info-item label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #b48c8c;
        letter-spacing: 0.5px;
    }
    .info-item .value {
        font-size: 0.9rem;
        line-height: 1.5;
        color: #2d2d2d;
        background: #fef9f9;
        padding: 10px 14px;
        border-radius: 14px;
        border: 1px solid #f5e8e8;
    }
    .full-width {
        grid-column: span 2;
    }

    /* Foto logo & pembina */
    .photo-row {
        display: flex;
        gap: 30px;
        margin-top: 10px;
    }
    .photo-box {
        flex: 1;
        text-align: center;
        background: #fef9f9;
        border-radius: 16px;
        padding: 16px;
        border: 1px solid #f0e0e0;
    }
    .photo-box img {
        max-width: 120px;
        max-height: 120px;
        border-radius: 12px;
        object-fit: cover;
        margin-bottom: 12px;
    }
    .photo-box span {
        display: block;
        font-size: 0.75rem;
        color: #8b5a5a;
    }

    /* Tabel Personel (pengurus & pelatih) */
    .personel-section {
        margin-top: 32px;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }
    .section-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2d0a0a;
    }
    .btn-tambah {
        background: #e2c0c0;
        color: #5a1a1a;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #d4aeae;
        transition: 0.2s;
    }
    .btn-tambah:hover {
        background: #d4aeae;
    }
    .personel-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #f0e0e0;
    }
    .personel-table th {
        text-align: left;
        padding: 14px 12px;
        background: #fdf7f7;
        color: #b07d7d;
        font-weight: 600;
        font-size: 0.8rem;
        border-bottom: 1px solid #f0e0e0;
    }
    .personel-table td {
        padding: 12px;
        border-bottom: 1px solid #f9f0f0;
        font-size: 0.85rem;
        vertical-align: middle;
    }
    .avatar-bulet {
        width: 36px;
        height: 36px;
        background: #8B0000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.8rem;
    }
    .badge-status {
        background: #dcfce7;
        color: #16a34a;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .action-btns a, .action-btns button {
        background: none;
        border: none;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 8px;
        border-radius: 8px;
        cursor: pointer;
        margin-right: 5px;
        text-decoration: none;
        display: inline-block;
    }
    .btn-edit {
        color: #3b82f6;
        background: #eff6ff;
    }
    .btn-delete {
        color: #ef4444;
        background: #fef2f2;
    }
    .pagination-info {
        margin-top: 20px;
        font-size: 0.75rem;
        color: #999;
        text-align: right;
    }
</style>

<div class="prof-page">
    {{-- HEADER --}}
    <div class="prof-header">
        <div>
            <h2>Kelola Profil Sanggar</h2>
            <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }} - Atur informasi sanggar, pengurus, dan pelatih</p>
        </div>
        <a href="{{ route('superadmin.profil.update') }}" class="btn-edit-profil">
            <i class="fas fa-edit"></i> Edit Profil
        </a>
    </div>

    {{-- INFORMASI UMUM --}}
    <div class="info-card">
        <div class="card-title"><i class="fas fa-building"></i> Informasi Umum</div>
        <div class="info-grid">
            <div class="info-item full-width">
                <label>Deskripsi Sanggar</label>
                <div class="value">{{ $profil->deskripsi ?? 'Belum diisi' }}</div>
            </div>
            <div class="info-item">
                <label>Visi</label>
                <div class="value">{{ $profil->visi ?? 'Belum diisi' }}</div>
            </div>
            <div class="info-item">
                <label>Misi</label>
                <div class="value">{{ $profil->misi ?? 'Belum diisi' }}</div>
            </div>
            <div class="info-item">
                <label>Alamat</label>
                <div class="value">{{ $profil->alamat ?? 'Belum diisi' }}</div>
            </div>
            <div class="info-item">
                <label>Kontak</label>
                <div class="value">{{ $profil->kontak ?? 'Belum diisi' }}</div>
            </div>
            <div class="info-item full-width">
                <label>Sejarah</label>
                <div class="value">{{ $profil->sejarah ?? 'Belum diisi' }}</div>
            </div>
            <div class="info-item full-width">
                <label>Sambutan Pembina</label>
                <div class="value">{{ $profil->sambutan_pembina ?? 'Belum diisi' }}</div>
            </div>
            <div class="photo-row">
                <div class="photo-box">
                    @if($profil && $profil->logo && $profil->logo->file_blob)
                        <img src="data:image/jpeg;base64,{{ base64_encode($profil->logo->file_blob) }}" alt="Logo">
                    @else
                        <img src="{{ asset('img/default-logo.png') }}" alt="Logo default" style="opacity:0.6">
                    @endif
                    <span>Logo Sanggar</span>
                </div>
                <div class="photo-box">
                    @if($profil && $profil->fotoPembina && $profil->fotoPembina->file_blob)
                        <img src="data:image/jpeg;base64,{{ base64_encode($profil->fotoPembina->file_blob) }}" alt="Foto Pembina">
                    @else
                        <img src="{{ asset('img/default-avatar.png') }}" alt="Foto default" style="opacity:0.6">
                    @endif
                    <span>Foto Pembina</span>
                </div>
            </div>
        </div>
    </div>

    {{-- DAFTAR PENGURUS --}}
    <div class="personel-section">
        <div class="section-header">
            <h3><i class="fas fa-users"></i> Daftar Pengurus</h3>
            <a href="{{ route('superadmin.profil.tambah-pengurus') }}" class="btn-tambah"><i class="fas fa-plus"></i> Tambah Pengurus</a>
        </div>
        <table class="personel-table">
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
                @forelse($pengurus as $item)
                <tr>
                    <td><div class="avatar-bulet">{{ strtoupper(substr($item->nama, 0, 2)) }}</div></td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->instagram ?? '-' }}</td>
                    <td>{{ $item->no_handphone }}</td>
                    <td><span class="badge-status">{{ $item->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td class="action-btns">
                        <a href="{{ route('superadmin.edit-pengurus', $item->id) }}" class="btn-edit">Edit</a>
                        <button class="btn-delete" onclick="confirmDelete('pengurus', {{ $item->id }})">Hapus</button>
                        <form id="delete-pengurus-{{ $item->id }}" action="{{ route('superadmin.delete-pengurus', $item->id) }}" method="POST" style="display:none;">@csrf @method('DELETE')</form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7">Belum ada data pengurus. <a href="{{ route('superadmin.profil.tambah-pengurus') }}">Tambah sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination-info">{{ $pengurus->links() }}</div>
    </div>

    {{-- DAFTAR PELATIH --}}
    <div class="personel-section" style="margin-top: 40px;">
        <div class="section-header">
            <h3><i class="fas fa-chalkboard-user"></i> Daftar Pelatih</h3>
            <a href="{{ route('superadmin.profil.tambah-pelatih') }}" class="btn-tambah"><i class="fas fa-plus"></i> Tambah Pelatih</a>
        </div>
        <table class="personel-table">
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
                @forelse($pelatih as $item)
                <tr>
                    <td><div class="avatar-bulet">{{ strtoupper(substr($item->nama, 0, 2)) }}</div></td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->instagram ?? '-' }}</td>
                    <td>{{ $item->no_handphone }}</td>
                    <td><span class="badge-status">{{ $item->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td class="action-btns">
                        <a href="{{ route('superadmin.edit-pelatih', $item->id) }}" class="btn-edit">Edit</a>
                        <button class="btn-delete" onclick="confirmDelete('pelatih', {{ $item->id }})">Hapus</button>
                        <form id="delete-pelatih-{{ $item->id }}" action="{{ route('superadmin.delete-pelatih', $item->id) }}" method="POST" style="display:none;">@csrf @method('DELETE')</form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7">Belum ada data pelatih. <a href="{{ route('superadmin.tambah-pelatih') }}">Tambah sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination-info">{{ $pelatih->links() }}</div>
    </div>
</div>

<script>
    function confirmDelete(jenis, id) {
        if(confirm('Yakin ingin menghapus data ' + jenis + ' ini?')) {
            document.getElementById('delete-' + jenis + '-' + id).submit();
        }
    }
</script>
@endsection