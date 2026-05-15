@extends('layouts.superadmin')

@section('title', 'Log Aktivitas — JEB')
@section('header_title', 'Log Aktivitas')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    /* ===== CONTAINER ===== */
    .log-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    /* ===== HEADER ===== */
    .log-header {
        margin-bottom: 24px;
    }
    .log-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #333;
        margin: 0 0 4px 0;
    }
    .log-header p {
        color: #999;
        font-size: 0.85rem;
        margin: 0;
    }

    /* ===== STATS GRID (3 KOLOM + TOMBOL, TAPI TOMBOL TIDAK DIPERLUKAN, JADI 3 KOLOM) ===== */
    .log-stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 24px;
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
    }
    .log-icon-box {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .log-icon-blue { background: #eff6ff; color: #3b82f6; }
    .log-icon-green { background: #f0fdf4; color: #16a34a; }
    .log-icon-orange { background: #fff7ed; color: #f97316; }
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

    /* ===== SEARCH & FILTER (SAMA SEPERTI KELOLA ADMIN) ===== */
    .log-search-row {
        display: flex;
        gap: 15px;
        margin-bottom: 24px;
    }
    .log-search-box {
        flex: 1;
        position: relative;
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
        font-size: 1.2rem;
    }
    .log-btn-filter {
        background: #b91c1c;
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
    }

    /* ===== TABEL ===== */
    .log-table-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        border: 1px solid #f0f0f0;
        overflow-x: auto;
    }
    .log-table-card h3 {
        margin: 0 0 20px 0;
        font-size: 1.1rem;
        color: #333;
    }
    .log-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }
    .log-table th {
        text-align: left;
        padding: 12px 10px;
        color: #b07d7d;
        font-weight: 600;
        font-size: 0.85rem;
        border-bottom: 2px solid #f9f9f9;
    }
    .log-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #f9f9f9;
        vertical-align: middle;
        font-size: 0.85rem;
    }
    .badge-user {
        background: #e2c0c0;
        color: #5a1a1a;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    .ip-badge {
        font-family: monospace;
        background: #f0f0f0;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 0.7rem;
    }
    .log-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }
    .log-pagination p {
        font-size: 0.8rem;
        color: #999;
        margin: 0;
    }
    .log-page-controls {
        display: flex;
        gap: 5px;
    }
    .log-page-controls a, .log-page-controls span {
        border: 1px solid #eee;
        background: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        color: #333;
        font-size: 0.8rem;
    }
    .log-page-controls a.active, .log-page-controls span.active {
        background: #5B1A1A;
        color: #fff;
        border: none;
        font-weight: 700;
    }
</style>

<div class="log-wrapper">
    <!-- HEADER -->
    <div class="log-header">
        <h2>Log Aktivitas</h2>
        <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }} - Pantau aktivitas pengguna sistem</p>
    </div>

    <!-- STATS CARD (3 KOLOM) -->
    <div class="log-stats-grid">
        <div class="log-stat-card">
            <div class="log-icon-box log-icon-blue"><i class="fas fa-chart-line"></i></div>
            <div class="log-stat-text">
                <h4>Total Aktivitas</h4>
                <h2>{{ $totalAktivitas ?? 0 }}</h2>
            </div>
        </div>
        <div class="log-stat-card">
            <div class="log-icon-box log-icon-green"><i class="fas fa-calendar-day"></i></div>
            <div class="log-stat-text">
                <h4>Hari Ini</h4>
                <h2>{{ $aktivitasHariIni ?? 0 }}</h2>
            </div>
        </div>
        <div class="log-stat-card">
            <div class="log-icon-box log-icon-orange"><i class="fas fa-calendar-alt"></i></div>
            <div class="log-stat-text">
                <h4>Bulan Ini</h4>
                <h2>{{ $aktivitasBulanIni ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <!-- SEARCH & FILTER (SAMA DENGAN KELOLA ADMIN) -->
    <form method="GET" action="{{ route('superadmin.log-aktivitas') }}" class="log-search-row">
        <div class="log-search-box">
            <input type="text" name="search" placeholder="Cari aktivitas atau deskripsi..." value="{{ request('search') }}">
            <i class="fas fa-search"></i>
        </div>
        <button type="submit" class="log-btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
        <a href="{{ route('superadmin.log-aktivitas') }}" class="log-btn-filter" style="background: #6c757d; text-decoration: none;">
            <i class="fas fa-undo"></i> Reset
        </a>
    </form>

    <!-- TABEL LOG -->
    <div class="log-table-card">
        <h3>Riwayat Aktivitas</h3>
        <table class="log-table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>User</th>
                    <th>Aktivitas</th>
                    <th>Deskripsi</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                    <td><span class="badge-user">{{ $log->user ? $log->user->name : 'Sistem' }}</span></td>
                    <td><strong>{{ $log->aktivitas }}</strong></td>
                    <td>{{ Str::limit($log->deskripsi ?? '-', 100) }}</td>
                    <td><span class="ip-badge">{{ $log->ip_address ?? '-' }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada aktivitas tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- PAGINATION -->
        <div class="log-pagination">
            <p>Menampilkan {{ $logs->firstItem() ?? 0 }} - {{ $logs->lastItem() ?? 0 }} dari {{ $logs->total() ?? 0 }} aktivitas</p>
            <div class="log-page-controls">
                {{ $logs->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection