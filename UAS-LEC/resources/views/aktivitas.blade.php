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
            <div class="space-y-4">
                @foreach($aktivitas as $item)
                    <div class="p-5 bg-gray-50 border border-gray-300 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold">{{ $item->judul }}</h3>
                        <div class="flex justify-between text-sm text-gray-600">
                            <p>Kategori: {{ $item->kategori }}</p>
                            <p>Di Post pada: {{ $item->tanggal }}</p>
                        </div>
                        
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Aktivitas Image" class="mt-4 max-w-full h-auto rounded-lg">
                        @endif
                        
                        <!-- Truncated Description
                        <p class="text-gray-700 mt-2 truncated-description" id="desc-{{ $item->id }}">
                            {!! \Str::limit($item->deskripsi, 150) !!}
                            <a href="javascript:void(0);" class="text-blue-500 read-more" data-id="{{ $item->id }}">Baca Selengkapnya</a>
                        </p>

                        Full Description (Initially hidden) -->
                        <!-- <p class="text-gray-700 mt-2 full-description hidden" id="full-desc-{{ $item->id }}">
                            {{ $item->deskripsi }}
                        </p> -->

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

</main>
<script>
    const modal = document.getElementById('postAktivitasModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    openModalBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#quill-editor-aktivitas', {
            theme: 'snow',
            placeholder: 'Tulis Deskripsi di sini...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ align: [] }],
                    ['link', 'image', 'video'],
                    ['clean']  
                ]
            }
        });

        quill.on('text-change', function() {
        const descriptionInput = document.querySelector('#deskripsi');
        descriptionInput.value = quill.root.innerHTML;
    });

    const descriptionInput = document.querySelector('#deskripsi');
    descriptionInput.value = quill.root.innerHTML;
    });
</script>

@endsection



