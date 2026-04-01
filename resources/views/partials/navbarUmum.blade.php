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
    <a href="{{ route('login') }}" class="btn-login">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
      Login
    </a>
  </div>
</nav>