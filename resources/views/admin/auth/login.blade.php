<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Portofolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --accent: #06b6d4;
            --bg: #08080f;
            --bg-card: #0f0f1a;
            --border: rgba(255,255,255,0.07);
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #475569;
        }

        html, body { height: 100%; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            display: flex;
            min-height: 100vh;
            overflow: hidden;
        }

        /* ============================
           LEFT PANEL — Decorative
        ============================ */
        .left-panel {
            flex: 1;
            display: none;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0d0d1f 0%, #0a0a18 100%);
        }

        @media (min-width: 900px) { .left-panel { display: block; } }

        .left-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 30% 30%, rgba(99,102,241,0.2) 0%, transparent 60%),
                radial-gradient(ellipse at 70% 70%, rgba(6,182,212,0.12) 0%, transparent 55%),
                radial-gradient(ellipse at 50% 50%, rgba(139,92,246,0.08) 0%, transparent 50%);
        }

        .panel-content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
        }

        .panel-logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            background: linear-gradient(135deg, #818cf8, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .panel-headline {
            text-align: center;
        }

        .panel-headline h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #f1f5f9 30%, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .panel-headline p {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
        }

        .panel-dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(99,102,241,0.3);
        }

        .dot:nth-child(2) { background: rgba(99,102,241,0.5); width: 24px; border-radius: 4px; }
        .dot:nth-child(3) { background: rgba(6,182,212,0.3); }

        /* Grid decoration */
        .grid-overlay {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Floating orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            animation: float 6s ease-in-out infinite;
        }

        .orb1 {
            width: 300px; height: 300px;
            background: rgba(99,102,241,0.15);
            top: 10%; left: 10%;
        }

        .orb2 {
            width: 200px; height: 200px;
            background: rgba(6,182,212,0.1);
            bottom: 20%; right: 15%;
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }

        /* ============================
           RIGHT PANEL — Form
        ============================ */
        .right-panel {
            width: 100%;
            max-width: 480px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2.5rem;
            background: var(--bg-card);
            border-left: 1px solid var(--border);
            position: relative;
            overflow-y: auto;
        }

        @media (min-width: 900px) { .right-panel { max-width: 440px; } }

        .login-header {
            margin-bottom: 2.5rem;
        }

        .login-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.3rem 0.75rem;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            color: #818cf8;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .login-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 0.4rem;
        }

        .login-subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        /* Form */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #94a3b8;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: #334155;
            font-size: 0.875rem;
            transition: color 0.2s ease;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 0.9rem 0.75rem 2.5rem;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 10px;
            color: #f1f5f9;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input::placeholder { color: #334155; }

        .form-input:focus {
            background: rgba(99,102,241,0.05);
            border-color: rgba(99,102,241,0.5);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }

        .form-input:focus + .input-icon,
        .input-wrapper:focus-within .input-icon { color: #6366f1; }

        /* Reorder icon to be after input for CSS sibling */
        .input-wrapper .form-input { order: 1; }
        .input-wrapper .input-icon { order: 2; }

        /* Error message */
        @if(session('error'))
        .login-error {
            padding: 0.75rem 1rem;
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            border-radius: 10px;
            color: #f87171;
            font-size: 0.825rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        @endif

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 25px rgba(99,102,241,0.35);
            margin-top: 1.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 35px rgba(99,102,241,0.5);
        }

        .btn-login:active { transform: translateY(0); }

        /* Back link */
        .back-link {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: #475569;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 2rem;
            transition: color 0.2s ease;
            width: fit-content;
        }

        .back-link:hover { color: #94a3b8; }

        .form-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .form-divider span {
            font-size: 0.75rem;
            color: #334155;
            white-space: nowrap;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.05);
        }

        .footer-note {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.75rem;
            color: #1e293b;
        }
    </style>
</head>

<body>
    <!-- Left Panel -->
    <div class="left-panel">
        <div class="grid-overlay"></div>
        <div class="orb orb1"></div>
        <div class="orb orb2"></div>

        <div class="panel-content">
            <div class="panel-logo">A-RUL Admin</div>

            <div class="panel-headline">
                <h1>Manage Your Portfolio<br>with Ease</h1>
                <p>Add, edit, and organize your projects<br>from one beautiful dashboard.</p>
            </div>

            <div class="panel-dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
        <a href="{{ route('beranda') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Back to Portfolio
        </a>

        <div class="login-header">
            <div class="login-eyebrow">
                <i class="fa-solid fa-lock" style="font-size:0.65rem"></i>
                Admin Access
            </div>
            <h2 class="login-title">Welcome back</h2>
            <p class="login-subtitle">Sign in to your admin account to continue.</p>
        </div>

        @if(session('error'))
            <div class="login-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="padding:0.75rem 1rem; background:rgba(239,68,68,0.08); border:1px solid rgba(239,68,68,0.2); border-radius:10px; color:#f87171; font-size:0.825rem; margin-bottom:1.5rem;">
                <i class="fa-solid fa-circle-exclamation" style="margin-right:0.4rem"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <div class="input-wrapper">
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        placeholder="admin@example.com"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                    >
                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    >
                    <span class="input-icon"><i class="fa-solid fa-key"></i></span>
                </div>
            </div>

            <button type="submit" class="btn-login" id="loginBtn">
                <i class="fa-solid fa-right-to-bracket"></i>
                Sign In
            </button>
        </form>

        <div class="footer-note">
            &copy; <script>document.write(new Date().getFullYear())</script> Chairul Imam. All rights reserved.
        </div>
    </div>

    <script>
        // Fix icon positioning inside input-wrapper
        document.querySelectorAll('.input-wrapper').forEach(wrapper => {
            const icon = wrapper.querySelector('.input-icon');
            wrapper.style.display = 'flex';
            wrapper.style.alignItems = 'center';
            wrapper.style.position = 'relative';
            if (icon) {
                icon.style.position = 'absolute';
                icon.style.left = '0.9rem';
                icon.style.pointerEvents = 'none';
                icon.style.zIndex = '1';
            }
        });

        document.getElementById('loginBtn').addEventListener('click', function() {
            this.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Signing in...';
        });
    </script>
</body>
</html>
