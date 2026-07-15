@extends('layouts.app')

@section('section')
<style>
    /* ============================
       HERO SECTION
    ============================ */
    .hero {
        min-height: calc(100vh - 70px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 4rem 1.5rem;
        text-align: center;
        position: relative;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 1rem;
        background: rgba(99,102,241,0.1);
        border: 1px solid rgba(99,102,241,0.25);
        border-radius: 100px;
        font-size: 0.78rem;
        font-weight: 600;
        color: #818cf8;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        animation: fadeInDown 0.6s ease;
    }

    .hero-eyebrow .dot {
        width: 6px;
        height: 6px;
        background: #4ade80;
        border-radius: 50%;
        box-shadow: 0 0 6px #4ade80;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.8); }
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hero-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2.4rem, 6vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -1px;
        margin-bottom: 1.25rem;
        color: #f1f5f9;
        min-height: 1.2em;
        animation: fadeInUp 0.7s ease 0.1s both;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hero-subtitle {
        font-size: 1.1rem;
        color: #94a3b8;
        max-width: 520px;
        line-height: 1.7;
        margin-bottom: 2.5rem;
        animation: fadeInUp 0.7s ease 0.25s both;
    }

    .hero-subtitle .highlight {
        color: #818cf8;
        font-weight: 600;
    }

    .hero-cta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
        animation: fadeInUp 0.7s ease 0.4s both;
    }

    .hero-cta a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.6rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .cta-github {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: white;
        box-shadow: 0 4px 20px rgba(99,102,241,0.35);
    }

    .cta-github:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(99,102,241,0.55);
    }

    .cta-linkedin {
        background: rgba(255,255,255,0.05);
        color: #cbd5e1;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .cta-linkedin:hover {
        background: rgba(255,255,255,0.1);
        color: #f1f5f9;
        transform: translateY(-2px);
    }

    /* scroll indicator */
    .scroll-hint {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
        color: #475569;
        font-size: 0.75rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        animation: bounce-hint 2s infinite;
    }

    @keyframes bounce-hint {
        0%, 100% { transform: translateX(-50%) translateY(0); }
        50% { transform: translateX(-50%) translateY(6px); }
    }

    /* Stats row */
    .stats-row {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: center;
        padding: 0 1.5rem;
        margin-bottom: 4rem;
        animation: fadeInUp 0.7s ease 0.55s both;
    }

    .stat-item {
        text-align: center;
        padding: 1.25rem 1.5rem;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 14px;
        min-width: 120px;
        transition: all 0.2s ease;
    }

    .stat-item:hover {
        background: rgba(99,102,241,0.07);
        border-color: rgba(99,102,241,0.25);
        transform: translateY(-3px);
    }

    .stat-number {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #6366f1, #06b6d4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        margin-bottom: 0.3rem;
    }

    .stat-label {
        font-size: 0.78rem;
        color: #64748b;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    /* ============================
       DIVIDER
    ============================ */
    .section-divider {
        max-width: 1100px;
        margin: 0 auto 4rem;
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .divider-line {
        flex: 1;
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(255,255,255,0.08), transparent);
    }

    /* ============================
       LATEST PROJECT SECTION
    ============================ */
    .latest-section {
        max-width: 860px;
        margin: 0 auto 6rem;
        padding: 0 1.5rem;
    }

    .section-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .section-label .line {
        width: 30px;
        height: 2px;
        background: linear-gradient(to right, #6366f1, #06b6d4);
        border-radius: 2px;
    }

    .section-label span {
        font-size: 0.8rem;
        font-weight: 600;
        color: #6366f1;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .project-card-featured {
        background: linear-gradient(145deg, rgba(99,102,241,0.07), rgba(6,182,212,0.04));
        border: 1px solid rgba(99,102,241,0.2);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .project-card-featured::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(to right, #6366f1, #06b6d4, #8b5cf6);
    }

    .project-card-featured:hover {
        transform: translateY(-4px);
        border-color: rgba(99,102,241,0.4);
        box-shadow: 0 20px 60px rgba(99,102,241,0.15);
    }

    .project-card-body {
        padding: 2rem 2.5rem;
    }

    .project-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .project-date {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
        color: #64748b;
    }

    .project-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .project-desc {
        color: #94a3b8;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .project-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .project-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.55rem 1.2rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .project-link-primary {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: white;
        box-shadow: 0 3px 15px rgba(99,102,241,0.3);
    }

    .project-link-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(99,102,241,0.5);
    }

    .project-link-outline {
        border: 1px solid rgba(255,255,255,0.12);
        color: #94a3b8;
    }

    .project-link-outline:hover {
        background: rgba(255,255,255,0.06);
        border-color: rgba(255,255,255,0.2);
        color: #f1f5f9;
        transform: translateY(-2px);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #475569;
    }

    .empty-state i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
        color: #334155;
    }

    @media (max-width: 640px) {
        .hero { padding: 2.5rem 1rem 5rem; }
        .project-card-body { padding: 1.5rem; }
        .stats-row { gap: 0.75rem; }
        .stat-item { min-width: 100px; padding: 1rem; }
    }
</style>

<!-- Hero -->
<section class="hero">
    <div class="hero-eyebrow">
        <span class="dot"></span>
        Available for work
    </div>

    <h1 class="hero-title">
        <span id="typed-text"></span>
    </h1>

    <p class="hero-subtitle">
        A passionate web developer crafting
        <span class="highlight">modern user experiences</span>
        with clean code and great design.
    </p>

    <div class="hero-cta">
        <a href="https://github.com/clozers" target="_blank" class="cta-github">
            <i class="fa-brands fa-github"></i> GitHub
        </a>
        <a href="https://www.linkedin.com/in/chairul-imam-826258239/" target="_blank" class="cta-linkedin">
            <i class="fa-brands fa-linkedin"></i> LinkedIn
        </a>
    </div>

    <div class="scroll-hint">
        <i class="fa-solid fa-chevron-down"></i>
        <span>Scroll</span>
    </div>
</section>

<!-- Stats -->
<div class="stats-row reveal">
    <div class="stat-item">
        <div class="stat-number">{{ $totalProjects ?? 0 }}+</div>
        <div class="stat-label">Projects</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">2+</div>
        <div class="stat-label">Years Exp.</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">∞</div>
        <div class="stat-label">Passion</div>
    </div>
</div>

<!-- Section Divider -->
<div class="section-divider reveal">
    <div class="divider-line"></div>
    <span style="font-size:0.75rem; color:#334155; text-transform:uppercase; letter-spacing:0.1em; white-space:nowrap;">Latest Work</span>
    <div class="divider-line"></div>
</div>

<!-- Latest Project -->
<section class="latest-section">
    <div class="section-label reveal">
        <div class="line"></div>
        <span>Featured Project</span>
    </div>

    @if ($latestProject)
        <div class="project-card-featured reveal">
            <div class="project-card-body">
                <div class="project-meta">
                    <span class="badge badge-primary"><i class="fa-solid fa-star" style="font-size:0.65rem"></i> Latest</span>
                    <span class="project-date">
                        <i class="fa-regular fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($latestProject->tgl_upload ?? $latestProject->created_at)->format('F Y') }}
                    </span>
                </div>
                <h2 class="project-title">{{ $latestProject->title }}</h2>
                <p class="project-desc">
                    {{ Str::limit($latestProject->description, 200) }}
                </p>
                <div class="project-actions">
                    @if ($latestProject->github_link)
                        <a href="{{ $latestProject->github_link }}" target="_blank" class="project-link project-link-primary">
                            <i class="fa-brands fa-github"></i> View on GitHub
                        </a>
                    @endif
                    <a href="{{ route('project') }}" class="project-link project-link-outline">
                        <i class="fa-solid fa-arrow-right"></i> All Projects
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="empty-state reveal">
            <i class="fa-solid fa-folder-open"></i>
            <p>Belum ada project yang ditambahkan.</p>
        </div>
    @endif
</section>
@endsection
