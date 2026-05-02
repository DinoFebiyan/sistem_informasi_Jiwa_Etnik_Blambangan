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

        .main {
          margin-left: var(--sidebar-w);
          flex: 1;
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }

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

        .content {
          padding: 28px 32px;
          flex: 1;
        }

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

    .modal-overlay {
        position: fixed; 
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); 
        display: none; 
        align-items: center; 
        justify-content: center; 
        z-index: 9999; 
        backdrop-filter: blur(3px);
    }

    .modal-box {
        background: #fff;
        width: 95%;
        max-width: 500px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        overflow: hidden;
        animation: modalFadeIn 0.3s ease-out;
    }

    @keyframes modalFadeIn {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .modal-header {
        background: var(--merah);
        padding: 16px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
    }

    .modal-header h3 { font-family: 'Playfair Display'; font-size: 1.2rem; margin: 0; }
    .close-btn { background: none; border: none; color: #fff; font-size: 1.8rem; cursor: pointer; line-height: 1; }

    .modal-body { padding: 25px; }
    
    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 6px; color: var(--teks); }
    .form-group input, .form-group select, .form-group textarea {
        width: 100%; padding: 10px 14px; border: 1px solid var(--abu-border); border-radius: 10px; font-size: 0.9rem; outline: none;
    }

    .modal-footer {
        padding: 15px 25px;
        background: #fdf5f5;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .alert-info {
      display: flex;
      align-items: center;
      gap: 10px;

      background: #fef2f2;     
      border: 1px solid #fca5a5; 
      color: #991b1b;          

      padding: 12px 16px;
      border-radius: 10px;
      font-size: 0.82rem;
    }

    .alert-info svg {
      flex-shrink: 0;
      color: #dc2626; 
    }

    .btn-batal { background: #fff; border: 1px solid #ddd; padding: 10px 20px; border-radius: 10px; cursor: pointer; font-weight: 600; }
    .btn-simpan { background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; cursor: pointer; font-weight: 700; }
    
    /*PENGATURAN*/
:root {
  --merah: #8B0000;
  --merah-gelap: #5a0000;
  --emas: #c9991a;
  --emas-muda: #f5c518;
  --abu-bg: #f5f0f0;
  --abu-border: #e8dede;
  --teks: #1a0000;
  --teks-abu: #8a7070;
  --sidebar-w: 240px;
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Lato',sans-serif; background:var(--abu-bg); color:var(--teks); display:flex; min-height:100vh; }

/* SIDEBAR */
.sidebar { width:var(--sidebar-w); background:var(--merah-gelap); min-height:100vh; display:flex; flex-direction:column; position:fixed; left:0; top:0; bottom:0; z-index:100; }
.sidebar-logo { padding:24px 20px 20px; border-bottom:1px solid rgba(255,255,255,0.08); display:flex; align-items:center; gap:12px; }
.logo-icon { width:40px; height:40px; background:var(--emas); border-radius:10px; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:1rem; color:var(--merah-gelap); font-weight:700; }
.logo-text h3 { font-family:'Playfair Display',serif; color:#fff; font-size:0.9rem; line-height:1.2; }
.logo-text span { color:var(--emas-muda); font-size:0.65rem; letter-spacing:1.5px; font-weight:700; text-transform:uppercase; }
.sidebar-role { margin:14px 14px 6px; background:rgba(245,197,24,0.12); border:1px solid rgba(245,197,24,0.25); border-radius:8px; padding:7px 12px; display:flex; align-items:center; gap:8px; }
.role-dot { width:8px; height:8px; background:var(--emas-muda); border-radius:50%; }
.sidebar-role span { color:var(--emas-muda); font-size:0.7rem; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; }
.sidebar-nav { padding:10px 0; flex:1; }
.nav-label { color:rgba(255,255,255,0.3); font-size:0.62rem; letter-spacing:2px; text-transform:uppercase; padding:10px 20px 5px; font-weight:700; }
.nav-item { display:flex; align-items:center; gap:12px; padding:10px 20px; color:rgba(255,255,255,0.65); font-size:0.83rem; cursor:pointer; border-left:3px solid transparent; text-decoration:none; transition:all 0.2s; }
.nav-item:hover { background:rgba(255,255,255,0.06); color:#fff; }
.nav-item.active { background:rgba(245,197,24,0.1); color:var(--emas-muda); border-left-color:var(--emas-muda); font-weight:700; }
.sidebar-footer { padding:14px; border-top:1px solid rgba(255,255,255,0.08); }
.user-card { display:flex; align-items:center; gap:10px; }
.avatar { width:34px; height:34px; background:var(--emas); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:0.8rem; color:var(--merah-gelap); }
.user-info p { color:#fff; font-size:0.8rem; font-weight:700; }
.user-info span { color:rgba(255,255,255,0.45); font-size:0.68rem; }

/* MAIN */
.main { margin-left:var(--sidebar-w); flex:1; display:flex; flex-direction:column; }
.topbar { background:#fff; padding:14px 28px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--abu-border); }
.topbar-left h1 { font-family:'Playfair Display',serif; font-size:1.2rem; }
.topbar-left p { color:var(--teks-abu); font-size:0.75rem; margin-top:1px; }
.topbar-right { display:flex; gap:10px; align-items:center; }
.topbar-avatar { width:36px; height:36px; background:var(--merah); border-radius:9px; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:0.82rem; }
.content { padding:24px 28px; flex:1; }

/* TABS */
.settings-layout { display:flex; gap:20px; }
.settings-sidebar { width:220px; flex-shrink:0; }
.settings-main { flex:1; }

.tab-menu { background:#fff; border-radius:14px; border:1px solid var(--abu-border); overflow:hidden; }
.tab-item { display:flex; align-items:center; gap:12px; padding:13px 18px; cursor:pointer; border-left:3px solid transparent; transition:all 0.2s; color:var(--teks-abu); font-size:0.85rem; font-weight:600; }
.tab-item:hover { background:#fdf7f7; color:var(--teks); }
.tab-item.active { background:#fff5f5; color:var(--merah); border-left-color:var(--merah); font-weight:700; }
.tab-item svg { flex-shrink:0; }
.tab-divider { height:1px; background:var(--abu-border); }

/* PANELS */
.panel { display:none; }
.panel.active { display:block; }

/* CARDS */
.card { background:#fff; border-radius:14px; border:1px solid var(--abu-border); overflow:hidden; margin-bottom:16px; }
.card-header { padding:16px 22px; border-bottom:1px solid var(--abu-border); display:flex; align-items:center; gap:12px; }
.card-header-icon { width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.chi-red   { background:rgba(139,0,0,0.08); }
.chi-gold  { background:rgba(201,153,26,0.1); }
.chi-green { background:rgba(22,163,74,0.08); }
.chi-blue  { background:rgba(37,99,235,0.08); }
.chi-red2  { background:rgba(220,38,38,0.08); }
.card-header-text h3 { font-size:0.92rem; font-weight:700; color:var(--teks); }
.card-header-text p { font-size:0.75rem; color:var(--teks-abu); margin-top:1px; }
.card-body { padding:22px; }

/* FORM */
.form-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
.form-group { display:flex; flex-direction:column; gap:6px; }
.form-group.full { grid-column:1/-1; }
.form-group label { font-size:0.78rem; font-weight:700; color:var(--teks); }
.form-group input, .form-group select, .form-group textarea {
  padding:9px 12px; border:1px solid var(--abu-border); border-radius:8px;
  font-size:0.82rem; font-family:'Lato',sans-serif; color:var(--teks); outline:none; transition:border 0.2s;
}
.form-group input:focus, .form-group select:focus { border-color:var(--merah); }
.form-hint { font-size:0.7rem; color:var(--teks-abu); margin-top:2px; }

/* AVATAR UPLOAD */
.avatar-upload { display:flex; align-items:center; gap:20px; margin-bottom:22px; }
.avatar-preview { width:72px; height:72px; background:var(--merah); border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:1.6rem; font-weight:700; color:var(--emas-muda); flex-shrink:0; position:relative; }
.avatar-preview .change-overlay { position:absolute; inset:0; background:rgba(0,0,0,0.45); border-radius:50%; display:flex; align-items:center; justify-content:center; opacity:0; transition:opacity 0.2s; cursor:pointer; }
.avatar-preview:hover .change-overlay { opacity:1; }
.avatar-preview .change-overlay span { color:#fff; font-size:0.65rem; font-weight:700; letter-spacing:0.5px; }
.avatar-upload-info h4 { font-size:0.88rem; font-weight:700; margin-bottom:4px; }
.avatar-upload-info p { font-size:0.75rem; color:var(--teks-abu); margin-bottom:10px; }

/* BUTTONS */
.btn-red { background:var(--merah); color:#fff; border:none; padding:9px 22px; border-radius:8px; font-size:0.82rem; font-weight:700; cursor:pointer; font-family:'Lato',sans-serif; transition:background 0.2s; display:inline-flex; align-items:center; gap:7px; }
.btn-red:hover { background:var(--merah-gelap); }
.btn-ghost { background:none; border:1px solid var(--abu-border); color:var(--teks-abu); padding:9px 18px; border-radius:8px; font-size:0.82rem; font-weight:700; cursor:pointer; font-family:'Lato',sans-serif; transition:all 0.2s; }
.btn-ghost:hover { border-color:var(--merah); color:var(--merah); }
.btn-danger { background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:9px 18px; border-radius:8px; font-size:0.82rem; font-weight:700; cursor:pointer; font-family:'Lato',sans-serif; transition:all 0.2s; display:inline-flex; align-items:center; gap:7px; }
.btn-danger:hover { background:#dc2626; color:#fff; border-color:#dc2626; }
.btn-success { background:#dcfce7; color:#16a34a; border:1px solid #86efac; padding:9px 18px; border-radius:8px; font-size:0.82rem; font-weight:700; cursor:pointer; font-family:'Lato',sans-serif; transition:all 0.2s; display:inline-flex; align-items:center; gap:7px; }
.btn-success:hover { background:#16a34a; color:#fff; border-color:#16a34a; }
.form-actions { display:flex; gap:10px; margin-top:20px; justify-content:flex-end; }

/* PASSWORD STRENGTH */
.password-wrap { position:relative; }
.password-wrap input { width:100%; padding-right:40px; }
.toggle-pw { position:absolute; right:10px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:var(--teks-abu); }
.strength-bar { display:flex; gap:4px; margin-top:6px; }
.strength-seg { height:4px; flex:1; border-radius:2px; background:#e8dede; transition:background 0.3s; }
.strength-seg.weak   { background:#dc2626; }
.strength-seg.medium { background:#d97706; }
.strength-seg.strong { background:#16a34a; }
.strength-label { font-size:0.7rem; color:var(--teks-abu); margin-top:4px; }

/* BACKUP ITEMS */
.backup-list { display:flex; flex-direction:column; gap:10px; }
.backup-item { display:flex; align-items:center; justify-content:space-between; padding:14px 16px; background:#fdf8f8; border-radius:10px; border:1px solid var(--abu-border); }
.backup-item-left { display:flex; align-items:center; gap:12px; }
.backup-icon { width:38px; height:38px; background:rgba(139,0,0,0.08); border-radius:9px; display:flex; align-items:center; justify-content:center; }
.backup-info h4 { font-size:0.83rem; font-weight:700; }
.backup-info span { font-size:0.72rem; color:var(--teks-abu); }
.backup-item-right { display:flex; gap:8px; align-items:center; }
.backup-size { font-size:0.75rem; color:var(--teks-abu); font-weight:700; }

/* ALERT BOX */
.alert { border-radius:10px; padding:14px 16px; font-size:0.82rem; margin-bottom:16px; display:flex; align-items:flex-start; gap:10px; }
.alert-warn { background:#fef3c7; border:1px solid #fde68a; color:#92400e; }
.alert-danger { background:#fee2e2; border:1px solid #fca5a5; color:#991b1b; }
.alert-info { background:#dbeafe; border:1px solid #93c5fd; color:#1e40af; }
.alert-success { background:#dcfce7; border:1px solid #86efac; color:#166534; }
.alert svg { flex-shrink:0; margin-top:1px; }

/* DIVIDER */
.section-divider { height:1px; background:var(--abu-border); margin:20px 0; }

/* LAST LOGIN */
.last-login { background:#f7f2f2; border-radius:10px; padding:14px 16px; display:flex; align-items:center; gap:12px; margin-bottom:16px; }
.last-login svg { flex-shrink:0; color:var(--teks-abu); }
.last-login p { font-size:0.82rem; color:var(--teks); }
.last-login span { font-size:0.72rem; color:var(--teks-abu); display:block; margin-top:2px; }

/* RESTORE ZONE */
.restore-zone { border:2px dashed var(--abu-border); border-radius:12px; padding:32px; text-align:center; cursor:pointer; transition:all 0.2s; }
.restore-zone:hover { border-color:var(--merah); background:#fdf7f7; }
.restore-zone svg { margin:0 auto 10px; display:block; color:#ccc; }
.restore-zone p { font-size:0.85rem; font-weight:700; color:var(--teks-abu); margin-bottom:4px; }
.restore-zone span { font-size:0.75rem; color:#ccc; }

/* SCHEDULE TOGGLE */
.toggle-row { display:flex; align-items:center; justify-content:space-between; padding:12px 0; border-bottom:1px solid #f5eeee; }
.toggle-row:last-child { border-bottom:none; }
.toggle-info h4 { font-size:0.85rem; font-weight:700; }
.toggle-info p { font-size:0.75rem; color:var(--teks-abu); margin-top:2px; }
.toggle-switch { position:relative; width:44px; height:24px; }
.toggle-switch input { opacity:0; width:0; height:0; }
.toggle-slider { position:absolute; inset:0; background:#ddd; border-radius:24px; cursor:pointer; transition:0.3s; }
.toggle-slider:before { content:''; position:absolute; width:18px; height:18px; left:3px; bottom:3px; background:#fff; border-radius:50%; transition:0.3s; }
.toggle-switch input:checked + .toggle-slider { background:var(--merah); }
.toggle-switch input:checked + .toggle-slider:before { transform:translateX(20px); }
    
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

    <div id="modalLogout" class="modal-overlay">
        <div class="modal-box" style="max-width: 380px; text-align: center;">
            <div class="modal-header" style="justify-content: center;">
                <h3>Konfirmasi Keluar</h3>
            </div>
            <div class="modal-body" style="padding: 30px 20px;">
                <div style="background: rgba(139, 0, 0, 0.1); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--merah)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                </div>
                <p style="font-size: 1rem; color: var(--teks); font-weight: 600; margin-bottom: 5px;">Yakin ingin keluar?</p>
                <p style="font-size: 0.85rem; color: var(--teks-abu);">Anda akan keluar dari sesi Super Admin. Pastikan semua perubahan sudah disimpan sebelum keluar.</p>
            </div>
            <div class="modal-footer" style="justify-content: center; background: #fff; padding-bottom: 25px; gap: 15px;">
                <button type="button" class="btn-batal" onclick="closeLogoutModal()" style="min-width: 100px;">Batal</button>
                <button type="button" class="btn-simpan" onclick="executeLogout()" style="min-width: 120px;">Ya, Keluar</button>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('login') }}" method="GET" style="display: none;">
        @csrf
    </form>

    <script>
        function openLogoutModal() {
            document.getElementById('modalLogout').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLogoutModal() {
            document.getElementById('modalLogout').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function executeLogout() {
            document.getElementById('logout-form').submit();
        }

        window.onclick = function(event) {
            let modal = document.getElementById('modalLogout');
            if (event.target == modal) {
                closeLogoutModal();
            }
        }
    </script>
    @stack('scripts')
</body>
</html>