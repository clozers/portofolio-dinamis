<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>Chairul | Portofolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="pt-20 bg-white text-black dark:bg-gray-900 dark:text-white font-sans">

    <!-- Navbar Tetap Terlihat Saat Scroll -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('beranda') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">A-RUL</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    <!-- Home -->
                    <li>
                        <a href="{{ route('beranda') }}"
                            class="
                                block py-2 px-3 rounded-sm
                                {{ request()->routeIs('beranda')
                                    ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500'
                                    : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                            aria-current="page">
                            Home
                        </a>
                    </li>

                    <!-- Project -->
                    <li>
                        <a href="{{ route('project') }}"
                            class="
                                block py-2 px-3 rounded-sm
                                {{ request()->routeIs('project')
                                    ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500'
                                    : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">
                            <i class="fa-solid fa-folder-open"></i> Project
                        </a>
                    </li>

                    <!-- CV (contoh tanpa route aktif, bisa ditambah route kalau mau) -->
                    <li>
                        <a href="{{ asset('cv.pdf') }}" download
                            class="
       block py-2 px-3 rounded-sm
       text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0
       dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            <i class="fa-solid fa-file"></i> CV
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('section')

    <!-- Footer -->
    <footer class="border-t border-gray-700 bg-gray-900 text-gray-300">
        <div
            class="max-w-screen-xl mx-auto px-4 py-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <!-- Left section -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-4">
                    <a href="{{ route('beranda') }}" class="hover:text-white transition">Home</a>
                    <a href="{{ route('project') }}" class="hover:text-white transition">Projects</a>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Bekasi, Indonesia</span>
                </div>
            </div>
            <!-- Right section -->
            <div class="flex flex-col gap-1 items-start md:items-end">
                <div class="flex gap-4">
                    <a href="https://github.com/clozers" class="hover:text-white transition">GitHub</a>
                    <a href="https://www.linkedin.com/in/chairul-imam-826258239/"
                        class="hover:text-white transition">LinkedIn</a>
                </div>
                <div class="text-sm">
                    &copy; 2025 Chairul Imam
                </div>
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Typed("#typed-text", {
                strings: ["Hi, I'm Arul 👋", "A Web Developer 💻", "Let's Build Something Awesome! 🚀"],
                typeSpeed: 50,
                backSpeed: 30,
                backDelay: 1500,
                startDelay: 500,
                loop: true,
                showCursor: true,
                cursorChar: "|",
            });
        });
    </script>

</body>

</html>
