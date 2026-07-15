<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel — Portofolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Keep Material Dashboard for Bootstrap compatibility -->
    <link href="{{ asset('template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('template/assets/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <style>
        /* ================================================
           ADMIN PANEL — PREMIUM DARK REDESIGN
           Overrides & enhancements on top of Material Dashboard
        ================================================ */
        :root {
            --adm-bg: #08080f;
            --adm-sidebar: #0d0d1a;
            --adm-card: #111120;
            --adm-card-alt: #13131f;
            --adm-border: rgba(255,255,255,0.07);
            --adm-border-hover: rgba(99,102,241,0.35);
            --adm-primary: #6366f1;
            --adm-primary-dark: #4f46e5;
            --adm-accent: #06b6d4;
            --adm-accent2: #8b5cf6;
            --adm-success: #10b981;
            --adm-warning: #f59e0b;
            --adm-danger: #ef4444;
            --adm-text: #e2e8f0;
            --adm-text-secondary: #94a3b8;
            --adm-text-muted: #475569;
            --sidebar-width: 260px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif !important;
            background: var(--adm-bg) !important;
            color: var(--adm-text) !important;
        }

        /* ============================
           SIDEBAR
        ============================ */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--adm-sidebar);
            border-right: 1px solid var(--adm-border);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 1.75rem 1.5rem 1.25rem;
            border-bottom: 1px solid var(--adm-border);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--adm-primary), var(--adm-accent2));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(99,102,241,0.35);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            background: linear-gradient(135deg, #818cf8, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .brand-sub {
            font-size: 0.68rem;
            color: var(--adm-text-muted);
            font-weight: 500;
            letter-spacing: 0.04em;
        }

        /* User info in sidebar */
        .sidebar-user {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--adm-border);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--adm-primary), var(--adm-accent2));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--adm-text);
            line-height: 1.2;
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--adm-text-muted);
        }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 1rem 0.75rem;
        }

        .nav-section-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--adm-text-muted);
            padding: 0.5rem 0.75rem;
            margin-bottom: 0.25rem;
        }

        .nav-item {
            margin-bottom: 0.15rem;
        }

        .nav-link-admin {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.9rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.86rem;
            font-weight: 500;
            color: var(--adm-text-muted);
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-link-admin i {
            width: 20px;
            text-align: center;
            font-size: 0.9rem;
            transition: color 0.2s ease;
        }

        .nav-link-admin:hover {
            background: rgba(255,255,255,0.04);
            color: var(--adm-text);
        }

        .nav-link-admin.active {
            background: rgba(99,102,241,0.12);
            color: #818cf8;
            border: 1px solid rgba(99,102,241,0.2);
        }

        .nav-link-admin.active i { color: var(--adm-primary); }

        .nav-link-admin.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 60%;
            background: linear-gradient(to bottom, var(--adm-primary), var(--adm-accent2));
            border-radius: 0 3px 3px 0;
        }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 1rem 0.75rem;
            border-top: 1px solid var(--adm-border);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.9rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.86rem;
            font-weight: 500;
            color: var(--adm-text-muted);
            transition: all 0.2s ease;
            cursor: pointer;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
        }

        .logout-btn:hover {
            background: rgba(239,68,68,0.08);
            color: #f87171;
        }

        /* ============================
           MAIN CONTENT
        ============================ */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .admin-topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(8,8,15,0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--adm-border);
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.825rem;
            color: var(--adm-text-muted);
        }

        .topbar-breadcrumb .sep { color: #1e293b; }

        .topbar-breadcrumb .current {
            color: var(--adm-text-secondary);
            font-weight: 500;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar-date {
            font-size: 0.78rem;
            color: var(--adm-text-muted);
            display: none;
        }

        @media (min-width: 768px) { .topbar-date { display: block; } }

        .topbar-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--adm-primary), var(--adm-accent2));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: white;
        }

        /* Mobile sidebar toggle */
        .sidebar-toggle {
            display: none;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--adm-border);
            color: var(--adm-text-secondary);
            cursor: pointer;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .sidebar-toggle { display: flex; }
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-main { margin-left: 0; }
        }

        /* Content area */
        .admin-content {
            flex: 1;
            padding: 2rem;
        }

        /* ============================
           CARD COMPONENTS
        ============================ */
        .admin-card {
            background: var(--adm-card);
            border: 1px solid var(--adm-border);
            border-radius: 16px;
            overflow: hidden;
        }

        .admin-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--adm-border);
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .admin-card-title {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--adm-text);
        }

        .admin-card-title i {
            color: var(--adm-primary);
            font-size: 0.9rem;
        }

        .admin-card-body {
            padding: 1.5rem;
        }

        /* Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--adm-card);
            border: 1px solid var(--adm-border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
        }

        .stat-card.indigo::after { background: linear-gradient(to right, #6366f1, #818cf8); }
        .stat-card.cyan::after { background: linear-gradient(to right, #06b6d4, #22d3ee); }
        .stat-card.violet::after { background: linear-gradient(to right, #8b5cf6, #a78bfa); }
        .stat-card.emerald::after { background: linear-gradient(to right, #10b981, #34d399); }

        .stat-card:hover {
            transform: translateY(-3px);
            border-color: var(--adm-border-hover);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .stat-icon.indigo { background: rgba(99,102,241,0.15); color: #818cf8; }
        .stat-icon.cyan { background: rgba(6,182,212,0.12); color: #22d3ee; }
        .stat-icon.violet { background: rgba(139,92,246,0.12); color: #a78bfa; }
        .stat-icon.emerald { background: rgba(16,185,129,0.12); color: #34d399; }

        .stat-value {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--adm-text);
            line-height: 1;
            margin-bottom: 0.35rem;
        }

        .stat-label {
            font-size: 0.78rem;
            color: var(--adm-text-muted);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ============================
           TABLE STYLES
        ============================ */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table thead th {
            padding: 0.75rem 1rem;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--adm-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            background: rgba(255,255,255,0.02);
            border-bottom: 1px solid var(--adm-border);
            white-space: nowrap;
        }

        .admin-table tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.04);
            transition: background 0.15s ease;
        }

        .admin-table tbody tr:hover {
            background: rgba(99,102,241,0.04);
        }

        .admin-table tbody tr:last-child { border-bottom: none; }

        .admin-table tbody td {
            padding: 1rem;
            font-size: 0.875rem;
            color: var(--adm-text-secondary);
            vertical-align: middle;
        }

        .admin-table tbody td:first-child { color: var(--adm-text-muted); font-weight: 600; }

        .td-title {
            font-weight: 600 !important;
            color: var(--adm-text) !important;
        }

        /* Action buttons */
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .action-btn.info {
            background: rgba(6,182,212,0.1);
            color: #22d3ee;
            border: 1px solid rgba(6,182,212,0.2);
        }
        .action-btn.info:hover { background: rgba(6,182,212,0.2); }

        .action-btn.warning {
            background: rgba(245,158,11,0.1);
            color: #fbbf24;
            border: 1px solid rgba(245,158,11,0.2);
        }
        .action-btn.warning:hover { background: rgba(245,158,11,0.2); }

        .action-btn.danger {
            background: rgba(239,68,68,0.1);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.2);
        }
        .action-btn.danger:hover { background: rgba(239,68,68,0.2); }

        .action-btn.success {
            background: rgba(99,102,241,0.12);
            color: #818cf8;
            border: 1px solid rgba(99,102,241,0.25);
        }
        .action-btn.success:hover { background: rgba(99,102,241,0.22); }

        /* ============================
           MODAL STYLES
        ============================ */
        .modal-overlay-admin {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(8px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .modal-box-admin {
            background: #0f0f1a;
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 18px;
            width: 100%;
            max-width: 540px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }

        .modal-box-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(to right, #6366f1, #06b6d4);
            border-radius: 18px 18px 0 0;
        }

        .modal-head-admin {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem 0.75rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .modal-head-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--adm-text);
        }

        .modal-close-btn {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            color: #64748b;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            transition: all 0.15s ease;
        }

        .modal-close-btn:hover {
            background: rgba(239,68,68,0.12);
            border-color: rgba(239,68,68,0.25);
            color: #f87171;
        }

        .modal-body-admin {
            padding: 1.25rem 1.5rem 1.5rem;
        }

        /* Form elements inside modal */
        .form-group-admin {
            margin-bottom: 1rem;
        }

        .form-label-admin {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--adm-text-muted);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 0.4rem;
        }

        .form-control-admin {
            width: 100%;
            padding: 0.65rem 0.9rem;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 9px;
            color: var(--adm-text);
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control-admin:focus {
            background: rgba(99,102,241,0.05);
            border-color: rgba(99,102,241,0.45);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }

        .form-control-admin::placeholder { color: #1e293b; }

        textarea.form-control-admin { resize: vertical; min-height: 90px; }

        .modal-footer-admin {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.6rem;
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .btn-admin {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.55rem 1.1rem;
            border-radius: 8px;
            font-size: 0.825rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.15s ease;
            font-family: 'Inter', sans-serif;
        }

        .btn-admin.primary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            box-shadow: 0 3px 12px rgba(99,102,241,0.3);
        }
        .btn-admin.primary:hover { box-shadow: 0 5px 20px rgba(99,102,241,0.5); transform: translateY(-1px); }

        .btn-admin.secondary {
            background: rgba(255,255,255,0.05);
            color: var(--adm-text-muted);
            border: 1px solid rgba(255,255,255,0.08);
        }
        .btn-admin.secondary:hover { background: rgba(255,255,255,0.1); color: var(--adm-text-secondary); }

        .btn-admin.danger-solid {
            background: rgba(239,68,68,0.15);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.2);
        }
        .btn-admin.danger-solid:hover { background: rgba(239,68,68,0.25); }

        .btn-admin.warning {
            background: rgba(245,158,11,0.12);
            color: #fbbf24;
            border: 1px solid rgba(245,158,11,0.2);
        }
        .btn-admin.warning:hover { background: rgba(245,158,11,0.22); }

        /* ============================
           UTILITY
        ============================ */
        .page-title-admin {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--adm-text);
            margin-bottom: 0.25rem;
        }

        .page-subtitle-admin {
            font-size: 0.825rem;
            color: var(--adm-text-muted);
            margin-bottom: 2rem;
        }

        .badge-admin {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.2rem 0.6rem;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-admin.primary {
            background: rgba(99,102,241,0.12);
            color: #818cf8;
        }

        /* Success/error flash */
        .flash-msg {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-size: 0.825rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .flash-msg.success {
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.2);
            color: #34d399;
        }

        .flash-msg.error {
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            color: #f87171;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.15); }

        @media (max-width: 640px) {
            .admin-content { padding: 1.25rem; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 0.75rem; }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.beranda') }}" class="sidebar-brand">
                <div class="brand-icon"><i class="fa-solid fa-layer-group"></i></div>
                <div class="brand-text">
                    <span class="brand-name">A-RUL Admin</span>
                    <span class="brand-sub">Portfolio CMS</span>
                </div>
            </a>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
            <div>
                <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">Navigation</div>

            <div class="nav-item">
                <a href="{{ route('admin.beranda') }}" class="nav-link-admin {{ Request::is('admin/beranda') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('admin.project') }}" class="nav-link-admin {{ Request::is('admin/project*') ? 'active' : '' }}">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Projects</span>
                </a>
            </div>

            <div class="nav-section-label" style="margin-top:1rem">Account</div>

            <div class="nav-item">
                <a href="{{ route('beranda') }}" target="_blank" class="nav-link-admin">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>View Portfolio</span>
                </a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
            <button class="logout-btn" onclick="document.getElementById('logout-form').submit()">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Log Out</span>
            </button>
        </div>
    </aside>

    <!-- Main -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div style="display:flex; align-items:center; gap:1rem">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="topbar-breadcrumb">
                    <span>Admin</span>
                    <span class="sep">/</span>
                    <span class="current">
                        @if(Request::is('admin/beranda'))
                            Dashboard
                        @elseif(Request::is('admin/project*'))
                            Projects
                        @else
                            Panel
                        @endif
                    </span>
                </div>
            </div>
            <div class="topbar-actions">
                <span class="topbar-date" id="topbarDate"></span>
                <div class="topbar-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
            </div>
        </header>

        <!-- Content -->
        <div class="admin-content">
            @yield('section-admin')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
    <script>
        // Date in topbar
        const now = new Date();
        document.getElementById('topbarDate').textContent =
            now.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' });

        // Sidebar toggle (mobile)
        document.getElementById('sidebarToggle').addEventListener('click', () => {
            document.getElementById('adminSidebar').classList.toggle('open');
        });

        // Auto-dismiss flash messages
        setTimeout(() => {
            document.querySelectorAll('.flash-msg').forEach(el => {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            });
        }, 4000);
    </script>
</body>
</html>
