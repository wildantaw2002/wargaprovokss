<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" type="image/png">
    {{-- <link href="{{ asset('assets/img/favicon.png') }}" rel="POS UMKM"> --}}

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @vite('resources/css/app.css')
    <!-- @vite('resources/css/app.css') -->
    {{-- @vite('resources/css/app.css') --}}
    <!-- @vite('resources/css/app.css') -->
    <title>Post UMKM</title>
    <style>
        .card {
            min-height: 2px;
            /* Sesuaikan sesuai kebutuhan */
        }
    </style>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="bg-gray-800 shadow-lg">
        <div class="container mx-auto flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-16">
                </a>
                <a href="{{ route('index') }}" class="text-white font-bold text-xl">Pos<span class="text-white">UMKM</span></a>
            </div>

            <!-- Mobile Button -->
            <button class="text-white lg:hidden focus:outline-none" id="navbar-toggler">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Navbar Links -->
            <div class="hidden lg:flex lg:items-center lg:space-x-4" id="navbar-links">
                <ul class="flex flex-wrap space-x-4 text-white">
                    <li>
                        <a href="{{ route('index') }}" class="{{ request()->routeIs('index') ? 'font-bold' : '' }} hover:text-gray-300 transition">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('event') }}" class="{{ request()->routeIs('event') ? 'font-bold' : '' }} hover:text-gray-300 transition">Artikel</a>
                    </li>
                    <li>
                        <a href="{{ route('umkm.index.beranda') }}" class="{{ request()->routeIs('umkm.index.beranda') ? 'font-bold' : '' }} hover:text-gray-300 transition">UMKM</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role === 'mahasiswa')
                    <li>
                        <a href="{{ route('mahasiswa.pekerjaan') }}" class="{{ request()->routeIs('mahasiswa.pekerjaan') ? 'font-bold' : '' }} hover:text-gray-300 transition">Project</a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.chat') }}" class="{{ request()->routeIs('mahasiswa.chat') ? 'font-bold' : '' }} hover:text-gray-300 transition">Chat</a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.profile') }}" class="{{ request()->routeIs('mahasiswa.profile') ? 'font-bold' : '' }} hover:text-gray-300 transition">Profile</a>
                    </li>
                    @endif
                </ul>

                <ul class="flex items-center space-x-4 ml-6">
                    @if (Auth::check())
                    <!-- Jika user sudah login -->
                    <li><a href="#"><img src="{{ asset('images/user.svg') }}" alt="User" class="w-6 h-6"></a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-600 transition">Logout</button>
                        </form>
                    </li>
                    @else
                    <!-- Jika user belum login -->
                    <li><a href="{{ route('login') }}"><img src="{{ asset('images/user.svg') }}" alt="User" class="w-6 h-6"></a></li>
                    <li>
                        <a href="{{ route('login') }}" class="bg-blue-400 text-white font-bold py-2 px-5 rounded-lg hover:bg-blue-600 transition duration-300 shadow-lg transform hover:scale-105">
                            Login
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden" id="navbar-mobile">
            <ul class="bg-gray-800 text-white px-4 py-2 space-y-2">
                <li><a href="{{ route('index') }}" class="{{ request()->routeIs('index') ? 'text-bold' : '' }}">Beranda</a></li>
                <li><a href="{{ route('event') }}" class="{{ request()->routeIs('event') ? 'text-bold' : '' }}">Artikel</a></li>
                <li><a href="{{ route('umkm.index.beranda') }}" class="{{ request()->routeIs('umkm.index.beranda') ? 'text-bold' : '' }}">UMKM</a></li>
                @if (Auth::check() && Auth::user()->role === 'mahasiswa')
                <li><a href="{{ route('mahasiswa.pekerjaan') }}" class="{{ request()->routeIs('mahasiswa.pekerjaan') ? 'text-bold' : '' }}">Project</a></li>
                <li><a href="{{ route('mahasiswa.chat') }}" class="{{ request()->routeIs('mahasiswa.chat') ? 'text-bold' : '' }}">Chat</a></li>
                <li><a href="{{ route('mahasiswa.profile') }}" class="{{ request()->routeIs('mahasiswa.profile') ? 'text-bold' : '' }}">Profile</a></li>
                @endif

                <li class="flex items-center">
                    @if (Auth::check())
                    <a href="#"><img src="{{ asset('images/user.svg') }}" alt="User" class="w-6 h-6 mr-2"></a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-600 transition">Logout</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}"><img src="{{ asset('images/user.svg') }}" alt="User" class="w-6 h-6 mr-2"></a>
                    <a href="{{ route('login') }}" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-600 transition">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>

    <!-- JavaScript untuk toggle navbar mobile -->
    <script>
        const navbarToggler = document.getElementById("navbar-toggler");
        const navbarMobile = document.getElementById("navbar-mobile");

        navbarToggler.addEventListener("click", () => {
            navbarMobile.classList.toggle("hidden");
        });
    </script>

    <!-- End Header/Navigation -->

    @yield('content')

</body>


</html>