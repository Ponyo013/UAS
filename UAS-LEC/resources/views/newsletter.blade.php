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

        <h1 class="text-2xl font-bold mb-6">Newsletter yang diterbitkan</h1>

        <!-- Tombol Buat Newsletter -->
        <div class="mb-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2" id="createNewsletterBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block">
                    <path fill="white" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                </svg>
                <span class="font-semibold">Buat Newsletter</span>
            </button>
        </div>

        @if($newsletters->isEmpty())
            <p class="text-gray-600">Belum ada newsletter yang diterbitkan.</p>
        @else
            <div id="newsletterList">
            @foreach($newsletters as $newsletter)
                <div class="mb-6 p-6 bg-gray-50 border border-gray-300 rounded-lg shadow-md">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $newsletter->image) }}" alt="Image" class="w-full h-auto max-w-xs max-h-48 object-cover rounded-lg">                     
                        </div>
                       
                        <div class="flex-1">
                            <h2 class="text-4xl font-semibold text-center text-gray-800">{{ $newsletter->title }}</h2>
                            <p class="text-sm text-center text-gray-500">{{ $newsletter->publish_date }}</p>
                            <div class="text-gray-700">
                                {!! $newsletter->description !!}
                            </div>
                        </div>
                        
                        <div class="mt-4 flex justify-center space-x-2">
                            <!-- Edit button with orange background -->
                            <button class="bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-lg openEditModalBtn"
                                data-id="{{ $newsletter->id }}" 
                                data-title="{{ $newsletter->title }}" 
                                data-description="{{ $newsletter->description }}" 
                                data-image="{{ $newsletter->image }}" 
                                data-publish_date="{{ $newsletter->publish_date }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                    <g class="edit-outline">
                                        <g fill="currentColor" fill-rule="evenodd" class="Vector" clip-rule="evenodd">
                                            <path d="M2 6.857A4.857 4.857 0 0 1 6.857 2H12a1 1 0 1 1 0 2H6.857A2.857 2.857 0 0 0 4 6.857v10.286A2.857 2.857 0 0 0 6.857 20h10.286A2.857 2.857 0 0 0 20 17.143V12a1 1 0 1 1 2 0v5.143A4.857 4.857 0 0 1 17.143 22H6.857A4.857 4.857 0 0 1 2 17.143z" />
                                            <path d="m15.137 13.219l-2.205 1.33l-1.033-1.713l2.205-1.33l.003-.002a1.2 1.2 0 0 0 .232-.182l5.01-5.036a3 3 0 0 0 .145-.157c.331-.386.821-1.15.228-1.746c-.501-.504-1.219-.028-1.684.381a6 6 0 0 0-.36.345l-.034.034l-4.94 4.965a1.2 1.2 0 0 0-.27.41l-.824 2.073a.2.2 0 0 0 .29.245l1.032 1.713c-1.805 1.088-3.96-.74-3.18-2.698l.825-2.072a3.2 3.2 0 0 1 .71-1.081l4.939-4.966l.029-.029c.147-.15.641-.656 1.24-1.02c.327-.197.849-.458 1.494-.508c.74-.059 1.53.174 2.15.797a2.9 2.9 0 0 1 .845 1.75a3.15 3.15 0 0 1-.23 1.517c-.29.717-.774 1.244-.987 1.457l-5.01 5.036q-.28.281-.62.487m4.453-7.126s-.004.003-.013.006z" />
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <!-- Delete button with red background -->
                            <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg openDeleteModalBtn"
                                data-id="{{ $newsletter->id }}">
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

    <!-- Modal Buat Newsletter -->
    <div id="createNewsletterModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto">
        <div class="bg-white rounded-lg p-6 w-full sm:w-[480px] md:w-[600px] lg:w-[800px]">
            <h2 class="text-xl font-semibold mb-4">Buat Newsletter Baru</h2>
            <form action="{{ route('newsletters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <div id="quill-editor" name="description" class="block w-full border border-gray-300 h-[150px]"></div>
                    <input type="hidden" id="description" name="description">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*" required>
                    <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                </div>
                <div class="mb-4">
                    <label for="publish_date" class="block text-sm font-medium text-gray-700">Tanggal Terbit</label>
                    <input type="date" id="publish_date" name="publish_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg" id="closeModalBtn">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Terbitkan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Newsletter -->
    <div id="editNewsletterModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto">
        <div class="bg-white rounded-lg p-6 w-full sm:w-[480px] md:w-[600px] lg:w-[800px]">
            <h2 class="text-xl font-semibold mb-4">Edit Newsletter</h2>
            <form id="editNewsletterForm" action="{{ route('newsletters.update', ':id') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editTitle" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" id="editTitle" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="editDescription" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <div id="quillEditorEdit" name="description" class="block w-full border border-gray-300 h-[200px]"></div>
                    <input type="hidden" id="editDescription" name="description">
                </div>
                <div class="mb-4">
                    <label for="editImage" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="editImage" name="image" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                </div>
                <div class="mb-4">
                    <label for="editPublishDate" class="block text-sm font-medium text-gray-700">Publish Date</label>
                    <input type="date" id="editPublishDate" name="publish_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg" id="closeEditModalBtn">Tutup</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="deleteConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-5 w-96">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
            <p class="text-gray-600 mt-2">Apakah Anda yakin ingin menghapus newsletter ini? Tindakan ini tidak dapat dibatalkan.</p>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button id="cancelDeleteBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">
                    Batal
                </button>
                <form id="deleteNewsletterForm" method="POST" action="{{ route('newsletters.destroy', ':id') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>

</script>
@endsection
