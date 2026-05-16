@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header_title', 'Dashboard Admin')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="dashboard-wrapper">
        {{-- STATS GRID --}}
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <p>Event Aktif</p>
                    <h2>{{ $activeEvents ?? 0 }}</h2>
                    <div class="stat-change up"><i class="fas fa-caret-up"></i> {{ $newEventsThisMonth ?? 0 }} bulan ini
                    </div>
                </div>
                <div class="stat-icon emas">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p>Total Event</p>
                    <h2>{{ $totalEvents ?? 0 }}</h2>
                    <div class="stat-change up"><i class="fas fa-caret-up"></i> {{ $newEventsThisMonth ?? 0 }} bulan ini
                    </div>
                </div>
                <div class="stat-icon merah">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p>Total Berita</p>
                    <h2>{{ $totalBerita ?? 0 }}</h2>
                    <div class="stat-change up"><i class="fas fa-caret-up"></i> {{ $newBeritaThisMonth ?? 0 }} bulan ini
                    </div>
                </div>
                <div class="stat-icon merah">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p>Berita Tayang</p>
                    <h2>{{ $beritaTayang ?? 0 }}</h2>
                    <div class="stat-change up"><i class="fas fa-caret-up"></i> aktif ditayangkan</div>
                </div>
                <div class="stat-icon emas">
                    <i class="fas fa-rss"></i>
                </div>
            </div>
        </div>

        {{-- QUICK ACCESS --}}
        <div class="quick-grid">
            <a class="quick-card" href="{{ url('/superadmin/kelola-event') }}">
                <div class="quick-icon"><i class="fas fa-calendar-plus" style="color: #16a34a;"></i></div>
                <p>Kelola Event</p>
                <span>Tambah & atur kegiatan</span>
            </a>

            <a class="quick-card" href="{{ url('/superadmin/kelola-berita') }}">
                <div class="quick-icon"><i class="fas fa-newspaper" style="color: var(--merah);"></i></div>
                <p>Kelola Berita</p>
                <span>Tulis & publish berita</span>
            </a>

            <a class="quick-card" href="{{ url('/superadmin/kelola-profil') }}">
                <div class="quick-icon"><i class="fas fa-user-circle" style="color: var(--emas);"></i></div>
                <p>Kelola Profil</p>
                <span>Update profil sanggar</span>
            </a>
        </div>

        <div class="grid-2">
            {{-- TABEL EVENT TERBARU --}}
            <div class="card">
                <div class="card-header">
                    <h3>Event Terbaru</h3>
                    <a href="{{ url('/superadmin/kelola-event') }}"
                        style="text-decoration: none; color: var(--merah); font-weight: 700;">Kelola Semua <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Nama Event</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestEvents ?? [] as $event)
                                    <tr>
                                        <td><strong>{{ $event->nama }}</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                                        <td>
                                            @if($event->status == 'belum selesai')
                                                <span class="badge badge-aktif">Aktif</span>
                                            @else
                                                <span class="badge badge-nonaktif">Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Belum ada data event.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- BERITA TERBARU --}}
            <div class="card">
                <div class="card-header">
                    <h3>Berita Terbaru</h3>
                    <a href="{{ url('/superadmin/kelola-berita') }}"
                        style="text-decoration: none; color: var(--merah); font-weight: 700;">Kelola Semua <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        @forelse($latestBerita ?? [] as $berita)
                            <div class="activity-item">
                                <div class="act-dot-wrap">
                                    <div class="act-dot merah"></div>
                                    <div class="act-line"></div>
                                </div>
                                <div class="act-content">
                                    <p><strong>{{ $berita->judul }}</strong></p>
                                    <span>
                                        @if($berita->status == 'tayang')
                                            <span class="badge badge-aktif">Tayang</span>
                                        @else
                                            <span class="badge badge-nonaktif">Tidak Tayang</span>
                                        @endif
                                        · {{ $berita->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="activity-item">Belum ada berita.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection