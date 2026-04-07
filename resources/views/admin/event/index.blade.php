@extends('layouts.admin')

@section('title', 'Kelola Event')

@section('header', 'Kelola Event')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .event-container {
        font-family: 'Poppins', sans-serif;
    }

    /* --- TOP SECTION --- */
    .event-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 25px;
    }
    .event-summary p {
        color: #8a7070;
        font-size: 0.85rem;
        margin: 0;
    }
    .btn-tambah {
        background: var(--merah-gelap);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: 0.3s;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .btn-tambah:hover {
        background: var(--merah);
        box-shadow: 0 4px 12px rgba(139,0,0,0.2);
    }

    /* --- STATS MINI CARDS --- */
    .event-stats-row {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
    }
    .stat-mini {
        background: white;
        padding: 15px 20px;
        border-radius: 12px;
        border: 1px solid var(--abu-border);
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 200px;
    }
    .stat-mini-icon {
        width: 40px;
        height: 40px;
        background: #fdf5f5;
        color: var(--merah);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .stat-mini-info h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
    }
    .stat-mini-info p {
        margin: 0;
        font-size: 0.75rem;
        color: #999;
    }

    /* --- TABLE CARD --- */
    .table-card {
        background: white;
        border-radius: 18px;
        border: 1px solid var(--abu-border);
        overflow: hidden;
    }
    .table-header {
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid var(--abu-bg);
    }
    .table-header h3 { font-size: 1.1rem; font-weight: 700; margin: 0; }
    
    .select-status {
        padding: 8px 15px;
        border-radius: 8px;
        border: 1px solid var(--abu-border);
        font-size: 0.85rem;
        color: var(--teks);
        outline: none;
    }

    /* --- DATA TABLE --- */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background: #fdfaf7; /* Warna kecoklatan muda sesuai desain */
        text-align: left;
        padding: 15px 25px;
        font-size: 0.85rem;
        color: #8B4513;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    td {
        padding: 18px 25px;
        border-bottom: 1px solid #f5f0f0;
        font-size: 0.9rem;
        color: #444;
    }
    .event-name { font-weight: 600; color: #1a0000; }
    
    /* Status Badges */
    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
    }
    .badge-upcoming { background: #f3e5f5; color: #9c27b0; }
    .badge-selesai { background: #e0f2f1; color: #00897b; }

    /* Action Buttons */
    .btn-action {
        background: none;
        border: 1px solid var(--abu-border);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
        color: #777;
        text-decoration: none;
        transition: 0.2s;
        margin-right: 5px;
    }
    .btn-action:hover {
        background: #f5f5f5;
        color: var(--teks);
        border-color: #999;
    }
</style>

<div class="event-container">
    <div class="event-header">
        <div class="event-summary">
            <p>Manajemen jadwal event dan pentas</p>
        </div>
        <a href="#" class="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Event
        </a>
    </div>

    <div class="event-stats-row">
        @for($i=0; $i<4; $i++)
        <div class="stat-mini">
            <div class="stat-mini-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-mini-info">
                <h4>Pentas Gandrung</h4>
                <p>Pendopo BWI</p>
            </div>
        </div>
        @endfor
    </div>

    <div class="table-card">
        <div class="table-header">
            <h3>Semua Event</h3>
            <select class="select-status">
                <option>Semua Status</option>
                <option>Upcoming</option>
                <option>Selesai</option>
            </select>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $events = [
                        ['Pentas Tari Gandrung', '10 Mar 2026', 'Pendopo Banyuwangi', '19.00 WIB', 'Upcoming'],
                        ['Pentas Tari Gandrung', '10 Mar 2026', 'Pendopo Banyuwangi', '19.00 WIB', 'Upcoming'],
                        ['Pentas Tari Gandrung', '10 Mar 2026', 'Pendopo Banyuwangi', '19.00 WIB', 'Upcoming'],
                        ['Pentas Tari Gandrung', '10 Mar 2026', 'Pendopo Banyuwangi', '19.00 WIB', 'Upcoming'],
                        ['Pentas Tari Gandrung', '10 Mar 2026', 'Pendopo Banyuwangi', '19.00 WIB', 'Selesai'],
                    ];
                @endphp

                @foreach($events as $event)
                <tr>
                    <td class="event-name">{{ $event[0] }}</td>
                    <td>{{ $event[1] }}</td>
                    <td>{{ $event[2] }}</td>
                    <td>{{ $event[3] }}</td>
                    <td>
                        <span class="badge {{ $event[4] == 'Upcoming' ? 'badge-upcoming' : 'badge-selesai' }}">
                            {{ $event[4] }}
                        </span>
                    </td>
                    <td>
                        <a href="#" class="btn-action">Edit</a>
                        <a href="#" class="btn-action">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection