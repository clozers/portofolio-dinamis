@extends('admin.v_layouts.app')

@section('section-admin')
<div>
    <!-- Page Header -->
    <div style="margin-bottom: 2rem;">
        <h1 class="page-title-admin">Dashboard</h1>
        <p class="page-subtitle-admin">Welcome back, <strong style="color: var(--adm-text-secondary)">{{ Auth::user()->name }}</strong>! Here's an overview of your portfolio.</p>
    </div>

    @if(session('success'))
        <div class="flash-msg success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="flash-msg error"><i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}</div>
    @endif

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card indigo">
            <div class="stat-icon indigo"><i class="fa-solid fa-folder-open"></i></div>
            <div class="stat-value">{{ $totalProjects ?? 0 }}</div>
            <div class="stat-label">Total Projects</div>
        </div>
        <div class="stat-card cyan">
            <div class="stat-icon cyan"><i class="fa-solid fa-eye"></i></div>
            <div class="stat-value">—</div>
            <div class="stat-label">Total Views</div>
        </div>
        <div class="stat-card violet">
            <div class="stat-icon violet"><i class="fa-brands fa-github"></i></div>
            <div class="stat-value">{{ $projectsWithGithub ?? 0 }}</div>
            <div class="stat-label">With GitHub</div>
        </div>
        <div class="stat-card emerald">
            <div class="stat-icon emerald"><i class="fa-solid fa-circle-check"></i></div>
            <div class="stat-value">Active</div>
            <div class="stat-label">Status</div>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="admin-card" style="margin-bottom: 1.5rem;">
        <div class="admin-card-header">
            <div class="admin-card-title">
                <i class="fa-solid fa-user-shield"></i>
                Admin Overview
            </div>
            <span class="badge-admin primary">
                <i class="fa-solid fa-circle" style="font-size:0.45rem; color:#4ade80; filter: drop-shadow(0 0 4px #4ade80)"></i>
                Online
            </span>
        </div>
        <div class="admin-card-body">
            <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                <p style="color: var(--adm-text-secondary); line-height: 1.7; font-size: 0.9rem;">
                    You are logged in as <strong style="color: var(--adm-text)">{{ Auth::user()->name }}</strong>.
                    Manage your portfolio projects, monitor content, and keep your portfolio up to date
                    using the navigation on the left.
                </p>

                <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                    <a href="{{ route('admin.project') }}" class="action-btn success" style="padding: 0.55rem 1.1rem; font-size: 0.825rem; border-radius: 9px;">
                        <i class="fa-solid fa-folder-open"></i> Manage Projects
                    </a>
                    <a href="{{ route('beranda') }}" target="_blank" class="action-btn info" style="padding: 0.55rem 1.1rem; font-size: 0.825rem; border-radius: 9px;">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> View Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Info -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem;">
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="admin-card-title">
                    <i class="fa-solid fa-circle-info"></i>
                    System Info
                </div>
            </div>
            <div class="admin-card-body">
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 0; border-bottom: 1px solid rgba(255,255,255,0.04);">
                        <span style="font-size:0.8rem; color:var(--adm-text-muted)">Framework</span>
                        <span style="font-size:0.8rem; color:var(--adm-text-secondary); font-weight:600">Laravel</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 0; border-bottom: 1px solid rgba(255,255,255,0.04);">
                        <span style="font-size:0.8rem; color:var(--adm-text-muted)">Admin</span>
                        <span style="font-size:0.8rem; color:var(--adm-text-secondary); font-weight:600">{{ Auth::user()->email }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 0;">
                        <span style="font-size:0.8rem; color:var(--adm-text-muted)">Last Login</span>
                        <span style="font-size:0.8rem; color:var(--adm-text-secondary); font-weight:600">{{ now()->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <div class="admin-card-title">
                    <i class="fa-solid fa-bolt"></i>
                    Quick Actions
                </div>
            </div>
            <div class="admin-card-body">
                <div style="display: flex; flex-direction: column; gap: 0.6rem;">
                    <a href="{{ route('admin.project') }}" style="display:flex; align-items:center; gap:0.75rem; padding:0.7rem 0.9rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.06); border-radius:9px; text-decoration:none; transition:all 0.2s ease;"
                       onmouseover="this.style.background='rgba(99,102,241,0.08)'; this.style.borderColor='rgba(99,102,241,0.2)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.06)'">
                        <div style="width:32px; height:32px; background:rgba(99,102,241,0.15); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-plus" style="font-size:0.8rem; color:#818cf8"></i>
                        </div>
                        <span style="font-size:0.85rem; color:var(--adm-text-secondary); font-weight:500">Add New Project</span>
                    </a>
                    <a href="{{ route('beranda') }}" target="_blank" style="display:flex; align-items:center; gap:0.75rem; padding:0.7rem 0.9rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.06); border-radius:9px; text-decoration:none; transition:all 0.2s ease;"
                       onmouseover="this.style.background='rgba(6,182,212,0.08)'; this.style.borderColor='rgba(6,182,212,0.2)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.06)'">
                        <div style="width:32px; height:32px; background:rgba(6,182,212,0.12); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-eye" style="font-size:0.8rem; color:#22d3ee"></i>
                        </div>
                        <span style="font-size:0.85rem; color:var(--adm-text-secondary); font-weight:500">Preview Portfolio</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
