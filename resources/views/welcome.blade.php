<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sanggar Tari Jiwa Etnik Blambangan</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Lora:ital,wght@0,400;0,600;1,400&family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --red-deep:   #6b0808;
      --red-main:   #8b1010;
      --red-bright: #b01515;
      --gold:       #c8960a;
      --gold-light: #e8b84b;
      --cream:      #fdf5e0;
      --cream-dark: #f5e8c8;
      --white:      #ffffff;
      --dark:       #1a0505;
      --text-dark:  #2c0808;
      --text-mid:   #5a2020;
      --text-light: #8a5050;
    }
    html { scroll-behavior: smooth; }
    body { font-family: 'Lora', serif; background: var(--white); color: var(--text-dark); overflow-x: hidden; }

    /* ══ NAV ══ */
    nav {
      position: sticky; top: 0; z-index: 200;
      background: var(--white);
      border-bottom: 1px solid #e8d0d0;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 2rem; height: 56px;
      box-shadow: 0 2px 12px rgba(107,8,8,0.08);
    }
    .nav-logo {
      display: flex; align-items: center; gap: 0.6rem;
      font-family: 'Cinzel', serif;
      font-weight: 700; font-size: 1rem;
      color: var(--red-deep);
    }
    .nav-logo .logo-circle {
      width: 36px; height: 36px; border-radius: 50%;
      background: var(--red-deep);
      display: flex; align-items: center; justify-content: center;
      color: var(--gold-light); font-size: 0.9rem; font-weight: 700;
    }
    .nav-links { display: flex; align-items: center; gap: 0.15rem; }
    .nav-links a {
      color: var(--text-dark);
      text-decoration: none;
      font-size: 0.78rem;
      font-family: 'Cinzel', serif;
      padding: 0.4rem 0.85rem;
      border-radius: 3px;
      transition: background .18s, color .18s;
      white-space: nowrap;
    }
    .nav-links a:hover, .nav-links a.active { background: var(--red-deep); color: var(--white); }
    .btn-login {
      background: var(--red-deep); color: var(--white) !important;
      border-radius: 4px !important;
      padding: 0.4rem 1.1rem !important;
      margin-left: 0.5rem;
    }
    .btn-login:hover { background: var(--red-bright) !important; }

    /* ══ HERO ══ */
    #beranda {
      background: linear-gradient(120deg, var(--red-deep) 0%, #9a1212 55%, #7b0e0e 100%);
      min-height: 92vh;
      display: flex; align-items: center;
      position: relative; overflow: hidden;
      padding: 5rem 6% 5rem;
    }
    #beranda::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(ellipse at 70% 50%, rgba(200,150,10,0.08) 0%, transparent 65%);
    }
    .hero-grid { display: grid; grid-template-columns: 1fr 1fr; align-items: center; gap: 4rem; max-width: 1100px; margin: 0 auto; width: 100%; position: relative; z-index: 1; }
    .hero-text .hero-tag {
      font-family: 'Cinzel', serif;
      font-size: 0.72rem; letter-spacing: 0.3em;
      color: var(--gold-light); text-transform: uppercase;
      margin-bottom: 1rem;
    }
    .hero-text h1 {
      font-family: 'Playfair Display', serif;
      font-style: italic;
      font-weight: 700;
      line-height: 1.1;
      color: var(--white);
      font-size: clamp(2.2rem, 5vw, 3.6rem);
      margin-bottom: 1.4rem;
    }
    .hero-text h1 em { color: var(--gold-light); font-style: italic; }
    .hero-text p {
      color: rgba(255,255,255,0.82);
      font-size: 0.92rem; line-height: 1.85;
      max-width: 420px; margin-bottom: 2rem;
    }
    .btn { display: inline-block; font-family: 'Cinzel', serif; font-size: 0.78rem; letter-spacing: 0.1em; padding: 0.7rem 1.8rem; border-radius: 3px; cursor: pointer; text-decoration: none; border: none; transition: transform .2s, box-shadow .2s; }
    .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(0,0,0,0.25); }
    .btn-outline-white { border: 1.5px solid rgba(255,255,255,0.7); color: var(--white); background: transparent; }
    .btn-outline-white:hover { background: rgba(255,255,255,0.1); }
    .btn-gold { background: var(--gold); color: var(--dark); }
    .btn-red { background: var(--red-main); color: var(--white); }
    .btn-red-outline { border: 1.5px solid var(--red-main); color: var(--red-main); background: transparent; }
    .btn-red-outline:hover { background: var(--red-main); color: var(--white); }
    .btn-sm { padding: 0.5rem 1.3rem; font-size: 0.72rem; }
    .hero-logo-wrap {
      display: flex; align-items: center; justify-content: center;
    }
    .logo-big {
      width: clamp(220px, 30vw, 320px);
      height: clamp(220px, 30vw, 320px);
      border-radius: 50%;
      background: var(--white);
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      box-shadow: 0 0 60px rgba(0,0,0,0.35), 0 0 0 8px rgba(255,255,255,0.1);
      position: relative;
    }
    .logo-big .logo-inner {
      width: 85%; height: 85%; border-radius: 50%;
      background: var(--red-deep);
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      border: 4px solid var(--gold);
    }
    .logo-big .logo-text-top {
      font-family: 'Playfair Display', serif;
      font-style: italic;
      color: var(--gold-light); font-size: 1.1rem; font-weight: 700;
      text-align: center; line-height: 1.2;
    }
    .logo-big .logo-icon { font-size: 2.5rem; margin: 0.3rem 0; }
    .logo-big .logo-text-bottom {
      font-family: 'Cinzel', serif;
      color: var(--gold-light); font-size: 0.65rem;
      letter-spacing: 0.15em; text-align: center; line-height: 1.5;
    }

    /* ══ SECTIONS COMMON ══ */
    section { padding: 5rem 6%; }
    .section-inner { max-width: 1100px; margin: 0 auto; }
    .section-badge {
      display: inline-block;
      background: var(--red-main); color: var(--white);
      font-family: 'Cinzel', serif; font-size: 0.65rem;
      letter-spacing: 0.2em; text-transform: uppercase;
      padding: 0.22rem 1rem; border-radius: 20px;
      margin-bottom: 0.8rem;
    }
    .section-badge-outline {
      display: inline-block;
      border: 1px solid var(--gold); color: var(--gold);
      font-family: 'Cinzel', serif; font-size: 0.65rem;
      letter-spacing: 0.2em; text-transform: uppercase;
      padding: 0.22rem 1rem; border-radius: 20px;
      margin-bottom: 0.8rem;
    }
    .section-heading {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.8rem, 4vw, 2.8rem);
      color: var(--text-dark); line-height: 1.2;
      margin-bottom: 0.5rem;
    }
    .section-heading em { font-style: italic; }
    .section-heading.white { color: var(--white); }
    .section-sub { color: var(--text-light); font-size: 0.88rem; margin-bottom: 2.5rem; }
    .section-sub.white { color: rgba(255,255,255,0.7); }
    .text-center { text-align: center; }

    /* ══ PROFILE SANGGAR ══ */
    #profile {
      background: var(--white);
    }
    .profile-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; margin-top: 3rem; }
    .profile-text h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem; color: var(--red-deep);
      margin-bottom: 1.2rem;
    }
    .profile-text p { color: var(--text-mid); font-size: 0.9rem; line-height: 1.9; margin-bottom: 1rem; }
    .profile-card {
      background: linear-gradient(135deg, var(--red-deep) 0%, var(--red-bright) 100%);
      border-radius: 12px;
      padding: 2.5rem;
      position: relative; overflow: hidden;
    }
    .profile-card::before {
      content: '';
      position: absolute; bottom: -20px; right: -20px;
      width: 120px; height: 120px;
      border-radius: 50%;
      background: rgba(255,255,255,0.06);
    }
    .profile-card .card-icon { font-size: 3rem; margin-bottom: 1rem; }
    .profile-card h4 {
      font-family: 'Cinzel', serif;
      color: var(--gold-light); font-size: 0.9rem;
      letter-spacing: 0.15em; text-transform: uppercase;
      margin-bottom: 0.8rem;
    }
    .profile-card p { color: rgba(255,255,255,0.85); font-size: 0.88rem; line-height: 1.8; }

    /* ══ VISI MISI ══ */
    #visi-misi { background: #fafafa; }
    .vm-pair { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem; }
    .visi-box {
      background: linear-gradient(135deg, var(--red-deep), var(--red-bright));
      border-radius: 10px;
      padding: 3rem 2.5rem;
      text-align: center;
    }
    .visi-box h3 {
      font-family: 'Cinzel', serif;
      color: var(--gold-light); font-size: 1rem;
      letter-spacing: 0.3em; margin-bottom: 1.5rem;
    }
    .visi-box p { color: rgba(255,255,255,0.9); font-size: 0.92rem; line-height: 1.85; }
    .misi-box {
      background: var(--cream);
      border-radius: 10px;
      padding: 3rem 2.5rem;
      text-align: center;
    }
    .misi-box h3 {
      font-family: 'Cinzel', serif;
      color: var(--red-deep); font-size: 1rem;
      letter-spacing: 0.3em; margin-bottom: 1.5rem;
    }
    .misi-box ul { list-style: none; padding: 0; }
    .misi-box ul li {
      color: var(--text-mid); font-size: 0.88rem;
      line-height: 1.75; padding: 0.6rem 0;
      border-bottom: 1px solid rgba(107,8,8,0.1);
    }
    .misi-box ul li:last-child { border-bottom: none; }

    /* ══ BERITA & ARTIKEL ══ */
    #berita { background: var(--white); }
    .berita-grid { display: grid; grid-template-columns: 1.4fr 1fr; gap: 1.5rem; margin-top: 2rem; }
    .berita-main {
      background: var(--dark);
      border-radius: 8px;
      overflow: hidden;
      position: relative;
      min-height: 320px;
      display: flex; flex-direction: column; justify-content: flex-end;
      padding: 2rem;
    }
    .berita-main::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(0deg, rgba(10,2,2,0.9) 0%, rgba(100,10,10,0.5) 50%, transparent 100%);
    }
    .badge-utama {
      position: absolute; top: 1rem; left: 1rem;
      background: var(--gold); color: var(--dark);
      font-family: 'Cinzel', serif; font-size: 0.65rem;
      letter-spacing: 0.15em; padding: 0.2rem 0.8rem; border-radius: 20px;
    }
    .berita-main h3 {
      position: relative; z-index: 1;
      font-family: 'Playfair Display', serif;
      color: var(--white); font-size: 1.25rem; line-height: 1.3;
      margin-bottom: 0.8rem;
    }
    .berita-main p { position: relative; z-index: 1; color: rgba(255,255,255,0.7); font-size: 0.82rem; line-height: 1.6; margin-bottom: 1.2rem; }
    .berita-main .meta { position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between; }
    .berita-main .meta span { color: rgba(255,255,255,0.5); font-size: 0.74rem; }
    .berita-side { display: flex; flex-direction: column; gap: 0.8rem; }
    .berita-item {
      display: flex; gap: 1rem; align-items: center;
      background: #fafafa;
      border-radius: 6px; padding: 0.8rem;
      border: 1px solid #f0e0e0;
      transition: border-color .2s;
    }
    .berita-item:hover { border-color: var(--red-bright); }
    .berita-item-img {
      width: 80px; min-width: 80px; height: 70px;
      background: linear-gradient(135deg, var(--red-deep), var(--red-bright));
      border-radius: 5px;
    }
    .berita-item .tag-kecil {
      font-family: 'Cinzel', serif; font-size: 0.6rem;
      color: var(--red-main); letter-spacing: 0.15em; text-transform: uppercase;
      margin-bottom: 0.3rem;
    }
    .berita-item h5 { font-family: 'Playfair Display', serif; font-size: 0.88rem; color: var(--text-dark); line-height: 1.35; margin-bottom: 0.25rem; }
    .berita-item .meta-kecil { font-size: 0.72rem; color: var(--text-light); }
    .center-btn { text-align: center; margin-top: 2rem; }

    /* ══ KATALOG KOSTUM ══ */
    #katalog {
      background: linear-gradient(160deg, var(--red-deep) 0%, #9a1212 100%);
      padding: 5rem 6%;
    }
    .kostum-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.4rem; margin-top: 2rem; }
    .kostum-card {
      background: rgba(255,255,255,0.07);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 8px; overflow: hidden;
      transition: transform .25s, box-shadow .25s;
    }
    .kostum-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.3); }
    .kostum-img {
      height: 160px;
      background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.03));
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.2); font-size: 2.5rem;
      position: relative;
    }
    .kostum-badge {
      position: absolute; top: 0.6rem; left: 0.6rem;
      background: var(--gold); color: var(--dark);
      font-family: 'Cinzel', serif; font-size: 0.6rem;
      letter-spacing: 0.12em; padding: 0.15rem 0.6rem; border-radius: 20px;
    }
    .kostum-body { padding: 1rem 1.1rem 1.2rem; }
    .kostum-body h4 { font-family: 'Playfair Display', serif; font-size: 0.95rem; color: var(--white); margin-bottom: 0.3rem; }
    .kostum-body p { font-size: 0.78rem; color: rgba(255,255,255,0.6); line-height: 1.6; margin-bottom: 0.8rem; }
    .kostum-body .kostum-footer { display: flex; align-items: center; justify-content: space-between; }
    .tag-tipe { font-family: 'Cinzel', serif; font-size: 0.62rem; color: var(--gold-light); letter-spacing: 0.1em; text-transform: uppercase; }
    .kostum-icons { font-size: 0.75rem; color: rgba(255,255,255,0.4); }

    /* ══ KALENDER EVENT ══ */
    #kalender { background: var(--white); }
    .kalender-wrap { display: grid; grid-template-columns: 320px 1fr; gap: 2.5rem; margin-top: 2rem; align-items: start; }
    .mini-cal {
      background: var(--white); border-radius: 10px;
      border: 1px solid #f0e0e0;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(107,8,8,0.08);
    }
    .cal-header {
      background: var(--red-main); color: var(--white);
      padding: 1rem 1.5rem;
      font-family: 'Cinzel', serif; font-size: 0.9rem;
      letter-spacing: 0.1em;
      display: flex; align-items: center; justify-content: space-between;
    }
    .cal-header button { background: none; border: none; color: var(--white); cursor: pointer; font-size: 1rem; }
    .cal-body { padding: 1rem; }
    .cal-days-head { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; gap: 2px; margin-bottom: 6px; }
    .cal-days-head span { font-family: 'Cinzel', serif; font-size: 0.65rem; color: var(--text-light); padding: 0.3rem; }
    .cal-days { display: grid; grid-template-columns: repeat(7, 1fr); gap: 2px; }
    .cal-days span {
      text-align: center; font-size: 0.78rem;
      padding: 0.4rem 0.2rem; border-radius: 4px;
      cursor: pointer; color: var(--text-mid);
      transition: background .15s;
    }
    .cal-days span:hover { background: var(--cream); }
    .cal-days span.today { background: var(--red-main); color: var(--white); font-weight: 700; border-radius: 50%; }
    .cal-days span.has-event { font-weight: 700; color: var(--red-main); }
    .cal-days span.empty { color: #ccc; }
    .event-list { display: flex; flex-direction: column; gap: 0.8rem; }
    .event-row {
      display: flex; gap: 1rem; align-items: flex-start;
      padding: 1rem 1.2rem;
      border: 1px solid #f0e0e0;
      border-radius: 8px; background: #fafafa;
      transition: border-color .2s, box-shadow .2s;
    }
    .event-row:hover { border-color: var(--red-bright); box-shadow: 0 4px 12px rgba(107,8,8,0.08); }
    .ev-date-box {
      min-width: 52px;
      background: var(--red-main); color: var(--white);
      border-radius: 6px; text-align: center;
      padding: 0.4rem 0.5rem;
    }
    .ev-date-box .ev-num { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; line-height: 1; }
    .ev-date-box .ev-mon { font-family: 'Cinzel', serif; font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase; }
    .ev-info h5 { font-family: 'Playfair Display', serif; font-size: 0.95rem; color: var(--text-dark); margin-bottom: 0.25rem; }
    .ev-info p { font-size: 0.8rem; color: var(--text-light); line-height: 1.5; }
    .ev-info .ev-meta { display: flex; gap: 1rem; margin-top: 0.35rem; font-size: 0.74rem; color: var(--text-light); }
    .ev-info .ev-meta span { display: flex; align-items: center; gap: 0.3rem; }

    /* ══ GALERI ══ */
    #galeri {
      background: linear-gradient(160deg, var(--red-deep) 0%, #9a1212 100%);
      padding: 5rem 6%;
    }
    .galeri-mosaik {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-rows: 200px 200px;
      gap: 1rem;
      margin-top: 2rem;
    }
    .g-item {
      background: rgba(255,255,255,0.07);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 8px;
      overflow: hidden;
      display: flex; align-items: center; justify-content: center;
      font-size: 2.5rem; color: rgba(255,255,255,0.2);
      position: relative;
      transition: transform .25s;
    }
    .g-item:hover { transform: scale(1.02); }
    .g-item:nth-child(1) { grid-row: span 2; }
    .g-item:nth-child(4) { grid-row: span 2; grid-column: 3; grid-row-start: 1; }
    .g-item .g-label {
      position: absolute; bottom: 0; left: 0; right: 0;
      background: linear-gradient(transparent, rgba(0,0,0,0.6));
      color: rgba(255,255,255,0.8); padding: 0.8rem;
      font-family: 'Cinzel', serif; font-size: 0.7rem; letter-spacing: 0.1em;
    }

    /* ══ FOOTER ══ */
    footer {
      background: var(--dark);
      padding: 3rem 6% 1.5rem;
      border-top: 3px solid var(--gold);
    }
    .footer-grid { display: grid; grid-template-columns: 1.5fr 1fr 1fr; gap: 3rem; max-width: 1100px; margin: 0 auto; }
    .footer-brand h3 { font-family: 'Playfair Display', serif; font-style: italic; color: var(--white); font-size: 1.2rem; margin-bottom: 0.8rem; }
    .footer-brand p { color: rgba(255,255,255,0.55); font-size: 0.85rem; line-height: 1.8; }
    .footer-col h4 { font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 0.75rem; letter-spacing: 0.2em; margin-bottom: 1rem; text-transform: uppercase; }
    .footer-col ul { list-style: none; }
    .footer-col ul li { margin-bottom: 0.5rem; }
    .footer-col ul li a { color: rgba(255,255,255,0.55); text-decoration: none; font-size: 0.85rem; transition: color .2s; }
    .footer-col ul li a:hover { color: var(--gold-light); }
    .footer-bottom { text-align: center; padding-top: 2rem; margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.08); color: rgba(255,255,255,0.35); font-size: 0.75rem; font-family: 'Cinzel', serif; letter-spacing: 0.1em; }

    /* ══ DIVIDER ORNAMEN ══ */
    .divider { text-align: center; color: var(--gold); font-size: 1rem; letter-spacing: 0.6em; margin: 0.5rem 0 1.5rem; }

    /* ══ ANIMATIONS ══ */
    @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .hero-text > * { animation: fadeUp .7s ease both; }
    .hero-text .hero-tag { animation-delay: 0s; }
    .hero-text h1 { animation-delay: .12s; }
    .hero-text p { animation-delay: .24s; }
    .hero-text .btn { animation-delay: .36s; }

    /* ══ RESPONSIVE ══ */
    @media (max-width: 900px) {
      .hero-grid, .profile-grid, .vm-pair, .berita-grid, .kalender-wrap, .footer-grid { grid-template-columns: 1fr; }
      .kostum-grid { grid-template-columns: 1fr 1fr; }
      .hero-logo-wrap { display: none; }
      .galeri-mosaik { grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
      .g-item:nth-child(1), .g-item:nth-child(4) { grid-row: span 1; grid-column: span 1; }
    }
    @media (max-width: 600px) {
      .nav-links { gap: 0; }
      .nav-links a { padding: 0.35rem 0.5rem; font-size: 0.7rem; }
      .kostum-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<nav>
  <div class="nav-logo">
    <div class="logo-circle">JEB</div>
    <span>JEB</span>
  </div>
  <div class="nav-links">
    <a href="#beranda" class="active">Beranda</a>
    <a href="#profile">Profile Sanggar</a>
    <a href="#berita">Artikel/Berita</a>
    <a href="#kalender">Kalender Event</a>
    <a href="#katalog">Katalog Kostum</a>
    <a href="#galeri">Galeri</a>
    <a href="#" class="btn-login">⊙ Login</a>
  </div>
</nav>

<section id="beranda">
  <div class="hero-grid">
    <div class="hero-text">
      <p class="hero-tag">Pusat Seni & Budaya Banyuwangi</p>
      <h1>Sanggar Tari<br /><em>Jiwa Etnik</em><br />Blambangan</h1>
      <p>Pusat pelestarian seni dan budaya tari tradisional Banyuwangi. Menggerakkan jiwa, merayakan budaya, melestarikan warisan Nusantara.</p>
      <a href="#galeri" class="btn btn-outline-white">Lihat Galeri</a>
    </div>
    <div class="hero-logo-wrap">
      <div class="logo-big">
        <div class="logo-inner">
          <p class="logo-text-top">Jiwa<br />Etnik</p>
          <p class="logo-text-bottom">BLAMBANGAN</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="profile">
  <div class="section-inner">
    <div class="text-center">
      <span class="section-badge">Tentang Kami</span>
      <h2 class="section-heading">Profile Sanggar</h2>
      <p class="section-sub">Mengenal lebih dekat Sanggar Tari Jiwa Etnik Blambangan</p>
    </div>
    <div class="profile-grid">
      <div class="profile-text">
        <h3>Melestarikan Budaya Banyuwangi</h3>
        <p>Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara.</p>
        <p>Kami membina generasi muda untuk mencintai dan menguasai seni tari tradisional, mulai dari tari Gandrung, hingga tari kreasi baru berbasis budaya lokal Blambangan.</p>
        <p>Dengan pengajar berpengalaman dan metode pembelajaran yang menyenangkan, kami hadir untuk semua kalangan usia.</p>
        <a href="#kalender" class="btn btn-red" style="margin-top:1.2rem;">Lihat Jadwal Latihan →</a>
      </div>
      <div class="profile-card">
        <div class="card-icon">💃</div>
        <h4>Warisan Budaya Blambangan</h4>
        <p>Tari Tradisional adalah jiwa dan identitas budaya kita. Bersama kami, lestarikan dan rayakan kekayaan seni Nusantara dengan penuh semangat dan kebanggaan.</p>
      </div>
    </div>
  </div>
</section>

<section id="visi-misi">
  <div class="section-inner">
    <div class="text-center">
      <p style="font-family:'Cinzel',serif; font-size:0.72rem; color:var(--text-light); letter-spacing:0.3em; text-transform:uppercase; margin-bottom:0.5rem;">✦ Landasan Kami ✦</p>
      <h2 class="section-heading">VISI <em>&</em> MISI</h2>
      <p class="section-sub">Nilai-nilai yang mendasari setiap langkah dan gerakan Sanggar Tari JEB</p>
    </div>
    <div class="vm-pair">
      <div class="visi-box">
        <h3>VISI</h3>
        <p>Menjadi sanggar seni yang unggul, berkarakter, (bisa) dan memiliki keunikan tersendiri (berbeda) serta mampu menghasilkan karya nyata dalam pelestarian dan pengembangan seni setiap Blambangan di Banyuwangi</p>
      </div>
      <div class="misi-box">
        <h3>MISI</h3>
        <ul>
          <li>Mengembangkan potensi anggota agar memiliki kemampuan (bisa) yang terampil dan profesional di bidang seni budaya.</li>
          <li>Menciptakan karya seni yang inovatif, kreatif, dan memiliki ciri khas (beda) tanpa meninggalkan nilai-nilai budaya Blambangan.</li>
          <li>Menghasilkan karya nyata melalui pertunjukan, karya cipta, dan partisipasi aktif dalam berbagai kegiatan seni.</li>
          <li>Menyelenggarakan pelatihan dan pembinaan seni secara berkelanjutan dan berkualitas</li>
          <li>Menanamkan sikap disiplin, tanggung jawab, dan kecintaan terhadap seni budaya kepada seluruh anggota.</li>
          <li>Membangun kerja sama dengan berbagai pihak untuk mendukung perkembangan dan eksistensi sanggar.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="berita">
  <div class="section-inner">
    <div class="text-center">
      <span class="section-badge">Informasi</span>
      <h2 class="section-heading">Berita <em>&</em> Artikel</h2>
      <p class="section-sub">Kabar terbaru kegiatan dan prestasi sanggar JEB</p>
    </div>
    <div class="berita-grid">
      <div class="berita-main">
        <span class="badge-utama">BERITA UTAMA</span>
        <h3>Sanggar Tari JEB Raih Penghargaan Terbaik di Festival Seni Budaya Jawa Timur 2026</h3>
        <p>Sanggar Tari Jiwa Etnik Blambangan mencatatkan nama Banyuwangi dengan meraih penghargaan terbaik pada ajang Festival Seni Budaya Jawa Timur 2026 yang digelar di Surabaya.</p>
        <div class="meta">
          <span>Berita &nbsp;·&nbsp; 22 Feb 2026 &nbsp;·&nbsp; Raka Permana, SE</span>
          <a href="#" class="btn btn-red btn-sm">Baca Selengkapnya</a>
        </div>
      </div>
      <div class="berita-side">
        <div class="berita-item">
          <div class="berita-item-img"></div>
          <div>
            <p class="tag-kecil">Kegiatan</p>
            <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
            <p class="meta-kecil">8 Maret 2026 &nbsp;·&nbsp; Raka Permana</p>
          </div>
        </div>
        <div class="berita-item">
          <div class="berita-item-img"></div>
          <div>
            <p class="tag-kecil">Kegiatan</p>
            <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
            <p class="meta-kecil">8 Maret 2026 &nbsp;·&nbsp; Raka Permana</p>
          </div>
        </div>
        <div class="berita-item">
          <div class="berita-item-img"></div>
          <div>
            <p class="tag-kecil">Kegiatan</p>
            <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
            <p class="meta-kecil">8 Maret 2026 &nbsp;·&nbsp; Raka Permana</p>
          </div>
        </div>
        <div class="berita-item">
          <div class="berita-item-img"></div>
          <div>
            <p class="tag-kecil">Kegiatan</p>
            <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
            <p class="meta-kecil">15 Januari 2026 &nbsp;·&nbsp; Raka Permana</p>
          </div>
        </div>
      </div>
    </div>
    <div class="center-btn">
      <a href="#" class="btn btn-red-outline">Lihat Semua Berita</a>
    </div>
  </div>
</section>

<section id="katalog">
  <div class="section-inner">
    <div class="text-center">
      <h2 class="section-heading white">Katalog Kostum</h2>
      <p class="section-sub white">Koleksi Kostum tari tradisional dan kreasi Sanggar JEB</p>
    </div>
    <div class="kostum-grid">
      <div class="kostum-card">
        <div class="kostum-img">👘<span class="kostum-badge">Tradisional</span></div>
        <div class="kostum-body">
          <h4>Tari Gandrung</h4>
          <p>Tari penyambutan tamu agung dari Banyuwangi</p>
          <div class="kostum-footer">
            <span class="tag-tipe">Klasik</span>
            <span class="kostum-icons">👁 42 &nbsp; ❤ 18</span>
          </div>
        </div>
      </div>
      <div class="kostum-card">
        <div class="kostum-img">🌸<span class="kostum-badge">Tradisional</span></div>
        <div class="kostum-body">
          <h4>Tari Gandrung</h4>
          <p>Tari penyambutan tamu agung dari Banyuwangi</p>
          <div class="kostum-footer">
            <span class="tag-tipe">Klasik</span>
            <span class="kostum-icons">👁 36 &nbsp; ❤ 14</span>
          </div>
        </div>
      </div>
      <div class="kostum-card">
        <div class="kostum-img">🦚<span class="kostum-badge">Tradisional</span></div>
        <div class="kostum-body">
          <h4>Tari Gandrung</h4>
          <p>Tari penyambutan tamu agung dari Banyuwangi</p>
          <div class="kostum-footer">
            <span class="tag-tipe">Klasik</span>
            <span class="kostum-icons">👁 29 &nbsp; ❤ 11</span>
          </div>
        </div>
      </div>
      <div class="kostum-card">
        <div class="kostum-img">🎭<span class="kostum-badge">Tradisional</span></div>
        <div class="kostum-body">
          <h4>Tari Gandrung</h4>
          <p>Tari penyambutan tamu agung dari Banyuwangi</p>
          <div class="kostum-footer">
            <span class="tag-tipe">Klasik</span>
            <span class="kostum-icons">👁 51 &nbsp; ❤ 22</span>
          </div>
        </div>
      </div>
      <div class="kostum-card">
        <div class="kostum-img">🌺<span class="kostum-badge">Tradisional</span></div>
        <div class="kostum-body">
          <h4>Tari Gandrung</h4>
          <p>Tari penyambutan tamu agung dari Banyuwangi</p>
          <div class="kostum-footer">
            <span class="tag-tipe">Klasik</span>
            <span class="kostum-icons">👁 33 &nbsp; ❤ 9</span>
          </div>
        </div>
      </div>
      <div class="kostum-card">
        <div class="kostum-img">🎪<span class="kostum-badge">Tradisional</span></div>
        <div class="kostum-body">
          <h4>Tari Gandrung</h4>
          <p>Tari penyambutan tamu agung dari Banyuwangi</p>
          <div class="kostum-footer">
            <span class="tag-tipe">Klasik</span>
            <span class="kostum-icons">👁 27 &nbsp; ❤ 8</span>
          </div>
        </div>
      </div>
    </div>
    <div class="center-btn">
      <a href="#" class="btn" style="background:rgba(255,255,255,0.12); color:var(--white); border: 1.5px solid rgba(255,255,255,0.3);">Lihat semua Katalog</a>
    </div>
  </div>
</section>

<section id="kalender">
  <div class="section-inner">
    <div class="text-center">
      <span class="section-badge">Kegiatan</span>
      <h2 class="section-heading">Kalender Event</h2>
      <p class="section-sub">Jadwal pentas dan kegiatan Sanggar JEB</p>
    </div>
    <div class="kalender-wrap">
      <!-- Mini Calendar -->
      <div class="mini-cal">
        <div class="cal-header">
          <button>‹</button>
          <span>Maret 2026</span>
          <button>›</button>
        </div>
        <div class="cal-body">
          <div class="cal-days-head">
            <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
          </div>
          <div class="cal-days">
            <span class="empty">22</span><span class="empty">23</span><span class="empty">24</span><span class="empty">25</span><span class="empty">26</span><span class="empty">27</span><span class="empty">28</span>
            <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span>
            <span class="has-event">8</span><span>9</span><span>10</span><span>11</span><span class="today">12</span><span>13</span><span>14</span>
            <span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span><span class="has-event">21</span>
            <span>22</span><span>23</span><span>24</span><span>25</span><span>26</span><span>27</span><span>28</span>
            <span class="has-event">29</span><span>30</span><span>31</span><span class="empty">1</span><span class="empty">2</span><span class="empty">3</span><span class="empty">4</span>
          </div>
        </div>
      </div>
      <div class="event-list">
        <div class="event-row">
          <div class="ev-date-box"><div class="ev-num">21</div><div class="ev-mon">MAR</div></div>
          <div class="ev-info">
            <h5>Pentas Tari Gandrung</h5>
            <p>Pertunjukan tari Gandrung dalam rangkaian perayaan HUT Kabupaten Banyuwangi di Taman Blambangan.</p>
            <div class="ev-meta">
              <span>📍 Banyuwangi Indah, Bwi</span>
              <span>🕐 19.00 WIB</span>
            </div>
          </div>
        </div>
        <div class="event-row">
          <div class="ev-date-box"><div class="ev-num">21</div><div class="ev-mon">MAR</div></div>
          <div class="ev-info">
            <h5>Pentas Tari Gandrung</h5>
            <p>Pertunjukan tari Gandrung dalam rangkaian perayaan HUT Kabupaten Banyuwangi di Taman Blambangan.</p>
            <div class="ev-meta">
              <span>📍 Banyuwangi Indah, Bwi</span>
              <span>🕐 19.00 WIB</span>
            </div>
          </div>
        </div>
        <div class="event-row">
          <div class="ev-date-box"><div class="ev-num">21</div><div class="ev-mon">MAR</div></div>
          <div class="ev-info">
            <h5>Pentas Tari Gandrung</h5>
            <p>Pertunjukan tari Gandrung dalam rangkaian perayaan HUT Kabupaten Banyuwangi di Taman Blambangan.</p>
            <div class="ev-meta">
              <span>📍 Banyuwangi Indah, Bwi</span>
              <span>🕐 19.00 WIB</span>
            </div>
          </div>
        </div>
        <div class="event-row">
          <div class="ev-date-box"><div class="ev-num">21</div><div class="ev-mon">MAR</div></div>
          <div class="ev-info">
            <h5>Pentas Tari Gandrung</h5>
            <p>Pertunjukan tari Gandrung dalam rangkaian perayaan HUT Kabupaten Banyuwangi di Taman Blambangan.</p>
            <div class="ev-meta">
              <span>📍 Banyuwangi Indah, Bwi</span>
              <span>🕐 19.00 WIB</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="galeri">
  <div class="section-inner">
    <div class="text-center">
      <span class="section-badge-outline" style="color:var(--gold-light); border-color:var(--gold-light);">Dokumentasi</span>
      <h2 class="section-heading white">Galeri Sanggar</h2>
      <p class="section-sub white">Momen indah perjalanan seni dan budaya Jiwa Etnik Blambangan</p>
    </div>
    <div class="galeri-mosaik">
      <div class="g-item">🎭<div class="g-label">Pentas Gandrung 2026</div></div>
      <div class="g-item">🌸<div class="g-label">Latihan Rutin</div></div>
      <div class="g-item">🦚<div class="g-label">Festival Seni</div></div>
      <div class="g-item">🥁<div class="g-label">Kostum Tradisional</div></div>
      <div class="g-item">💃<div class="g-label">Pentas Akhir Tahun</div></div>
    </div>
    <div class="center-btn" style="margin-top: 2rem;">
      <a href="#" class="btn btn-outline-white">Lihat selengkapnya</a>
    </div>
  </div>
</section>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <h3>Jiwa Etnik Blambangan</h3>
      <p>Sanggar Tari Jiwa Etnik Blambangan — Pusat pelestarian seni dan budaya tari tradisional Banyuwangi. Melestarikan warisan, membangun generasi.</p>
    </div>
    <div class="footer-col">
      <h4>Menu</h4>
      <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#profile">Profile Sanggar</a></li>
        <li><a href="#berita">Artikel / Berita</a></li>
        <li><a href="#kalender">Kalender Event</a></li>
        <li><a href="#katalog">Katalog Kostum</a></li>
        <li><a href="#galeri">Galeri</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Kontak</h4>
      <ul>
        <li><a href=" https://maps.app.goo.gl/VGsB6WskWPLiZ8hh9?g_st=iw">📍 Sanggar Seni jiwa etnik blambangan</a></li>
        <li><a href="https://api.whatsapp.com/send/?phone=6282232505355&text&type=phone_number&app_absent=0&utm_source=ig">📞 +62 822-3250-5355</a></li>
        <li><a href="https://www.instagram.com/jiwaetnikblambangan/">📷 @jiwaetnikblambangan</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    © 2026 Sanggar Tari Jiwa Etnik Blambangan · Melestarikan Warisan Budaya Nusantara
  </div>
</footer>

<script>
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-links a');
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 80) current = s.getAttribute('id');
    });
    navLinks.forEach(a => {
      a.classList.remove('active');
      if (a.getAttribute('href') === '#' + current) a.classList.add('active');
    });
  });
</script>
</body>
</html>