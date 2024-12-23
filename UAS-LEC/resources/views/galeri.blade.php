@vite(['resources/js/galeri.js'])

@extends('layouts.admin')

@section('title', 'Dashboard')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@section('content')
<main>
    <div>
        <h1 class="text-2xl font-bold mb-6">Galeri Foto</h1>

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
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-3 lg:gap-5" id="galeriList">
            @foreach($galeriItems as $galeri)
            <div class="card shadow-lg rounded-lg overflow-hidden w-full group relative mt-3">
                <div class="relative">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="gambar" class="object-cover">
                    <!-- Delete button (only visible when hovered) -->
                    <button class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 openDeleteModalBtn"
                        data-id="{{ $galeri->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @endif
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
                <p class="mt-1 text-xs text-red-600">Max 2MB</p>
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


@endsection