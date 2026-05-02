@extends('layouts.umum')

@section('title', 'Profil Sanggar - Sanggar JEB')

<style>

/* Umum / Utilities */
.container { width: 85%; max-width: 1200px; margin: 0 auto; }
.about-section { padding: 5rem 0; }
.bg-gray { background-color: #d6cfc7; } 
.bg-gray-darker { background-color: #c9c1b8; }
.bg-white { background-color: #ffffff; }
.text-center { text-align: center; } 

/* Tipografi */
.text-red-small {
    color: #B22222; font-size: 0.8rem; font-weight: 700; 
    text-transform: uppercase; letter-spacing: 1px;
}
.title-maroon {
    font-family: 'Playfair Display', serif; font-size: 2.2rem;
    color: #5c1414; margin: 0.5rem 0 1rem; font-weight: 700;
}
.center-title { text-align: center; margin-bottom: 0.5rem; }
.subtitle-gray { color: #666; font-size: 0.95rem; margin-bottom: 3rem; }

/* 1. Hero Section */
.about-hero {
    background: linear-gradient(to bottom, #8a1c1c, #b32d2d);
    color: white; padding: 6rem 0 4rem; text-align: center;
}
.badge-yellow-small {
    background-color: #ffcc00; color: #000; padding: 4px 12px;
    border-radius: 20px; font-size: 0.75rem; font-weight: bold;
}
.hero-title {
    font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 1rem 0;
}
.hero-subtitle {
    max-width: 600px; margin: 0 auto; font-size: 0.95rem;
    line-height: 1.6; color: rgba(255,255,255,0.9);
}


.about-tabs {
    background-color: #cfc9c3; padding: 1rem 0;
    border-bottom: 1px solid #b8b2ac;
}
.about-tabs ul {
    list-style: none; display: flex; justify-content: flex-start;
    gap: 2rem; padding: 0; margin: 0;
}
.about-tabs li {
    font-size: 0.9rem; color: #555; font-weight: 600; cursor: pointer;
}
.about-tabs li.active { color: #B22222; }


.profil-main-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;
}
.profil-image-placeholder {
    background-color: #7b1818; border-radius: 20px; min-height: 300px;
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,0.4);
}
.profil-text-content p {
    color: #444; line-height: 1.8; margin-bottom: 1rem;
}
.profil-highlights {
    display: flex; justify-content: space-between; gap: 1.5rem;
}
.highlight-box {
    background-color: #fceec5; border-radius: 15px; padding: 1.5rem;
    text-align: center; flex: 1; box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}
.highlight-box h3 {
    font-family: 'Playfair Display', serif; color: #7b1818;
    font-size: 1.8rem; margin-bottom: 0.2rem;
}
.highlight-box p { font-size: 0.8rem; color: #666; font-weight: 600; }


.org-chart { display: flex; flex-direction: column; align-items: center; }
.org-label {
    font-size: 0.8rem; color: #333; letter-spacing: 1px; margin: 2rem 0 1rem;
}
.org-box {
    background-color: #7b1818; color: white; padding: 1.5rem 1rem;
    border-radius: 15px; text-align: center; font-size: 0.9rem;
    font-weight: 500; min-height: 80px; display: flex;
    align-items: center; justify-content: center;
}
.org-level-1 { width: 300px; margin-bottom: 1rem; }
.org-level-2 {
    display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;
    width: 100%; max-width: 500px;
}
.org-level-3 {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;
    width: 100%; max-width: 700px;
}


.prestasi-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;
}
.prestasi-card {
    border: 1px solid #e0dcd9; border-radius: 10px; padding: 1.5rem;
    display: flex; align-items: center; gap: 1.5rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.02);
}
.prestasi-icon {
    background-color: #7b1818; color: white; width: 60px; height: 60px;
    border-radius: 10px; display: flex; align-items: center;
    justify-content: center; text-align: center; flex-shrink: 0;
}
.prestasi-icon .icon-text { font-size: 0.75rem; font-weight: bold; line-height: 1.2; }
.prestasi-info h4 { font-size: 1rem; color: #333; margin-bottom: 0.3rem; }
.prestasi-info p { font-size: 0.85rem; color: #777; line-height: 1.5; }
</style>

@section('content')
<section class="about-hero">
    <div class="hero-content">
        <span class="badge-yellow-small">TENTANG KAMI</span>
        <h1 class="hero-title">Tentang Kami</h1>
        <p class="hero-subtitle">Mengenal lebih dekat Sanggar Tari Jiwa Etnik Blambangan - sejarah, pengurus, dan dedikasi kami dalam melestarikan seni budaya Nusantara.</p>
    </div>
</section>


<div class="about-tabs">
    <div class="container">
        <ul>
            <li class="active">Profil & Sejarah</li>
            <li>Pengurus</li>
            <li>Prestasi</li>
        </ul>
    </div>
</div>


<section id="profil" class="about-section bg-gray">
    <div class="container">
        <div class="section-header-left">
            <span class="text-red-small">Profile Sanggar</span>
            <h2 class="title-maroon">Melestarikan Budaya Banyuwangi</h2>
        </div>

        <div class="profil-main-grid">
            <div class="profil-image-placeholder">
                <p>Area Foto / Gambar Sanggar</p>
                {{-- Nanti ganti dengan: <img src="{{ asset('img/foto-sanggar.jpg') }}" alt="Foto Sanggar" style="width:100%; border-radius:20px;"> --}}
            </div>
            
            <div class="profil-text-content">
                <p>Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara.</p>
                <p>Kami membina generasi muda untuk mencintai dan menguasai seni tari tradisional, mulai dari tari Gandrung, hingga tari kreasi baru berbasis budaya lokal Blambangan. Dengan pengajar berpengalaman dan metode pembelajaran yang menyenangkan, kami hadir untuk semua kalangan usia.</p>
            </div>
        </div>

        
        <div class="profil-highlights">
            <div class="highlight-box">
                <h3>2010</h3>
                <p>Tahun Berdiri</p>
            </div>
            <div class="highlight-box">
                <h3>50+</h3>
                <p>Anggota Aktif</p>
            </div>
            <div class="highlight-box">
                <h3>15</h3>
                <p>Pengajar Ahli</p>
            </div>
            <div class="highlight-box">
                <h3>30+</h3>
                <p>Penghargaan</p>
            </div>
        </div>
    </div>
</section>


<section id="pengurus" class="about-section bg-gray-darker">
    <div class="container text-center">
        <span class="text-red-small">STRUKTUR ORGANISASI</span>
        <h2 class="title-maroon center-title">Pengurus Sanggar</h2>
        <p class="subtitle-gray">Orang-orang hebat dibalik berdirinya Jiwa Etnik Blambangan.</p>

        <div class="org-chart">
            <!-- Ketua -->
            <div class="org-level-1">
                <div class="org-box">Ketua Sanggar</div>
            </div>

            
            <h4 class="org-label">PENGURUS INTI</h4>
            <div class="org-level-2">
                <div class="org-box">Sekretaris</div>
                <div class="org-box">Bendahara</div>
                <div class="org-box">Divisi Latihan</div>
                <div class="org-box">Divisi Kostum</div>
            </div>

            
            <h4 class="org-label">ANGGOTA PENGURUS</h4>
            <div class="org-level-3">
                <div class="org-box">Anggota 1</div>
                <div class="org-box">Anggota 2</div>
                <div class="org-box">Anggota 3</div>
                <div class="org-box">Anggota 4</div>
                <div class="org-box">Anggota 5</div>
                <div class="org-box">Anggota 6</div>
            </div>
        </div>
    </div>
</section>


<section id="prestasi" class="about-section bg-white">
    <div class="container">
        <div class="section-header-left">
            <span class="text-red-small">PENCAPAIAN</span>
            <h2 class="title-maroon">Prestasi Sanggar</h2>
            <p class="subtitle-gray text-left">Bangga dengan setiap pencapaian yang diraih.</p>
        </div>

        <div class="prestasi-grid">
            <!-- Card 1 -->
            <div class="prestasi-card">
                <div class="prestasi-icon">
                    <span class="icon-text">Juara<br>1</span>
                </div>
                <div class="prestasi-info">
                    <h4>Festival Seni Budaya Jawa Timur</h4>
                    <p>Penghargaan tingkat provinsi, menampilkan tari kreasi daerah Banyuwangi. (2023)</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="prestasi-card">
                <div class="prestasi-icon">
                    <span class="icon-text">Juara<br>2</span>
                </div>
                <div class="prestasi-info">
                    <h4>Lomba Tari Tradisional Nasional</h4>
                    <p>Mewakili Jawa Timur di ajang nasional di Jakarta. (2022)</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="prestasi-card">
                <div class="prestasi-icon">
                    <span class="icon-text">Juara<br>1</span>
                </div>
                <div class="prestasi-info">
                    <h4>Gelar Budaya Blambangan</h4>
                    <p>Penyaji tari terbaik tingkat Kabupaten Banyuwangi. (2021)</p>
                </div>
            </div>
             <!-- Card 4 -->
             <div class="prestasi-card">
                <div class="prestasi-icon">
                    <span class="icon-text">Juara<br>1</span>
                </div>
                <div class="prestasi-info">
                    <h4>Pekan Seni Pelajar</h4>
                    <p>Pembinaan terbaik tingkat kabupaten. (2020)</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection