@extends('layouts.header')

@section('content')


<style>
    
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .card {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .hero {
        background: linear-gradient(135deg, #0DBDE5, #2DB08B);
        padding: 80px 0;
    }

    .intro-excerpt {
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        /* border-radius: 10px; */
    }

    .feature-section {
        padding: 80px 0;
    }

    .blog-section {
        background-color: #f8f9fa;
        padding: 80px 0;
    }

    .post-entry {
        transition: box-shadow 0.3s ease-in-out;
    }

    .post-entry:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .intro-excerpt {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        color: #fff;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .intro-excerpt::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 50%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .intro-excerpt:hover::after {
        opacity: 1;
    }

    .custom-alert {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .alert-content {
        background-color: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 90%;
        width: 400px;
    }

    .alert-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #333;
    }

    .alert-message {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        color: #666;
    }

    .alert-button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .alert-button:hover {
        background-color: #45a049;
    }

    /* ... rest of your existing styles ... */
</style>
<div class="hero bg-gradient-to-br from-cyan-500 to-emerald-500 py-20" id="dynamic-bg">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row justify-between items-center">
            <!-- Carousel Section -->
            <div class="lg:w-1/2 fade-in">
                <div id="carouselExampleIndicators" class="relative">
                    <!-- Carousel Indicators -->
                    <div class="absolute inset-x-0 bottom-0 flex justify-center space-x-2">
                        @php $first = true; @endphp
                        @foreach ($artikel as $key => $item)
                            @if ($item->category == 'event')
                                <button class="w-3 h-3 rounded-full {{ $first ? 'bg-white' : 'bg-gray-400' }}"
                                    aria-label="Slide {{ $key + 1 }}" data-slide-to="{{ $key }}"></button>
                                @php $first = false; @endphp
                            @endif
                        @endforeach
                    </div>
                    <!-- Carousel Inner -->
                    <div class="carousel-inner flex transition-transform ease-in-out duration-500">
                        @php $first = true; @endphp
                        @foreach ($artikel as $key => $item)
                            @if ($item->category == 'event')
                                <div class="w-full {{ $first ? 'block' : 'hidden' }} carousel-item">
                                    <img class="w-full h-auto" src="{{ Storage::url($item->foto) }}"
                                        alt="Slide {{ $key + 1 }}">
                                </div>
                                @php $first = false; @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Intro Section -->
            <div class="lg:w-5/12 fade-in">
                <div class=" text-white p-8 rounded-lg shadow-lg">
                    <h1 class="text-4xl font-bold title-animate">Pos<span class="block">UMKM</span></h1>
                    <p class="mt-4 mb-4 text-justify">POSUMKM adalah sebuah bisnis sociopreneurship yang berfokus pada
                        pemberdayaan pendidikan dan pertumbuhan UMKM. Kami menghubungkan mahasiswa, dosen, dan pelaku
                        usaha menengah ke bawah untuk menciptakan solusi inovatif yang menjawab tantangan nyata yang
                        dihadapi oleh UMKM.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="feature-section py-20">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
            <!-- Feature cards remain the same, but now they'll animate on scroll -->
            @foreach (['umkm', 'konsultasi', 'informasi', 'chat', 'blog', 'kontak'] as $feature)
                <div class="fade-in">
                    <div class="shadow-lg p-4 bg-white rounded-lg transform transition duration-300 hover:scale-105">
                        <img src="{{ asset('images/' . $feature . '.png') }}" 
                             alt="{{ ucfirst($feature) }}" 
                             class="mx-auto w-1/2 mb-3">
                        <h5 class="text-sm font-semibold">{{ ucfirst($feature) }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="product-section py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/4 mb-5 lg:mb-0 fade-in">
                <h2 class="text-2xl font-bold mb-4">Temukan Project dengan mudah</h2>
                <p class="mb-4 text-gray-700">Temukan berbagai proyek yang sesuai dengan minat dan keahlian Anda dengan mudah. Kami menyediakan platform yang memudahkan kolaborasi dan memberikan akses ke peluang terbaik.</p>
                <p><a href="{{ route('mahasiswa.pekerjaan') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Explore</a></p>
            </div>
            @foreach ($pekerjaan as $item)
                <div class="w-full md:w-1/2 lg:w-1/4 mb-5 fade-in">
                    <a class="block bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105" href="{{ route('mahasiswa.pekerjaan.show', $item->id) }}" onclick="checkLogin(event)">
                        <!-- Gambar pekerjaan -->
                        <img src="{{ asset('images/complete.png') }}" class="w-full h-48 object-cover" alt="{{ $item->posisi }}">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Posisi: {{ $item->posisi }}</h3>
                            <p class="text-gray-600 mb-2">Deskripsi: {{ Str::limit($item->deskripsi, 100) }}</p>
                            <p class="text-gray-500">Tempat: {{ $item->tempat_bekerja }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div id="customAlert" class="custom-alert">
    <div class="alert-content">
        <h2 class="alert-title">Peringatan</h2>
        <p id="alertMessage" class="alert-message"></p>
        <button class="alert-button" onclick="closeAlert()">OK</button>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 fade-in">
                <h2 class="section-title">Recent Blog</h2>
            </div>
            <div class="col-md-6 text-start text-md-end fade-in">
                <a href="#" class="more">View All Posts</a>
            </div>
        </div>

        <div class="row">
            @foreach ($artikel->random(3) as $item)
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0 fade-in">
                    <div class="post-entry">
                        <a href="{{ route('event.detail', $item->id) }}" class="post-thumbnail">
                            <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="{{ route('event.detail', $item->id) }}">{{ $item->judul }}</a></h3>
                            <div class="meta">
                                <span>by {{ $item->user->name ?? 'Unknown' }}</span>
                                <span>on {{ \Carbon\Carbon::parse($item->tanggal)->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fadeElems = document.querySelectorAll('.fade-in');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        fadeElems.forEach(elem => observer.observe(elem));
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });

    function checkLogin(event) {
        event.preventDefault(); // Menghentikan link dari navigate secara default

        fetch('{{ route('check.login') }}')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Jika pengguna terautentikasi, lanjutkan ke halaman tujuan
                    window.location.href = event.currentTarget.href;
                } else {
                    // Jika pengguna tidak terautentikasi, tampilkan pesan error
                    showCustomAlert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showCustomAlert('Terjadi kesalahan, silakan coba lagi.');
            });
    }

    function showCustomAlert(message) {
        const alertElement = document.getElementById('customAlert');
        const messageElement = document.getElementById('alertMessage');
        messageElement.textContent = message;
        alertElement.style.display = 'flex';

        gsap.fromTo(alertElement, {
            opacity: 0,
            scale: 0.8
        }, {
            opacity: 1,
            scale: 1,
            duration: 0.3,
            ease: "back.out(1.7)"
        });
    }

    function closeAlert() {
        const alertElement = document.getElementById('customAlert');

        gsap.to(alertElement, {
            opacity: 0,
            scale: 0.8,
            duration: 0.2,
            ease: "power2.in",
            onComplete: () => {
                alertElement.style.display = 'none';
            }
        });
    }

    console.log(document.getElementById('dynamic-bg'));

</script>
@endsection
