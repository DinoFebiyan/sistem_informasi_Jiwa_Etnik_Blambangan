<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login – Sanggar Tari JEB</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet"/>
  
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --red:       #C0272D;
      --red-dark:  #9B1B20;
      --red-light: #E8474D;
      --gold:      #dfb15b; /* Warna emas untuk tulisan JEB */
      --cream:     #FFF8F8;
      --text:      #2C1A1A;
      --muted:     #9A8080;
      --border:    #F0DADA;
    }

    html, body {
      height: 100%;
      font-family: 'Nunito', sans-serif;
      background: var(--cream);
      overflow: hidden;
    }

    /* ── Layout ── */
    .wrapper { display: flex; height: 100vh; width: 100vw; }

    /* ── Left panel ── */
    .panel-left {
      width: 42%; background: var(--red); position: relative;
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      padding: 3rem 2.5rem; overflow: hidden;
    }
    .panel-left::before {
      content: ''; position: absolute; inset: 0;
      background-image: repeating-linear-gradient(45deg, rgba(255,255,255,.07) 0px, rgba(255,255,255,.07) 1px, transparent 1px, transparent 28px),
                        repeating-linear-gradient(-45deg, rgba(255,255,255,.07) 0px, rgba(255,255,255,.07) 1px, transparent 1px, transparent 28px);
    }

    .logo-ring {
      position: relative; z-index: 1; width: 130px; height: 130px; border-radius: 50%;
      background: #fff; border: 5px solid rgba(255,255,255,.4); box-shadow: 0 8px 32px rgba(0,0,0,.3);
      display: flex; align-items: center; justify-content: center; 
      margin-bottom: 0.5rem; /* <-- Jarak bawah logo sudah dirapatkan di sini */
      animation: floatLogo 3.5s ease-in-out infinite;
    }
    @keyframes floatLogo { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }

    /* Pengaturan Font Sesuai Figma (Playfair Display Bold Italic 49.58px) */
    .brand-name { 
      position: relative; z-index: 1; color: #fff; 
      font-family: 'Playfair Display', serif; 
      font-size: 50px; 
      font-weight: 700; /* Bold */
      text-align: center; line-height: 1.1; 
    }
    .brand-name em { 
      font-family: 'Playfair Display', serif; 
      font-size: 50px; 
      font-style: italic; /* Italic */
      font-weight: 700; /* Bold */
      color: var(--gold); 
      display: block; 
      margin-top: 0; 
      letter-spacing: 0;
    }
    
    .brand-sub { position: relative; z-index: 1; color: rgba(255,255,255,.8); font-size: 0.9rem; margin-top: 0.8rem; text-transform: uppercase; letter-spacing: 1px;}
    .brand-slogan { position: relative; z-index: 1; margin-top: 2.5rem; text-align: center; color: rgba(255,255,255,.6); font-size: .85rem; font-style: italic; line-height: 1.6; max-width: 250px; border-top: 1px solid rgba(255,255,255,.2); padding-top: 1.2rem; }

    /* ── Right panel ── */
    .panel-right { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 3rem 3.5rem; background: #fff; }
    .form-box { width: 100%; max-width: 400px; animation: fadeUp .6s ease both; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }

    .greeting-big { font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700; color: var(--red); margin-bottom: .35rem; }
    .greeting-desc { font-size: .9rem; color: var(--muted); margin-bottom: 2.5rem; }

    .field-label { display: block; font-size: .75rem; font-weight: 700; text-transform: uppercase; color: var(--text); margin-bottom: .45rem; margin-top: 1.1rem; }
    .input-wrap { position: relative; display: flex; align-items: center; }
    .input-wrap svg.icon { position: absolute; left: .85rem; width: 16px; height: 16px; color: var(--muted); pointer-events: none; }
    .input-wrap input { width: 100%; padding: .8rem 1rem .8rem 2.4rem; border: 1.5px solid var(--border); border-radius: 10px; background: #FFF5F5; font-size: .9rem; outline: none; transition: all 0.2s;}
    .input-wrap input:focus { border-color: var(--red-light); box-shadow: 0 0 0 3px rgba(192,39,45,.1); background: #fff; }

    .eye-btn { position: absolute; right: .8rem; background: none; border: none; cursor: pointer; color: var(--muted); display: flex; align-items: center; transition: color 0.2s;}
    .eye-btn:hover { color: var(--text); }

    .row-meta { display: flex; align-items: center; justify-content: space-between; margin: 1.2rem 0 1.5rem; }
    .remember { display: flex; align-items: center; gap: .45rem; font-size: .85rem; color: var(--muted); cursor: pointer; }
    .forgot-link { font-size: .85rem; color: var(--red); text-decoration: none; font-weight: 700; transition: color 0.2s;}
    .forgot-link:hover { color: var(--red-dark); }

    /* CONTAINER RECAPTCHA */
    .recaptcha-container {
      margin-bottom: 1.5rem;
      display: flex;
      justify-content: center;
    }

    .btn-masuk {
      width: 100%; padding: .9rem; background: var(--red); color: #fff; border: none; border-radius: 10px;
      font-size: .95rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; cursor: pointer;
      box-shadow: 0 4px 16px rgba(192,39,45,.25); transition: all 0.2s;
    }
    .btn-masuk:hover { background: var(--red-dark); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(192,39,45,.35);}

    @media (max-width: 768px) { .panel-left { display: none; } }
  </style>
</head>
<body>
<div class="wrapper">

  <div class="panel-left">
    <div class="logo-ring">
      <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo JEB" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;" />
    </div>
    <div class="brand-name">Sanggar Tari <em>JEB</em></div>
    <div class="brand-sub">Singojuruh – Banyuwangi</div>
    <p class="brand-slogan">"Melestarikan Budaya, Menggerakkan Jiwa, Mewujudkan Karya"</p>
  </div>

  <div class="panel-right">
    <div class="form-box">
      <p style="font-size: .85rem; color: var(--muted); text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Selamat</p>
      <div class="greeting-big">Datang!</div>
      <p class="greeting-desc">Masuk ke portal Sanggar Tari JEB</p>

      <label class="field-label" for="email">Email / Username</label>
      <div class="input-wrap">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        <input type="email" id="email" placeholder="Masukkan Email"/>
      </div>

      <label class="field-label" for="password">Password</label>
      <div class="input-wrap">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        <input type="password" id="password" placeholder="Masukkan password"/>
        <button class="eye-btn" type="button" onclick="togglePass()">
          <svg id="eye-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </button>
      </div>

      <div class="row-meta">
        <label class="remember"><input type="checkbox"/> ingat saya</label>
        <a href="{{ route('forgot_password') }}" class="forgot-link">Lupa Password?</a>
      </div>

      <div class="recaptcha-container">
        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
      </div>

      <button class="btn-masuk" onclick="handleLogin()">Masuk</button>
    </div>
  </div>
</div>

<script>
  function togglePass() {
    const inp = document.getElementById('password');
    const ico = document.getElementById('eye-icon');
    if (inp.type === 'password') {
      inp.type = 'text';
      ico.innerHTML = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>`;
    } else {
      inp.type = 'password';
      ico.innerHTML = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
    }
  }

  function handleLogin() {
    const email = document.getElementById('email').value.trim();
    const pass  = document.getElementById('password').value;
    
    const captchaResponse = grecaptcha.getResponse();

    if (!email || !pass) {
      alert('Harap isi email dan password.');
      return;
    }

    if (captchaResponse.length === 0) {
      alert('Harap verifikasi bahwa Anda bukan robot.');
      return;
    }

    alert('Login Berhasil! (Simulasi Frontend)');
    // Untuk ke dashboard nantinya bisa pakai: window.location.href = "/dashboard";
  }
</script>
</body>
</html>