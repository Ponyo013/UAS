@extends('layouts.app')

@section('title', 'Welcome')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@section('content')
<!-- Enhanced Carousel Section -->
<div id="home" class="section relative selection:bg-[#FF2D20] selection:text-white">
    <div class="w-full h-[95vh] overflow-hidden relative">
        <!-- Carousel Wrapper -->
        <div id="carousel" class="flex transition-transform duration-700 ease-in-out h-full">
            <!-- Slide 1 -->
            <div class="min-w-full flex flex-col items-center justify-center bg-red-500 text-white h-full p-6 text-center">
                <h2 class="text-5xl font-bold mb-4">Berbagi dalam Kehidupan</h2>
                <p class="mt-2 text-lg leading-relaxed max-w-3xl">
                    "Sesungguhnya segala sesuatu yang kamu lakukan untuk salah seorang dari saudara-Ku yang paling hina ini,
                    kamu telah melakukannya untuk Aku."
                    <br><em>-Matius 25:40-</em>
                </p>
                <button class="mt-6 px-6 py-3 bg-[#AF1740] text-white font-semibold text-lg rounded-lg hover:bg-opacity-90 shadow-md transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#AF1740]/50">
                    Donasi
                </button>
            </div>
            <div class="min-w-full flex flex-col items-center justify-center bg-red-500 text-white h-full p-6 text-center">
                <h2 class="text-5xl font-bold mb-4">Berbagi alam Kehidupan</h2>
                <p class="mt-2 text-lg leading-relaxed max-w-3xl">
                    "Didiklah orang muda menurut jalan yang patut baginya, maka pada masa tuanyapun ia tidak akan menyimpang pada jalan itu."
                    <br><em>-Amsal 22:6-</em>
                </p>
                <button class="mt-6 px-6 py-3 bg-[#AF1740] text-white font-semibold text-lg rounded-lg hover:bg-opacity-90 shadow-md transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#AF1740]/50">
                    Donasi
                </button>
            </div>
        </div>

        <!-- Dots Navigation -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="0" aria-label="Slide 1"></button>
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300" data-index="1" aria-label="Slide 2"></button>
            <!-- sekarang baru ada 2 -->
        </div>
    </div>
</div>

<!-- About Us Section -->
<section id="aboutus" class="section py-20 bg-white">
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

<!-- Visi dan Misi -->
<section id="visimisi" class="section py-20 bg-gray-100">
    <div class="container mx-auto px-6 md:px-24">
        <h2 class="text-4xl font-semibold text-[#CC2B52] mb-14">Visi dan Misi</h2>
        <div class="flex flex-col md:flex-row items-center md:items-start justify-between space-y-8 md:space-y-0">
            <!-- Text Content -->
            <div class="w-full md:w-1/2">
                <h2 class="text-2xl font-semibold text-black mb-4">Visi</h2>
                <ul class="list-disc pl-5">
                    <li class="text-black text-justify mb-2">Memandang setiap anak berharga mulia dimata Tuhan, dan Tuhan mengasihi mereka.</li>
                    <li class="text-black text-justify mb-2">Mempersiapkan anak-anak Tuhan hidup dalam tujuan-tujuan Tuhan dan sesuai dengan rencana Tuhan sehingga mereka dapat menjadi duta-duta Kristus yang baik dan setia.</li>
                </ul>

            </div>
            <!-- Text Content -->
            <div class="w-full md:w-2/5">
                <h2 class="text-2xl font-semibold text-black mb-4">Misi</h2>
                <ol class="list-decimal pl-5">
                    <li class="text-black text-justify mb-2">Mengangkat bayi-bayi yang telah kehilangan orang tua atau yang diserahkan penuh oleh orang tua mereka karena ketidakmapuan mereka, baik secara sosial maupun ekonomi.</li>
                    <li class="text-black text-justify mb-2">Membina pengebangan spiritual, moral, emosional, dan bakat setiap anak.</li>
                    <li class="text-black text-justify">Memprioritaskan pertumbuhan pribadi setiap anak melebihi pengembangan fasilitas panti asuhan.</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Program -->
<section id="program" class="section py-20 bg-white">
    <div class="container mx-auto px-12 md:px-24">
        <div class="mb-8 text-left">
            <h2 class="text-4xl font-semibold text-[#CC2B52]">Program Jangka Panjang</h2>
            <p class="text-lg text-gray-700 mt-4">Pelayanan yang berkecimpung dalam bidang sosial, keagamaan dan pendidikan anak, yang terbagi menjadi 3 Tahap yaitu:</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" width="50" height="50" viewBox="0 0 24 24">
                    <path fill="black" d="M10 10a1 1 0 1 0-1 1a1 1 0 0 0 1-1m4.5 4.06a1 1 0 0 0-1.37.36a1.3 1.3 0 0 1-2.26 0a1 1 0 0 0-1.37-.36a1 1 0 0 0-.37 1.36a3.31 3.31 0 0 0 5.74 0a1 1 0 0 0-.37-1.36M15 9a1 1 0 1 0 1 1a1 1 0 0 0-1-1m-3-7a10 10 0 1 0 10 10A10 10 0 0 0 12 2m0 18A8 8 0 0 1 9 4.57A3 3 0 0 0 9 5a3 3 0 0 0 3 3a1 1 0 0 0 0-2a1 1 0 0 1 0-2a8 8 0 0 1 0 16" />
                </svg>
                <h3 class="text-2xl font-semibold text-black mb-4">Tahap 1: BALITA<span><br>(0-5 tahun)</span></h3>
                <p class="text-gray-700">
                    Membina anak-anak usia balita untuk mulai mengenal nilai-nilai keagamaan dan moral sebagai pondasi hidup yang kuat sejak dini.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" width="50" height="50" viewBox="0 0 640 512">
                    <path fill="black" d="M160 0a64 64 0 1 1 0 128a64 64 0 1 1 0-128M88 480v-80H70.2c-10.9 0-18.6-10.7-15.2-21.1l31.1-93.4l-28.6 37.8c-10.7 14.1-30.8 16.8-44.8 6.2s-16.8-30.7-6.2-44.8L65.4 207c22.4-29.6 57.5-47 94.6-47s72.2 17.4 94.6 47l58.9 77.7c10.7 14.1 7.9 34.2-6.2 44.8s-34.2 7.9-44.8-6.2l-28.6-37.8l31.1 93.4c3.5 10.4-4.3 21.1-15.2 21.1H232v80c0 17.7-14.3 32-32 32s-32-14.3-32-32v-80h-16v80c0 17.7-14.3 32-32 32s-32-14.3-32-32M480 0a64 64 0 1 1 0 128a64 64 0 1 1 0-128m-8 384v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V300.5L395.1 321c-9.4 15-29.2 19.4-44.1 10s-19.4-29.2-10-44.1l51.7-82.1c17.6-27.9 48.3-44.9 81.2-44.9h12.3c33 0 63.7 16.9 81.2 44.9l51.7 82.2c9.4 15 4.9 34.7-10 44.1s-34.7 4.9-44.1-10l-13-20.6V480c0 17.7-14.3 32-32 32s-32-14.3-32-32v-96z" />
                </svg>
                <h3 class="text-2xl font-semibold text-black mb-4">Tahap 2: Namdulasta<span><br>(6-12 tahun)</span></h3>
                <p class="text-gray-700">
                    Memberikan pendidikan dasar yang berfokus pada pembentukan karakter, pemahaman agama, dan pengembangan bakat anak-anak.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" width="50" height="50" viewBox="0 0 1200 1200">
                    <path fill="black" d="M605.096 480c-135.542-2.098-239.082-111.058-239.999-240C367.336 105.667 477.133.942 605.096 0c135.662 5.13 239.036 108.97 240.001 240c-2.668 134.439-111.907 239.09-240.001 240m194.043 49.788c170.592 1.991 257.094 151.63 257.881 301.269V1200H889.784l.001-324.254c-4.072-22.416-19.255-30.018-33.164-27.82c-13.022 2.059-24.929 12.701-25.56 27.82V1200h-464.67V875.746c-3.557-21.334-17.128-29.537-30.331-28.709c-14.138.889-27.853 12.135-28.393 28.709V1200h-164.68V831.057c-.98-159.475 99.901-300.087 259.137-301.269z" />
                </svg>
                <h3 class="text-2xl font-semibold text-black mb-4">Tahap 3: Gapanlasta<span><br>(13-18 tahun)</span></h3>
                <p class="text-gray-700">
                    Mempersiapkan remaja untuk memilih profesi dan hidup sesuai dengan panggilan Tuhan, serta menjadi individu yang berdampak positif di masyarakat.
                </p>
            </div>
        </div>
        <p class="text-lg text-gray-700 mt-12">Pelayanan ini untuk menolong dan mempersiapkan anak-anak yang mengasihi Tuhan hidup dengan satu ketetapan hati yang mantap untuk hidup takut akan Tuhan. Anak-anak diarahkan untuk memilih profesi dan hidup sesuai dengan panggilan yang Tuhan anugrahkan kepada mereka.</p>
    </div>
</section>

<!-- Newsletter Section -->
<section id="newsletter" class="section py-20 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-semibold text-center text-[#CC2B52] mb-12">Newsletter</h2>

        <div class="relative overflow-hidden">
            <div id="newsletter-carousel" class="flex transition-transform duration-700 ease-in-out space-x-6">

                @foreach($newsletters as $newsletter)
                <div class="min-w-full sm:w-1/2 lg:w-1/3 flex bg-white shadow-lg rounded-md hover:shadow-xl transition-shadow duration-300">
                    <div class="w-full sm:w-1/3">
                        <img src="{{ asset('storage/' . $newsletter->image) }}" alt="Newsletter Image" class="w-full h-full object-cover rounded-l-md">
                    </div>
                    <div class="w-full sm:w-2/3 p-4 sm:p-8 flex flex-col justify-center">
                        <a href="" class="p-4">
                            <h3 class="text-xl font-bold text-black mb-2">{{ $newsletter->title }}</h3>
                            <p class="text-sm text-gray-500 mb-4">{{ $newsletter->publish_date }}</p>
                            <p class="text-gray-600 mb-6">{{ \Str::words(strip_tags($newsletter->description), 60 , '...') }}
                                <strong>tekan untuk baca selengkapnya</strong>
                            </p>
                        </a>
                    </div>
                </div>
                @endforeach
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

<!-- Aktivitas Terakhir Section -->
<section id="aktivitas" class="section py-20 bg-white">
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

<!-- Galeri -->
<section id="Galeri" class="section py-20 bg-gray-100">
    <div class="container mx-auto px-6 ">
        <!-- Section Title -->
        <div class="flex justify-between items-center mb-16 md:px-24">
            <h2 class="text-4xl font-semibold text-[#CC2B52]">Galeri Foto</h2>
            <a href="{{ Route('show.galeri') }}" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Lihat Semua</a>
        </div>
        <!-- Swiper Carousel -->
        <div class="swiper-container mb-12 h-64">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel1.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel2.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel1.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel2.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel1.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel2.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="swiper-slide ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/carousel1.jpg') }}" alt="" class="w-full h-64 object-cover">
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Kunjungi kami -->
<!-- <section id="kunjungi" class="section py-20 bg-white">
    <div class="container mx-auto px-6 md:px-24">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-semibold text-[#CC2B52]">Kunjungi Kami</h2>
        </div>
        <div class="flex justify-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6639366060235!2d106.67885607528137!3d-6.307806993681454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e52bf63789e5%3A0xb9c593811dbbca67!2sPanti%20Asuhan%20Tunas%20Mahardika!5e0!3m2!1sid!2sid!4v1732780511199!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md"></iframe>
            <a href="https://www.google.com/maps/place/Panti+Asuhan+Tunas+Mahardika/@-6.2819666,106.6280052,14z/data=!4m6!3m5!1s0x2e69e52bf63789e5:0xb9c593811dbbca67!8m2!3d-6.307807!4d106.681431!16s%2Fg%2F11bc7stxc6?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D" class="bg-[#AF1740] text-white px-4 py-20 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300 flex items-center hover:translate-x-4 "> Kunjungi Kami</a>
            </a>
        </div>
    </div>
</section> -->

<!-- swiper script -->
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 5,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 1700, // 3 seconds for each slide
            disableOnInteraction: false,
        },
        loop: true, // Enable infinite loop
        speed: 1000, // Set the transition speed to 800ms (can be adjusted)
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
    });
</script>

@endsection


<!-- carousel script -->
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

<!-- transisi tiap section -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.section');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Tambahkan kelas 'show' jika elemen terlihat
                    entry.target.classList.add('show');
                } else {
                    // Hapus kelas 'show' jika elemen tidak terlihat
                    entry.target.classList.remove('show');
                }
            });
        }, {
            threshold: 0.1,
        });

        sections.forEach(section => {
            observer.observe(section);
        });
    });
</script>

<style>
    /* Transisi awal (sebelum terlihat) */
    .section {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s ease-in-out;
    }

    /* Transisi saat terlihat */
    .section.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>