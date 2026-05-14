<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login – Sanggar Tari JEB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400;1,700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red:        #C0272D;
            --red-dark:   #9B1B20;
            --red-light:  #E8474D;
            --red-glow:   rgba(192, 39, 45, 0.18);
            --gold:       #dfb15b;
            --gold-light: #f0ca80;
            --cream:      #FFF8F0;
            --text:       #2C1A1A;
            --muted:      #9A8080;
            --border:     #F0DADA;
        }

        html, body {
            height: 100%;
            font-family: 'Nunito', sans-serif;
            background: var(--cream);
        }

        /* ───── LAYOUT ───── */
        .wrapper {
            display: flex;
            min-height: 100vh;
            width: 100vw;
        }

        /* ───── LEFT PANEL ───── */
        .panel-left {
            width: 45%;
            background: var(--red);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2.5rem;
            overflow: hidden;
        }

        /* Batik-inspired diagonal grid overlay */
        .panel-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(45deg,  rgba(255,255,255,.06) 0px, rgba(255,255,255,.06) 1px, transparent 1px, transparent 30px),
                repeating-linear-gradient(-45deg, rgba(255,255,255,.06) 0px, rgba(255,255,255,.06) 1px, transparent 1px, transparent 30px);
            pointer-events: none;
        }

        /* Gold accent circle – top right */
        .panel-left::after {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(223, 177, 91, .12);
            border: 2px solid rgba(223, 177, 91, .2);
            pointer-events: none;
        }

        /* Bottom decorative circle */
        .circle-bottom {
            position: absolute;
            bottom: -90px;
            left: -90px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(223, 177, 91, .08);
            border: 2px solid rgba(223, 177, 91, .15);
        }

        /* Horizontal gold divider line */
        .gold-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        /* Logo ring */
        .logo-ring {
            position: relative;
            z-index: 2;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: #fff;
            border: 5px solid rgba(255,255,255,.3);
            box-shadow: 0 0 0 12px rgba(223,177,91,.15), 0 12px 40px rgba(0,0,0,.35);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.4rem;
            animation: floatLogo 3.8s ease-in-out infinite;
        }

        .logo-ring img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Fallback letter logo when image missing */
        .logo-fallback {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--red-dark), var(--red-light));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 2.6rem;
            font-style: italic;
            font-weight: 700;
            color: var(--gold);
            letter-spacing: -2px;
        }

        @keyframes floatLogo {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-9px); }
        }

        .brand-name {
            position: relative;
            z-index: 2;
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 2.6rem;
            font-weight: 700;
            text-align: center;
            line-height: 1.1;
        }

        .brand-name em {
            font-style: italic;
            color: var(--gold);
        }

        .brand-sub {
            position: relative;
            z-index: 2;
            color: rgba(255,255,255,.7);
            font-size: .8rem;
            margin-top: .6rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .brand-slogan {
            position: relative;
            z-index: 2;
            margin-top: 2.2rem;
            text-align: center;
            color: rgba(255,255,255,.55);
            font-size: .82rem;
            font-style: italic;
            line-height: 1.7;
            max-width: 240px;
            border-top: 1px solid rgba(223,177,91,.3);
            padding-top: 1.2rem;
        }

        /* Batik motif dots */
        .motif-dots {
            position: absolute;
            z-index: 1;
            bottom: 5rem;
            right: 1.5rem;
            display: grid;
            grid-template-columns: repeat(4, 8px);
            gap: 7px;
        }

        .motif-dots span {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(223,177,91,.35);
        }

        /* ───── RIGHT PANEL ───── */
        .panel-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 3.5rem;
            background: #fff;
            position: relative;
        }

        /* Gold top-border accent */
        .panel-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--red), var(--gold), var(--red));
        }

        /* ───── FORM BOX ───── */
        .form-box {
            width: 100%;
            max-width: 400px;
            animation: fadeUp .65s cubic-bezier(.22,1,.36,1) both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Greeting badge */
        .greeting-badge {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            background: #FFF0F0;
            border: 1px solid var(--border);
            border-radius: 99px;
            padding: .3rem .85rem;
            font-size: .72rem;
            font-weight: 700;
            color: var(--red);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.2rem;
        }

        .greeting-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--red);
        }

        .title-big {
            font-family: 'Playfair Display', serif;
            font-size: 2.1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .4rem;
            line-height: 1.15;
        }

        .title-big em {
            font-style: italic;
            color: var(--red);
        }

        .title-desc {
            font-size: .84rem;
            color: var(--muted);
            margin-bottom: 2rem;
            line-height: 1.55;
        }

        /* ───── FORM FIELDS ───── */
        .field-group {
            margin-bottom: 1.4rem;
        }

        .field-label {
            display: block;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text);
            margin-bottom: .45rem;
            letter-spacing: .5px;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrap .icon {
            position: absolute;
            left: .9rem;
            width: 17px;
            height: 17px;
            color: var(--muted);
            pointer-events: none;
            transition: color .2s;
        }

        .input-wrap input {
            width: 100%;
            padding: .82rem 1rem .82rem 2.5rem;
            border: 1.5px solid var(--border);
            border-radius: 11px;
            background: #FFF8F5;
            font-family: 'Nunito', sans-serif;
            font-size: .92rem;
            color: var(--text);
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .input-wrap input::placeholder { color: #C4A8A8; }

        .input-wrap input:focus {
            border-color: var(--red-light);
            box-shadow: 0 0 0 4px var(--red-glow);
            background: #fff;
        }

        .input-wrap input:focus + .icon,
        .input-wrap:focus-within .icon { color: var(--red); }

        /* Password toggle button */
        .btn-eye {
            position: absolute;
            right: .9rem;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--muted);
            padding: 0;
            display: flex;
            transition: color .2s;
        }
        .btn-eye:hover { color: var(--red); }

        /* Error message */
        .field-error {
            font-size: .75rem;
            color: var(--red);
            margin-top: .35rem;
        }

        /* ───── REMEMBER + FORGOT ROW ───── */
        .row-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.8rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .82rem;
            color: var(--muted);
            cursor: pointer;
            user-select: none;
        }

        .checkbox-label input[type="checkbox"] {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 1.5px solid var(--border);
            border-radius: 4px;
            background: #FFF8F5;
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
            transition: all .2s;
        }

        .checkbox-label input[type="checkbox"]:checked {
            background: var(--red);
            border-color: var(--red);
        }

        .checkbox-label input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 3px;
            top: 0px;
            width: 5px;
            height: 9px;
            border: 2px solid #fff;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
        }

        .forgot-link {
            font-size: .82rem;
            font-weight: 700;
            color: var(--red);
            text-decoration: none;
            transition: color .2s;
        }
        .forgot-link:hover { color: var(--red-dark); text-decoration: underline; }

        /* ───── SUBMIT BUTTON ───── */
        .btn-login {
            width: 100%;
            padding: .95rem;
            background: var(--red);
            color: #fff;
            border: none;
            border-radius: 11px;
            font-family: 'Nunito', sans-serif;
            font-size: .92rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(192,39,45,.3);
            transition: all .22s;
            position: relative;
            overflow: hidden;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,.12) 50%, transparent 100%);
            transform: translateX(-100%);
            transition: transform .5s;
        }

        .btn-login:hover {
            background: var(--red-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(192,39,45,.35);
        }

        .btn-login:hover::after { transform: translateX(100%); }
        .btn-login:active { transform: translateY(0); box-shadow: 0 4px 12px rgba(192,39,45,.25); }

        /* ───── DIVIDER ───── */
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0 .5rem;
        }

        .divider span { flex: 1; height: 1px; background: var(--border); }

        .divider p {
            font-size: .72rem;
            color: var(--muted);
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        /* ───── FOOTER NOTE ───── */
        .footer-note {
            text-align: center;
            font-size: .78rem;
            color: var(--muted);
            margin-top: 1rem;
        }

        .footer-note strong { color: var(--text); }

        /* ───── CORNER DECORATION (RIGHT) ───── */
        .corner-deco {
            position: absolute;
            bottom: 2.5rem;
            right: 2.5rem;
            opacity: .07;
            pointer-events: none;
        }

        /* ───── RESPONSIVE ───── */
        @media (max-width: 768px) {
            .panel-left { display: none; }
            .panel-right { padding: 2.5rem 1.6rem; }
        }
    </style>
</head>

<body>
<div class="wrapper">

    <!-- ══════════ LEFT PANEL ══════════ -->
    <div class="panel-left">
        <div class="circle-bottom"></div>
        <div class="gold-line"></div>

        <div class="logo-ring">
            {{-- Ganti src sesuai path aset lo --}}
            <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo JEB"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
            <div class="logo-fallback" style="display:none;">JEB</div>
        </div>

        <div class="brand-name">Sanggar Tari <em>JEB</em></div>
        <div class="brand-sub">Singojuruh · Banyuwangi</div>

        <p class="brand-slogan">
            "Melestarikan Budaya,<br>Menggerakkan Jiwa,<br>Mewujudkan Karya"
        </p>

        <!-- Batik dot motif -->
        <div class="motif-dots">
            @for ($i = 0; $i < 16; $i++)
                <span></span>
            @endfor
        </div>
    </div>

    <!-- ══════════ RIGHT PANEL ══════════ -->
    <div class="panel-right">

        <div class="form-box">
            <div class="greeting-badge">
                <span class="dot"></span>
                Portal Admin
            </div>

            <h1 class="title-big">Selamat <em>Datang</em> Kembali</h1>
            <p class="title-desc">Masuk ke sistem informasi Sanggar Tari Jiwa Etnik Blambangan.</p>

            {{-- Session Status --}}
            @if (session('status'))
                <div style="background:#FFF0F0;border:1px solid var(--border);border-radius:8px;padding:.75rem 1rem;margin-bottom:1.2rem;font-size:.82rem;color:var(--red);">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                {{-- Email --}}
                <div class="field-group">
                    <label class="field-label" for="email">Alamat Email</label>
                    <div class="input-wrap">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="admin@jeb.id"
                            required
                            autofocus
                            autocomplete="username"
                        />
                    </div>
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field-group">
                    <label class="field-label" for="password">Kata Sandi</label>
                    <div class="input-wrap">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        />
                        <button type="button" class="btn-eye" onclick="togglePw()" aria-label="Tampilkan kata sandi">
                            <svg id="eye-icon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember + Forgot --}}
                <div class="row-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat saya
                    </label>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">Lupa kata sandi?</a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login">Masuk</button>

                <div class="divider">
                    <span></span>
                    <p>Sistem Informasi JEB</p>
                    <span></span>
                </div>

                <p class="footer-note">
                    Hanya untuk pengguna terdaftar.<br>
                    Butuh akses? Hubungi <strong>Super Admin</strong>.
                </p>
            </form>
        </div>

        <!-- Corner decoration SVG -->
        <svg class="corner-deco" width="120" height="120" viewBox="0 0 120 120" fill="none">
            <circle cx="60" cy="60" r="58" stroke="#C0272D" stroke-width="3"/>
            <circle cx="60" cy="60" r="44" stroke="#dfb15b" stroke-width="2"/>
            <circle cx="60" cy="60" r="30" stroke="#C0272D" stroke-width="1.5"/>
        </svg>

    </div>
</div>

<script>
    function togglePw() {
        const inp  = document.getElementById('password');
        const icon = document.getElementById('eye-icon');
        const show = inp.type === 'password';
        inp.type = show ? 'text' : 'password';
        icon.innerHTML = show
            ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'
            : '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    }
</script>

</body>
</html>