@extends('layouts.superadmin')

@section('title', 'Kelola Berita — JEB')
@section('header_title', 'Kelola Berita')

@section('content')
<style>
    .berita-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    .berita-header {
        margin-bottom: 24px;
    }
    .berita-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin: 0 0 4px 0;
    }
    .berita-header p {
        color: #999;
        font-size: 0.85rem;
        margin: 0;
    }

    /* STATS GRID */
    .berita-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 24px;
    }
    .berita-stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        border: 1px solid #f0f0f0;
    }
    .berita-icon-box {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .berita-icon-blue { background: #eff6ff; color: #3b82f6; }
    .berita-icon-green { background: #dcfce7; color: #16a34a; }
    .berita-icon-red { background: #fef2f2; color: #ef4444; }
    .berita-stat-text h4 {
        margin: 0;
        font-size: 0.7rem;
        color: #999;
        text-transform: uppercase;
    }
    .berita-stat-text h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }
    .berita-btn-tambah {
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
    .berita-btn-tambah:hover {
        background: #d4aeae;
    }

    /* SEARCH & FILTER */
    .berita-search-row {
        display: flex;
        gap: 15px;
        margin-bottom: 24px;
    }
    .berita-search-box {
        flex: 1;
        position: relative;
    }
    .berita-search-box input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 12px;
        border: 1px solid #e8dede;
        outline: none;
        font-size: 0.95rem;
    }
    .berita-search-box .fa-search {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #eab308;
    }
    .berita-btn-filter {
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

    /* TABEL BERITA */
    .berita-table-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        border: 1px solid #f0f0f0;
        overflow-x: auto;
    }
    .berita-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }
    .berita-table th {
        text-align: left;
        padding: 12px 10px;
        color: #b07d7d;
        font-weight: 600;
        border-bottom: 2px solid #f9f9f9;
    }
    .berita-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #f9f9f9;
        vertical-align: middle;
    }
    .berita-foto {
        width: 50px;
        height: 40px;
        background: #ddd;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .berita-foto img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .badge-tayang {
        background: #dcfce7;
        color: #16a34a;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-draft {
        background: #fef3c7;
        color: #d97706;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .berita-actions a, .berita-actions button {
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
    .btn-edit-berita { background: #eff6ff; color: #3b82f6; }
    .btn-hapus-berita { background: #fef2f2; color: #ef4444; }
    .pagination-links {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="berita-wrapper">
    <div class="berita-header">
        <h2>Kelola Berita</h2>
        <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }} - Kelola artikel dan informasi sanggar</p>
    </div>

    <!-- STATS -->
    <div class="berita-stats-grid">
        <div class="berita-stat-card">
            <div class="berita-icon-box berita-icon-blue"><i class="fas fa-newspaper"></i></div>
            <div class="berita-stat-text">
                <h4>Total Berita</h4>
                <h2>{{ $beritas->total() }}</h2>
            </div>
        </div>
        <div class="berita-stat-card">
            <div class="berita-icon-box berita-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="berita-stat-text">
                <h4>Tayang</h4>
                <h2>{{ \App\Models\Berita::where('status', 'tayang')->count() }}</h2>
            </div>
        </div>
        <div class="berita-stat-card">
            <div class="berita-icon-box berita-icon-red"><i class="fas fa-ban"></i></div>
            <div class="berita-stat-text">
                <h4>Tidak Ditayangkan</h4>
                <h2>{{ \App\Models\Berita::where('status', 'tidak ditayangkan')->count() }}</h2>
            </div>
        </div>
        <a href="{{ url('/superadmin/publikasi-berita') }}" class="berita-btn-tambah">
            <span>+</span> Tambah Berita
        </a>
    </div>

    <!-- SEARCH & FILTER (opsional) -->
    <div class="berita-search-row">
        <div class="berita-search-box">
            <input type="text" id="searchBerita" placeholder="Cari berita...">
            <i class="fas fa-search"></i>
        </div>
        <button class="berita-btn-filter" onclick="filterBerita()"><i class="fas fa-filter"></i> Filter</button>
    </div>

    <!-- TABEL BERITA -->
    <div class="berita-table-card">
        <h3>Daftar Berita</h3>
        <table class="berita-table" id="beritaTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Isi Berita (Preview)</th>
                    <th>Penulis</th>
                    <th>Tanggal Terbit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                <tr>
                    <td>
                        <div class="berita-foto">
                            @if($berita->galeri && $berita->galeri->file_blob)
                                <img src="data:image/jpeg;base64,{{ base64_encode($berita->galeri->file_blob) }}" alt="Foto Berita">
                            @else
                                <i class="fas fa-image"></i>
                            @endif
                        </div>
                    </td>
                    <td><strong>{{ $berita->judul }}</strong></td>
                    <td>{{ Str::limit(strip_tags($berita->isi_berita), 80) }}</td>
                    <td>{{ $berita->user->name ?? 'Admin' }}</td>
                    <td>{{ $berita->tgl_terbit ? \Carbon\Carbon::parse($berita->tgl_terbit)->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if($berita->status == 'tayang')
                            <span class="badge-tayang">Tayang</span>
                        @else
                            <span class="badge-draft">Draft</span>
                        @endif
                    </td>
                    <td class="berita-actions">
                        <a href="{{ url('/superadmin/berita/edit/'.$berita->id) }}" class="btn-edit-berita">Edit</a>
                        <button class="btn-hapus-berita" onclick="confirmDelete({{ $berita->id }})">Hapus</button>
                        <form id="delete-form-{{ $berita->id }}" action="{{ url('/superadmin/berita/delete/'.$berita->id) }}" method="POST" style="display:none;">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;">Belum ada data berita. <a href="{{ url('/superadmin/publikasi-berita') }}" style="color:#b91c1c;">Tambah berita sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination-links">
            {{ $beritas->links() }}
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if(confirm('Yakin ingin menghapus berita ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
    function filterBerita() {
        let input = document.getElementById('searchBerita');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('beritaTable');
        let rows = table.getElementsByTagName('tr');
        for (let i = 1; i < rows.length; i++) {
            let judulCell = rows[i].getElementsByTagName('td')[1];
            if (judulCell) {
                let txtValue = judulCell.textContent || judulCell.innerText;
                rows[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        }
    }
</script>
@endsection