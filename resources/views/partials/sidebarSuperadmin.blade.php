<aside class="sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo JEB" class="logo-img-sidebar">
        
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

        <a class="nav-item {{ request()->is('superadmin/kelola-katalog*') ? 'active' : '' }}" href="/superadmin/kelola-katalog">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
            Kelola Katalog
        </a>

        <a class="nav-item {{ request()->is('superadmin/kelola-event*') ? 'active' : '' }}" href="/superadmin/kelola-event">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Kelola Event
        </a>

        <a class="nav-item {{ request()->is('superadmin/publikasi-berita*') ? 'active' : '' }}" href="/superadmin/publikasi-berita">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            Publikasi Berita
        </a>

        <a class="nav-item {{ request()->is('superadmin/profil*') ? 'active' : '' }}" href="/superadmin/profil">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                <line x1="7" y1="8" x2="17" y2="8"></line>
                <line x1="7" y1="12" x2="17" y2="12"></line>
                <line x1="7" y1="16" x2="11" y2="16"></line>
            </svg>
            Kelola Profil
        </a>

        <div class="nav-label">Sistem</div>

        <a class="nav-item {{ request()->is('superadmin/pengaturan*') ? 'active' : '' }}" href="/superadmin/pengaturan">
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
            <button class="logout-btn" title="Logout" onclick="openLogoutModal()">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
            </button>
        </div>
    </div>
</aside>