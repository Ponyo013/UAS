@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="relative selection:bg-[#FF2D20] selection:text-white">
    <div class="w-full h-[80vh] overflow-hidden relative">
        <div id="carousel" class="flex transition-transform duration-700 ease-in-out h-full">
            <div class="min-w-full flex items-center justify-center bg-red-500 text-white h-full">
                <h2 class="text-5xl font-bold">Slide 1</h2>
            </div>
            <div class="min-w-full flex items-center justify-center bg-blue-500 text-white h-full">
                <h2 class="text-5xl font-bold">Slide 2</h2>
            </div>
            <div class="min-w-full flex items-center justify-center bg-green-500 text-white h-full">
                <h2 class="text-5xl font-bold">Slide 3</h2>
            </div>
            <div class="min-w-full flex items-center justify-center bg-green-500 text-white h-full">
                <h2 class="text-5xl font-bold">Slide 4</h2>
            </div>
            <div class="min-w-full flex items-center justify-center bg-green-500 text-white h-full">
                <h2 class="text-5xl font-bold">Slide 5</h2>
            </div>
        </div>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50" data-index="0"></button>
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50" data-index="1"></button>
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50" data-index="2"></button>
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50" data-index="3"></button>
            <button class="dot w-2 h-2 bg-white rounded-full opacity-50" data-index="4"></button>
        </div>
    </div>
    <div>
        p
    </div>
</div>


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
        }, 4000);
        
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const dotIndex = parseInt(dot.getAttribute('data-index'));
                moveToSlide(dotIndex);
            });
        });
    });
</script>

