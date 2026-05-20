@extends('layouts.superadmin')

@section('title', 'Kelola Katalog — JEB')
@section('header_title', 'Kelola Katalog')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .katalog-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
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
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
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
    .katalog-icon-green { background: #f0fdf4; color: #16a34a; }
    .katalog-icon-red { background: #fef2f2; color: #ef4444; }
    .katalog-stat-text h4 {
        margin: 0;
        font-size: 0.7rem;
        color: #999;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .katalog-stat-text h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
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
        font-size: 1.1rem;
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
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
    }
    .katalog-search-box .fa-search {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #eab308;
        font-size: 1.2rem;
    }
    .katalog-btn-filter {
        background: #b91c1c;
        color: #fff;
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
    .katalog-table-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px 0; 
        border: 1px solid #f0f0f0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        overflow-x: auto;
    }
    .katalog-table-card h3 {
        margin: 0 0 20px 0;
        padding: 0 25px; 
        font-size: 1.1rem;
        color: #333;
    }
    .katalog-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }
    .katalog-table thead {
        background-color: #F5EBEB; 
    }
    .katalog-table th {
        text-align: left;
        padding: 14px 25px;
        color: #b07d7d;
        font-weight: 600;
        font-size: 0.85rem;
        border-bottom: none;
        text-transform: uppercase; 
    }
    .katalog-table td {
        padding: 15px 25px;
        border-bottom: 1px solid #E0E0E0; 
        vertical-align: middle;
        font-size: 0.85rem;
    }
    .katalog-foto-preview {
        width: 45px;
        height: 45px;
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
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-tidak-tersedia {
        background: #fee2e2;
        color: #ef4444;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .katalog-actions a, .katalog-actions button {
        border: none;
        padding: 6px 14px;
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
    
    /* Penyesuaian Pagination Katalog */
    .katalog-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
        padding: 0 25px;
    }
    .katalog-pagination p {
        font-size: 0.85rem;
        color: #b07d7d;
        margin: 0;
        font-weight: 500;
    }
    .katalog-page-controls {
        display: flex;
        gap: 8px;
    }
    .katalog-page-controls a, .katalog-page-controls span {
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
    .katalog-page-controls a:hover {
        background: #f5ebeb;
        border-color: #d4aeae;
    }
    .katalog-page-controls span.active {
        background: #5B1A1A;
        color: #fff;
        border-color: #5B1A1A;
        font-weight: 700;
    }
    .katalog-page-controls span.disabled {
        color: #ccc;
        cursor: not-allowed;
        background: #fdfdfd;
    }
</style>


<div class="katalog-wrapper">
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

    <div class="katalog-search-row">
        <div class="katalog-search-box">
            <input type="text" placeholder="Cari Katalog..." id="searchKatalog">
            <i class="fas fa-search"></i>
        </div>
        <button class="katalog-btn-filter" onclick="filterKatalog()"><i class="fas fa-filter"></i> Filter</button>
    </div>

    <div class="katalog-table-card">
        <h3>Daftar Katalog</h3>
        <table class="katalog-table" id="katalogTable">
            <thead>
                <tr>
                    <th>FOTO</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>DESKRIPSI</th>
                    <th>STOK</th>
                    <th>STATUS</th> 
                    <th>AKSI</th>
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
                    <td style="font-weight:600">{{ $katalog->nama_tari }}</td>
                    <td>{{ $katalog->kategori }}</td>
                    <td>{{ Str::limit($katalog->deskripsi, 60) }}</td>
                    <td><strong style="color: #333;">{{ $katalog->stok }}</strong></td>
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
        
        <div class="katalog-pagination">
            <p>Menampilkan {{ $katalogs->firstItem() ?? 0 }} dari {{ $katalogs->total() ?? 0 }} katalog</p>
            <div class="katalog-page-controls">
                @if ($katalogs->onFirstPage())
                    <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                @else
                    <a href="{{ $katalogs->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                @endif

                <span class="active">{{ $katalogs->currentPage() }}</span>

                @if ($katalogs->hasMorePages())
                    <a href="{{ $katalogs->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                @else
                    <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if(confirm('Yakin ingin menghapus katalog ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
    
    // Fungsi search simpel di sisi client
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

    document.getElementById('searchKatalog').addEventListener('keyup', filterKatalog);
</script>
@endsection