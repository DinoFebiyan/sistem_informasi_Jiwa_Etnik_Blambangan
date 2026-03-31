<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sanggar Tari Jiwa Etnik Blambangan</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    
    :root {
      --maroon-dark: #4a0c0c; 
      --red-bg: #b51c1c;      
      --red-card: #c42020;    
      --gold: #dfb15b;        
      --cream: #f8f1e1;       
      --text-dark: #333333;
      --text-gray: #666666;
      --white: #ffffff;
    }

    body { 
      font-family: 'Poppins', sans-serif; 
      background: var(--white); 
      color: var(--text-dark); 
      overflow-x: hidden; 
      scroll-behavior: smooth;
    }

    /* ══ NAVBAR ══ */
    nav {
      position: sticky; top: 0; z-index: 200;
      background: var(--maroon-dark);
      display: flex; align-items: center; justify-content: space-between;
      padding: 0.8rem 4%;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .nav-logo {
      display: flex; align-items: center; gap: 1rem;
    }
    .logo-img-nav {
      width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid var(--white);
    }
    .nav-logo span {
      font-family: 'Playfair Display', serif; font-style: italic;
      font-weight: 700; font-size: 1.5rem; color: var(--white); letter-spacing: 1px;
    }
    .nav-links { display: flex; align-items: center; gap: 1.5rem; }
    .nav-links a {
      color: var(--white); text-decoration: none; font-size: 0.85rem; font-weight: 400;
      transition: color .2s;
    }
    .nav-links a:hover, .nav-links a.active { color: var(--gold); }
    .btn-login {
      border: 1px solid var(--gold); color: var(--gold) !important;
      border-radius: 20px; padding: 0.4rem 1.2rem; display: flex; align-items: center; gap: 0.4rem;
    }
    .btn-login:hover { background: var(--gold); color: var(--maroon-dark) !important; }

    /* ══ HERO ══ */
    #beranda {
      background: linear-gradient(135deg, #a71818 0%, #c42020 100%);
      min-height: 90vh;
      display: flex; align-items: center;
      padding: 4rem 8%;
    }
    .hero-grid { 
      display: grid; grid-template-columns: 1fr 1fr; align-items: center; gap: 2rem; width: 100%; 
    }
    .hero-text {
      text-align: center; 
    }
    .hero-text h1 {
      font-family: 'Playfair Display', serif; 
      font-weight: 900; 
      color: var(--white); 
      font-size: 3rem; 
      line-height: 1.1; 
      margin-bottom: 0.5rem;
    }
    .hero-text h1 .script {
      display: block; 
      font-family: 'Brush Script MT', cursive; 
      font-style: italic; 
      font-weight: 400; 
      color: var(--gold); 
      font-size: 5.5rem; 
      line-height: 0.9; 
      margin: 0.2rem 0 1.2rem 0;
    }
    .hero-text p {
      font-family: 'Poppins', sans-serif;
      color: rgba(255,255,255,0.95); 
      font-size: 0.95rem; 
      line-height: 1.5; 
      max-width: 450px; 
      margin: 0 auto 2rem auto; 
      font-weight: 400;
    }
    .btn-gray-pill {
      font-family: 'Poppins', sans-serif;
      background: #e0e0e0; 
      color: #b51c1c; 
      font-weight: 700; 
      font-size: 1rem;
      padding: 0.8rem 2.5rem; 
      border-radius: 30px; 
      text-decoration: none; 
      display: inline-block;
      transition: transform .2s;
    }
    .btn-gray-pill:hover { 
      transform: translateY(-3px); 
      background: var(--white); 
    }
    
    .hero-logo-wrap { display: flex; justify-content: flex-end; }
    .logo-img-hero {
      width: clamp(280px, 40vw, 400px); height: clamp(280px, 40vw, 400px);
      border-radius: 50%; object-fit: cover;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      background: var(--white); border: 8px solid var(--white);
    }

    /* ══ GLOBAL SECTIONS ══ */
    section { padding: 5rem 8%; }
    .section-header { text-align: center; margin-bottom: 3rem; }
    .badge-pill {
      display: inline-block; background: var(--red-bg); color: var(--white);
      font-size: 0.7rem; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;
      padding: 0.3rem 1.2rem; border-radius: 20px; margin-bottom: 0.8rem;
    }
    .section-title {
      font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700; color: var(--maroon-dark); margin-bottom: 0.5rem;
    }
    .section-subtitle { font-size: 0.9rem; color: var(--text-gray); }

    /* ══ PROFILE ══ */
    #profile { background: var(--white); }
    .profile-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
    .profile-text h3 {
      font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--maroon-dark); margin-bottom: 1.2rem;
    }
    .profile-text p { font-size: 0.9rem; line-height: 1.8; color: var(--text-gray); margin-bottom: 1rem; }
    .profile-card {
      background: var(--red-card); border-radius: 20px; padding: 3rem 2rem; text-align: center; color: var(--white); position: relative; margin-top: 2rem;
    }
    .profile-card-img {
      width: 180px; height: auto; position: absolute; top: -100px; left: 50%; transform: translateX(-50%);
    }
    .profile-card h4 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--gold); margin: 3rem 0 1rem; }
    .profile-card p { font-size: 0.85rem; line-height: 1.6; color: rgba(255,255,255,0.9); }

    /* ══ VISI MISI ══ */
    #visi-misi { background: var(--white); }
    .vm-container { display: flex; flex-direction: column; gap: 2rem; max-width: 800px; margin: 0 auto; }
    .visi-box {
      background: linear-gradient(135deg, var(--red-bg), var(--maroon-dark));
      border-radius: 10px; padding: 2.5rem; text-align: center; color: var(--white);
    }
    .visi-box h3 { font-family: 'Playfair Display', serif; font-weight: 700; color: var(--gold); font-size: 1.5rem; margin-bottom: 1rem; }
    .visi-box p { font-size: 0.95rem; line-height: 1.6; }
    
    .misi-box {
      background: var(--cream); border-radius: 10px; padding: 2.5rem; text-align: center; color: var(--text-dark);
    }
    .misi-box h3 { font-family: 'Playfair Display', serif; font-weight: 700; color: var(--maroon-dark); font-size: 1.5rem; margin-bottom: 1.5rem; }
    .misi-box p { font-size: 0.95rem; line-height: 1.8; margin-bottom: 1rem; color: var(--text-gray); }

    /* ══ BERITA ══ */
    #berita { background: var(--white); }
    .berita-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem; }
    .berita-main {
      background: var(--maroon-dark); border-radius: 12px; padding: 2.5rem;
      display: flex; flex-direction: column; min-height: 380px;
    }
    .badge-yellow {
      align-self: flex-start;
      margin-bottom: auto;
      background: var(--gold); color: var(--maroon-dark);
      font-size: 0.75rem; font-weight: 700; padding: 0.4rem 1.2rem; border-radius: 20px; text-transform: uppercase;
    }
    .berita-main h3 { font-family: 'Playfair Display', serif; font-weight: 700; color: var(--white); font-size: 1.6rem; margin-bottom: 1.2rem; line-height: 1.4; margin-top: 1.5rem; }
    .berita-main p { color: rgba(255,255,255,0.7); font-size: 0.85rem; line-height: 1.6; margin-bottom: 2rem; }
    .meta { display: flex; justify-content: space-between; align-items: center; }
    .meta span { color: rgba(255,255,255,0.5); font-size: 0.8rem; }
    .btn-red-pill { background: #8b1010; color: var(--white); text-decoration: none; padding: 0.6rem 1.5rem; border-radius: 25px; font-size: 0.85rem; font-weight: 600; transition: background 0.3s; }
    .btn-red-pill:hover { background: #6b0808; }

    .berita-list { display: flex; flex-direction: column; gap: 1rem; }
    .berita-item {
      display: flex; gap: 1rem; background: #f9f9f9; border-radius: 12px; border: 1px solid #eee; overflow: hidden;
    }
    .berita-img-placeholder { width: 100px; background: var(--maroon-dark); }
    .berita-item-content { padding: 1rem; display: flex; flex-direction: column; justify-content: center; }
    .berita-item-content .tag { color: var(--gold); font-size: 0.7rem; font-weight: 600; margin-bottom: 0.3rem; text-transform: uppercase; }
    .berita-item-content h5 { font-family: 'Poppins', sans-serif; font-size: 0.9rem; font-weight: 600; color: var(--text-dark); margin-bottom: 0.3rem; }
    .berita-item-content span { font-size: 0.75rem; color: #999; }
    
    .center-action { text-align: center; margin-top: 2rem; }
    .btn-dark-pill { background: var(--maroon-dark); color: var(--white); padding: 0.6rem 2rem; border-radius: 30px; text-decoration: none; font-size: 0.85rem; font-weight: 500;}

    /* ══ KATALOG KOSTUM ══ */
    #katalog { background: var(--red-bg); }
    .white { color: var(--white); }
    .katalog-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-bottom: 3rem; }
    .katalog-card { background: var(--white); border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    
    .katalog-img { 
      height: 220px; 
      background: linear-gradient(to bottom, #b3b3b3, #e5e5e5); 
      position: relative; 
    }
    .katalog-img .badge { 
      position: absolute; top: 1.2rem; left: 1.2rem; 
      background: #f1c40f; color: #333; 
      font-size: 0.75rem; font-weight: 700; 
      padding: 0.3rem 1rem; border-radius: 20px; 
    }
    
    .katalog-info { padding: 1.5rem; }
    .katalog-info h4 { font-family: 'Poppins', sans-serif; font-size: 1.1rem; font-weight: 700; color: var(--text-dark); margin-bottom: 0.5rem; }
    .katalog-info p { font-size: 0.85rem; color: var(--text-gray); margin-bottom: 1.5rem; line-height: 1.6; }
    
    .katalog-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; padding-top: 1rem; }
    .katalog-footer .tipe { color: #28a745; font-size: 0.9rem; font-weight: 700; }
    
    .katalog-actions { display: flex; gap: 0.5rem; }
    /* Penyesuaian tombol Edit & Hapus */
    .katalog-actions button { 
      background: var(--white); border: 1px solid #ddd; 
      padding: 0.35rem 0.8rem; border-radius: 6px; 
      font-size: 0.75rem; font-weight: 500; font-family: 'Poppins', sans-serif; 
      cursor: pointer; color: #555; 
      display: flex; align-items: center; justify-content: center;
      transition: background 0.2s, color 0.2s, border-color 0.2s;
    }
    .katalog-actions button:hover { background: #f5f5f5; color: var(--maroon-dark); border-color: #bbb; }

    .btn-dark-red-pill { 
      background: #7a1212; color: var(--white); 
      padding: 0.8rem 2.5rem; border-radius: 30px; 
      text-decoration: none; font-size: 0.9rem; font-weight: 600; 
      transition: background 0.3s;
    }
    .btn-dark-red-pill:hover { background: #5c0d0d; }

    /* ══ KALENDER ══ */
    #kalender { background: var(--white); }
    .kalender-grid { display: grid; grid-template-columns: 300px 1fr; gap: 2rem; align-items: start; }
    .cal-widget { border: 1px solid #eee; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .cal-header { background: var(--maroon-dark); color: var(--white); padding: 1rem; text-align: center; font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.1rem; }
    .cal-body { padding: 1rem; background: var(--white); }
    .cal-grid { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; gap: 5px; }
    .cal-grid span { font-size: 0.8rem; padding: 0.5rem 0; color: var(--text-gray); }
    .day-name { font-size: 0.7rem; color: #aaa; margin-bottom: 0.5rem; }
    .cal-grid .active { background: var(--maroon-dark); color: var(--white); border-radius: 5px; font-weight: 600; }
    .event-day { background: var(--red-bg); color: var(--white); border-radius: 5px; }

    .event-list { display: flex; flex-direction: column; gap: 1rem; }
    .event-card { border: 1px solid #eee; border-radius: 12px; padding: 1rem; display: flex; gap: 1.5rem; align-items: center; }
    .event-date { background: var(--maroon-dark); color: var(--white); text-align: center; border-radius: 8px; padding: 0.8rem 1rem; min-width: 70px; }
    .event-date h2 { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.5rem; line-height: 1; }
    .event-date span { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; }
    .event-info h4 { font-size: 1rem; font-weight: 600; color: var(--text-dark); margin-bottom: 0.3rem; }
    .event-info p { font-size: 0.8rem; color: var(--text-gray); margin-bottom: 0.5rem; }
    .event-info .meta { font-size: 0.75rem; color: var(--maroon-dark); font-weight: 500; display: flex; gap: 1rem; }

    /* ══ GALERI ══ */
    #galeri { background: var(--red-bg); }
    .galeri-mosaik {
      display: grid; grid-template-columns: 1fr 1fr 1fr; grid-auto-rows: 200px; gap: 1rem; margin-bottom: 2rem;
    }
    .g-box { background: var(--maroon-dark); border: 1px solid rgba(255,255,255,0.2); border-radius: 12px; }
    .g-box.large { grid-row: span 2; }

    /* ══ FOOTER ══ */
    footer {
      background: var(--maroon-dark);
      color: var(--white);
      padding: 4rem 8% 2rem;
      border-top: 4px solid var(--gold);
    }
    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 3rem;
      margin-bottom: 3rem;
    }
    .footer-brand h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      color: var(--gold);
      margin-bottom: 1rem;
    }
    .footer-brand p {
      font-size: 0.85rem;
      color: rgba(255,255,255,0.7);
      line-height: 1.8;
      max-width: 400px;
    }
    .footer-links h4 {
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      margin-bottom: 1.2rem;
      color: var(--white);
    }
    .footer-links ul {
      list-style: none;
    }
    .footer-links ul li {
      margin-bottom: 0.8rem;
    }
    .footer-links ul li a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      font-size: 0.85rem;
      transition: color 0.3s;
    }
    .footer-links ul li a:hover {
      color: var(--gold);
    }
    .footer-bottom {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid rgba(255,255,255,0.1);
      font-size: 0.8rem;
      color: rgba(255,255,255,0.5);
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
      .hero-grid, .profile-grid, .berita-grid, .kalender-grid, .footer-grid { grid-template-columns: 1fr; }
      .katalog-grid { grid-template-columns: 1fr 1fr; }
      .hero-logo-wrap { justify-content: center; margin-top: 2rem; }
      .galeri-mosaik { grid-template-columns: 1fr 1fr; }
      .g-box.large { grid-row: span 1; grid-column: span 2; }
    }
    @media (max-width: 600px) {
      .katalog-grid { grid-template-columns: 1fr; }
      .nav-links { display: none; } 
    }
  </style>
</head>
<body>

<nav>
  <div class="nav-logo">
    <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo JEB" class="logo-img-nav" />
    <span>JEB</span>
  </div>
  <div class="nav-links">
    <a href="#beranda" class="active">Beranda</a>
    <a href="#profile">Profile Sanggar</a>
    <a href="#berita">Artikel/Berita</a>
    <a href="#kalender">Kalender Event</a>
    <a href="#katalog">Katalog Kostum</a>
    <a href="#galeri">Galeri</a>
    <a href="#" class="btn-login">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
      Login
    </a>
  </div>
</nav>

<section id="beranda">
  <div class="hero-grid">
    <div class="hero-text">
      <h1>Sanggar Tari <span class="script">Jiwa Etnik Blambangan</span></h1>
      <p>Pusat pelestarian seni dan budaya tari tradisional Banyuwangi. Menggerakkan jiwa, merayakan budaya, melestarikan warisan Nusantara.</p>
      <a href="#galeri" class="btn-gray-pill">Lihat Galeri</a>
    </div>
    <div class="hero-logo-wrap">
      <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo Sanggar Jiwa Etnik Blambangan" class="logo-img-hero" />
    </div>
  </div>
</section>

<section id="profile">
  <div class="section-header">
    <span class="badge-pill">TENTANG KAMI</span>
    <h2 class="section-title">Profile Sanggar</h2>
    <p class="section-subtitle">Mengenal lebih dekat Sanggar Tari Jiwa Etnik Blambangan</p>
  </div>
  <div class="profile-grid">
    <div class="profile-text">
      <h3>Melestarikan Budaya Banyuwangi</h3>
      <p>Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara.</p>
      <p>Kami membina generasi muda untuk mencintai dan menguasai seni tari tradisional, mulai dari tari Gandrung, hingga tari kreasi baru berbasis budaya lokal Blambangan.</p>
      <p>Dengan pengajar berpengalaman dan metode pembelajaran yang menyenangkan, kami hadir untuk semua kalangan usia.</p>
    </div>
    <div class="profile-card">
      <img src="{{ asset('img/icon.png') }}" alt="Ilustrasi Penari" class="profile-card-img">
      <h4>Warisan Budaya Blambangan</h4>
      <p>Tari Tradisional adalah jiwa dari identitas budaya kita. Bersama kami, lestarikan dan rayakan kekayaan seni Nusantara.</p>
    </div>
  </div>
</section>

<section id="visi-misi">
  <div class="section-header">
    <p style="font-size: 0.8rem; letter-spacing: 2px; color: var(--text-gray); margin-bottom: 0.5rem;">✦ Landasan Kami ✦</p>
    <h2 class="section-title">VISI <em>&</em> MISI</h2>
    <p class="section-subtitle">Nilai-nilai yang mendasari setiap langkah dan gerakan Sanggar Tari JEB</p>
  </div>
  <div class="vm-container">
    <div class="visi-box">
      <h3>VISI</h3>
      <p>Menjadi sanggar seni yang unggul, berkarakter, (bisa) dan memiliki keunikan tersendiri (berbeda) serta mampu menghasilkan karya nyata dalam pelestarian dan pengembangan seni budaya Blambangan di Banyuwangi.</p>
    </div>
    <div class="misi-box">
      <h3>MISI</h3>
      <p>Mengembangkan potensi anggota agar memiliki kemampuan (bisa) yang terampil dan profesional di bidang seni budaya.</p>
      <p>Menciptakan karya seni yang inovatif, kreatif, dan memiliki ciri khas (beda) tanpa meninggalkan nilai-nilai budaya Blambangan.</p>
      <p>Menghasilkan karya nyata melalui pertunjukan, karya cipta, dan partisipasi aktif dalam berbagai kegiatan seni.</p>
      <p>Menyelenggarakan pelatihan dan pembinaan seni secara berkelanjutan dan berkualitas.</p>
      <p>Menanamkan sikap disiplin, tanggung jawab, dan kecintaan terhadap seni budaya kepada seluruh anggota.</p>
      <p>Membangun kerja sama dengan berbagai pihak untuk mendukung perkembangan dan eksistensi sanggar.</p>
    </div>
  </div>
</section>

<section id="berita">
  <div class="section-header">
    <span class="badge-pill">INFORMASI</span>
    <h2 class="section-title">Berita & Artikel</h2>
    <p class="section-subtitle">Kabar terbaru kegiatan dan prestasi sanggar JEB</p>
  </div>
  <div class="berita-grid">
    <div class="berita-main">
      <span class="badge-yellow">BERITA UTAMA</span>
      <h3>Sanggar Tari JEB Raih Penghargaan Terbaik di Festival Seni Budaya Jawa Timur 2026</h3>
      <p>Sanggar Tari Jiwa Etnik Blambangan kembali mengharumkan nama Banyuwangi dengan meraih penghargaan bergengsi pada ajang Festival Seni Budaya Jawa Timur 2026 yang digelar di Surabaya. Prestasi membanggakan ini merupakan buah dari kerja keras seluruh penari dan pengajar sanggar selama bertahun-tahun.</p>
      <div class="meta">
        <span>Berita • 22 Feb 2026 • Raka Permana, S.E.</span>
        <a href="#" class="btn-red-pill">Baca Selengkapnya</a>
      </div>
    </div>
    <div class="berita-list">
      <div class="berita-item">
        <div class="berita-img-placeholder"></div>
        <div class="berita-item-content">
          <span class="tag">Kegiatan</span>
          <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
          <span>12 Maret 2026 - Raka Pratama</span>
        </div>
      </div>
      <div class="berita-item">
        <div class="berita-img-placeholder"></div>
        <div class="berita-item-content">
          <span class="tag">Kegiatan</span>
          <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
          <span>12 Maret 2026 - Raka Pratama</span>
        </div>
      </div>
      <div class="berita-item">
        <div class="berita-img-placeholder"></div>
        <div class="berita-item-content">
          <span class="tag">Kegiatan</span>
          <h5>Latihan Perdana Peserta Didik Baru Akan Segera Dimulai</h5>
          <span>12 Maret 2026 - Raka Pratama</span>
        </div>
      </div>
    </div>
  </div>
  <div class="center-action">
    <a href="#" class="btn-dark-pill">Lihat Semua Berita</a>
  </div>
</section>

<section id="katalog">
  <div class="section-header">
    <h2 class="section-title white">Katalog Kostum</h2>
    <p class="section-subtitle white">Koleksi Kostum tari tradisional dan kreasi Sanggar JEB</p>
  </div>
  <div class="katalog-grid">
    <div class="katalog-card">
      <div class="katalog-img"><span class="badge">Tradisional</span></div>
      <div class="katalog-info">
        <h4>Tari Gandrung</h4>
        <p>Tari penyambutan tamu agung khas Banyuwangi.</p>
        <div class="katalog-footer">
          <span class="tipe">Tayang</span>
          <div class="katalog-actions">
            <button>Edit</button>
            <button>Hapus</button>
          </div>
        </div>
      </div>
    </div>
    <div class="katalog-card">
      <div class="katalog-img"><span class="badge">Tradisional</span></div>
      <div class="katalog-info">
        <h4>Tari Gandrung</h4>
        <p>Tari penyambutan tamu agung khas Banyuwangi.</p>
        <div class="katalog-footer">
          <span class="tipe">Tayang</span>
          <div class="katalog-actions">
            <button>Edit</button>
            <button>Hapus</button>
          </div>
        </div>
      </div>
    </div>
    <div class="katalog-card">
      <div class="katalog-img"><span class="badge">Tradisional</span></div>
      <div class="katalog-info">
        <h4>Tari Gandrung</h4>
        <p>Tari penyambutan tamu agung khas Banyuwangi.</p>
        <div class="katalog-footer">
          <span class="tipe">Tayang</span>
          <div class="katalog-actions">
            <button>Edit</button>
            <button>Hapus</button>
          </div>
        </div>
      </div>
    </div>
    <div class="katalog-card">
      <div class="katalog-img"><span class="badge">Tradisional</span></div>
      <div class="katalog-info">
        <h4>Tari Gandrung</h4>
        <p>Tari penyambutan tamu agung khas Banyuwangi.</p>
        <div class="katalog-footer">
          <span class="tipe">Tayang</span>
          <div class="katalog-actions">
            <button>Edit</button>
            <button>Hapus</button>
          </div>
        </div>
      </div>
    </div>
    <div class="katalog-card">
      <div class="katalog-img"><span class="badge">Tradisional</span></div>
      <div class="katalog-info">
        <h4>Tari Gandrung</h4>
        <p>Tari penyambutan tamu agung khas Banyuwangi.</p>
        <div class="katalog-footer">
          <span class="tipe">Tayang</span>
          <div class="katalog-actions">
            <button>Edit</button>
            <button>Hapus</button>
          </div>
        </div>
      </div>
    </div>
    <div class="katalog-card">
      <div class="katalog-img"><span class="badge">Tradisional</span></div>
      <div class="katalog-info">
        <h4>Tari Gandrung</h4>
        <p>Tari penyambutan tamu agung khas Banyuwangi.</p>
        <div class="katalog-footer">
          <span class="tipe">Tayang</span>
          <div class="katalog-actions">
            <button>Edit</button>
            <button>Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="center-action">
    <a href="#" class="btn-dark-red-pill">Lihat semua katalog</a>
  </div>
</section>

<section id="kalender">
  <div class="section-header">
    <span class="badge-pill">KEGIATAN</span>
    <h2 class="section-title">Kalender Event</h2>
    <p class="section-subtitle">Jadwal pentas dan kegiatan Sanggar JEB</p>
  </div>
  <div class="kalender-grid">
    <div class="cal-widget">
      <div class="cal-header">Maret 2026</div>
      <div class="cal-body">
        <div class="cal-grid">
          <span class="day-name">Su</span><span class="day-name">Mo</span><span class="day-name">Tu</span><span class="day-name">We</span><span class="day-name">Th</span><span class="day-name">Fr</span><span class="day-name">Sa</span>
          <span class="event-day">1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span>
          <span class="event-day">8</span><span>9</span><span class="active">10</span><span>11</span><span>12</span><span>13</span><span>14</span>
          <span class="event-day">15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span><span>21</span>
          <span class="event-day">22</span><span>23</span><span>24</span><span>25</span><span>26</span><span>27</span><span>28</span>
          <span class="event-day">29</span><span>30</span><span>31</span>
        </div>
      </div>
    </div>
    <div class="event-list">
      <div class="event-card">
        <div class="event-date"><h2>21</h2><span>MAR</span></div>
        <div class="event-info">
          <h4>Pentas Tari Gandrung</h4>
          <p>Penampilan dalam rangka HUT Jadi Kabupaten Banyuwangi ke-254</p>
          <div class="meta"><span>📍 Pendopo Banyuwangi</span><span>🕐 19:00 WIB</span></div>
        </div>
      </div>
       <div class="event-card">
        <div class="event-date"><h2>22</h2><span>MAR</span></div>
        <div class="event-info">
          <h4>Pentas Tari Gandrung</h4>
          <p>Penampilan dalam rangka HUT Jadi Kabupaten Banyuwangi ke-254</p>
          <div class="meta"><span>📍 Pendopo Banyuwangi</span><span>🕐 19:00 WIB</span></div>
        </div>
      </div>
       <div class="event-card">
        <div class="event-date"><h2>23</h2><span>MAR</span></div>
        <div class="event-info">
          <h4>Pentas Tari Gandrung</h4>
          <p>Penampilan dalam rangka HUT Jadi Kabupaten Banyuwangi ke-254</p>
          <div class="meta"><span>📍 Pendopo Banyuwangi</span><span>🕐 19:00 WIB</span></div>
        </div>
      </div>
       <div class="event-card">
        <div class="event-date"><h2>24</h2><span>MAR</span></div>
        <div class="event-info">
          <h4>Pentas Tari Gandrung</h4>
          <p>Penampilan dalam rangka HUT Jadi Kabupaten Banyuwangi ke-254</p>
          <div class="meta"><span>📍 Pendopo Banyuwangi</span><span>🕐 19:00 WIB</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="galeri">
  <div class="section-header">
    <span class="badge-pill" style="background:transparent; border:1px solid var(--gold); color:var(--gold);">DOKUMENTASI</span>
    <h2 class="section-title white">Galeri Sanggar</h2>
    <p class="section-subtitle white">Momen indah perjalanan seni dan budaya Jiwa Etnik Blambangan</p>
  </div>
  <div class="galeri-mosaik">
    <div class="g-box large"></div><div class="g-box"></div><div class="g-box"></div><div class="g-box"></div><div class="g-box"></div>
  </div>
  <div class="center-action"><a href="#" class="btn-gray-pill">Lihat selengkapnya</a></div>
</section>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <h3>Jiwa Etnik Blambangan</h3>
      <p>Sanggar Tari Jiwa Etnik Blambangan adalah pusat pelestarian seni dan budaya tari tradisional Banyuwangi. Kami berdedikasi untuk menggerakkan jiwa, merayakan budaya, dan melestarikan warisan Nusantara.</p>
    </div>
    <div class="footer-links">
      <h4>Tautan Singkat</h4>
      <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#profile">Profile Sanggar</a></li>
        <li><a href="#berita">Artikel & Berita</a></li>
        <li><a href="#katalog">Katalog Kostum</a></li>
      </ul>
    </div>
    <div class="footer-links">
      <h4>Hubungi Kami</h4>
      <ul>
        <li><a href="#">📍 Jl. Ahmad Yani No. 123, Banyuwangi</a></li>
        <li><a href="#">📞 +62 812 3456 7890</a></li>
        <li><a href="#">✉️ info@jiwaetnikblambangan.com</a></li>
        <li><a href="#">📷 @jiwaetnikblambangan</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2026 Sanggar Tari Jiwa Etnik Blambangan. Seluruh Hak Cipta Dilindungi.</p>
  </div>
</footer>

</body>
</html>