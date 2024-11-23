@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<!-- Enhanced Carousel Section -->
<div class="relative selection:bg-[#FF2D20] selection:text-white">
    <div class="w-full h-[80vh] overflow-hidden relative">
        <!-- Carousel Wrapper -->
        <div id="carousel" class="flex transition-transform duration-700 ease-in-out h-full">
            <!-- Slide 1 -->
            <div class="min-w-full flex flex-col items-center justify-center bg-red-500 text-white h-full p-6 text-center">
                <h2 class="text-5xl font-bold mb-4">Berbagi dalam Kehidupan</h2>
                <p class="mt-2 text-lg leading-relaxed max-w-3xl">
                    "Sesungguhnya segala sesuatu yang kamu lakukan untuk salah seorang dari saudara-Ku yang paling hina ini, 
                    kamu telah melakukannya untuk Aku." 
                    <br><em>(Matius 25:40)</em>
                </p>
                <button class="mt-6 px-6 py-3 bg-[#AF1740] text-white font-semibold text-lg rounded-lg hover:bg-opacity-90 shadow-md transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#AF1740]/50">
                    Donasi
                </button>
            </div>
            <div class="min-w-full flex flex-col items-center justify-center bg-red-500 text-white h-full p-6 text-center">
                <h2 class="text-5xl font-bold mb-4">Berbagi dalam Kehidupan</h2>
                <p class="mt-2 text-lg leading-relaxed max-w-3xl">
                    "Sesungguhnya segala sesuatu yang kamu lakukan untuk salah seorang dari saudara-Ku yang paling hina ini, 
                    kamu telah melakukannya untuk Aku." 
                    <br><em>(Matius 25:40)</em>
                </p>
                <button class="mt-6 px-6 py-3 bg-[#AF1740] text-white font-semibold text-lg rounded-lg hover:bg-opacity-90 shadow-md transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#AF1740]/50">
                    Donasi
                </button>
            </div>
        </div>

        <!-- Dots Navigation -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <button class="dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="0" aria-label="Slide 1"></button>
            <button class="dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="1" aria-label="Slide 2"></button>
            <button class="dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="2" aria-label="Slide 3"></button>
            <button class="dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="3" aria-label="Slide 4"></button>
            <button class="dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="4" aria-label="Slide 5"></button>
        </div>
    </div>
</div>


<!-- Part 2: About Us Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 md:px-24">
        <div class="flex flex-col md:flex-row items-center md:items-start justify-between space-y-8 md:space-y-0">
            <!-- Text Content -->
            <div class="w-full md:w-1/2">
                <h2 class="text-4xl font-semibold text-[#CC2B52] mb-12">Tentang Kami</h2>

                <h2 class="text-2xl font-semibold text-black mb-4">Tunas Mahardika Orphanage</h2>
                <p class="text-lg text-gray-700 mb-12">
                    Panti Asuhan Tunas Mahardika didirikan pada tanggal 28 Oktober 2005 berdasarkan Akte Notaris no.17, yang dibuat dihadapan Notaris Winarto Wiryawartani S.H., M.Hum.
                </p>

                <a href="#" class="text-white bg-[#AF1740] hover:bg-[#CC2B52] px-6 py-3 rounded">Baca Selengkapnya</a>
            </div>

            <!-- Image -->
            <div class="w-full md:w-2/5">
                <img src="link-to-your-image.jpg" alt="Tentang Kami Image" class="w-full h-[200px] md:h-[300px] rounded-md">
            </div>
        </div>
    </div>
</section>


<!-- Part 3: Newsletter Section -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-semibold text-center text-[#CC2B52] mb-12">Newsletter</h2>

        <div class="relative overflow-hidden">
            <div id="newsletter-carousel" class="flex transition-transform duration-700 ease-in-out">
                <div class="min-w-full flex bg-[#F7F7F7] shadow-lg rounded-md hover:shadow-xl transition-shadow duration-300">
                    <div class="w-1/3">
                        <img src="link-to-your-image.jpg" alt="Newsletter Image" class="w-full h-full object-cover rounded-l-md">
                    </div>
                    <div class="w-1/2 p-20 flex flex-col justify-center">
                        <a href="link-to-news-1">
                            <h3 class="text-xl font-bold text-black mb-2">Judul Newsletter 1</h3>
                            <p class="text-sm text-gray-500 mb-4">22 November 2024</p>
                            <p class="text-gray-600 mb-6">Deskripsi singkat tentang berita 1. Konten ini akan menarik perhatian pembaca.</p>
                        </a>
                    </div>
                </div>
                <div class="min-w-full flex bg-[#F7F7F7] shadow-lg rounded-md hover:shadow-xl transition-shadow duration-300">
                    <div class="w-1/3">
                        <img src="link-to-your-image.jpg" alt="Newsletter Image" class="w-full h-full object-cover rounded-l-md">
                    </div>
                    <div class="w-1/2 p-20 flex flex-col justify-center">
                        <a href="link-to-news-2">
                            <h3 class="text-xl font-bold text-black mb-2">Judul Newsletter 2</h3>
                            <p class="text-sm text-gray-500 mb-4">23 November 2024</p>
                            <p class="text-gray-600 mb-6">Deskripsi singkat tentang berita 2. Konten ini akan menarik perhatian pembaca.</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="absolute top-1/2 left-0 transform -translate-y-1/2">
                <button id="prev-newsletter" class="bg-[#CC2B52] hover:bg-[#AF1740] text-white p-3 rounded">
                    &#10094;
                </button>
            </div>
            <div class="absolute top-1/2 right-0 transform -translate-y-1/2">
                <button id="next-newsletter" class="bg-[#CC2B52] hover:bg-[#AF1740] text-white p-3 rounded">
                    &#10095;
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Part 4: Program Section -->


<!-- Part 5: Aktivitas Terakhir Section -->
<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-6 md:px-24">
        <!-- Section Title -->
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-semibold text-[#CC2B52]">Aktivitas Terakhir</h2>
            <a href="#" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Lihat Semua</a>
        </div>
        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <a href="/detail-page1" class="block rounded-lg shadow-lg bg-white overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="link-to-your-image1.jpg" alt="Al Muzakki Fun Day Agustusan" class="w-full h-48 object-cover">
                <div class="p-6">
                    <p class="font-semibold text-sm text-gray-600 mb-2">Info & Berita</p>
                    <h3 class="text-lg font-bold text-black mb-2">Al Muzakki Fun Day Agustusan</h3>
                    <p class="text-gray-500 text-sm">Agustus 21, 2024</p>
                </div>
            </a>
            <!-- Card 2 -->
            <a href="/detail-page2" class="block rounded-lg shadow-lg bg-white overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="link-to-your-image2.jpg" alt="Kunjungan dan Santunan Rutin dari Ayam Geprek Sai Kelet" class="w-full h-48 object-cover">
                <div class="p-6">
                    <p class="font-semibold text-sm text-gray-600 mb-2">Info & Berita</p>
                    <h3 class="text-lg font-bold text-black mb-2">Kunjungan dan Santunan Rutin dari Ayam Geprek Sai Kelet</h3>
                    <p class="text-gray-500 text-sm">Agustus 03, 2024</p>
                </div>
            </a>
            <!-- Card 3 -->
            <a href="/detail-page3" class="block rounded-lg shadow-lg bg-white overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="link-to-your-image3.jpg" alt="Kunjungan dan Santunan dari Rama Group" class="w-full h-48 object-cover">
                <div class="p-6">
                    <p class="font-semibold text-sm text-gray-600 mb-2">Info & Berita</p>
                    <h3 class="text-lg font-bold text-black mb-2">Kunjungan dan Santunan dari Rama Group</h3>
                    <p class="text-gray-500 text-sm">Agustus 02, 2024</p>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carousel = document.getElementById('carousel');
        const slides = document.querySelectorAll('#carousel > div');
        const dots = document.querySelectorAll('.dot');
        let index = 0;

        const moveToSlide = (newIndex) => {
            carousel.style.transform = `translateX(-${newIndex * 100}%)`;
            dots.forEach(dot => dot.classList.remove('opacity-100'));
            dots[newIndex].classList.add('opacity-100');
            index = newIndex;
        };

        setInterval(() => {
            const nextIndex = (index + 1) % slides.length;
            moveToSlide(nextIndex);
        }, 6000);
        
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const dotIndex = parseInt(dot.getAttribute('data-index'));
                moveToSlide(dotIndex);
            });
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const newsletterCarousel = document.getElementById('newsletter-carousel');
        const slides = newsletterCarousel.children;
        const totalSlides = slides.length;
        let currentIndex = 0;

        const moveToSlide = (index) => {
            newsletterCarousel.style.transform = `translateX(-${index * 100}%)`;
        };

        document.getElementById('prev-newsletter').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            moveToSlide(currentIndex);
        });

        document.getElementById('next-newsletter').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            moveToSlide(currentIndex);
        });
    });
</script>

