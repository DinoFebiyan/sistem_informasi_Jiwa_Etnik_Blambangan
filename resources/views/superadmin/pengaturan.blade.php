@extends('layouts.superadmin')

@section('title', 'pengaturan — JEB')
@section('header_title', 'pengaturan')

@section('content')
  <div class="content">
    <div class="settings-layout">

      <!-- TAB MENU KIRI -->
      <div class="settings-sidebar">
        <div class="tab-menu">
          <div class="tab-item active" onclick="showTab('akun', this)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Profil Akun
          </div>
          <div class="tab-divider"></div>
          <div class="tab-item" onclick="showTab('password', this)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
            Ganti Password
          </div>
          <div class="tab-divider"></div>
          <div class="tab-item" onclick="showTab('backup', this)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            Backup & Restore
          </div>
        </div>
      </div>

      <!-- PANEL KANAN -->
      <div class="settings-main">

        <!-- PANEL: PROFIL AKUN -->
        <div class="panel active" id="panel-akun">

          <div class="last-login">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <div class="alert-info">
              <p>Login terakhir: <strong>Sabtu, 07 Maret 2026 — 08.32 WIB</strong></p>
              <span>Browser: Chrome 122 · Windows 11 · Banyuwangi, ID</span>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <div class="card-header-icon chi-red">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8B0000" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </div>
              <div class="card-header-text">
                <h3>Profil Akun</h3>
                <p>Informasi akun Super Admin</p>
              </div>
            </div>
            <div class="card-body">
              <div class="avatar-upload">
                <div class="avatar-preview">
                  SA
                  <div class="change-overlay"><span>UBAH</span></div>
                </div>
                <div class="avatar-upload-info">
                  <h4>Foto Profil</h4>
                  <p>Format JPG/PNG, maks. 2MB</p>
                  <button class="btn-ghost" style="font-size:0.78rem;padding:6px 14px">Upload Foto</button>
                </div>
              </div>
              <div class="form-grid">
                <div class="form-group"><label>Nama Lengkap</label><input value="Super Admin JEB"></div>
                <div class="form-group"><label>Username</label><input value="superadmin"></div>
                <div class="form-group full"><label>Email</label><input value="superadmin@jeb.id" type="email"><span class="form-hint">Email digunakan untuk login dan notifikasi sistem</span></div>
                <div class="form-group"><label>No. Telepon</label><input value="+62 812-3456-7890" type="tel"></div>
                <div class="form-group"><label>Jabatan</label><input value="Super Administrator" readonly style="background:#f5f0f0;color:var(--teks-abu)"></div>
              </div>
              <div class="form-actions">
                <button class="btn-ghost">Reset</button>
                <button class="btn-red">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v14a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
                  Simpan Perubahan
                </button>
              </div>
            </div>
          </div>

        </div>

        <!-- PANEL: GANTI PASSWORD -->
        <div class="panel" id="panel-password">

          <div class="alert alert-info">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span>Gunakan password yang kuat dengan kombinasi huruf besar, huruf kecil, angka, dan simbol.</span>
          </div>

          <div class="card">
            <div class="card-header">
              <div class="card-header-icon chi-gold">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#c9991a" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
              </div>
              <div class="card-header-text">
                <h3>Ganti Password</h3>
                <p>Perbarui password akun Super Admin</p>
              </div>
            </div>
            <div class="card-body">
              <div class="form-grid">
                <div class="form-group full">
                  <label>Password Saat Ini</label>
                  <div class="password-wrap">
                    <input type="password" value="••••••••••••" id="pw-current">
                    <button class="toggle-pw" onclick="togglePw('pw-current')">
                      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                  </div>
                </div>

                <div class="form-group full">
                  <label>Password Baru</label>
                  <div class="password-wrap">
                    <input type="password" placeholder="Min. 8 karakter" id="pw-new" oninput="checkStrength(this.value)">
                    <button class="toggle-pw" onclick="togglePw('pw-new')">
                      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                  </div>
                  <div class="strength-bar">
                    <div class="strength-seg" id="seg1"></div>
                    <div class="strength-seg" id="seg2"></div>
                    <div class="strength-seg" id="seg3"></div>
                    <div class="strength-seg" id="seg4"></div>
                  </div>
                  <span class="strength-label" id="strength-label">Masukkan password baru</span>
                </div>

                <div class="form-group full">
                  <label>Konfirmasi Password Baru</label>
                  <div class="password-wrap">
                    <input type="password" placeholder="Ulangi password baru" id="pw-confirm">
                    <button class="toggle-pw" onclick="togglePw('pw-confirm')">
                      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                  </div>
                </div>
              </div>

              <div class="section-divider"></div>

              <div style="background:#fdf8f8;border-radius:10px;padding:14px 16px;margin-bottom:20px">
                <p style="font-size:0.8rem;font-weight:700;margin-bottom:8px">Syarat Password Kuat:</p>
                <div style="display:flex;flex-direction:column;gap:5px">
                  <div style="display:flex;align-items:center;gap:8px;font-size:0.78rem;color:var(--teks-abu)"><span style="color:#16a34a">✓</span> Min. 8 karakter</div>
                  <div style="display:flex;align-items:center;gap:8px;font-size:0.78rem;color:var(--teks-abu)"><span style="color:#16a34a">✓</span> Huruf besar & huruf kecil</div>
                  <div style="display:flex;align-items:center;gap:8px;font-size:0.78rem;color:var(--teks-abu)"><span style="color:#ccc">○</span> Minimal 1 angka</div>
                  <div style="display:flex;align-items:center;gap:8px;font-size:0.78rem;color:var(--teks-abu)"><span style="color:#ccc">○</span> Minimal 1 simbol (!@#$%)</div>
                </div>
              </div>

              <div class="form-actions">
                <button class="btn-ghost">Batal</button>
                <button class="btn-red">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                  Perbarui Password
                </button>
              </div>
            </div>
          </div>

        </div>

        <!-- PANEL: BACKUP & RESTORE -->
        <div class="panel" id="panel-backup">

          <div class="alert alert-warn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            <span><strong>Perhatian:</strong> Proses restore akan menggantikan seluruh data yang ada. Pastikan kamu memilih file backup yang benar.</span>
          </div>

          <!-- Backup Manual -->
          <div class="card">
            <div class="card-header">
              <div class="card-header-icon chi-green">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
              </div>
              <div class="card-header-text">
                <h3>Backup Data</h3>
                <p>Unduh salinan data sistem</p>
              </div>
              <button class="btn-red" style="margin-left:auto">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Backup Sekarang
              </button>
            </div>
            <div class="card-body">

              <div class="toggle-row">
                <div class="toggle-info"><h4>Backup Otomatis</h4><p>Backup data secara otomatis setiap hari pukul 00.00 WIB</p></div>
                <label class="toggle-switch"><input type="checkbox" checked><span class="toggle-slider"></span></label>
              </div>
              <div class="toggle-row">
                <div class="toggle-info"><h4>Notifikasi Backup</h4><p>Kirim email notifikasi setelah backup berhasil</p></div>
                <label class="toggle-switch"><input type="checkbox" checked><span class="toggle-slider"></span></label>
              </div>

              <div class="section-divider"></div>

              <p style="font-size:0.82rem;font-weight:700;margin-bottom:12px">Riwayat Backup</p>
              <div class="backup-list">
                <div class="backup-item">
                  <div class="backup-item-left">
                    <div class="backup-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8B0000" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                    <div class="backup-info"><h4>backup_jeb_20260307.zip</h4><span>Sabtu, 07 Mar 2026 · 00.00 WIB · Otomatis</span></div>
                  </div>
                  <div class="backup-item-right">
                    <span class="backup-size">4.2 MB</span>
                    <button class="btn-success" style="padding:5px 12px;font-size:0.72rem">Unduh</button>
                  </div>
                </div>
                <div class="backup-item">
                  <div class="backup-item-left">
                    <div class="backup-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8B0000" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                    <div class="backup-info"><h4>backup_jeb_20260306.zip</h4><span>Jumat, 06 Mar 2026 · 00.00 WIB · Otomatis</span></div>
                  </div>
                  <div class="backup-item-right">
                    <span class="backup-size">4.1 MB</span>
                    <button class="btn-success" style="padding:5px 12px;font-size:0.72rem">Unduh</button>
                  </div>
                </div>
                <div class="backup-item">
                  <div class="backup-item-left">
                    <div class="backup-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8B0000" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                    <div class="backup-info"><h4>backup_jeb_20260301.zip</h4><span>Minggu, 01 Mar 2026 · 10.22 WIB · Manual</span></div>
                  </div>
                  <div class="backup-item-right">
                    <span class="backup-size">3.9 MB</span>
                    <button class="btn-success" style="padding:5px 12px;font-size:0.72rem">Unduh</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Restore -->
          <div class="card">
            <div class="card-header">
              <div class="card-header-icon chi-red2">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2"><path d="M21 2v6h-6"/><path d="M3 12a9 9 0 0115-6.7L21 8"/><path d="M3 22v-6h6"/><path d="M21 12a9 9 0 01-15 6.7L3 16"/></svg>
              </div>
              <div class="card-header-text">
                <h3>Restore Data</h3>
                <p>Pulihkan data dari file backup</p>
              </div>
            </div>
            <div class="card-body">
              <div class="alert alert-danger" style="margin-bottom:16px">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                <span><strong>Peringatan!</strong> Restore akan menghapus semua data saat ini dan menggantinya dengan data dari file backup yang dipilih.</span>
              </div>
              <div class="restore-zone" onclick="document.getElementById('restore-file').click()">
                <input type="file" id="restore-file" accept=".zip,.sql" style="display:none">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                <p>Klik atau drag file backup ke sini</p>
                <span>Format: .zip atau .sql · Maks. 50MB</span>
              </div>
              <div class="form-actions" style="margin-top:16px">
                <button class="btn-danger">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"/><path d="M3 12a9 9 0 0115-6.7L21 8"/></svg>
                  Mulai Restore
                </button>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
<script>
  function showTab(id, el) {
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
    document.getElementById('panel-' + id).classList.add('active');
    el.classList.add('active');
  }

  function togglePw(id) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
  }

  function checkStrength(val) {
    const segs = [document.getElementById('seg1'), document.getElementById('seg2'), document.getElementById('seg3'), document.getElementById('seg4')];
    const label = document.getElementById('strength-label');
    segs.forEach(s => { s.className = 'strength-seg'; });
    if (!val) { label.textContent = 'Masukkan password baru'; return; }
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    const cls = score <= 1 ? 'weak' : score <= 2 ? 'medium' : 'strong';
    const txt = score <= 1 ? '⚠️ Lemah' : score <= 2 ? '⚡ Sedang' : score === 3 ? '✅ Kuat' : '🔒 Sangat Kuat';
    for (let i = 0; i < score; i++) segs[i].classList.add(cls);
    label.textContent = txt;
    label.style.color = score <= 1 ? '#dc2626' : score <= 2 ? '#d97706' : '#16a34a';
  }
</script>
@endpush