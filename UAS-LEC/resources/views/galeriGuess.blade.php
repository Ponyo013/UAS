@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<main>
    <div class="px-20 py-20">
        <h1 class="py-16 text-center text-5xl text-[#CC2B52] font-bold">Galeri Foto</h1>

        @if($galeriItems->isEmpty())
            <p class="text-gray-600 mt-64 text-center opacity-50">Belum ada Foto yang dimasukkan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6" id="galeriList">
                @foreach($galeriItems as $galeri)
                    <div class="card bg-white shadow-lg rounded-lg overflow-hidden w-full group relative transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="gambar" class="w-full h-96 object-cover transform transition duration-300 ease-in-out group-hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-16 text-center">
            <a href="{{ route('welcome') }}" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Kembali ke Halaman Utama</a>
        </div>
    </div>
</main>

<!-- Include SortableJS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Sortable(document.getElementById('galeriList'), {
            animation: 300,
            ghostClass: 'sortable-ghost', 
            chosenClass: 'sortable-chosen', 
            dragClass: 'sortable-drag', 
            opacity: 0.6,                   
            placeholder: '<div class="sortable-placeholder w-full h-96 bg-gray-200 rounded-lg"></div>',
            onStart(evt) {
                // Slide Effect
                evt.item.style.transition = "transform 0.2s ease-out";
                evt.item.style.transform = "translateX(10px)";  // Slide to the right by 10px
            },
            onEnd(evt) {
                evt.item.style.transition = "transform 0.2s ease-out";
                evt.item.style.transform = "translateX(0px)";  // Reset the position back to normal
            }
        });
    });
</script>

@endsection

<style>
/* Slide effect on dragging */
.sortable-drag {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transform: translateX(15px);  /* Move the dragged card slightly horizontally */
}

/* Placeholder style */
.sortable-placeholder {
    background-color: #f3f4f6;
    border: 2px dashed #ccc;
    visibility: visible !important;
}

.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Highlight the card when dragged */
.sortable-chosen {
    border: 2px solid #CC2B52;
    background-color: rgba(204, 43, 82, 0.1);
}
</style>
