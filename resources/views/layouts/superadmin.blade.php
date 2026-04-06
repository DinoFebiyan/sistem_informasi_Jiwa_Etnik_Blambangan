<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title') — JEB</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
<style>
  :root {
    --merah: #8B0000;
    --merah-gelap: #5a0000;
    --merah-muda: #b01010;
    --emas: #c9991a;
    --emas-muda: #f5c518;
    --putih: #fff;
    --abu-bg: #f5f0f0;
    --abu-border: #e8dede;
    --teks: #1a0000;
    --teks-abu: #8a7070;
    --sidebar-w: 240px;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Lato', sans-serif;
    background: var(--abu-bg);
    color: var(--teks);
    display: flex;
    min-height: 100vh;
  }

  /* ===== SIDEBAR ===== */
  .sidebar {
    width: var(--sidebar-w);
    background: var(--merah-gelap);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 0; top: 0; bottom: 0;
    z-index: 100;
  }

  .sidebar-logo {
    padding: 24px 20px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .logo-icon {
    width: 40px; height: 40px;
    background: var(--emas);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    color: var(--merah-gelap);
    font-weight: 700;
    flex-shrink: 0;
  }

  .logo-text h3 {
    font-family: 'Playfair Display', serif;
    color: #fff;
    font-size: 0.95rem;
    line-height: 1.2;
  }
  .logo-text span {
    color: var(--emas-muda);
    font-size: 0.7rem;
    letter-spacing: 1.5px;
    font-weight: 700;
    text-transform: uppercase;
  }

  .sidebar-role {
    margin: 16px 16px 8px;
    background: rgba(245,197,24,0.12);
    border: 1px solid rgba(245,197,24,0.25);
    border-radius: 8px;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .role-dot {
    width: 8px; height: 8px;
    background: var(--emas-muda);
    border-radius: 50%;
    flex-shrink: 0;
  }

  .sidebar-role span {
    color: var(--emas-muda);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
  }

  .sidebar-nav {
    padding: 12px 0;
    flex: 1;
  }

  .nav-label {
    color: rgba(255,255,255,0.3);
    font-size: 0.65rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 12px 20px 6px;
    font-weight: 700;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 20px;
    color: rgba(255,255,255,0.65);
    font-size: 0.85rem;
    font-weight: 400;
    cursor: pointer;
    transition: all 0.2s;
    border-left: 3px solid transparent;
    text-decoration: none;
  }

  .nav-item:hover {
    background: rgba(255,255,255,0.06);
    color: #fff;
  }

  .nav-item.active {
    background: rgba(245,197,24,0.1);
    color: var(--emas-muda);
    border-left-color: var(--emas-muda);
    font-weight: 700;
  }

  .nav-item svg { flex-shrink: 0; opacity: 0.8; }
  .nav-item.active svg { opacity: 1; }

  .nav-badge {
    margin-left: auto;
    background: var(--merah-muda);
    color: #fff;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 10px;
  }

  .sidebar-footer {
    padding: 16px;
    border-top: 1px solid rgba(255,255,255,0.08);
  }

  .user-card {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .avatar {
    width: 36px; height: 36px;
    background: var(--emas);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-weight: 700;
    font-size: 0.85rem;
    color: var(--merah-gelap);
    flex-shrink: 0;
  }

  .user-info p {
    color: #fff;
    font-size: 0.82rem;
    font-weight: 700;
  }

  .user-info span {
    color: rgba(255,255,255,0.45);
    font-size: 0.7rem;
  }

  .logout-btn {
    margin-left: auto;
    background: none;
    border: none;
    color: rgba(255,255,255,0.4);
    cursor: pointer;
    padding: 4px;
    transition: color 0.2s;
  }
  .logout-btn:hover { color: #fff; }

  /* ===== MAIN CONTENT ===== */
  .main {
    margin-left: var(--sidebar-w);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  /* TOPBAR */
  .topbar {
    background: #fff;
    padding: 16px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--abu-border);
    position: sticky;
    top: 0;
    z-index: 50;
  }

  .topbar-left h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    color: var(--teks);
  }

  .topbar-left p {
    color: var(--teks-abu);
    font-size: 0.78rem;
    margin-top: 1px;
  }

  .topbar-right {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .notif-btn {
    width: 38px; height: 38px;
    background: var(--abu-bg);
    border: 1px solid var(--abu-border);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    position: relative;
    transition: background 0.2s;
  }
  .notif-btn:hover { background: #eedede; }

  .notif-dot {
    position: absolute;
    top: 7px; right: 7px;
    width: 7px; height: 7px;
    background: var(--merah);
    border-radius: 50%;
    border: 1.5px solid #fff;
  }

  .topbar-avatar {
    width: 38px; height: 38px;
    background: var(--merah);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    font-weight: 700;
    font-size: 0.85rem;
    cursor: pointer;
  }

  /* PAGE CONTENT */
  .content {
    padding: 28px 32px;
    flex: 1;
  }

  /* STAT CARDS */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 28px;
  }

  .stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 20px 22px;
    border: 1px solid var(--abu-border);
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    transition: box-shadow 0.2s, transform 0.2s;
    cursor: default;
  }

  .stat-card:hover {
    box-shadow: 0 6px 24px rgba(139,0,0,0.1);
    transform: translateY(-2px);
  }

  .stat-info p {
    font-size: 0.75rem;
    color: var(--teks-abu);
    letter-spacing: 0.5px;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 6px;
  }

  .stat-info h2 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--teks);
    line-height: 1;
    margin-bottom: 6px;
  }

  .stat-change {
    font-size: 0.72rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 3px;
  }
  .stat-change.up { color: #16a34a; }
  .stat-change.down { color: var(--merah); }

  .stat-icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .stat-icon.merah { background: rgba(139,0,0,0.08); }
  .stat-icon.emas  { background: rgba(201,153,26,0.1); }
  .stat-icon.hijau { background: rgba(22,163,74,0.08); }
  .stat-icon.biru  { background: rgba(37,99,235,0.08); }

  /* GRID 2 COL */
  .grid-2 {
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 18px;
    margin-bottom: 18px;
  }

  .card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid var(--abu-border);
    overflow: hidden;
  }

  .card-header {
    padding: 18px 22px 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--abu-border);
  }

  .card-header h3 {
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--teks);
  }

  .card-header span {
    font-size: 0.75rem;
    color: var(--merah);
    font-weight: 700;
    cursor: pointer;
  }

  .card-body { padding: 18px 22px; }

  /* TABLE */
  .table-wrap { overflow-x: auto; }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.82rem;
  }

  thead th {
    text-align: left;
    padding: 8px 12px;
    color: var(--teks-abu);
    font-size: 0.7rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: 700;
    border-bottom: 1px solid var(--abu-border);
  }

  tbody td {
    padding: 11px 12px;
    border-bottom: 1px solid #f5eeee;
    color: var(--teks);
    vertical-align: middle;
  }

  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover td { background: #fdf7f7; }

  .badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.5px;
  }
  .badge-aktif   { background: #dcfce7; color: #16a34a; }
  .badge-pending { background: #fef3c7; color: #d97706; }
  .badge-nonaktif{ background: #fee2e2; color: #dc2626; }

  .action-btn {
    background: none;
    border: 1px solid var(--abu-border);
    border-radius: 6px;
    padding: 4px 10px;
    font-size: 0.72rem;
    cursor: pointer;
    color: var(--teks-abu);
    font-family: 'Lato', sans-serif;
    transition: all 0.2s;
  }
  .action-btn:hover {
    border-color: var(--merah);
    color: var(--merah);
  }

  /* AKTIVITAS */
  .activity-list { display: flex; flex-direction: column; gap: 14px; }

  .activity-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
  }

  .act-dot-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0;
  }

  .act-dot {
    width: 10px; height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
    margin-top: 4px;
  }
  .act-dot.merah { background: var(--merah); }
  .act-dot.emas  { background: var(--emas); }
  .act-dot.hijau { background: #16a34a; }
  .act-dot.biru  { background: #2563eb; }

  .act-line {
    width: 1px;
    flex: 1;
    background: var(--abu-border);
    min-height: 20px;
    margin-top: 4px;
  }

  .activity-item:last-child .act-line { display: none; }

  .act-content p {
    font-size: 0.82rem;
    color: var(--teks);
    line-height: 1.4;
  }

  .act-content p strong { color: var(--merah); }

  .act-content span {
    font-size: 0.7rem;
    color: var(--teks-abu);
    margin-top: 2px;
    display: block;
  }

  /* QUICK ACCESS */
  .quick-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 18px;
  }

  .quick-card {
    background: #fff;
    border: 1px solid var(--abu-border);
    border-radius: 14px;
    padding: 18px 16px;
    text-align: center;
    cursor: pointer;
    transition: all 0.25s;
    text-decoration: none;
    display: block;
  }

  .quick-card:hover {
    border-color: var(--merah);
    box-shadow: 0 4px 18px rgba(139,0,0,0.1);
    transform: translateY(-2px);
  }

  .quick-icon {
    width: 48px; height: 48px;
    background: rgba(139,0,0,0.07);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 10px;
  }

  .quick-card:nth-child(2) .quick-icon { background: rgba(201,153,26,0.1); }
  .quick-card:nth-child(3) .quick-icon { background: rgba(22,163,74,0.08); }
  .quick-card:nth-child(4) .quick-icon { background: rgba(37,99,235,0.08); }

  .quick-card p {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--teks);
  }

  .quick-card span {
    font-size: 0.7rem;
    color: var(--teks-abu);
  }
</style>
</head>
<body>

<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">JEB</div>
    <div class="logo-text">
      <h3>Jiwa Etnik<br>Blambangan</h3>
      <span>Sanggar Tari</span>
    </div>
  </div>

  <div class="sidebar-role">
    <div class="role-dot"></div>
    <span>Super Admin</span>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-label">Menu Utama</div>

    <a class="nav-item {{ request()->is('superadmin/dashboard') ? 'active' : '' }}" href="/superadmin/dashboard">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
      Dashboard
    </a>

    <a class="nav-item {{ request()->is('superadmin/kelola-admin') ? 'active' : '' }}" href="/superadmin/kelola-admin">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
      Kelola Admin
      <span class="nav-badge">3</span>
    </a>

    <div class="nav-label">Konten</div>

    <a class="nav-item {{ request()->is('superadmin/kelola-katalog') ? 'active' : '' }}" href="/superadmin/kelola-katalog">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
      Kelola Katalog
    </a>

    <a class="nav-item {{ request()->is('superadmin/kelola-event') ? 'active' : '' }}" href="/superadmin/kelola-event">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      Kelola Event
    </a>

    <a class="nav-item {{ request()->is('superadmin/publikasi-berita') ? 'active' : '' }}" href="/superadmin/publikasi-berita">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Publikasi Berita
    </a>

    <a class="nav-item {{ request()->is('superadmin/profil') ? 'active' : '' }}" href="/superadmin/profil">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
      Kelola Profil
    </a>

    <div class="nav-label">Sistem</div>

    <a class="nav-item {{ request()->is('superadmin/pengaturan') ? 'active' : '' }}" href="/superadmin/pengaturan">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      Pengaturan
    </a>
  </nav>

  <div class="sidebar-footer">
    <div class="user-card">
      <div class="avatar">SA</div>
      <div class="user-info">
        <p>Super Admin</p>
        <span>superadmin@jeb.id</span>
      </div>
      <button class="logout-btn" title="Logout">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      </button>
    </div>
  </div>
</aside>

<main class="main">

  <div class="topbar">
    <div class="topbar-left">
      <h1>@yield('header_title')</h1>
      <p>Sabtu, 07 Maret 2026 &nbsp;·&nbsp; Selamat datang kembali!</p>
    </div>
    <div class="topbar-right">
      <div class="notif-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a7070" stroke-width="2"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
        <div class="notif-dot"></div>
      </div>
      <div class="topbar-avatar">SA</div>
    </div>
  </div>

  <div class="content">
    @yield('content')
  </div></main>

</body>
</html>