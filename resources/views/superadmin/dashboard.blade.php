@extends('layouts.superadmin')

@section('title', 'Dashboard Super Admin')
@section('header_title', 'Dashboard Super Admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="dashboard-wrapper">
    {{-- STATS GRID --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <p>Total Admin</p>
                <h2>{{ $totalAdmin ?? 0 }}</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> +{{ $newAdminThisMonth ?? 0 }} bulan ini</div>
            </div>
            <div class="stat-icon merah">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <p>Total Katalog</p>
                <h2>{{ $totalKatalog ?? 0 }}</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> {{ $newKatalogThisMonth ?? 0 }} item baru</div>
            </div>
            <div class="stat-icon emas">
                <i class="fas fa-book"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <p>Event Aktif</p>
                <h2>{{ $activeEvents ?? 0 }}</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> {{ $newEventsThisMonth ?? 0 }} bulan ini</div>
            </div>
            <div class="stat-icon emas">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <p>Total Berita</p>
                <h2>{{ $totalBerita ?? 0 }}</h2>
                <div class="stat-change up"><i class="fas fa-caret-up"></i> {{ $newBeritaThisMonth ?? 0 }} bulan ini</div>
            </div>
            <div class="stat-icon merah">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>

    {{-- QUICK ACCESS --}}
    <div class="quick-grid">
        <a class="quick-card" href="{{ url('/superadmin/kelola-admin') }}">
            <div class="quick-icon"><i class="fas fa-user-plus" style="color: var(--merah);"></i></div>
            <p>Tambah Admin</p>
            <span>Buat akun baru</span>
        </a>
        
        <a class="quick-card" href="{{ url('/superadmin/kelola-katalog') }}">
            <div class="quick-icon"><i class="fas fa-folder-plus" style="color: var(--emas);"></i></div>
            <p>Tambah Katalog</p>
            <span>Upload tari baru</span>
        </a>

        <a class="quick-card" href="{{ url('/superadmin/kelola-event') }}">
            <div class="quick-icon"><i class="fas fa-calendar-plus" style="color: #16a34a;"></i></div>
            <p>Buat Event</p>
            <span>Jadwalkan kegiatan</span>
        </a>

        <a class="quick-card" href="{{ url('/superadmin/kelola-profil') }}">
            <div class="quick-icon"><i class="fas fa-user-circle" style="color: var(--merah-muda);"></i></div>
            <p>Kelola Profil</p>
            <span>Update Data Diri</span>
        </a>
    </div>

    <div class="grid-2">
        {{-- TABEL ADMIN TERBARU --}}
        <div class="card">
            <div class="card-header">
                <h3>Daftar Admin Terbaru</h3>
                <a href="{{ url('/superadmin/kelola-admin') }}" style="text-decoration: none; color: var(--merah); font-weight: 700;">Kelola Semua <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestAdmins ?? [] as $admin)
                            <tr>
                                <td><strong>{{ $admin->name }}</strong></td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    @if($admin->status == 'aktif')
                                        <span class="badge badge-aktif">Aktif</span>
                                    @else
                                        <span class="badge badge-nonaktif">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/superadmin/kelola-admin/edit/'.$admin->id) }}" class="action-btn">Edit</a>
                                    <a href="#" class="action-btn" onclick="event.preventDefault(); if(confirm('Hapus admin ini?')) document.getElementById('delete-form-{{ $admin->id }}').submit();">Hapus</a>
                                    <form id="delete-form-{{ $admin->id }}" action="{{ url('/superadmin/kelola-admin/delete/'.$admin->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4">Belum ada data admin.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- AKTIVITAS TERBARU --}}
        <div class="card">
            <div class="card-header">
                <h3>Aktivitas Terbaru</h3>
                <a href="{{ url('/superadmin/log-aktivitas') }}" style="text-decoration: none; color: var(--merah); font-weight: 700;">Lihat Semua <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    @forelse($recentActivities ?? [] as $activity)
                    <div class="activity-item">
                        <div class="act-dot-wrap">
                            <div class="act-dot merah"></div>
                            <div class="act-line"></div>
                        </div>
                        <div class="act-content">
                            <p><strong>{{ $activity->user->name ?? 'Sistem' }}</strong> {{ $activity->aktivitas }}</p>
                            <span>{{ $activity->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="activity-item">Belum ada aktivitas.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection