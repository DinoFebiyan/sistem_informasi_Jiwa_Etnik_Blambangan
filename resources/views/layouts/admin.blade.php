<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
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
        body { font-family: 'Lato', sans-serif; background: var(--abu-bg); color: var(--teks); display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar { width: var(--sidebar-w); background: var(--merah-gelap); min-height: 100vh; display: flex; flex-direction: column; position: fixed; left: 0; top: 0; bottom: 0; z-index: 100; }
        .sidebar-logo { padding: 24px 20px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 12px; }
        .logo-icon { width: 40px; height: 40px; background: var(--emas); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display', serif; font-size: 1.1rem; color: var(--merah-gelap); font-weight: 700; flex-shrink: 0; }
        .logo-text h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 0.95rem; line-height: 1.2; }
        .logo-text span { color: var(--emas-muda); font-size: 0.7rem; letter-spacing: 1.5px; font-weight: 700; text-transform: uppercase; }

        /* ROLE BADGE: ADMIN */
        .sidebar-role { margin: 16px 16px 8px; background: rgba(245,197,24,0.12); border: 1px solid rgba(245,197,24,0.25); border-radius: 8px; padding: 8px 12px; display: flex; align-items: center; gap: 8px; }
        .role-dot { width: 8px; height: 8px; background: var(--emas-muda); border-radius: 50%; flex-shrink: 0; }
        .sidebar-role span { color: var(--emas-muda); font-size: 0.72rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; }

        .sidebar-nav { padding: 12px 0; flex: 1; }
        .nav-label { color: rgba(255,255,255,0.3); font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase; padding: 12px 20px 6px; font-weight: 700; }
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 11px 20px; color: rgba(255,255,255,0.65); font-size: 0.85rem; transition: all 0.2s; border-left: 3px solid transparent; text-decoration: none; cursor: pointer; }
        .nav-item:hover { background: rgba(255,255,255,0.06); color: #fff; }
        .nav-item.active { background: rgba(245,197,24,0.1); color: var(--emas-muda); border-left-color: var(--emas-muda); font-weight: 700; }
        .nav-item i { width: 16px; text-align: center; }

        .sidebar-footer { padding: 16px; border-top: 1px solid rgba(255,255,255,0.08); }
        .user-card { display: flex; align-items: center; gap: 10px; }
        .avatar { width: 36px; height: 36px; background: var(--emas); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--merah-gelap); flex-shrink: 0; }
        .user-info p { color: #fff; font-size: 0.82rem; font-weight: 700; }
        .user-info span { color: rgba(255,255,255,0.45); font-size: 0.7rem; }

        /* MAIN & TOPBAR */
        .main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }
        .topbar { background: #fff; padding: 16px 32px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--abu-border); position: sticky; top: 0; z-index: 50; }
        .topbar-left h1 { font-family: 'Playfair Display', serif; font-size: 1.3rem; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .topbar-avatar { width: 38px; height: 38px; background: var(--merah); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; cursor: pointer; }
        
        .content { padding: 28px 32px; flex: 1; }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">
            <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo" style="width:100%; height:100%; object-fit:contain;">
        </div>
        <div class="logo-text">
            <h3>Jiwa Etnik<br>Blambangan</h3>
            <span>Sanggar Tari</span>
        </div>
    </div>

    <div class="sidebar-role">
        <div class="role-dot"></div>
        <span>Admin</span>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Menu Utama</div>
        <a class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
            <i class="fas fa-th-large"></i> Dashboard
        </a>

        <div class="nav-label">Konten</div>
        <a class="nav-item {{ request()->is('admin/events') ? 'active' : '' }}" href="/admin/events">
            <i class="fas fa-calendar-alt"></i> Kelola Event
        </a>
        <a class="nav-item {{ request()->is('admin/news') ? 'active' : '' }}" href="/admin/news">
            <i class="fas fa-newspaper"></i> Publikasi Berita
        </a>
        <a class="nav-item {{ request()->is('admin/profile') ? 'active' : '' }}" href="/admin/profile">
            <i class="fas fa-user-circle"></i> Kelola Profil Sanggar
        </a>

        <div class="nav-label">Sistem</div>
        <a class="nav-item" href="#">
            <i class="fas fa-cog"></i> Pengaturan
        </a>
        <a class="nav-item" href="#">
            <i class="fas fa-sign-out-alt"></i> Keluar
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="user-card">
            <div class="avatar">AD</div>
            <div class="user-info">
                <p>Admin Sanggar</p>
                <span>admin@jeb.id</span>
            </div>
        </div>
    </div>
</aside>

<main class="main">
    <div class="topbar">
        <div class="topbar-left">
            <h1>@yield('header', 'Dashboard Admin')</h1>
            <p>Sabtu, 07 Maret 2026 &nbsp;·&nbsp; Selamat datang kembali!</p>
        </div>
        <div class="topbar-right">
            <div class="topbar-avatar">AD</div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>
</main>

</body>
</html>