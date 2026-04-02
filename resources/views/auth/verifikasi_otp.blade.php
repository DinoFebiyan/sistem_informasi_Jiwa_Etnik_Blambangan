<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi Kode – Sanggar Tari JEB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Nunito:wght@300;400;600;700&display=swap"
        rel="stylesheet" />

    <style>
        /* ── Variabel Warna & Font Sesuai Tema Login ── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red: #C0272D;
            --red-dark: #9B1B20;
            --gold: #dfb15b;
            --cream: #FFF8F8;
            --text: #2C1A1A;
            --muted: #9A8080;
            --border: #F0DADA;
        }

        html,
        body {
            height: 100%;
            font-family: 'Nunito', sans-serif;
            background: var(--cream);
            overflow: hidden;
        }

        .wrapper {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* ── Panel Kiri (Konsisten dengan Halaman Login) ── */
        .panel-left {
            width: 42%;
            background: var(--red);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2.5rem;
            overflow: hidden;
        }

        .panel-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: repeating-linear-gradient(45deg, rgba(255, 255, 255, .07) 0px, rgba(255, 255, 255, .07) 1px, transparent 1px, transparent 28px),
                repeating-linear-gradient(-45deg, rgba(255, 255, 255, .07) 0px, rgba(255, 255, 255, .07) 1px, transparent 1px, transparent 28px);
        }

        .logo-ring {
            position: relative;
            z-index: 1;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: #fff;
            border: 5px solid rgba(255, 255, 255, .4);
            box-shadow: 0 8px 32px rgba(0, 0, 0, .3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }

        .brand-name {
            position: relative;
            z-index: 1;
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 50px;
            font-weight: 700;
            text-align: center;
            line-height: 1.1;
        }

        .brand-name em {
            font-style: italic;
            color: var(--gold);
            display: block;
        }

        .brand-sub {
            position: relative;
            z-index: 1;
            color: rgba(255, 255, 255, .8);
            font-size: 0.9rem;
            margin-top: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .brand-slogan {
            position: relative;
            z-index: 1;
            margin-top: 2.5rem;
            text-align: center;
            color: rgba(255, 255, 255, .6);
            font-size: .85rem;
            font-style: italic;
            line-height: 1.6;
            max-width: 250px;
            border-top: 1px solid rgba(255, 255, 255, .2);
            padding-top: 1.2rem;
        }

        /* ── Panel Kanan (Verifikasi Kode) ── */
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

        /* Tombol Kembali (Seperti di Gambar Login kedua) */
        .back-to-login {
            position: absolute;
            top: 2rem;
            left: 2rem;
            text-decoration: none;
            color: var(--red);
            font-weight: 700;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-box {
            width: 100%;
            max-width: 400px;
            animation: fadeUp .6s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title-big {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .35rem;
            text-align: center;
        }

        .title-big em {
            font-style: italic;
            color: var(--red);
        }

        .title-desc {
            font-size: .85rem;
            color: var(--muted);
            margin-bottom: 2.5rem;
            line-height: 1.5;
            text-align: center;
        }

        .field-label {
            display: block;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text);
            margin-bottom: 1.5rem;
            text-align: center;
            letter-spacing: 2px;
        }

        /* ── Input OTP Bulat Sempurna (Sesuai Gambar Figma) ── */
        .otp-input {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            /* Bulat Sempurna */
            border: 2px solid var(--border);
            background: #FFF8F8;
            /* Krem tipis sesuai tema */
            text-align: center;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--red);
            /* Angka berwarna merah */
            outline: none;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
        }

        /* Efek saat kotak difokuskan */
        .otp-input:focus {
            border-color: var(--gold);
            /* Border jadi emas saat diisi */
            background: #fff;
            box-shadow: 0 0 10px rgba(223, 177, 91, 0.3);
            /* Shadow emas tipis */
        }

        /* ── Tombol Kirim (Sesuai Tombol "MASUK") ── */
        .btn-kirim {
            width: 100%;
            padding: 1rem;
            background: var(--red);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(192, 39, 45, 0.2);
            transition: all 0.2s;
        }

        .btn-kirim:hover {
            background: var(--red-dark);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .panel-left {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="panel-left">
            <div class="logo-ring"><img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo"
                    style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;" /></div>
            <div class="brand-name">Sanggar Tari <em>JEB</em></div>
            <div class="brand-sub">Singojuruh – Banyuwangi</div>
            <p class="brand-slogan">"Melestarikan Budaya, Menggerakkan Jiwa, Mewujudkan Karya"</p>
        </div>

        <div class="panel-right">
            <a href="/auth/forgot_password" class="back-to-login">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Kembali
            </a>

            <div class="form-box">
                <div class="title-big">Verifikasi <em>Kode</em></div>
                <p class="title-desc">Masukkan kode yang telah dikirim ke email terdaftar.</p>
                <label class="field-label">KODE VERIFIKASI</label>
                <div class="otp-container"
                    style="display: flex; gap: 12px; justify-content: center; margin-bottom: 2.5rem;">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric">
                </div>
                <button class="btn-kirim" onclick="window.location.href='{{ route('verifikasi.otp') }}'">KIRIM
                    KODE</button>

                <div
                    style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: var(--muted); line-height: 1.6;">
                    Belum menerima kode? <br>
                    <a href="#"
                        style="color: var(--red); font-weight: 800; text-decoration: none; border-bottom: 1.5px solid var(--red);">KIRIM
                        ULANG</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script Auto-tab untuk OTP (Kursor pindah otomatis setelah ketik angka)
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('keyup', (e) => {
                if (e.key >= 0 && e.key <= 9) {
                    if (index < inputs.length - 1) inputs[index + 1].focus();
                } else if (e.key === 'Backspace') {
                    if (index > 0) inputs[index - 1].focus();
                }
            });
        });
    </script>

</body>

</html>