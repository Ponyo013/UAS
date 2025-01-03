@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
<main>
    <div class="top-page mb-8 md:mt-20">
        <div class="container mx-auto px-4">
            <h1 class="py-16 text-center text-5xl text-black font-bold">Galeri Foto</h1>

            @if($galeriItems->isEmpty())
            <p class="text-gray-600 mt-64 text-center opacity-50">Belum ada Foto yang dimasukkan.</p>
            @else
            
            <div class="columns-2 sm:columns-2 lg:columns-3 xl:columns-4 gap-3 lg:gap-5" id="galeriList">
                @foreach($galeriItems as $index => $galeri)
                <div class="card shadow-lg rounded-lg overflow-hidden group relative opacity-0 translate-y-4 mt-2" style="animation-delay: {{ $index * 0.1 }}s;" id="galeriList">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="gambar" class="rounded-lg object-cover">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('visible');
            }, index * 200);
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
    
    @media (max-width: 480px){
        .top-page{
            margin-top:50px;
        }
    }
    @media (min-width: 480px){
        .top-page{
            margin-top:40px;
        }
    }
</style>