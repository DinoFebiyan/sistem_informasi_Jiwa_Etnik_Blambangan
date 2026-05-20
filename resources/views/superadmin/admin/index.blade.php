@extends('layouts.superadmin')

@section('title', 'Kelola Admin — JEB')
@section('header_title', 'Kelola Admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .adm-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    
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
        border: 1px solid #f0f0f0;
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
    .adm-btn-tambah {
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
        border: 1px solid #e8dede;
    }
    .adm-btn-tambah:hover {
        background: #d4aeae;
    }
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
        padding: 14px 20px;
        border-radius: 12px;
        border: 1px solid #e8dede;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
        background: #fff;
    }
    .adm-search-box .fa-search {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #eab308;
        font-size: 1.2rem;
    }
    .adm-btn-filter {
        background: #b91c1c;
        color: #ffffff;
        border: none;
        padding: 0 35px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }
    
    /* Penyesuaian Card Tabel */
    .adm-table-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px 0; /* Padding atas bawah saja */
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        border: 1px solid #f0f0f0;
        overflow-x: auto;
    }
    .adm-table-card h3 {
        margin: 0 0 20px 0;
        padding: 0 25px; /* Margin kiri kanan untuk judul */
        font-size: 1.1rem;
        color: #333;
    }
    .adm-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }
    .adm-table thead {
        background-color: #F5EBEB; /* Blok warna pada header tabel */
    }
    .adm-table th {
        text-align: left;
        padding: 14px 25px;
        color: #b07d7d;
        font-weight: 600;
        font-size: 0.85rem;
        border-bottom: none;
    }
    .adm-table td {
        padding: 15px 25px;
        border-bottom: 1px solid #E0E0E0; /* Menggelapkan garis tabel */
        vertical-align: middle;
        font-size: 0.85rem;
    }
    .adm-foto {
        width: 35px;
        height: 35px;
        background: #2563eb;
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
    .adm-badge-nonaktif {
        background: #fee2e2;
        color: #ef4444;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .adm-action-btns a, .adm-action-btns button {
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.7rem;
        font-weight: 600;
        margin-right: 5px;
        text-decoration: none;
        display: inline-block;
    }
    .adm-btn-edit { background: #eff6ff; color: #3b82f6; }
    .adm-btn-hapus { background: #fef2f2; color: #ef4444; }
    
    /* Penyesuaian Pagination */
    .adm-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
        padding: 0 25px;
    }
    .adm-pagination p {
        font-size: 0.85rem;
        color: #b07d7d;
        margin: 0;
        font-weight: 500;
    }
    .adm-page-controls {
        display: flex;
        gap: 8px;
    }
    .adm-page-controls a, .adm-page-controls span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        border: 1px solid #e8dede;
        background: #fff;
        color: #333;
        font-size: 0.85rem;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }
    .adm-page-controls a:hover {
        background: #f5ebeb;
        border-color: #d4aeae;
    }
    .adm-page-controls span.active {
        background: #5B1A1A;
        color: #fff;
        border-color: #5B1A1A;
        font-weight: 700;
    }
    .adm-page-controls span.disabled {
        color: #ccc;
        cursor: not-allowed;
        background: #fdfdfd;
    }
</style>

<div class="adm-wrapper">
    <div class="adm-stats-grid">
        <div class="adm-stat-card">
            <div class="adm-icon-box adm-icon-blue"><i class="fas fa-user"></i></div>
            <div class="adm-stat-text">
                <h4>Total Admin</h4>
                <h2>{{ $totalAdmin ?? 0 }}</h2>
            </div>
        </div>
        <div class="adm-stat-card">
            <div class="adm-icon-box adm-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="adm-stat-text">
                <h4>Aktif</h4>
                <h2>{{ $activeAdmins ?? 0 }}</h2>
            </div>
        </div>
        <div class="adm-stat-card">
            <div class="adm-icon-box adm-icon-red"><i class="fas fa-ban"></i></div>
            <div class="adm-stat-text">
                <h4>Nonaktif</h4>
                <h2>{{ $inactiveAdmins ?? 0 }}</h2>
            </div>
        </div>
        <a href="{{ route('superadmin.admin.create') }}" class="adm-btn-tambah">
            <span>+</span> Tambah Admin
        </a>
    </div>

    <form method="GET" action="{{ route('superadmin.admin.index') }}" class="adm-search-row">
        <div class="adm-search-box">
            <input type="text" name="search" placeholder="Cari nama Admin..." value="{{ request('search') }}">
            <i class="fas fa-search"></i>
        </div>
        <button type="submit" class="adm-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </form>

    <div class="adm-table-card">
        <h3>Daftar Admin</h3>
        <table class="adm-table">
            <thead>
                <tr>
                    <th>FOTO</th>
                    <th>NAMA LENGKAP</th>
                    <th>EMAIL</th>
                    <th>NO. HANDPHONE</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                <tr>
                    <td><div class="adm-foto">{{ strtoupper(substr($admin->name, 0, 2)) }}</div></td>
                    <td style="font-weight:600">{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->no_handphone ?? '-' }}</td>
                    <td>
                        @if($admin->status == 'aktif')
                            <span class="adm-badge-aktif">Aktif</span>
                        @else
                            <span class="adm-badge-nonaktif">Nonaktif</span>
                        @endif
                    </td>
                    <td class="adm-action-btns">
                        <a href="{{ route('superadmin.admin.edit', $admin->id) }}" class="adm-btn-edit">Edit</a>
                        <button class="adm-btn-hapus" onclick="confirmDelete({{ $admin->id }})">Hapus</button>
                        <form id="delete-form-{{ $admin->id }}" action="{{ route('superadmin.admin.destroy', $admin->id) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center">Belum ada data admin.</td></tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="adm-pagination">
            <p>Menampilkan {{ $admins->firstItem() ?? 0 }} dari {{ $admins->total() ?? 0 }} admin</p>
            <div class="adm-page-controls">
                @if ($admins->onFirstPage())
                    <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                @else
                    <a href="{{ $admins->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                @endif

                <span class="active">{{ $admins->currentPage() }}</span>

                @if ($admins->hasMorePages())
                    <a href="{{ $admins->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                @else
                    <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if(confirm('Yakin ingin menghapus admin ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
</script>
@endsection