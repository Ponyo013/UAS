@extends('layouts.app')

@section('title', 'Welcome')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@section('content')
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






