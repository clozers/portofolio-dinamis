@extends('layouts.app')

@section('section')
<style>
    /* ============================
       PROJECTS PAGE
    ============================ */
    .projects-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 1.5rem 6rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 3.5rem;
    }

    .page-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.9rem;
        background: rgba(99,102,241,0.1);
        border: 1px solid rgba(99,102,241,0.25);
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 600;
        color: #818cf8;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
    }

    .page-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        letter-spacing: -1px;
        margin-bottom: 0.75rem;
        background: linear-gradient(135deg, #f1f5f9 30%, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 1rem;
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ============================
       PROJECTS GRID
    ============================ */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 1.5rem;
    }

    .project-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .project-card::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 18px;
        background: linear-gradient(135deg, rgba(99,102,241,0.05), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        border-color: rgba(99,102,241,0.3);
        box-shadow: 0 20px 50px rgba(0,0,0,0.4), 0 0 0 1px rgba(99,102,241,0.1);
    }

    .project-card:hover::before { opacity: 1; }

    .card-screenshot {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(135deg, #1e1b4b, #0c4a6e);
        position: relative;
    }

    .card-screenshot img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .project-card:hover .card-screenshot img {
        transform: scale(1.05);
    }

    .card-screenshot-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        background: linear-gradient(135deg, rgba(99,102,241,0.15), rgba(6,182,212,0.1));
    }

    .card-screenshot-placeholder i {
        font-size: 2.5rem;
        color: rgba(99,102,241,0.5);
    }

    .card-screenshot-placeholder span {
        font-size: 0.75rem;
        color: #475569;
        font-weight: 500;
    }

    .card-top-bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(to right, #6366f1, #06b6d4);
    }

    .card-content {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 1;
    }

    .card-header-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .card-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: #f1f5f9;
        line-height: 1.3;
        flex: 1;
    }

    .card-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.2rem 0.6rem;
        background: rgba(6,182,212,0.12);
        border: 1px solid rgba(6,182,212,0.2);
        border-radius: 100px;
        font-size: 0.68rem;
        font-weight: 600;
        color: #22d3ee;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .card-desc {
        color: #64748b;
        font-size: 0.875rem;
        line-height: 1.65;
        flex: 1;
        margin-bottom: 1.25rem;
    }

    .card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .card-date {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.78rem;
        color: #475569;
    }

    .card-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .card-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.4rem 0.8rem;
        border-radius: 7px;
        font-size: 0.78rem;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .card-btn-ghost {
        background: rgba(255,255,255,0.05);
        color: #94a3b8;
        border: 1px solid rgba(255,255,255,0.08);
    }

    .card-btn-ghost:hover {
        background: rgba(255,255,255,0.1);
        color: #f1f5f9;
        transform: translateY(-1px);
    }

    .card-btn-primary {
        background: rgba(99,102,241,0.15);
        color: #818cf8;
        border: 1px solid rgba(99,102,241,0.25);
    }

    .card-btn-primary:hover {
        background: rgba(99,102,241,0.25);
        color: #a5b4fc;
        transform: translateY(-1px);
    }

    /* ============================
       MODAL
    ============================ */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.75);
        backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 200;
        padding: 1rem;
    }

    .modal-box {
        background: #111118;
        border: 1px solid rgba(99,102,241,0.2);
        border-radius: 20px;
        width: 100%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }

    .modal-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(to right, #6366f1, #06b6d4, #8b5cf6);
        border-radius: 20px 20px 0 0;
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem 2rem 1rem;
    }

    .modal-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #f1f5f9;
    }

    .modal-close {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        color: #64748b;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        font-size: 0.85rem;
    }

    .modal-close:hover {
        background: rgba(239,68,68,0.15);
        border-color: rgba(239,68,68,0.3);
        color: #f87171;
    }

    .modal-body {
        padding: 0 2rem 2rem;
    }

    .modal-screenshot {
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 12px;
        margin-bottom: 1.25rem;
        background: linear-gradient(135deg, rgba(99,102,241,0.15), rgba(6,182,212,0.1));
    }

    .modal-screenshot img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .modal-desc {
        color: #94a3b8;
        font-size: 0.9rem;
        line-height: 1.7;
        margin-bottom: 1.25rem;
    }

    .modal-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        padding: 1rem;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 10px;
        margin-bottom: 1.25rem;
    }

    .modal-meta-item {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
        color: #64748b;
    }

    .modal-meta-item i { color: #6366f1; }

    .modal-footer-btns {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    /* Empty state */
    .empty-projects {
        grid-column: 1 / -1;
        text-align: center;
        padding: 5rem 2rem;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        background: rgba(99,102,241,0.1);
        border: 1px solid rgba(99,102,241,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: #4f46e5;
    }

    .empty-projects h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    .empty-projects p {
        color: #334155;
        font-size: 0.9rem;
    }

    @media (max-width: 640px) {
        .projects-grid { grid-template-columns: 1fr; }
        .projects-page { padding: 2.5rem 1rem 4rem; }
        .modal-header, .modal-body { padding-left: 1.25rem; padding-right: 1.25rem; }
    }
</style>

<div class="projects-page">
    <div class="page-header reveal">
        <div class="page-eyebrow">
            <i class="fa-solid fa-folder-open" style="font-size:0.7rem"></i>
            My Work
        </div>
        <h1 class="page-title">My Projects</h1>
        <p class="page-subtitle">A collection of things I've built — from web apps to experiments.</p>
    </div>

    <div class="projects-grid">
        @forelse ($projects as $item)
            <div x-data="{ open: false }" class="project-card reveal">
                <div class="card-top-bar"></div>

                <!-- Screenshot -->
                <div class="card-screenshot">
                    @if ($item->screenshot)
                        <img src="{{ asset($item->screenshot) }}" alt="{{ $item->title }}">
                    @else
                        <div class="card-screenshot-placeholder">
                            <i class="fa-solid fa-code"></i>
                            <span>No Preview</span>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="card-content">
                    <div class="card-header-row">
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <span class="card-badge">
                            <i class="fa-solid fa-circle" style="font-size:0.45rem"></i>
                            Project
                        </span>
                    </div>

                    <p class="card-desc">{{ Str::limit($item->description, 120) }}</p>

                    <div class="card-footer">
                        <span class="card-date">
                            <i class="fa-regular fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($item->tgl_upload)->format('d M Y') }}
                        </span>
                        <div class="card-actions">
                            @if ($item->github_link)
                                <a href="{{ $item->github_link }}" target="_blank" class="card-btn card-btn-ghost">
                                    <i class="fa-brands fa-github"></i> GitHub
                                </a>
                            @endif
                            <button @click="open = true" class="card-btn card-btn-primary">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div x-show="open" x-cloak
                    x-transition:enter="transition ease-out duration-250"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="modal-overlay" @click.self="open = false">
                    <div class="modal-box"
                        x-transition:enter="transition transform ease-out duration-250"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition transform ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 translate-y-4">
                        <div class="modal-header">
                            <h3 class="modal-title">{{ $item->title }}</h3>
                            <button @click="open = false" class="modal-close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($item->screenshot)
                                <div class="modal-screenshot">
                                    <img src="{{ asset($item->screenshot) }}" alt="{{ $item->title }}">
                                </div>
                            @endif

                            <p class="modal-desc">{{ $item->description }}</p>

                            <div class="modal-meta">
                                <span class="modal-meta-item">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tgl_upload)->format('d MMMM Y') }}
                                </span>
                                @if ($item->github_link)
                                    <span class="modal-meta-item">
                                        <i class="fa-brands fa-github"></i>
                                        <span style="color:#64748b">GitHub tersedia</span>
                                    </span>
                                @endif
                            </div>

                            <div class="modal-footer-btns">
                                @if ($item->github_link)
                                    <a href="{{ $item->github_link }}" target="_blank" class="card-btn card-btn-primary" style="padding:0.55rem 1.1rem; font-size:0.85rem">
                                        <i class="fa-brands fa-github"></i> Open Repository
                                    </a>
                                @endif
                                <button @click="open = false" class="card-btn card-btn-ghost" style="padding:0.55rem 1.1rem; font-size:0.85rem">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-projects reveal">
                <div class="empty-icon"><i class="fa-solid fa-folder-open"></i></div>
                <h3>Belum Ada Project</h3>
                <p>Project akan muncul di sini setelah ditambahkan oleh admin.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
