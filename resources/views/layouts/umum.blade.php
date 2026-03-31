<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Sanggar Tari Jiwa Etnik Blambangan')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ══ GLOBAL RESET & VARIABLES ══ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --maroon-dark: #4a0c0c; 
            --red-bg: #b51c1c;      
            --red-card: #c42020;    
            --gold: #dfb15b;        
            --cream: #f8f1e1;       
            --text-dark: #333333;
            --text-gray: #666666;
            --white: #ffffff;
        }
        body { 
            font-family: 'Poppins', sans-serif; 
            background: var(--white); 
            color: var(--text-dark); 
            overflow-x: hidden; 
            scroll-behavior: smooth;
        }

        /* ══ NAVBAR STYLE ══ */
        nav {
            position: sticky; top: 0; z-index: 200;
            background: var(--maroon-dark);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0.8rem 4%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .nav-logo { display: flex; align-items: center; gap: 1rem; }
        .logo-img-nav { width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid var(--white); }
        .nav-logo span {
            font-family: 'Playfair Display', serif; font-style: italic;
            font-weight: 700; font-size: 1.5rem; color: var(--white); letter-spacing: 1px;
        }
        .nav-links { display: flex; align-items: center; gap: 1.5rem; }
        .nav-links a { color: var(--white); text-decoration: none; font-size: 0.85rem; font-weight: 400; transition: color .2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--gold); }
        .btn-login { border: 1px solid var(--gold); color: var(--gold) !important; border-radius: 20px; padding: 0.4rem 1.2rem; display: flex; align-items: center; gap: 0.4rem; }
        .btn-login:hover { background: var(--gold); color: var(--maroon-dark) !important; }

        /* ══ FOOTER STYLE ══ */
        footer { background: var(--maroon-dark); color: var(--white); padding: 4rem 8% 2rem; border-top: 4px solid var(--gold); }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 3rem; margin-bottom: 3rem; }
        .footer-brand h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--gold); margin-bottom: 1rem; }
        .footer-brand p { font-size: 0.85rem; color: rgba(255,255,255,0.7); line-height: 1.8; max-width: 400px; }
        .footer-links h4 { font-family: 'Playfair Display', serif; font-size: 1.1rem; margin-bottom: 1.2rem; color: var(--white); }
        .footer-links ul { list-style: none; }
        .footer-links ul li { margin-bottom: 0.8rem; }
        .footer-links ul li a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: color 0.3s; }
        .footer-links ul li a:hover { color: var(--gold); }
        .footer-bottom { text-align: center; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem; color: rgba(255,255,255,0.5); }

        @media (max-width: 900px) { .footer-grid { grid-template-columns: 1fr; } }
        @media (max-width: 600px) { .nav-links { display: none; } }
    </style>

    @stack('styles')
</head>
<body>
    @include('partials.navbarUmum')

    <main>
        @yield('content')
    </main>

    @include('partials.footerUmum')

    @stack('scripts')
</body>
</html>