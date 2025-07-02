@extends('layouts.app')

@section('section')
    <div class="max-w-3xl mx-auto px-6 py-16 text-center space-y-8">

        <!-- Name & Title -->
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-2">
                <span id="typed-text"></span>
            </h1>
            <p class="text-lg md:text-xl text-gray-400 max-w-xl mx-auto">
                A passionate web developer crafting <span class="text-blue-400 font-semibold">modern user experiences</span>
                with clean code and great design.
            </p>
        </div>

        <!-- CTA Buttons -->
        <div class="flex justify-center flex-wrap gap-4">
            <a href="https://github.com/clozers"
                class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">
                <i class="fa-brands fa-github"></i> GitHub
            </a>
            <a href="https://www.linkedin.com/in/chairul-imam-826258239/"
                class="inline-flex items-center gap-2 bg-gray-700 text-white px-4 py-2 rounded-full hover:bg-gray-800 transition">
                <i class="fa-brands fa-linkedin"></i> LinkedIn
            </a>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700"></div>

        <!-- Latest Project -->
        <div class="max-w-3xl mx-auto p-4">
            @if ($latestProject)
                <div class="text-left bg-gray-800 rounded-xl p-6 shadow-md space-y-4">
                    <h2 class="text-sm uppercase text-gray-500 tracking-wide">Latest Project</h2>
                    <h3 class="text-2xl font-bold">{{ $latestProject->title }}</h3>
                    <p class="text-gray-400">
                        {{ Str::limit($latestProject->description, 120) }}
                    </p>
                    @if ($latestProject->github_link)
                        <div class="flex flex-wrap gap-3 mt-3">
                            <a href="{{ $latestProject->github_link }}"
                                class="flex items-center gap-2 text-blue-400 hover:underline">
                                <i class="fa-brands fa-github"></i> Github Repo
                            </a>
                        </div>
                    @endif
                    <div class="text-sm text-gray-500 flex items-center gap-2 mt-2">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>{{ \Carbon\Carbon::parse($latestProject->tgl_upload ?? $latestProject->created_at)->format('F Y') }}</span>
                    </div>
                </div>
            @else
                <p class="text-gray-400">Belum ada project yang ditambahkan.</p>
            @endif
        </div>
    </div>
@endsection
