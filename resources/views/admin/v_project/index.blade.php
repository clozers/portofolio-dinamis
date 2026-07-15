@extends('admin.v_layouts.app')

@section('section-admin')
<div>
    <!-- Page Header -->
    <div style="display:flex; align-items:flex-start; justify-content:space-between; flex-wrap:wrap; gap:1rem; margin-bottom:2rem;">
        <div>
            <h1 class="page-title-admin">Projects</h1>
            <p class="page-subtitle-admin">Manage and organize all your portfolio projects.</p>
        </div>
        <button class="btn-admin primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fa-solid fa-plus"></i> Add Project
        </button>
    </div>

    @if(session('success'))
        <div class="flash-msg success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="flash-msg error"><i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}</div>
    @endif

    <!-- Table Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="admin-card-title">
                <i class="fa-solid fa-table-list"></i>
                All Projects
                <span class="badge-admin primary" style="margin-left:0.25rem">{{ $projects->count() }}</span>
            </div>
            <span style="font-size:0.78rem; color:var(--adm-text-muted)">
                <i class="fa-regular fa-calendar" style="margin-right:0.3rem"></i>
                {{ now()->format('d M Y') }}
            </span>
        </div>

        <div style="overflow-x: auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width:50px">#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Upload Date</th>
                        <th>GitHub</th>
                        <th style="width:180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="td-title">{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 60) }}</td>
                            <td>
                                <span style="display:inline-flex; align-items:center; gap:0.35rem;">
                                    <i class="fa-regular fa-calendar" style="color:var(--adm-primary); font-size:0.75rem"></i>
                                    {{ \Carbon\Carbon::parse($project->tgl_upload)->format('d M Y') }}
                                </span>
                            </td>
                            <td>
                                @if ($project->github_link)
                                    <a href="{{ $project->github_link }}" target="_blank"
                                       style="display:inline-flex; align-items:center; gap:0.35rem; color:#818cf8; font-size:0.8rem; text-decoration:none; max-width:180px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"
                                       onmouseover="this.style.textDecoration='underline'"
                                       onmouseout="this.style.textDecoration='none'">
                                        <i class="fa-brands fa-github"></i>
                                        Repo
                                    </a>
                                @else
                                    <span style="color:#1e293b; font-size:0.8rem">—</span>
                                @endif
                            </td>
                            <td>
                                <div style="display:flex; gap:0.4rem; flex-wrap:wrap;">
                                    <button class="action-btn info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $project->id }}">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </button>
                                    <button class="action-btn warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </button>
                                    <button class="action-btn danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:3rem;">
                                <div style="display:flex; flex-direction:column; align-items:center; gap:1rem;">
                                    <div style="width:60px; height:60px; border-radius:14px; background:rgba(99,102,241,0.1); border:1px solid rgba(99,102,241,0.15); display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:#4f46e5;">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </div>
                                    <p style="color:var(--adm-text-muted); font-size:0.875rem">No projects found. Add your first project!</p>
                                    <button class="btn-admin primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                        <i class="fa-solid fa-plus"></i> Add Project
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- ============================
     MODAL TAMBAH PROJECT
============================ --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-head-admin">
                    <span class="modal-head-title"><i class="fa-solid fa-plus" style="color:var(--adm-primary); margin-right:0.4rem"></i>Add New Project</span>
                    <button type="button" class="modal-close-btn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body-admin">
                    <div class="form-group-admin">
                        <label class="form-label-admin">Project Title <span style="color:#f87171">*</span></label>
                        <input type="text" name="title" class="form-control-admin" placeholder="e.g. Portfolio Website" required>
                    </div>
                    <div class="form-group-admin">
                        <label class="form-label-admin">Description</label>
                        <textarea name="description" class="form-control-admin" placeholder="Brief description of the project..."></textarea>
                    </div>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.75rem;">
                        <div class="form-group-admin">
                            <label class="form-label-admin">Upload Date</label>
                            <input type="date" name="tgl_upload" class="form-control-admin">
                        </div>
                        <div class="form-group-admin">
                            <label class="form-label-admin">Screenshot</label>
                            <input type="file" name="screenshot" class="form-control-admin" style="padding:0.5rem 0.9rem; cursor:pointer">
                        </div>
                    </div>
                    <div class="form-group-admin">
                        <label class="form-label-admin">GitHub Link</label>
                        <input type="url" name="github_link" class="form-control-admin" placeholder="https://github.com/username/repo">
                    </div>
                </div>
                <div class="modal-footer-admin">
                    <button type="button" class="btn-admin secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-admin primary"><i class="fa-solid fa-floppy-disk"></i> Save Project</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ============================
     MODALS PER PROJECT
============================ --}}
@foreach ($projects as $project)

    {{-- Detail Modal --}}
    <div class="modal fade" id="detailModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-box-admin-inner">
                    <div class="modal-head-admin">
                        <span class="modal-head-title"><i class="fa-solid fa-eye" style="color:var(--adm-accent); margin-right:0.4rem"></i>Project Detail</span>
                        <button type="button" class="modal-close-btn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body-admin">
                        <h3 style="font-family:'Space Grotesk',sans-serif; font-size:1.35rem; font-weight:700; color:var(--adm-text); margin-bottom:0.75rem;">
                            {{ $project->title }}
                        </h3>

                        @if ($project->screenshot)
                            <div style="width:100%; height:220px; border-radius:12px; overflow:hidden; margin-bottom:1.25rem; border:1px solid rgba(255,255,255,0.07);">
                                <img src="{{ asset($project->screenshot) }}" alt="{{ $project->title }}" style="width:100%; height:100%; object-fit:cover;">
                            </div>
                        @endif

                        <p style="color:var(--adm-text-secondary); font-size:0.9rem; line-height:1.7; margin-bottom:1.25rem;">
                            {{ $project->description ?: 'No description provided.' }}
                        </p>

                        <div style="display:flex; flex-wrap:wrap; gap:0.75rem; padding:1rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:10px;">
                            <div style="display:flex; align-items:center; gap:0.4rem; font-size:0.8rem; color:var(--adm-text-muted);">
                                <i class="fa-regular fa-calendar" style="color:var(--adm-primary)"></i>
                                {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}
                            </div>
                            @if ($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank"
                                   style="display:inline-flex; align-items:center; gap:0.4rem; font-size:0.8rem; color:#818cf8; text-decoration:none;">
                                    <i class="fa-brands fa-github"></i> View Repository
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer-admin">
                        <button type="button" class="btn-admin secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn-admin warning" data-bs-dismiss="modal"
                            onclick="setTimeout(()=>document.getElementById('editTrigger{{ $project->id }}').click(), 200)">
                            <i class="fa-solid fa-pen"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="editTrigger{{ $project->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}" style="display:none"></button>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-head-admin">
                        <span class="modal-head-title"><i class="fa-solid fa-pen" style="color:#fbbf24; margin-right:0.4rem"></i>Edit Project</span>
                        <button type="button" class="modal-close-btn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body-admin">
                        <div class="form-group-admin">
                            <label class="form-label-admin">Project Title <span style="color:#f87171">*</span></label>
                            <input type="text" name="title" class="form-control-admin" value="{{ $project->title }}" required>
                        </div>
                        <div class="form-group-admin">
                            <label class="form-label-admin">Description</label>
                            <textarea name="description" class="form-control-admin">{{ $project->description }}</textarea>
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.75rem;">
                            <div class="form-group-admin">
                                <label class="form-label-admin">Upload Date</label>
                                <input type="date" name="tgl_upload" class="form-control-admin"
                                    value="{{ $project->tgl_upload ? \Carbon\Carbon::parse($project->tgl_upload)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="form-group-admin">
                                <label class="form-label-admin">Screenshot (optional)</label>
                                <input type="file" name="screenshot" class="form-control-admin" style="padding:0.5rem 0.9rem; cursor:pointer">
                            </div>
                        </div>
                        <div class="form-group-admin">
                            <label class="form-label-admin">GitHub Link</label>
                            <input type="url" name="github_link" class="form-control-admin" value="{{ $project->github_link }}">
                        </div>
                    </div>
                    <div class="modal-footer-admin">
                        <button type="button" class="btn-admin secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-admin primary"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:420px">
            <div class="modal-content">
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-head-admin">
                        <span class="modal-head-title"><i class="fa-solid fa-triangle-exclamation" style="color:#f87171; margin-right:0.4rem"></i>Confirm Delete</span>
                        <button type="button" class="modal-close-btn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body-admin">
                        <p style="color:var(--adm-text-secondary); font-size:0.9rem; line-height:1.6;">
                            Are you sure you want to delete
                            <strong style="color:var(--adm-text)">{{ $project->title }}</strong>?
                            This action cannot be undone.
                        </p>
                    </div>
                    <div class="modal-footer-admin">
                        <button type="button" class="btn-admin secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-admin danger-solid"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach

<style>
    /* Bootstrap modal backdrop */
    .modal-backdrop { background-color: #000; }
    .modal-backdrop.show { opacity: 0.75; }

    /* Dark theme for Bootstrap modal-content */
    .modal-content {
        background: #0f0f1a !important;
        border: 1px solid rgba(99, 102, 241, 0.25) !important;
        border-radius: 18px !important;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.7) !important;
        overflow: visible;
    }

    /* Gradient top line accent */
    .modal-content::before {
        content: '';
        display: block;
        height: 3px;
        background: linear-gradient(to right, #6366f1, #06b6d4);
        border-radius: 18px 18px 0 0;
        margin: 0;
    }

    /* Inner wrapper for detail modal */
    .modal-box-admin-inner {
        display: flex;
        flex-direction: column;
    }

    /* File input style */
    .form-control-admin[type="file"]::-webkit-file-upload-button {
        background: rgba(99, 102, 241, 0.15);
        border: none;
        color: #818cf8;
        padding: 0.2rem 0.6rem;
        border-radius: 5px;
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        margin-right: 0.5rem;
    }

    /* Ensure all form elements are fully clickable */
    .modal-dialog,
    .modal-content,
    .modal-content * {
        pointer-events: auto;
    }
</style>
@endsection

