@extends('layouts.umum')

@section('title', 'Beranda - Sanggar Tari JEB')

@push('styles')
  <style>
    section {
      padding: 5rem 8%;
    }

    .section-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    /* ══ HERO ══ */
    #beranda {
      background: linear-gradient(135deg, #a71818 0%, #c42020 100%);
      min-height: 90vh;
      display: flex;
      align-items: center;
      padding: 4rem 8%;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      gap: 2rem;
      width: 100%;
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
      color: rgba(255, 255, 255, 0.95);
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

    .hero-logo-wrap {
      display: flex;
      justify-content: flex-end;
    }

    .logo-img-hero {
      width: clamp(280px, 40vw, 400px);
      height: clamp(280px, 40vw, 400px);
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      background: var(--white);
      border: 8px solid var(--white);
    }

    /* ══ GLOBAL SECTIONS ══ */
    section {
      padding: 5rem 8%;
    }

    .section-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .badge-pill {
      display: inline-block;
      background: var(--red-bg);
      color: var(--white);
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      padding: 0.3rem 1.2rem;
      border-radius: 20px;
      margin-bottom: 0.8rem;
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--maroon-dark);
      margin-bottom: 0.5rem;
    }

    .section-subtitle {
      font-size: 0.9rem;
      color: var(--text-gray);
    }

    /* ══ PROFILE ══ */
    #profile {
      background: var(--white);
    }

    .profile-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: center;
    }

    .profile-text h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--maroon-dark);
      margin-bottom: 1.2rem;
    }

    .profile-text p {
      font-size: 0.9rem;
      line-height: 1.8;
      color: var(--text-gray);
      margin-bottom: 1rem;
    }

    .profile-card {
      background: var(--red-card);
      border-radius: 20px;
      padding: 3rem 2rem;
      text-align: center;
      color: var(--white);
      position: relative;
      margin-top: 2rem;
    }

    .profile-card-img {
      width: 180px;
      height: auto;
      position: absolute;
      top: -100px;
      left: 50%;
      transform: translateX(-50%);
    }

    .profile-card h4 {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--gold);
      margin: 3rem 0 1rem;
    }

    .profile-card p {
      font-size: 0.85rem;
      line-height: 1.6;
      color: rgba(255, 255, 255, 0.9);
    }

    .center-action {
      display: flex;
      justify-content: center;
      margin-top: 40px;
      width: 100%;
    }

    /* ══ VISI MISI ══ */
    #visi-misi {
      background: var(--white);
    }

    .vm-container {
      display: flex;
      flex-direction: column;
      gap: 2rem;
      max-width: 800px;
      margin: 0 auto;
    }

    .visi-box {
      background: linear-gradient(135deg, var(--red-bg), var(--maroon-dark));
      border-radius: 10px;
      padding: 2.5rem;
      text-align: center;
      color: var(--white);
    }

    .visi-box h3 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--gold);
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .visi-box p {
      font-size: 0.95rem;
      line-height: 1.6;
    }

    .misi-box {
      background: var(--cream);
      border-radius: 10px;
      padding: 2.5rem;
      text-align: center;
      color: var(--text-dark);
    }

    .misi-box h3 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--maroon-dark);
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .misi-box p {
      font-size: 0.95rem;
      line-height: 1.8;
      margin-bottom: 1rem;
      color: var(--text-gray);
    }

    /* ══ BERITA ══ */
    #berita {
      background: var(--white);
    }

    .berita-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      margin-bottom: 2rem;
    }

    .berita-main {
      background: var(--maroon-dark);
      border-radius: 12px;
      padding: 2.5rem;
      display: flex;
      flex-direction: column;
      min-height: 380px;
    }

    .badge-yellow {
      align-self: flex-start;
      margin-bottom: auto;
      background: var(--gold);
      color: var(--maroon-dark);
      font-size: 0.75rem;
      font-weight: 700;
      padding: 0.4rem 1.2rem;
      border-radius: 20px;
      text-transform: uppercase;
    }

    .berita-main h3 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--white);
      font-size: 1.6rem;
      margin-bottom: 1.2rem;
      line-height: 1.4;
      margin-top: 1.5rem;
    }

    .berita-main p {
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.85rem;
      line-height: 1.6;
      margin-bottom: 2rem;
    }

    .meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .meta span {
      color: rgba(255, 255, 255, 0.5);
      font-size: 0.8rem;
    }

    .btn-red-pill {
      background: #8b1010;
      color: var(--white);
      text-decoration: none;
      padding: 0.6rem 1.5rem;
      border-radius: 25px;
      font-size: 0.85rem;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-red-pill:hover {
      background: #6b0808;
    }

    .berita-list {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .berita-item {
      display: flex;
      gap: 1rem;
      background: #f9f9f9;
      border-radius: 12px;
      border: 1px solid #eee;
      overflow: hidden;
    }

    .berita-img-placeholder {
      width: 100px;
      background: var(--maroon-dark);
    }

    .berita-item-content {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .berita-item-content .tag {
      color: var(--gold);
      font-size: 0.7rem;
      font-weight: 600;
      margin-bottom: 0.3rem;
      text-transform: uppercase;
    }

    .berita-item-content h5 {
      font-family: 'Poppins', sans-serif;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.3rem;
    }

    .berita-item-content span {
      font-size: 0.75rem;
      color: #999;
    }

    .center-action {
      text-align: center;
      margin-top: 2rem;
    }

    .btn-dark-pill {
      background: var(--maroon-dark);
      color: var(--white);
      padding: 0.6rem 2rem;
      border-radius: 30px;
      text-decoration: none;
      font-size: 0.85rem;
      font-weight: 500;
    }

    /* ══ KATALOG KOSTUM ══ */
    #katalog {
      background: var(--red-bg);
    }

    .white {
      color: var(--white);
    }

    .katalog-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .katalog-card {
      background: var(--white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .katalog-img {
      height: 220px;
      background: linear-gradient(to bottom, #b3b3b3, #e5e5e5);
      position: relative;
    }

    .katalog-img .badge {
      position: absolute;
      top: 1.2rem;
      left: 1.2rem;
      background: #f1c40f;
      color: #333;
      font-size: 0.75rem;
      font-weight: 700;
      padding: 0.3rem 1rem;
      border-radius: 20px;
    }

    .katalog-info {
      padding: 1.5rem;
    }

    .katalog-info h4 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 0.5rem;
    }

    .katalog-info p {
      font-size: 0.85rem;
      color: var(--text-gray);
      margin-bottom: 1.5rem;
      line-height: 1.6;
    }

    .katalog-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-top: 1px solid #eee;
      padding-top: 1rem;
    }

    .katalog-footer .tipe {
      color: #28a745;
      font-size: 0.9rem;
      font-weight: 700;
    }

    .katalog-actions {
      display: flex;
      gap: 0.5rem;
    }

    /* Penyesuaian tombol Edit & Hapus */
    .katalog-actions button {
      background: var(--white);
      border: 1px solid #ddd;
      padding: 0.35rem 0.8rem;
      border-radius: 6px;
      font-size: 0.75rem;
      font-weight: 500;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      color: #555;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s, color 0.2s, border-color 0.2s;
    }

    .katalog-actions button:hover {
      background: #f5f5f5;
      color: var(--maroon-dark);
      border-color: #bbb;
    }

    .btn-dark-red-pill {
      background: #7a1212;
      color: var(--white);
      padding: 0.8rem 2.5rem;
      border-radius: 30px;
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-dark-red-pill:hover {
      background: #5c0d0d;
    }

    /* ══ KALENDER EVENT FIX ══ */

    /* 1. Container Utama */
    #kalender {
        background: #ffffff !important;
        padding: 80px 0;
        width: 100%;
        display: block;
    }

    .kalender-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* 2. Layout Grid (Kiri: Kalender, Kanan: List Event) */
    .kalender-grid {
        display: grid;
        grid-template-columns: 350px 1fr; /* Kolom kiri tetap 350px, kanan fleksibel */
        gap: 3rem;
        align-items: start;
    }

    /* 3. Widget Kalender (Sisi Kiri) */
    .cal-widget {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .cal-header {
        background: #5a1a1a; /* Maroon Dark */
        color: #ffffff !important;
        padding: 1.2rem;
        text-align: center;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .cal-body {
        padding: 1.5rem;
        background: #ffffff;
    }

    .cal-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        gap: 8px;
    }

    .cal-grid span {
        font-size: 0.9rem;
        color: #444444 !important;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }

    .day-name {
        font-weight: 700;
        color: #aaa !important;
        font-size: 0.75rem;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    /* 4. State Tanggal (Merah & Hari Ini) */
    .cal-grid .event-day {
        background-color: #b91c1c !important; /* Merah untuk tanggal event */
        color: #ffffff !important;
        border-radius: 50%;
        font-weight: 700;
        width: 35px;
        height: 35px;
        margin: auto;
    }

    .cal-grid .active-today {
        border: 2px solid #b91c1c; /* Border untuk hari ini */
        border-radius: 50%;
        width: 35px;
        height: 35px;
        margin: auto;
    }

    /* 5. List Event (Sisi Kanan) */
    .event-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    #kalender .event-card {
        background-color: #ffffff !important;
        border: 1px solid #eee;
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        gap: 1.5rem;
        align-items: center;
        transition: transform 0.3s ease;
    }

    #kalender .event-card:hover {
        transform: translateX(10px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    /* Kotak Tanggal di dalam Card */
    #kalender .event-date {
        background: #5a1a1a !important;
        color: #ffffff !important;
        text-align: center;
        border-radius: 12px;
        padding: 1rem;
        min-width: 85px;
    }

    #kalender .event-date h2 {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        line-height: 1;
        color: #ffffff !important;
    }

    #kalender .event-date span {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #ffffff !important;
    }

    /* Info Text (Judul & Deskripsi) */
    #kalender .event-info h4 {
        color: #222222 !important; /* Hitam pekat agar terbaca */
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
    }

    #kalender .event-info p {
        color: #555555 !important; /* Abu gelap untuk deskripsi */
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 12px;
    }
    
    #kalender .event-info .meta i {
    color: #b91c1c;
    font-size: 0.9rem;
}
    #kalender .event-info .meta span {
    background: transparent !important; 
    color: #b91c1c !important;       
    padding: 0 !important;            
    font-weight: 600 !important;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
    /* 6. Responsive (Untuk HP) */
    @media (max-width: 992px) {
        .kalender-grid {
            grid-template-columns: 1fr;
        }
        .cal-widget {
            max-width: 400px;
            margin: 0 auto;
        }
    }
    /* ══ GALERI ══ */
    #galeri {
      background: var(--red-bg);
    }

    .galeri-mosaik {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-auto-rows: 200px;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .g-box {
      background: var(--maroon-dark);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
    }

    .g-box.large {
      grid-row: span 2;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {

      .hero-grid,
      .profile-grid,
      .berita-grid,
      .kalender-grid,
      .footer-grid {
        grid-template-columns: 1fr;
      }

      .katalog-grid {
        grid-template-columns: 1fr 1fr;
      }

      .hero-logo-wrap {
        justify-content: center;
        margin-top: 2rem;
      }

      .galeri-mosaik {
        grid-template-columns: 1fr 1fr;
      }

      .g-box.large {
        grid-row: span 1;
        grid-column: span 2;
      }
    }

    @media (max-width: 600px) {
      .katalog-grid {
        grid-template-columns: 1fr;
      }

      .nav-links {
        display: none;
      }
    }

    /* ══ SECTION CTA BERGABUNG ══ */
    #cta-join {
        background-color: #3D0C0C; /* Warna cokelat gelap sesuai gambar */
        color: var(--white);
        padding: 5rem 10%;
    }

    .cta-container {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        align-items: center;
        gap: 3rem;
    }

    .cta-badge {
        background-color: #D4AF37; /* Warna emas badge */
        color: white;
        padding: 0.4rem 1.2rem;
        border-radius: 4px;
        font-weight: 700;
        font-size: 0.8rem;
        letter-spacing: 1px;
        display: inline-block;
        margin-bottom: 1.5rem;
    }

    .cta-content h2 {
        font-size: 2.8rem;
        line-height: 1.2;
        margin-bottom: 2rem;
        font-family: 'Playfair Display', serif;
    }

    .cta-content p {
        font-size: 1rem;
        line-height: 1.7;
        opacity: 0.8;
        max-width: 600px;
    }

    .cta-action {
        text-align: right;
    }

    .btn-daftar-cta {
        background-color: #A8762E; /* Warna tombol cokelat keemasan */
        color: white;
        padding: 1.2rem 3.5rem;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .btn-daftar-cta:hover {
        background-color: #C5A059;
        transform: translateY(-5px);
    }

    /* Responsive untuk HP */
    @media (max-width: 968px) {
        .cta-container {
            grid-template-columns: 1fr;
            text-align: center;
        }
        .cta-action {
            text-align: center;
        }
        .cta-content h2 {
            font-size: 2rem;
        }
    }
  </style>
@endpush

@section('content')
  <!-- HERO SECTION (tetap statis) -->
  <section id="beranda">
    <div class="hero-grid">
      <div class="hero-text">
        <h1>Sanggar Tari <span class="script">Jiwa Etnik Blambangan</span></h1>
        <p>Pusat pelestarian seni dan budaya tari tradisional Banyuwangi. Menggerakkan jiwa, merayakan budaya,
          melestarikan warisan Nusantara.</p>
        <a href="#galeri" class="btn-gray-pill">Lihat Galeri</a>
      </div>
      <div class="hero-logo-wrap">
        <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo Sanggar Jiwa Etnik Blambangan" class="logo-img-hero" />
      </div>
    </div>
  </section>

   <!-- PROFILE SECTION (statis, bisa diambil dari database nanti) -->
  <section id="profile">
    <div class="section-header">
      <span class="badge-pill">TENTANG KAMI</span>
      <h2 class="section-title">Profile Sanggar</h2>
      <p class="section-subtitle">Mengenal lebih dekat Sanggar Tari Jiwa Etnik Blambangan</p>
    </div>
    <div class="profile-grid">
      <div class="profile-text">
        <h3>{{ $profil->deskripsi ?? 'Melestarikan Budaya Banyuwangi' }}</h3>
        <p>{{ $profil->deskripsi ?? 'Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara.' }}</p>
        <p>{{ $profil->sejarah ?? 'Kami membina generasi muda untuk mencintai dan menguasai seni tari tradisional, mulai dari tari Gandrung, hingga tari kreasi baru berbasis budaya lokal Blambangan.' }}</p>
      </div>
      <div class="profile-card">
        @if($profil && $profil->logo)
          <img src="data:image/jpeg;base64,{{ base64_encode($profil->logo->file_blob) }}" alt="Logo" class="profile-card-img">
        @else
          <img src="{{ asset('img/icon.png') }}" alt="Ilustrasi Penari" class="profile-card-img">
        @endif
        <h4>Warisan Budaya Blambangan</h4>
        <p>Tari Tradisional adalah jiwa dari identitas budaya kita. Bersama kami, lestarikan dan rayakan kekayaan seni Nusantara.</p>
      </div>
    </div>
    <div class="center-action">
      <a href="{{ route('profil') }}" class="btn-dark-pill">Profil Lengkap Sanggar</a>
    </div>
  </section>

  <!-- VISI MISI (statis atau dari database) -->
  <section id="visi-misi">
    <div class="section-header">
      <p style="font-size: 0.8rem; letter-spacing: 2px; color: var(--text-gray); margin-bottom: 0.5rem;">✦ Landasan Kami ✦</p>
      <h2 class="section-title">VISI <em>&</em> MISI</h2>
      <p class="section-subtitle">Nilai-nilai yang mendasari setiap langkah dan gerakan Sanggar Tari JEB</p>
    </div>
    <div class="vm-container">
      <div class="visi-box">
        <h3>VISI</h3>
        <p>{{ $profil->visi ?? 'Menjadi sanggar seni yang unggul, berkarakter, dan memiliki keunikan tersendiri serta mampu menghasilkan karya nyata dalam pelestarian dan pengembangan seni budaya Blambangan di Banyuwangi.' }}</p>
      </div>
      <div class="misi-box">
        <h3>MISI</h3>
        <p>{{ $profil->misi ?? 'Mengembangkan potensi anggota agar memiliki kemampuan terampil dan profesional di bidang seni budaya.' }}</p>
      </div>
    </div>
  </section>

  <!-- KATALOG KOSTUM (DINAMIS) -->
  <section id="katalog">
    <div class="section-header">
      <h2 class="section-title white">Katalog Kostum</h2>
      <p class="section-subtitle white">Koleksi Kostum tari tradisional dan kreasi Sanggar JEB</p>
    </div>
    <div class="katalog-grid">
      @forelse($katalogs as $item)
      <div class="katalog-card">
        <div class="katalog-img">
          @if($item->galeri && $item->galeri->file_blob)
            <img src="data:image/jpeg;base64,{{ base64_encode($item->galeri->file_blob) }}" alt="{{ $item->nama_tari }}" style="width:100%; height:100%; object-fit:cover;">
          @else
            <div style="background:#ddd; height:100%; display:flex; align-items:center; justify-content:center;">No Image</div>
          @endif
          <span class="badge">{{ $item->kategori }}</span>
        </div>
        <div class="katalog-info">
          <h4>{{ $item->nama_tari }}</h4>
          <p>{{ Str::limit($item->deskripsi, 80) }}</p>
          <div class="katalog-footer">
            <span class="tipe">{{ $item->status == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
            <div class="katalog-actions">
              <span>Stok: {{ $item->stok }}</span>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="katalog-card">
        <div class="katalog-info">
          <h4>Belum ada data katalog</h4>
          <p>Silakan tambah data katalog melalui panel admin.</p>
        </div>
      </div>
      @endforelse
    </div>
    <div class="center-action">
      <a href="{{ route('katalog.index') }}" class="btn-dark-red-pill">Lihat semua katalog</a>
    </div>
  </section>



  <!-- BERITA & ARTIKEL (DINAMIS) -->
  <section id="berita">
    <div class="section-header">
      <span class="badge-pill">INFORMASI</span>
      <h2 class="section-title">Berita & Artikel</h2>
      <p class="section-subtitle">Kabar terbaru kegiatan dan prestasi sanggar JEB</p>
    </div>
    <div class="berita-grid">
      <!-- Berita Utama -->
      <div class="berita-main">
        <span class="badge-yellow">BERITA UTAMA</span>
        <h3>{{ $beritaUtama->judul ?? 'Sanggar Tari JEB Raih Penghargaan Terbaik di Festival Seni Budaya Jawa Timur 2026' }}</h3>
        <p>{{ Str::limit($beritaUtama->isi_berita ?? 'Sanggar Tari Jiwa Etnik Blambangan kembali mengharumkan nama Banyuwangi...', 150) }}</p>
        <div class="meta">
          <span>Berita • {{ $beritaUtama ? $beritaUtama->created_at->format('d M Y') : '22 Feb 2026' }} • {{ $beritaUtama->user->name ?? 'Admin' }}</span>
          <a href="#" class="btn-red-pill">Baca Selengkapnya</a>
        </div>
      </div>
      <!-- List Berita Lainnya -->
      <div class="berita-list">
        @forelse($beritaTerbaru as $item)
        <div class="berita-item">
          <div class="berita-img-placeholder"></div>
          <div class="berita-item-content">
            <span class="tag">Berita</span>
            <h5>{{ $item->judul }}</h5>
            <span>{{ $item->created_at->format('d M Y') }} - {{ $item->user->name ?? 'Admin' }}</span>
          </div>
        </div>
        @empty
        <div class="berita-item">
          <div class="berita-item-content">
            <span class="tag">Belum ada berita</span>
            <h5>Belum ada berita terbaru</h5>
          </div>
        </div>
        @endforelse
      </div>
    </div>
    <div class="center-action">
      <a href="{{ route('berita.index') }}" class="btn-dark-pill">Lihat Semua Berita</a>
    </div>
  </section>

  <!-- GALERI (DINAMIS) -->
  <section id="galeri">
    <div class="section-header">
      <span class="badge-pill" style="background:transparent; border:1px solid var(--gold); color:var(--gold);">DOKUMENTASI</span>
      <h2 class="section-title white">Galeri Sanggar</h2>
      <p class="section-subtitle white">Momen indah perjalanan seni dan budaya Jiwa Etnik Blambangan</p>
    </div>
    <div class="galeri-mosaik">
      @forelse($galeri as $item)
      <div class="g-box" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($item->file_blob) }}'); background-size: cover; background-position: center;"></div>
      @empty
      <div class="g-box large" style="display: flex; align-items: center; justify-content: center; color: white;">Belum ada foto</div>
      <div class="g-box"></div><div class="g-box"></div><div class="g-box"></div><div class="g-box"></div>
      @endforelse
    </div>
    <div class="center-action">
      <a href="{{ route('galeri.index') }}" class="btn-gray-pill">Lihat selengkapnya</a>
    </div>
  </section>

  <!-- KALENDER EVENT (DINAMIS) -->
 <section id="kalender">
    <div class="section-header">
        <span class="badge-pill">KEGIATAN</span>
        <h2 class="section-title">Kalender Event</h2>
        <p class="section-subtitle">Jadwal pentas dan kegiatan Sanggar JEB</p>
    </div>

    <div class="kalender-container">
        <div class="kalender-grid">
            
            <div class="cal-widget">
                <div class="cal-header">{{ $currentMonthName ?? 'Mei' }} 2026</div>
                <div class="cal-body">
                    <div class="cal-grid">
                        <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                        
                        @for($x = 0; $x < $blankDays; $x++)
                            <span></span>
                        @endfor

                        @for($i = 1; $i <= $daysInMonth; $i++)
                            @php 
                                $isEvent = in_array($i, $eventDays ?? []); 
                                $isToday = ($i == date('d'));
                            @endphp
                            <span class="{{ $isEvent ? 'event-day' : '' }} {{ $isToday ? 'active' : '' }}">
                                {{ $i }}
                            </span>
                        @endfor
                    </div>
                </div>
            </div> <div class="event-list">
                @forelse($events as $event)
                <div class="event-card">
                    <div class="event-date">
                        <h2>{{ \Carbon\Carbon::parse($event->tanggal)->format('d') }}</h2>
                        <span>{{ strtoupper(\Carbon\Carbon::parse($event->tanggal)->format('M')) }}</span>
                    </div>
                    <div class="event-info">
                    <h4>
                            <a href="{{ route('event.detail', $event->id) }}" style="text-decoration:none; color:inherit;">
                                {{ $event->nama_event }}
                            </a>
                        </h4>
                        <p>{{ $event->deskripsi ?? 'Kegiatan seni Sanggar Tari JEB.' }}</p>
                        <div class="meta">
                            <span>📍 {{ $event->lokasi }}</span>
                            <span style="margin-left: 15px;">🕒 {{ \Carbon\Carbon::parse($event->jam)->format('H:i') }} WIB</span>
                        </div>
                    </div>
                </div>
                @empty
                <p>Belum ada event terjadwal.</p>
                @endforelse
        </div> <div class="center-action" style="text-align: center; margin-top: 4rem; width: 100%; grid-column: 1 / -1;">
            <a href="{{ route('event.index') }}" class="btn-dark-pill" style="background: #5a1a1a; color: #fff; padding: 0.8rem 3rem; border-radius: 30px; text-decoration: none; font-weight: 600; display: inline-block; transition: 0.3s;">
                Lihat Semua Event
            </a>
        </div>
        </div> </div> </section>
            </div> 
           </div> 
      </div>
</section>

  <section id="cta-join">
    <div class="cta-container">
        <div class="cta-content">
            <span class="cta-badge">BERGABUNG</span>
            <h2>Kembangkan Bakat Seni <br> Anda Bersama Kami</h2>
            <p>
                Sanggar Seni Jiwa Etnik Blambangan adalah ruang kreatif bagi pecinta seni budaya Banyuwangi 
                untuk belajar, berkarya, dan berprestasi. Kami menghadirkan pelatihan tari tradisional, 
                pertunjukan seni, serta kegiatan budaya yang menginspirasi dan mempererat kebersamaan.
            </p>
        </div>
        <div class="cta-action">
            <a href="#" class="btn-daftar-cta">DAFTAR SEKARANG</a>
        </div>
    </div>
</section>
@endsection