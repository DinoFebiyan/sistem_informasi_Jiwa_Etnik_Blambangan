@extends('layouts.superadmin')

@section('title', 'Dashboard Super Admin')

@section('content')

<!-- STAT CARDS -->
<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-info">
      <p>Total Admin</p>
      <h2>5</h2>
      <div class="stat-change up">▲ 1 bulan ini</div>
    </div>
    <div class="stat-icon merah">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8B0000" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
    </div>
  </div>

  <div class="stat-card">
    <div class="stat-info">
      <p>Katalog Tari</p>
      <h2>24</h2>
      <div class="stat-change up">▲ 3 item baru</div>
    </div>
    <div class="stat-icon emas">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c9991a" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
    </div>
  </div>

  <div class="stat-card">
    <div class="stat-info">
      <p>Event Aktif</p>
      <h2>7</h2>
      <div class="stat-change up">▲ 2 event baru</div>
    </div>
    <div class="stat-icon hijau">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
    </div>
  </div>

  <div class="stat-card">
    <div class="stat-info">
      <p>Pengunjung Web</p>
      <h2>1.2K</h2>
      <div class="stat-change up">▲ 18% minggu ini</div>
    </div>
    <div class="stat-icon biru">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
    </div>
  </div>
</div>

<!-- QUICK ACCESS -->
<div class="quick-grid">
  <a class="quick-card" href="#">
    <div class="quick-icon">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8B0000" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
    </div>
    <p>Tambah Admin</p>
    <span>Buat akun baru</span>
  </a>
  <a class="quick-card" href="#">
    <div class="quick-icon">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c9991a" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
    </div>
    <p>Tambah Katalog</p>
    <span>Upload tari baru</span>
  </a>
  <a class="quick-card" href="#">
    <div class="quick-icon">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="12" y1="9" x2="12" y2="15"/><line x1="9" y1="12" x2="15" y2="12"/></svg>
    </div>
    <p>Buat Event</p>
    <span>Jadwalkan kegiatan</span>
  </a>
  <a class="quick-card" href="#">
    <div class="quick-icon">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 010 14.14M4.93 4.93a10 10 0 000 14.14"/></svg>
    </div>
    <p>Pengaturan</p>
    <span>Konfigurasi sistem</span>
  </a>
</div>

<!-- TABLE + ACTIVITY -->
<div class="grid-2">

  <!-- Tabel Admin -->
  <div class="card">
    <div class="card-header">
      <h3>Daftar Admin</h3>
      <span>Kelola Semua →</span>
    </div>
    <div class="card-body">
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Rizky Pratama</strong></td>
              <td>rizky@jeb.id</td>
              <td><span class="badge badge-aktif">Aktif</span></td>
              <td><button class="action-btn">Edit</button></td>
            </tr>
            <tr>
              <td><strong>Dewi Lestari</strong></td>
              <td>dewi@jeb.id</td>
              <td><span class="badge badge-aktif">Aktif</span></td>
              <td><button class="action-btn">Edit</button></td>
            </tr>
            <tr>
              <td><strong>Bagas Nugroho</strong></td>
              <td>bagas@jeb.id</td>
              <td><span class="badge badge-pending">Pending</span></td>
              <td><button class="action-btn">Edit</button></td>
            </tr>
            <tr>
              <td><strong>Sari Wulandari</strong></td>
              <td>sari@jeb.id</td>
              <td><span class="badge badge-nonaktif">Nonaktif</span></td>
              <td><button class="action-btn">Edit</button></td>
            </tr>
            <tr>
              <td><strong>Andi Kurniawan</strong></td>
              <td>andi@jeb.id</td>
              <td><span class="badge badge-aktif">Aktif</span></td>
              <td><button class="action-btn">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Aktivitas Terbaru -->
  <div class="card">
    <div class="card-header">
      <h3>Aktivitas Terbaru</h3>
      <span>Lihat Semua →</span>
    </div>
    <div class="card-body">
      <div class="activity-list">
        <div class="activity-item">
          <div class="act-dot-wrap">
            <div class="act-dot merah"></div>
            <div class="act-line"></div>
          </div>
          <div class="act-content">
            <p><strong>Admin baru</strong> ditambahkan — Rizky Pratama</p>
            <span>2 jam yang lalu</span>
          </div>
        </div>
        <div class="activity-item">
          <div class="act-dot-wrap">
            <div class="act-dot emas"></div>
            <div class="act-line"></div>
          </div>
          <div class="act-content">
            <p>Katalog <strong>Tari Seblang</strong> diperbarui</p>
            <span>5 jam yang lalu</span>
          </div>
        </div>
        <div class="activity-item">
          <div class="act-dot-wrap">
            <div class="act-dot hijau"></div>
            <div class="act-line"></div>
          </div>
          <div class="act-content">
            <p>Event <strong>Festival Gandrung</strong> dipublikasikan</p>
            <span>1 hari yang lalu</span>
          </div>
        </div>
        <div class="activity-item">
          <div class="act-dot-wrap">
            <div class="act-dot biru"></div>
            <div class="act-line"></div>
          </div>
          <div class="act-content">
            <p>Profil sanggar <strong>diperbarui</strong> oleh Admin</p>
            <span>2 hari yang lalu</span>
          </div>
        </div>
        <div class="activity-item">
          <div class="act-dot-wrap">
            <div class="act-dot merah"></div>
            <div class="act-line"></div>
          </div>
          <div class="act-content">
            <p>Akun <strong>Sari Wulandari</strong> dinonaktifkan</p>
            <span>3 hari yang lalu</span>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection