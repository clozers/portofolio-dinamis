    @extends('layouts.app')

    @section('section')
        <div class="max-w-7xl mx-auto px-6 py-12">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-8 text-center">My Projects</h1>

            <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $item)
                    <div x-data="{ open: false }" class="bg-gray-800 rounded-lg shadow hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold mb-2 text-white">{{ $item->title }}</h2>
                            <p class="text-gray-400 mb-4">
                                {{ Str::limit($item->description, 120) }}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tgl_upload)->format('d M Y') }}
                                </span>
                                @if ($item->github_link)
                                    <a href="{{ $item->github_link }}" target="_blank"
                                        class="text-blue-400 hover:text-blue-500 flex items-center gap-1">
                                        <i class="fa-brands fa-github"></i> Repo
                                    </a>
                                @endif
                            </div>
                            <button @click="open = true"
                                class="mt-3 inline-flex items-center gap-2 px-4 py-2 border border-gray-600 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:border-gray-500 hover:text-white transition duration-200">
                                <i class="fa-solid fa-circle-info"></i>
                                Selengkapnya
                            </button>
                        </div>

                        <!-- Modal dengan animasi -->
                        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
                            <div @click.away="open = false" x-transition:enter="transition transform ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform ease-in duration-200"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                                class="bg-gray-800 w-full max-w-lg p-6 rounded-lg shadow-lg">
                                <h2 class="text-xl font-semibold mb-4 text-white">{{ $item->title }}</h2>
                                <p class="text-gray-300 mb-4">
                                    {{ $item->description }}
                                </p>
                                <div class="flex justify-end">
                                    <button @click="open = false"
                                        class="inline-flex items-center px-4 py-2 bg-gray-700 text-sm rounded hover:bg-gray-600 transition">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
