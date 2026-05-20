@extends('layouts.superadmin')

@section('title', 'Log Aktivitas — JEB')
@section('header_title', 'Log Aktivitas')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .log-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    
    /* Top Row Layout (Stat Card + Search + Filter sejajar) */
    .log-top-row {
        display: flex;
        gap: 15px;
        margin-bottom: 24px;
        align-items: stretch;
    }
    
    .log-stat-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        border: 1px solid #f0f0f0;
        min-width: 260px; /* Lebar stat card disesuaikan */
    }
    .log-icon-box {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        background: #eff6ff; 
        color: #3b82f6;
    }
    .log-stat-text h4 {
        margin: 0;
        font-size: 0.7rem;
        color: #999;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .log-stat-text h2 {
        margin: 0;
        font-size: 1.5rem;
        color: #333;
        font-weight: 700;
    }

    .log-search-box {
        flex: 1; /* Mengisi sisa ruang kosong di tengah */
        position: relative;
        display: flex;
    }
    .log-search-box input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 12px;
        border: 1px solid #e8dede;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
        background: #fff;
    }
    .log-search-box .fa-search {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #eab308;
        font-size: 1.3rem;
    }
    
    .log-btn-filter {
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
    .log-table-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px 0; /* Padding atas bawah saja */
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        border: 1px solid #f0f0f0;
        overflow-x: auto;
    }
    .log-table-card h3 {
        margin: 0 0 20px 0;
        padding: 0 25px; /* Margin kiri kanan untuk judul */
        font-size: 1.1rem;
        color: #333;
    }
    .log-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }
    .log-table thead {
        background-color: #F5EBEB; /* Blok warna pada header tabel */
    }
    .log-table th {
        text-align: left;
        padding: 14px 25px;
        color: #b07d7d;
        font-weight: 600;
        font-size: 0.85rem;
        border-bottom: none;
    }
    .log-table td {
        padding: 15px 25px;
        border-bottom: 1px solid #E0E0E0; /* Menggelapkan garis tabel */
        vertical-align: middle;
        font-size: 0.85rem;
        color: #333;
    }
    
    /* Penyesuaian Pagination */
    .log-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
        padding: 0 25px;
    }
    .log-pagination p {
        font-size: 0.85rem;
        color: #b07d7d;
        margin: 0;
        font-weight: 500;
    }
    .log-page-controls {
        display: flex;
        gap: 8px;
    }
    .log-page-controls a, .log-page-controls span {
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
    .log-page-controls a:hover {
        background: #f5ebeb;
        border-color: #d4aeae;
    }
    .log-page-controls span.active {
        background: #5B1A1A;
        color: #fff;
        border-color: #5B1A1A;
        font-weight: 700;
    }
    .log-page-controls span.disabled {
        color: #ccc;
        cursor: not-allowed;
        background: #fdfdfd;
    }
</style>

<div class="log-wrapper">

    <div class="log-top-row">
        <div class="log-stat-card">
            <div class="log-icon-box"><i class="fas fa-user"></i></div>
            <div class="log-stat-text">
                <h4>Total Aktivitas</h4>
                <h2>{{ $totalAktivitas ?? 0 }}</h2>
            </div>
        </div>

        <form method="GET" action="{{ route('superadmin.log-aktivitas') ?? '#' }}" class="log-search-box">
            <input type="text" name="search" placeholder="Cari aktivitas...." value="{{ request('search') }}" id="searchLog">
            <i class="fas fa-search"></i>
        </form>

        <button type="submit" class="log-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </div>

    <div class="log-table-card">
        <h3>Daftar Aktivitas</h3>
        <table class="log-table" id="logTable">
            <thead>
                <tr>
                    <th>Aktivitas</th>
                    <th>Aktor</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                {{-- Pastikan variabel $logs dikirim dari controller --}}
                @forelse($logs ?? [] as $log)
                <tr>
                    {{-- Sesuaikan properti objek ini dengan struktur database-mu --}}
                    <td>{{ $log->aktivitas ?? 'Menambahkan Data' }}</td>
                    <td><strong style="color:#000;">{{ $log->aktor ?? ($log->user->name ?? 'Admin 1') }}</strong></td>
                    
                    {{-- Format waktu sesuai di desain: Senin/1/Januari-00:00:00 --}}
                    <td>{{ \Carbon\Carbon::parse($log->created_at)->translatedFormat('l/j/F-H:i:s') }}</td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center">Belum ada aktivitas tercatat.</td></tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="log-pagination">
            <p>Menampilkan {{ isset($logs) && $logs instanceof \Illuminate\Pagination\LengthAwarePaginator ? $logs->firstItem() : 0 }} dari {{ isset($logs) && $logs instanceof \Illuminate\Pagination\LengthAwarePaginator ? $logs->total() : 0 }} aktivitas</p>
            <div class="log-page-controls">
                @if (isset($logs) && $logs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    @if ($logs->onFirstPage())
                        <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                    @else
                        <a href="{{ $logs->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                    @endif

                    <span class="active">{{ $logs->currentPage() }}</span>

                    @if ($logs->hasMorePages())
                        <a href="{{ $logs->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                    @else
                        <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    // Fitur pencarian instan di frontend (Opsional)
    document.getElementById('searchLog').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#logTable tbody tr');
        
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection