@extends('layouts.superadmin')

@section('title', 'Kelola Admin')

@section('content')
    <div class="kelola-admin-wrapper">
        {{-- 1. Barisan Statistik Singkat (Sesuai gambar image_b17296.png) --}}
        <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr) auto; align-items: center;">
            <div class="stat-card">
                <div class="stat-icon biru" style="background: #e0f2fe; color: #0ea5e9;">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stat-info">
                    <p>TOTAL ADMIN</p>
                    <h2>{{ $totalAdmin ?? 5 }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon hijau" style="background: #dcfce7; color: #22c55e;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <p>AKTIF</p>
                    <h2>{{ $totalAktif ?? 5 }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon merah" style="background: #fee2e2; color: #ef4444;">
                    <i class="fas fa-ban"></i>
                </div>
                <div class="stat-info">
                    <p>NONAKTIF</p>
                    <h2>{{ $totalNonaktif ?? 0 }}</h2>
                </div>
            </div>

            {{-- Tombol Tambah Admin --}}
            <a href="{{ url('/superadmin/kelola-admin/create') }}" class="quick-card"
                style="margin: 0; padding: 15px 25px; background: #d3c4c4; border-radius: 12px; display: flex; align-items: center; gap: 10px; text-decoration: none; color: #4a3434;">
                <i class="fas fa-plus"></i>
                <strong style="font-size: 0.9rem;">Tambah Admin</strong>
            </a>
        </div>

        {{-- 2. Barisan Pencarian & Filter --}}
        <div style="display: flex; gap: 15px; margin-bottom: 25px;">
            <div style="flex: 1; position: relative;">
                <input type="text" placeholder="Cari nama Admin...."
                    style="width: 100%; padding: 12px 20px; border-radius: 25px; border: 1px solid #ddd; outline: none;">
                <i class="fas fa-search" style="position: absolute; right: 20px; top: 15px; color: #facc15;"></i>
            </div>
            <button
                style="background: #c23321; color: white; border: none; padding: 0 30px; border-radius: 12px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>

        {{-- 3. Tabel Data (Sesuai desain image_b17296.png) --}}
        <div class="card">
            <div class="card-header">
                <h3>Daftar Admin</h3>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table>
                        <thead style="background: #fdf2f2;">
                            <tr>
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>No. Handphone</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $admin->foto) }}"
                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;"></td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->no_hp ?? '081234567890' }}</td>
                                    <td><span class="badge badge-aktif">Aktif</span></td>
                                    <td>
                                        <a href="#"
                                            style="color: #8eaec9; text-decoration: none; font-size: 0.75rem; background: #f0f4f8; padding: 4px 8px; border-radius: 4px;">Edit</a>
                                        <a href="#"
                                            style="color: #e59a9a; text-decoration: none; font-size: 0.75rem; background: #fdf2f2; padding: 4px 8px; border-radius: 4px; margin-left: 5px;">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Footer Tabel & Pagination --}}
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <span style="color: #8a7070; font-size: 0.8rem;">Menampilkan 5 dari 5 admin</span>
                    <div style="display: flex; gap: 5px;">
                        <button class="action-btn"><i class="fas fa-chevron-left"></i></button>
                        <button class="action-btn" style="background: var(--merah-gelap); color: white;">1</button>
                        <button class="action-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection