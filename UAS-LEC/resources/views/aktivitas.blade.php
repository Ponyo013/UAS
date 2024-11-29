@vite(['resources/js/aktivitas.js'])

@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<main>
    <div>
        @if(session('success'))
            <div class="fixed top-4 right-4 bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg w-full sm:w-auto">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium">
                        {{ session('success') }}
                    </span>
                    <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.style.display='none';">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-6">Post Aktivitas Terakhir</h1>

        <div class="mb-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2" id="openModalBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block">
                    <path fill="white" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                </svg>
                <span class="font-semibold">Post Aktivitas</span>
            </button>
        </div>

        @if($aktivitas->isEmpty())
            <p class="text-gray-600">Belum ada Aktivitas yang dipost.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($aktivitas as $item)
                    <div class="bg-white border border-gray-300 rounded-lg shadow-lg">
                        <!-- Image at the top -->
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Aktivitas Image" class="w-full h-48 object-cover rounded-t-lg">
                        @endif

                        <div class="p-5">
                            <!-- Title and Meta Info (kategori, tanggal) -->
                            <h3 class="text-xl font-bold">{{ $item->judul }}</h3>
                            <div class="flex justify-between text-sm text-gray-600 mt-2">
                                <p class="font-semibold text-sm text-gray-600 ">{{ $item->kategori }}</p>
                                <p class="text-gray-500 text-sm">{{ $item->tanggal }}</p>
                            </div>

                            <!-- Action Buttons at the bottom -->
                            <div class="mt-4 flex justify-between items-center gap-4">
                                <!-- Info Button -->
                                <button class="text-white p-2 rounded-full viewAktivitasBtn" 
                                    data-id="{{ $item->id }}" 
                                    data-judul="{{ $item->judul }}" 
                                    data-kategori="{{ $item->kategori }}" 
                                    data-tanggal="{{ $item->tanggal }}" 
                                    data-deskripsi="{{ $item->deskripsi }}" 
                                    data-gambar="{{ Storage::url($item->gambar) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 15 15">
                                        <path fill="blue" d="M8 10.5V10H7v.5zm-1 .01v.5h1v-.5zM7 4v4h1V4zm0 6.5v.01h1v-.01zm.5 3.5A6.5 6.5 0 0 1 1 7.5H0A7.5 7.5 0 0 0 7.5 15zM14 7.5A6.5 6.5 0 0 1 7.5 14v1A7.5 7.5 0 0 0 15 7.5zM7.5 1A6.5 6.5 0 0 1 14 7.5h1A7.5 7.5 0 0 0 7.5 0zm0-1A7.5 7.5 0 0 0 0 7.5h1A6.5 6.5 0 0 1 7.5 1z" />
                                    </svg>
                                </button>

                                <div>
                                    <!-- Edit Button -->
                                    <button class="bg-orange-500 text-white p-2 rounded-full hover:bg-orange-600 editAktivitasBtn" 
                                        data-id="{{ $item->id }}" 
                                        data-deskripsi="{{ $item->deskripsi }}" 
                                        data-judul="{{ $item->judul }}" 
                                        data-kategori="{{ $item->kategori }}" 
                                        data-tanggal="{{ $item->tanggal }}" 
                                        data-gambar="{{ $item->gambar }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <g class="edit-outline">
                                                <g fill="currentColor" fill-rule="evenodd" class="Vector" clip-rule="evenodd">
                                                    <path d="M2 6.857A4.857 4.857 0 0 1 6.857 2H12a1 1 0 1 1 0 2H6.857A2.857 2.857 0 0 0 4 6.857v10.286A2.857 2.857 0 0 0 6.857 20h10.286A2.857 2.857 0 0 0 20 17.143V12a1 1 0 1 1 2 0v5.143A4.857 4.857 0 0 1 17.143 22H6.857A4.857 4.857 0 0 1 2 17.143z" />
                                                    <path d="m15.137 13.219l-2.205 1.33l-1.033-1.713l2.205-1.33l.003-.002a1.2 1.2 0 0 0 .232-.182l5.01-5.036a3 3 0 0 0 .145-.157c.331-.386.821-1.15.228-1.746c-.501-.504-1.219-.028-1.684.381a6 6 0 0 0-.36.345l-.034.034l-4.94 4.965a1.2 1.2 0 0 0-.27.41l-.824 2.073a.2.2 0 0 0 .29.245l1.032 1.713c-1.805 1.088-3.96-.74-3.18-2.698l.825-2.072a3.2 3.2 0 0 1 .71-1.081l4.939-4.966l.029-.029c.147-.15.641-.656 1.24-1.02c.327-.197.849-.458 1.494-.508c.74-.059 1.53.174 2.15.797a2.9 2.9 0 0 1 .845 1.75a3.15 3.15 0 0 1-.23 1.517c-.29.717-.774 1.244-.987 1.457l-5.01 5.036q-.28.281-.62.487m4.453-7.126s-.004.003-.013.006z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
    
                                    <!-- Delete Button -->
                                    <button id="deleteBtn" data-id="{{ $item->id }}" class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Modal Buat aktivitas-->
    <div id="postAktivitasModal" class="hidden fixed inset-0  flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto">
        <div class="bg-white rounded-lg p-6 w-full sm:w-[480px] md:w-[600px] lg:w-[800px]">
            <h2 class="text-xl font-semibold mb-4">Post Aktivitas Baru</h2>
            <form action="{{ route('aktivitas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" id="judul" name="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex-1">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <input type="text" id="kategori" name="kategori" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <div id="quill-editor-aktivitas" name="deskripsi" class="block w-full border border-gray-300 h-[150px]"></div>
                    <input type="hidden" id="deskripsi" name="deskripsi">
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Foto</label>
                    <div class="mt-1">
                        <input type="file" id="gambar" name="gambar" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal post</label>
                    <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg" id="closeModalBtn">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Aktivitas -->
    <div id="editAktivitasModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto z-50">
        <div class="bg-white rounded-lg p-6 w-full sm:w-[480px] md:w-[600px] lg:w-[800px]">
            <h2 class="text-xl font-semibold mb-4">Edit Aktivitas</h2>
            <form id="editAktivitasForm" action="{{ route('aktivitas.update', ':id') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="edit_judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" id="edit_judul" name="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex-1">
                        <label for="edit_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <input type="text" id="edit_kategori" name="kategori" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <div id="edit-quill-editor-aktivitas" name="deskripsi" class="block w-full border border-gray-300 h-[150px]"></div>
                    <input type="hidden" id="edit_deskripsi" name="deskripsi">
                </div>

                <div class="mb-4">
                    <label for="edit_gambar" class="block text-sm font-medium text-gray-700">Foto</label>
                    <div class="mt-1">
                        <input type="file" id="edit_gambar" name="gambar" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                </div>

                <div class="mb-4">
                    <label for="edit_tanggal" class="block text-sm font-medium text-gray-700">Tanggal Post</label>
                    <input type="date" id="edit_tanggal" name="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="flex justify-between items-center">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg" id="closeEditModalBtn">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal for Aktivitas -->
    <div id="deleteConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-4 w-96">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
            <p class="text-gray-600 mt-2">Apakah Anda yakin ingin menghapus aktivitas ini? Tindakan ini tidak dapat dibatalkan.</p>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button id="cancelDeleteBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">
                    Batal
                </button>
                <form id="deleteAktivitasForm" method="POST" action="{{ route('aktivitas.destroy', ':id') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal View Aktivitas -->
    <div id="viewAktivitasModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full sm:w-[480px] md:w-[600px] lg:w-[800px] max-w-3xl">
            <div class="mb-6">
                <h2 class="text-3xl font-extrabold text-gray-800 leading-tight mb-4" id="view_judul">Judul Aktivitas</h2>
                <div class="flex justify-between mb-6">
                    <p class="text-sm text-gray-500" id="view_kategori">Kategori Aktivitas</p>
                    <p class="text-sm text-gray-600" id="view_tanggal">Tanggal Aktivitas</p>
                </div>
            </div>

            <div class="mb-6">
                <img src="" alt="Aktivitas Image" class="w-full h-60 object-cover rounded-lg shadow-md" id="view_gambar">
            </div>

            <div class="mb-6">
                <p class="text-md text-gray-700 leading-relaxed" id="view_deskripsi">
                    Deskripsi aktivitas yang lebih panjang dan naratif. Ini adalah tempat untuk menyampaikan cerita atau informasi dengan gaya blog yang lebih bebas dan terstruktur dengan baik.
                </p>
            </div>

            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded-lg text-sm font-semibold" id="closeViewModalBtn">Tutup</button>
            </div>
        </div>
    </div>
</main>


@endsection



