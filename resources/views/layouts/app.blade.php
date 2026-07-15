<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Chairul Imam - Web Developer Portfolio. Crafting modern web experiences with clean code and great design.">
    @vite('resources/css/app.css')
    <title>Chairul | Portofolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --accent: #06b6d4;
            --accent2: #8b5cf6;
            --bg-dark: #0a0a0f;
            --bg-card: #111118;
            --bg-glass: rgba(255,255,255,0.04);
            --border-glass: rgba(255,255,255,0.08);
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #475569;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Ambient glow background */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(ellipse at 20% 20%, rgba(99,102,241,0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(139,92,246,0.06) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(6,182,212,0.04) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* ============================
           NAVBAR
        ============================ */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 0 1.5rem;
            transition: all 0.3s ease;
        }

        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            border-bottom: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(10, 10, 15, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-glass);
        }

        .navbar-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .navbar-brand span {
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover span {
            transform: scale(1.05);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
        }

        .nav-links a {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.9rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--text-primary);
            background: var(--bg-glass);
        }

        .nav-links a.active {
            color: var(--primary);
            background: rgba(99,102,241,0.1);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background: var(--primary);
            border-radius: 50%;
        }

        .nav-cv-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.45rem 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white !important;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 0 20px rgba(99,102,241,0.3);
        }

        .nav-cv-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 25px rgba(99,102,241,0.5) !important;
            background: linear-gradient(135deg, var(--primary-dark), var(--accent2)) !important;
            color: white !important;
        }

        /* Mobile menu toggle */
        .nav-toggle {
            display: none;
            background: none;
            border: 1px solid var(--border-glass);
            color: var(--text-secondary);
            width: 38px;
            height: 38px;
            border-radius: 8px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .nav-toggle:hover {
            background: var(--bg-glass);
            color: var(--text-primary);
        }

        @media (max-width: 768px) {
            .nav-toggle { display: flex; }
            .nav-links {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background: rgba(10, 10, 15, 0.97);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 1rem;
                gap: 0.25rem;
                border-bottom: 1px solid var(--border-glass);
            }
            .nav-links.open { display: flex; }
            .nav-links a { width: 100%; }
        }

        /* ============================
           FOOTER
        ============================ */
        .site-footer {
            position: relative;
            z-index: 1;
            border-top: 1px solid var(--border-glass);
            background: var(--bg-card);
            padding: 2.5rem 1.5rem;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .footer-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
        }

        .footer-social a {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: var(--bg-glass);
            border: 1px solid var(--border-glass);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .footer-social a:hover {
            background: rgba(99,102,241,0.15);
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--text-primary); }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-glass);
        }

        .footer-bottom p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .footer-loc {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* ============================
           MAIN CONTENT
        ============================ */
        main {
            position: relative;
            z-index: 1;
            padding-top: 70px;
        }

        /* Glass card utility */
        .glass-card {
            background: var(--bg-glass);
            border: 1px solid var(--border-glass);
            border-radius: 16px;
            backdrop-filter: blur(10px);
        }

        /* Gradient text utility */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Badge utility */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.25rem 0.75rem;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .badge-primary {
            background: rgba(99,102,241,0.15);
            color: var(--primary);
            border: 1px solid rgba(99,102,241,0.3);
        }

        .badge-accent {
            background: rgba(6,182,212,0.12);
            color: var(--accent);
            border: 1px solid rgba(6,182,212,0.25);
        }

        /* Button primary */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(99,102,241,0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(99,102,241,0.5);
        }

        /* Button secondary */
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.5rem;
            background: var(--bg-glass);
            color: var(--text-primary);
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid var(--border-glass);
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.15);
            transform: translateY(-2px);
        }

        /* Scroll reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar" id="mainNavbar">
        <div class="navbar-inner">
            <a href="{{ route('beranda') }}" class="navbar-brand"><span>A-RUL</span></a>

            <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <ul class="nav-links" id="navLinks">
                <li>
                    <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('project') }}" class="{{ request()->routeIs('project') ? 'active' : '' }}">
                        <i class="fa-solid fa-folder-open"></i> Projects
                    </a>
                </li>
                <li>
                    <a href="{{ asset('cv.pdf') }}" download class="nav-cv-btn">
                        <i class="fa-solid fa-file-arrow-down"></i> Download CV
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('section')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-top">
                <div>
                    <span class="footer-brand">A-RUL</span>
                    <p style="font-size:0.8rem; color:var(--text-muted); margin-top:0.3rem;">Web Developer · Bekasi, Indonesia</p>
                </div>
                <div class="footer-links">
                    <a href="{{ route('beranda') }}">Home</a>
                    <a href="{{ route('project') }}">Projects</a>
                </div>
                <div class="footer-social">
                    <a href="https://github.com/clozers" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/chairul-imam-826258239/" target="_blank" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <script>document.write(new Date().getFullYear())</script> Chairul Imam. All rights reserved.</p>
                <span class="footer-loc"><i class="fa-solid fa-location-dot" style="color:var(--primary)"></i> Bekasi, Indonesia</span>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 20) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        });

        // Mobile toggle
        document.getElementById('navToggle').addEventListener('click', () => {
            document.getElementById('navLinks').classList.toggle('open');
        });

        // Typed.js
        document.addEventListener("DOMContentLoaded", function () {
            if (document.getElementById("typed-text")) {
                new Typed("#typed-text", {
                    strings: ["Hi, I'm Arul 👋", "A Web Developer 💻", "Let's Build Something! 🚀"],
                    typeSpeed: 50,
                    backSpeed: 30,
                    backDelay: 1500,
                    startDelay: 500,
                    loop: true,
                    showCursor: true,
                    cursorChar: "|",
                });
            }
        });

        // Scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(el => {
                if (el.isIntersecting) {
                    el.target.classList.add('visible');
                    observer.unobserve(el.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>

</body>
</html>
