<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password – Sanggar Tari JEB</title>

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

        /* Panel Kiri (Sama Persis dengan Login) */
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

        /* Panel Kanan (Form Input) */
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
            margin-bottom: 1.5rem;
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
            transition: all 0.2s;
        }

        .input-wrap input:focus {
            border-color: var(--red);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(192, 39, 45, .1);
        }

        .btn-reset {
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
            box-shadow: 0 4px 16px rgba(192, 39, 45, .25);
            transition: all 0.2s;
        }

        .btn-reset:hover {
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
        </div>

        <div class="panel-right">
            <div class="form-box">
                <div class="title-big">Reset <em>Password</em></div>
                <p class="title-desc">Buatlah password yang mudah diingat namun tetap aman.</p>

                <label class="field-label">Password Baru</label>
                <div class="input-wrap">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <input type="password" placeholder="********" required />
                </div>

                <label class="field-label">Konfirmasi Password</label>
                <div class="input-wrap" style="margin-bottom: 2.5rem;">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <input type="password" placeholder="********" required />
                </div>

                <button class="btn-reset" onclick="window.location.href='{{ route('login') }}'">
                    LOGIN
                </button>
            </div>
        </div>
    </div>
</body>

</html>