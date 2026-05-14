@extends('layouts.superadmin')

@section('title', 'Kelola Event — JEB')
@section('header_title', 'Kelola Event')

@section('content')
<style>
    .event-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    .event-header {
        margin-bottom: 24px;
    }
    .event-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin: 0 0 4px 0;
    }
    .event-header p {
        color: #999;
        font-size: 0.85rem;
        margin: 0;
    }
    .event-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 24px;
    }
    .event-stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        border: 1px solid #f0f0f0;
    }
    .event-icon-box {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .event-icon-blue { background: #eff6ff; color: #3b82f6; }
    .event-icon-green { background: #dcfce7; color: #16a34a; }
    .event-icon-red { background: #fef2f2; color: #ef4444; }
    .event-stat-text h4 {
        margin: 0;
        font-size: 0.7rem;
        color: #999;
        text-transform: uppercase;
    }
    .event-stat-text h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }
    .event-btn-tambah {
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
    .event-btn-tambah:hover {
        background: #d4aeae;
    }
    .event-search-row {
        display: flex;
        gap: 15px;
        margin-bottom: 24px;
    }
    .event-search-box {
        flex: 1;
        position: relative;
    }
    .event-search-box input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 12px;
        border: 1px solid #e8dede;
        outline: none;
        font-size: 0.95rem;
    }
    .event-search-box .fa-search {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #eab308;
    }
    .event-btn-filter {
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
    .event-table-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        border: 1px solid #f0f0f0;
        overflow-x: auto;
    }
    .event-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }
    .event-table th {
        text-align: left;
        padding: 12px 10px;
        color: #b07d7d;
        font-weight: 600;
        border-bottom: 2px solid #f9f9f9;
    }
    .event-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #f9f9f9;
        vertical-align: middle;
    }
    .event-foto-preview {
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
    .event-foto-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .badge-selesai {
        background: #dcfce7;
        color: #16a34a;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-belum-selesai {
        background: #fef3c7;
        color: #d97706;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .event-actions a, .event-actions button {
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
    .btn-edit-event { background: #eff6ff; color: #3b82f6; }
    .btn-hapus-event { background: #fef2f2; color: #ef4444; }
    .pagination-links {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="event-wrapper">
    <div class="event-header">
        <h2>Kelola Event</h2>
        <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }} - Kelola jadwal kegiatan dan pentas</p>
    </div>

    <!-- STATS -->
    <div class="event-stats-grid">
        <div class="event-stat-card">
            <div class="event-icon-box event-icon-blue"><i class="fas fa-calendar-alt"></i></div>
            <div class="event-stat-text">
                <h4>Total Event</h4>
                <h2>{{ $totalEvent ?? 0 }}</h2>
            </div>
        </div>
        <div class="event-stat-card">
            <div class="event-icon-box event-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="event-stat-text">
                <h4>Selesai</h4>
                <h2>{{ $selesai ?? 0 }}</h2>
            </div>
        </div>
        <div class="event-stat-card">
            <div class="event-icon-box event-icon-red"><i class="fas fa-hourglass-half"></i></div>
            <div class="event-stat-text">
                <h4>Belum Selesai</h4>
                <h2>{{ $belumSelesai ?? 0 }}</h2>
            </div>
        </div>
        <a href="{{ route('superadmin.tambah-event') }}" class="event-btn-tambah">
            <span>+</span> Tambah Event
        </a>
    </div>

    <!-- SEARCH & FILTER -->
    <div class="event-search-row">
        <div class="event-search-box">
            <input type="text" id="searchEvent" placeholder="Cari event...">
            <i class="fas fa-search"></i>
        </div>
        <button class="event-btn-filter" onclick="filterEvent()"><i class="fas fa-filter"></i> Filter</button>
    </div>

    <!-- TABEL EVENT -->
    <div class="event-table-card">
        <h3>Daftar Event</h3>
        <table class="event-table" id="eventTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Lokasi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>
                        <div class="event-foto-preview">
                            @if($event->galeri && $event->galeri->file_blob)
                                <img src="data:image/jpeg;base64,{{ base64_encode($event->galeri->file_blob) }}" alt="Foto Event">
                            @else
                                <i class="fas fa-image"></i>
                            @endif
                        </div>
                    </td>
                    <td><strong>{{ $event->nama_event }}</strong></td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->jam)->format('H:i') }} WIB</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>{{ $event->kategori }}</td>
                    <td>
                        @if($event->status == 'selesai')
                            <span class="badge-selesai">Selesai</span>
                        @else
                            <span class="badge-belum-selesai">Belum Selesai</span>
                        @endif
                    </td>
                    <td class="event-actions">
                        <a href="{{ route('superadmin.event.edit', $event->id) }}" class="btn-edit-event">Edit</a>
                        <button class="btn-hapus-event" onclick="confirmDelete({{ $event->id }})">Hapus</button>
                        <form id="delete-form-{{ $event->id }}" action="{{ route('superadmin.event.destroy', $event->id) }}" method="POST" style="display:none;">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" style="text-align:center;">Belum ada data event.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination-links">
            {{ $events->links() }}
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if(confirm('Yakin ingin menghapus event ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
    function filterEvent() {
        let input = document.getElementById('searchEvent');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('eventTable');
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