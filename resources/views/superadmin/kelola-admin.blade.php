@extends('layouts.superadmin')

@section('title', 'Kelola Admin — JEB')
@section('header_title', 'Kelola Admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h2 style="font-family: 'Playfair Display'; font-size: 1.5rem; color: var(--teks);">Kelola Admin</h2>
        <p style="color: var(--teks-abu); font-size: 0.85rem;">5 admin terdaftar dalam sistem</p>
    </div>
    <button style="background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 8px;">
        <span style="font-size: 1.2rem;">+</span> Tambah Admin
    </button>
</div>

<div class="stats-grid" style="grid-template-columns: repeat(4, 1fr); margin-bottom: 28px;">
    <div class="stat-card">
        <div class="stat-icon merah" style="margin-right: 15px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--merah)" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        </div>
        <div class="stat-info">
            <p>TOTAL ADMIN</p>
            <h2 style="font-size: 1.8rem;">5</h2>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon hijau" style="margin-right: 15px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <div class="stat-info">
            <p>AKTIF</p>
            <h2 style="font-size: 1.8rem;">3</h2>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon emas" style="margin-right: 15px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--emas)" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div class="stat-info">
            <p>PENDING</p>
            <h2 style="font-size: 1.8rem;">1</h2>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon biru" style="margin-right: 15px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
        </div>
        <div class="stat-info">
            <p>NONAKTIF</p>
            <h2 style="font-size: 1.8rem;">1</h2>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" style="border-bottom: none; padding-bottom: 0;">
        <h3>Daftar Admin</h3>
        <div style="display: flex; gap: 10px;">
            <input type="text" placeholder="Cari admin..." style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; width: 200px;">
            <select style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; color: var(--teks-abu);">
                <option>Semua Status</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>ADMIN</th>
                        <th>EMAIL</th>
                        <th>TGL DIBUAT</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #5a0000; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">RP</div>
                                <div>
                                    <div style="font-weight: 700;">Rizky Pratama</div>
                                    <div style="font-size: 0.7rem; color: var(--teks-abu);">Admin</div>
                                </div>
                            </div>
                        </td>
                        <td>rizky@jeb.id</td>
                        <td>12 Jan 2026</td>
                        <td><span class="badge badge-aktif">Aktif</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Nonaktifkan</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #2563eb; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">DL</div>
                                <div>
                                    <div style="font-weight: 700;">Dewi Lestari</div>
                                    <div style="font-size: 0.7rem; color: var(--teks-abu);">Admin</div>
                                </div>
                            </div>
                        </td>
                        <td>dewi@jeb.id</td>
                        <td>15 Jan 2026</td>
                        <td><span class="badge badge-aktif">Aktif</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Nonaktifkan</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #16a34a; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">BN</div>
                                <div>
                                    <div style="font-weight: 700;">Bagas Nugroho</div>
                                    <div style="font-size: 0.7rem; color: var(--teks-abu);">Admin</div>
                                </div>
                            </div>
                        </td>
                        <td>bagas@jeb.id</td>
                        <td>01 Feb 2026</td>
                        <td><span class="badge badge-pending">Pending</span></td>
                        <td>
                            <button class="action-btn">Aktivasi</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--emas); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">SW</div>
                                <div>
                                    <div style="font-weight: 700;">Sari Wulandari</div>
                                    <div style="font-size: 0.7rem; color: var(--teks-abu);">Admin</div>
                                </div>
                            </div>
                        </td>
                        <td>sari@jeb.id</td>
                        <td>20 Des 2025</td>
                        <td><span class="badge badge-nonaktif">Nonaktif</span></td>
                        <td>
                            <button class="action-btn">Aktifkan</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #f5eeee;">
            <p style="font-size: 0.75rem; color: var(--teks-abu);">Menampilkan 5 dari 5 admin</p>
            <div style="display: flex; gap: 5px;">
                <button style="padding: 5px 10px; border: 1px solid var(--abu-border); background: #fff; border-radius: 6px; cursor: pointer;">&lsaquo;</button>
                <button style="padding: 5px 10px; border: none; background: var(--merah); color: #fff; border-radius: 6px; cursor: pointer; font-weight: 700;">1</button>
                <button style="padding: 5px 10px; border: 1px solid var(--abu-border); background: #fff; border-radius: 6px; cursor: pointer;">&rsaquo;</button>
            </div>
        </div>
    </div>
</div>
@endsection