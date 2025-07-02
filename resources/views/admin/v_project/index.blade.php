@extends('admin.v_layouts.app')

@section('section-admin')
    <style>
        .modal.fade.show .modal-dialog .modal-content,
        .modal .modal-dialog .modal-content,
        .modal-content {
            background-color: #fff !important;
            color: #333 !important;
            background: #fff !important;
        }

        .modal-content label,
        .modal-content input,
        .modal-content textarea {
            color: #333 !important;
        }

        .modal-content .form-control {
            border: 1px solid #ced4da !important;
            background-color: #fff !important;
        }
    </style>

    <div class="container mt-4">
        <h2 class="mb-4 fw-bold">Daftar Project</h2>

        {{-- Tombol Tambah --}}
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            + Tambah Project
        </button>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Upload</th>
                        <th>GitHub</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td>
                            <td>{{ \Carbon\Carbon::parse($project->tgl_upload)->format('d M Y') }}</td>
                            <td>
                                @if ($project->github_link)
                                    <a href="{{ $project->github_link }}" target="_blank">
                                        {{ $project->github_link }}
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $project->id }}">
                                    Detail
                                </button>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $project->id }}">
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $project->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada project tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    {{-- Modal Tambah --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
                class="modal-content bg-white shadow-sm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="createModalLabel">Tambah Project Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Upload</label>
                        <input type="date" name="tgl_upload" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Screenshot</label>
                        <input type="file" name="screenshot" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link GitHub</label>
                        <input type="url" name="github_link" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal Tambah --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
                class="modal-content bg-white shadow-sm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="createModalLabel">Tambah Project Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Upload</label>
                        <input type="date" name="tgl_upload" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Screenshot</label>
                        <input type="file" name="screenshot" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link GitHub</label>
                        <input type="url" name="github_link" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    {{-- Semua Modal Detail, Edit & Hapus --}}
    @foreach ($projects as $project)
        {{-- Modal Detail --}}
        <div class="modal fade" id="detailModal{{ $project->id }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content shadow-sm">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="detailModalLabel{{ $project->id }}">Detail Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="fw-bold">{{ $project->title }}</h5>
                        <p>{{ $project->description }}</p>
                        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</p>
                        <p><strong>Link GitHub:</strong>
                            @if ($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank">{{ $project->github_link }}</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </p>
                        @if ($project->screenshot)
                            <div class="mt-3">
                                <img src="{{ asset($project->screenshot) }}" alt="Screenshot" class="img-fluid rounded">
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST"
                    enctype="multipart/form-data" class="modal-content shadow-sm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="editModalLabel{{ $project->id }}">Edit Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $project->title }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control">{{ $project->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Upload</label>
                            <input type="date" name="tgl_upload" class="form-control"
                                value="{{ $project->tgl_upload ? \Carbon\Carbon::parse($project->tgl_upload)->format('Y-m-d') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Screenshot (opsional)</label>
                            <input type="file" name="screenshot" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link GitHub</label>
                            <input type="url" name="github_link" class="form-control"
                                value="{{ $project->github_link }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- Modal Hapus --}}
        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                    class="modal-content bg-white shadow-sm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="deleteModalLabel{{ $project->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus project <strong>{{ $project->title }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
