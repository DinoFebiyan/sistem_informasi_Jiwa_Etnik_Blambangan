<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lupa Password – Sanggar Tari JEB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Nunito:wght@300;400;600;700&display=swap"
        rel="stylesheet" />

    <style>
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
            --red-light: #E8474D;
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

        /* Left Panel (Sama dengan Login) */
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
            animation: floatLogo 3.5s ease-in-out infinite;
        }

        @keyframes floatLogo {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
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
            font-family: 'Playfair Display', serif;
            font-size: 50px;
            font-style: italic;
            font-weight: 700;
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

        /* Right Panel */
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

        /* Tombol Kembali ke Login sesuai Gambar */
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
            transition: transform 0.2s;
        }

        .back-to-login:hover {
            transform: translateX(-5px);
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
        }

        .field-label {
            display: block;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text);
            margin-bottom: .45rem;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .input-wrap svg.icon {
            position: absolute;
            left: .85rem;
            width: 16px;
            height: 16px;
            color: var(--muted);
        }

        .input-wrap input {
            width: 100%;
            padding: .8rem 1rem .8rem 2.4rem;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            background: #FFF5F5;
            font-size: .9rem;
            outline: none;
        }

        .input-wrap input:focus {
            border-color: var(--red-light);
            box-shadow: 0 0 0 3px rgba(192, 39, 45, .1);
            background: #fff;
        }

        .btn-kirim {
            width: 100%;
            padding: .9rem;
            background: var(--red);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: .95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(192, 39, 45, .25);
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
            <div class="logo-ring">
                <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo JEB"
                    style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;" />
            </div>
            <div class="brand-name">Sanggar Tari <em>JEB</em></div>
            <div class="brand-sub">Singojuruh – Banyuwangi</div>
            <p class="brand-slogan">"Melestarikan Budaya, Menggerakkan Jiwa, Mewujudkan Karya"</p>
        </div>

        <div class="panel-right">
            <a href="/login" class="back-to-login">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Kembali Ke Login
            </a>

            <div class="form-box">
                <div class="title-big">Atur Ulang <em>Kata Sandi</em></div>
                <p class="title-desc">Masukkan email yang sudah terdaftar dan kami akan mengirimkan Verifikasi Password.
                </p>

                <label class="field-label">Alamat Email</label>
                <div class="input-wrap">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <input type="email" placeholder="Masukkan Email" required />
                </div>

                <button class="btn-kirim">Kirim</button>
            </div>
        </div>
    </div>

</body>

</html>