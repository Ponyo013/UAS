@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
<main>
    <div class="mt-40 mb-8 md:mt-20">
        <div class="container mx-auto px-4">
            <h1 class="py-16 text-center text-5xl text-black font-bold">Galeri Foto</h1>

            @if($galeriItems->isEmpty())
            <p class="text-gray-600 mt-64 text-center opacity-50">Belum ada Foto yang dimasukkan.</p>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6" id="galeriList">
                @foreach($galeriItems as $index => $galeri)
                <div class="card bg-white shadow-lg rounded-lg overflow-hidden w-full group relative opacity-0 translate-y-4" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="gambar" class="w-full h-96 object-cover transform transition duration-300 ease-in-out">
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="mt-16 text-center">
                <a href="{{ route('welcome') }}" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
</main>

<!-- Include SortableJS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<!-- Include Animate.css from CDN for animations -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('visible');
            }, index * 200);
        });

        new Sortable(document.getElementById('galeriList'), {
            animation: 300,
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            dragClass: 'sortable-drag',
            opacity: 0.6,
            placeholder: '<div class="sortable-placeholder w-full h-96 bg-gray-200 rounded-lg"></div>',
            onStart(evt) {
                evt.item.style.transition = "transform 0.2s ease-out";
                evt.item.style.transform = "translateX(10px)";
            },
            onEnd(evt) {
                evt.item.style.transition = "transform 0.2s ease-out";
                evt.item.style.transform = "translateX(0px)"; 
            }
        });
    });
</script>

@endsection

<style>
    .card {
        opacity: 0;
        transform: translateY(14px);
        transition: opacity 0.5s ease-in-out, transform 0.8s ease-in-out;
    }

    .card.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .sortable-drag {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateX(15px);
    }

    /* Placeholder style */
    .sortable-placeholder {
        background-color: #f3f4f6;
        border: 2px dashed #ccc;
        visibility: visible !important;
    }

    .sortable-chosen {
        border: 2px solid #fff;
        background-color: rgba(204, 43, 82, 0.1);
    }
</style>
