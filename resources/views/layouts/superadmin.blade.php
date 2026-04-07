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

        @stack('styles')
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

        .logo-img-sidebar {
            width: 42px;           
            height: 42px;          
            border-radius: 10px;   
            object-fit: cover;     
            flex-shrink: 0;        
            border: 1px solid rgba(255,255,255,0.1);
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

    @include('partials.sidebarSuperadmin')

    <main class="main">
        @include('partials.topbar')

        <div class="content">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>