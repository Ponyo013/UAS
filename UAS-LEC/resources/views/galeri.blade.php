@vite(['resources/js/galeri.js'])
@extends('layouts.admin')

@section('title', 'Dashboard')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@section('content')
<!-- Galeri -->
 <main>
    <div>
    <h1 class="text-2xl font-bold mb-6">Galeri Foto</h1>

<!-- Tombol Buat Newsletter -->
        <div class="mb-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2" id="createGaleriBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block">
                    <path fill="white" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                </svg>
                <span class="font-semibold">Tambahkan Foto</span>
            </button>
        </div>

        @if($galeriItems->isEmpty())
                <p class="text-gray-600 mt-64 text-center opacity-50">Belum ada Foto yang dimasukkan.</p>
            @else
                <div id="galeriList">
                @foreach($galeriItems as $galeri)
                    <div class="mb-6 p-6 bg-gray-50 border border-gray-300 rounded-lg shadow-md">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="gambar" class="w-full h-auto max-w-xs max-h-48 object-cover rounded-lg">                     
                            </div>
                        
                            <div class="flex-1">
                                <p class="text-sm text-center text-gray-500">{{ $galeri->publish_date }}</p>
                            </div>
                            
                            <div class="mt-4 flex justify-center space-x-2">

                                <!-- Delete button with red background -->
                                <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg openDeleteModalBtn"
                                    data-id="{{ $galeri->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
 </main>
    

        <!-- Add Foto modal -->
        <div id="createGaleriModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto">
            <div class="bg-white rounded-lg p-6 w-full sm:w-[480px] md:w-[600px] lg:w-[800px]">
                <h2 class="text-xl font-semibold mb-4">Tambah Foto Baru</h2>
                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" id="gambar" name="gambar" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="gambar/*" required>
                        <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg" id="closeModalBtn">Batal</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Confirm modal -->
        <div id="deleteConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-5 w-96">
                    <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
                    <p class="text-gray-600 mt-2">Apakah Anda yakin ingin menghapus Foto ini? Tindakan ini tidak dapat dibatalkan.</p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button id="cancelDeleteBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">
                        Batal
                    </button>
                    <form id="deleteGaleriForm" method="POST" action="{{ route('galeri.destroy', ':id') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

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











