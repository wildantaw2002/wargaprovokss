<footer class="bg-gray-800 text-white py-10">
    <div class="container mx-auto relative">
        <div class="text-center mb-4">
            {{-- <img src="{{ asset('images/logorevv.png') }}" alt="Image" class="img-fluid"> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            <div class="flex flex-col">
                <div class="mb-4">
                    <a href="#" class="text-2xl font-bold">POS UMKM<span class="text-blue-500">.</span></a>
                </div>
                <p class="mb-4">
                    Temukan berbagai proyek yang sesuai dengan minat dan keahlian Anda dengan mudah. Kami menyediakan
                    platform yang memudahkan kolaborasi dan memberikan akses ke peluang terbaik. Mulai eksplorasi Anda
                    sekarang dan wujudkan ide menjadi kenyataan.
                </p>
                <ul class="flex justify-center space-x-4">
                    <li><a href="#" class="hover:text-blue-500"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="#" class="hover:text-blue-500"><span class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="https://www.instagram.com/wildantaw/" class="hover:text-blue-500"><span class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="#" class="hover:text-blue-500"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>
            <div>
                <div class="grid grid-cols-2 md:grid-cols-3 mt-3">
                    <div>
                        <ul class="list-none">
                            <li><a href="{{ route('event') }}" class="hover:text-blue-500">Blog</a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=6287857263135" class="hover:text-blue-500">Contact us</a></li>
                            <li><a href="{{ route('mahasiswa.chat') }}" class="hover:text-blue-500">Live chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 pt-4">
            <div class="text-center md:text-left">
                <p class="mb-2">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved. &mdash; Designed by <a
                        href="https://untreco" class="text-blue-500 hover:underline">Wildan</a> Dosen Pembimbing <a
                        href="https://themewgon.com" class="text-blue-500 hover:underline">Bu Salnan</a>
                </p>
            </div>
        </div>
    </div>
    <style>
        /* Menghilangkan gambar di layar mobile */
        @media (max-width: 768px) {
            .sofa-img {
                display: none;
            }
        }
    </style>
</footer>
