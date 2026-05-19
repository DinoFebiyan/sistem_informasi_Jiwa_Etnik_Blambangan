@extends('layouts.superadmin')

@section('title', 'Kelola Katalog — JEB')
@section('header_title', 'Kelola Katalog')

@section('content')
<style>
    .katalog-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    .katalog-header {
        margin-bottom: 24px;
    }
    .katalog-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin: 0 0 4px 0;
    }
    .katalog-header p {
        color: #999;
        font-size: 0.85rem;
        margin: 0;
    }
    .katalog-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 24px;
    }
    .katalog-stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        border: 1px solid #f0f0f0;
    }
    .katalog-icon-box {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .katalog-icon-blue { background: #eff6ff; color: #3b82f6; }
    .katalog-icon-green { background: #dcfce7; color: #16a34a; }
    .katalog-icon-red { background: #fef2f2; color: #ef4444; }
    .katalog-stat-text h4 {
        margin: 0;
        font-size: 0.7rem;
        color: #999;
        text-transform: uppercase;
    }
    .katalog-stat-text h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }
    .katalog-btn-tambah {
        background: #e2c0c0;
        color: #5a1a1a;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid #e8dede;
        transition: 0.2s;
    }
    .katalog-btn-tambah:hover {
        background: #d4aeae;
    }
    .katalog-search-row {
        display: flex;
        gap: 15px;
        margin-bottom: 24px;
    }
    .katalog-search-box {
        flex: 1;
        position: relative;
    }
    .katalog-search-box input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 12px;
        border: 1px solid #e8dede;
        outline: none;
        font-size: 0.95rem;
    }
    .katalog-search-box .fa-search {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #eab308;
    }
    .katalog-btn-filter {
        background: #b91c1c;
        color: #fff;
        border: none;
        padding: 0 35px;
        border-radius: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }
    .katalog-table-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        border: 1px solid #f0f0f0;
        overflow-x: auto;
    }
    .katalog-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }
    .katalog-table th {
        text-align: left;
        padding: 12px 10px;
        color: #b07d7d;
        font-weight: 600;
        border-bottom: 2px solid #f9f9f9;
    }
    .katalog-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #f9f9f9;
        vertical-align: middle;
    }
    .katalog-foto-preview {
        width: 50px;
        height: 50px;
        background: #f0f0f0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        color: #999;
        overflow: hidden;
    }
    .katalog-foto-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .badge-tersedia {
        background: #dcfce7;
        color: #16a34a;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-tidak-tersedia {
        background: #fee2e2;
        color: #ef4444;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .katalog-actions a, .katalog-actions button {
        border: none;
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 600;
        margin-right: 5px;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }
    .btn-edit-katalog { background: #eff6ff; color: #3b82f6; }
    .btn-hapus-katalog { background: #fef2f2; color: #ef4444; }
    .pagination-links {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="katalog-wrapper">
    <div class="katalog-header">
        <h2>Kelola Katalog</h2>
        <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }} - Kelola data kostum dan properti tari</p>
    </div>

    <!-- STATS -->
    <div class="katalog-stats-grid">
        <div class="katalog-stat-card">
            <div class="katalog-icon-box katalog-icon-blue"><i class="fas fa-box"></i></div>
            <div class="katalog-stat-text">
                <h4>Total Katalog</h4>
                <h2>{{ $totalKatalog ?? 0 }}</h2>
            </div>
        </div>
        <div class="katalog-stat-card">
            <div class="katalog-icon-box katalog-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="katalog-stat-text">
                <h4>Tersedia</h4>
                <h2>{{ $tersedia ?? 0 }}</h2>
            </div>
        </div>
        <div class="katalog-stat-card">
            <div class="katalog-icon-box katalog-icon-red"><i class="fas fa-ban"></i></div>
            <div class="katalog-stat-text">
                <h4>Tidak Tersedia</h4>
                <h2>{{ $tidakTersedia ?? 0 }}</h2>
            </div>
        </div>
        <a href="{{ route('superadmin.katalog.create') }}" class="katalog-btn-tambah">
            <span>+</span> Tambah Katalog
        </a>
    </div>

    <!-- SEARCH & FILTER (opsional, bisa diaktifkan nanti) -->
    <div class="katalog-search-row">
        <div class="katalog-search-box">
            <input type="text" placeholder="Cari katalog..." id="searchKatalog">
            <i class="fas fa-search"></i>
        </div>
        <button class="katalog-btn-filter" onclick="filterKatalog()"><i class="fas fa-filter"></i> Filter</button>
    </div>

    <!-- TABEL KATALOG -->
    <div class="katalog-table-card">
        <h3>Daftar Katalog Kostum & Properti</h3>
        <table class="katalog-table" id="katalogTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Tari</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($katalogs as $katalog)
                <tr>
                    <td>
                        <div class="katalog-foto-preview">
                            @if($katalog->galeri && $katalog->galeri->file_blob)
                                <img src="data:image/jpeg;base64,{{ base64_encode($katalog->galeri->file_blob) }}" alt="Foto">
                            @else
                                <i class="fas fa-image"></i>
                            @endif
                        </div>
                    </td>
                    <td><strong>{{ $katalog->nama_tari }}</strong></td>
                    <td>{{ $katalog->kategori }}</td>
                    <td>{{ Str::limit($katalog->deskripsi, 50) }}</td>
                    <td>{{ $katalog->stok }}</td>
                    <td>
                        @if($katalog->status == 'tersedia')
                            <span class="badge-tersedia">Tersedia</span>
                        @else
                            <span class="badge-tidak-tersedia">Tidak Tersedia</span>
                        @endif
                    </td>
                    <td class="katalog-actions">
                        <a href="{{ route('superadmin.katalog.edit', $katalog->id) }}" class="btn-edit-katalog">Edit</a>
                        <button class="btn-hapus-katalog" onclick="confirmDelete({{ $katalog->id }})">Hapus</button>
                        <form id="delete-form-{{ $katalog->id }}" action="{{ route('superadmin.katalog.destroy', $katalog->id) }}" method="POST" style="display:none;">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;">Belum ada data katalog.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination-links">
            {{ $katalogs->links() }}
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if(confirm('Yakin ingin menghapus katalog ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
    function filterKatalog() {
        let input = document.getElementById('searchKatalog');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('katalogTable');
        let rows = table.getElementsByTagName('tr');
        for (let i = 1; i < rows.length; i++) {
            let namaCell = rows[i].getElementsByTagName('td')[1];
            if (namaCell) {
                let txtValue = namaCell.textContent || namaCell.innerText;
                rows[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        }
    }
</script>
@endsection