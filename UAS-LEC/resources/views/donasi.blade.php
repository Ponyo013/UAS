@extends('layouts.admin')

@section('title', 'Welcome')

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

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">List Donasi</h1>
            
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2" id="createGaleriBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block">
                    <path fill="white" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                </svg>
                <span class="font-semibold">Tambahkan Donatur</span>
            </button>
        </div>

        @if($donasi->isEmpty())
            <p class="text-gray-600 mt-64 text-center opacity-50">Belum ada Donatur.</p>
        @else
            <div id="itemTable" class="overflow-x-visible">
                <table class="min-w-full divide-y divide-gray-200 bg-white shadow rounded-lg overflow-hidden">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NAMA</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Donasi</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deksripsi</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($donasi as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="text-sm font-medium text-gray-900">{{ $item->user_id }}</td>
                                <td class="text-sm text-gray-700">{{ $item->nama_donatur }}</td>
                                <td class="text-sm text-gray-700">Rp. {{ number_format($item->jumlah_donasi, 0, ',', '.') }}</td>
                                <td class="text-sm text-gray-700">{{ $item->deskripsi }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="w-16 h-16 object-cover cursor-pointer thumbnail">
                                </td>

                                    @php
                                        $statusLabels = [
                                            'belum_valid' => 'Belum Valid',
                                            'tidak_valid' => 'Tidak Valid',
                                            'valid' => 'Valid',
                                        ];
                                    @endphp
                                <td class="text-sm
                                    @if($item->status == 'belum_valid')
                                        text-orange-500
                                    @elseif($item->status == 'tidak_valid')
                                        text-red-500
                                    @elseif($item->status == 'valid')
                                        text-green-500
                                    @endif">
                                    {{ $statusLabels[$item->status] }}
                                </td>
                                <td class="text-sm text-gray-700">
                                    <div class="flex space-x-2">
                                        <button class="bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-lg openEditModalBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                <g class="edit-outline">
                                                    <g fill="currentColor" fill-rule="evenodd" class="Vector" clip-rule="evenodd">
                                                        <path d="M2 6.857A4.857 4.857 0 0 1 6.857 2H12a1 1 0 1 1 0 2H6.857A2.857 2.857 0 0 0 4 6.857v10.286A2.857 2.857 0 0 0 6.857 20h10.286A2.857 2.857 0 0 0 20 17.143V12a1 1 0 1 1 2 0v5.143A4.857 4.857 0 0 1 17.143 22H6.857A4.857 4.857 0 0 1 2 17.143z" />
                                                        <path d="m15.137 13.219l-2.205 1.33l-1.033-1.713l2.205-1.33l.003-.002a1.2 1.2 0 0 0 .232-.182l5.01-5.036a3 3 0 0 0 .145-.157c.331-.386.821-1.15.228-1.746c-.501-.504-1.219-.028-1.684.381a6 6 0 0 0-.36.345l-.034.034l-4.94 4.965a1.2 1.2 0 0 0-.27.41l-.824 2.073a.2.2 0 0 0 .29.245l1.032 1.713c-1.805 1.088-3.96-.74-3.18-2.698l.825-2.072a3.2 3.2 0 0 1 .71-1.081l4.939-4.966l.029-.029c.147-.15.641-.656 1.24-1.02c.327-.197.849-.458 1.494-.508c.74-.059 1.53.174 2.15.797a2.9 2.9 0 0 1 .845 1.75a3.15 3.15 0 0 1-.23 1.517c-.29.717-.774 1.244-.987 1.457l-5.01 5.036q-.28.281-.62.487m4.453-7.126s-.004.003-.013.006z" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg openDeleteModalBtn"
                                        data-id = "{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <path fill="currentColor" fill-rule="evenodd" d="M5.75 3V1.5h4.5V3zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</main>

<!-- Modal Tambah Donatur -->
<div id="createDonaturModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full sm:w-2/3 md:w-1/2 lg:w-1/3 p-6">
        <h2 class="text-2xl font-semibold mb-4">Tambah Donatur</h2>
        <form id="createDonasiForm" method="POST" action="{{ route('donasi.create') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nama Donatur -->
            <div class="mb-4">
                <label for="createNamaDonatur" class="block text-sm font-medium text-gray-700">Nama Donatur</label>
                <input type="text" id="createNamaDonatur" name="nama_donatur" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Jumlah Donasi -->
            <div class="mb-4">
                <label for="createJumlahDonasi" class="block text-sm font-medium text-gray-700">Jumlah Donasi</label>
                <input 
                    type="text" 
                    name="jumlah_donasi" 
                    id="createJumlahDonasi" 
                    class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    min="0" 
                    step="50000" 
                    required 
                    placeholder="Rp 0"
                    oninput="AddformatRupiah(this)"
                >
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="createDeskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="createDeskripsi" name="deskripsi" rows="3" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                <p id="createCharCount" class="text-sm text-gray-500 mt-1">Jumlah karakter: 0/50</p>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="createStatus" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="createStatus" name="status" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="belum_valid">Belum Valid</option>
                    <option value="tidak_valid">Tidak Valid</option>
                    <option value="valid">Valid</option>
                </select>
            </div>

            <!-- Foto -->
            <div class="space-y-1">
                <label for="image" class="block text-sm font-medium text-gray-700">Bukti Transfer</label>
                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*" required>
                <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                <p class="text-xs text-red-600">Max 2MB</p>
            </div>

            <div class="flex justify-end space-x-4 font-semibold">
                <button 
                    type="button" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                    id="closeCreateModalBtn">
                    Batal
                </button>
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Tambah Donatur
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Delete -->
<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full sm:w-2/3 md:w-1/2 lg:w-1/3 p-6">
        <h2 class="text-2xl font-semibold mb-4">Hapus Donatur</h2>
        <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin menghapus Donatur ini? Tindakan ini tidak dapat dibatalkan.</p>
        <form id="deleteUserForm" method="POST"action="{{ route('donasi.destroy', ':id') }}">
            @csrf
            @method('DELETE')

            <div class="flex justify-end space-x-4 font-semibold">
                <button 
                    type="button" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                    id="closeDeleteModalBtn">
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk menampilkan gambar yang diperbesar -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="relative w-full max-w-3xl mx-4 sm:mx-8 md:mx-16 lg:mx-24">
        <span class="absolute top-0 right-0 text-white text-3xl cursor-pointer p-2" id="closeModal">&times;</span>
        <img id="modalImage" src="" alt="Image" class="w-full h-screen object-contain">
    </div>
</div>

<!-- Modal Edit Donatur -->
<div id="editModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full sm:w-2/3 md:w-1/2 lg:w-1/3 p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Donatur</h2>
        <form id="editDonasiForm" method="POST" action="{{ route('donasi.update', ':id') }}">
            @csrf
            @method('PUT')

            <!-- Nama Donatur -->
            <div class="mb-4">
                <label for="editNamaDonatur" class="block text-sm font-medium text-gray-700">Nama Donatur</label>
                <input type="text" id="editNamaDonatur" name="nama_donatur" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Jumlah Donasi -->
            <div class="mb-4">
                <label for="jumlah_donasi" class="block text-sm font-medium text-gray-700">Jumlah Donasi</label>
                    <input 
                        type="text" 
                        name="jumlah_donasi" 
                        id="editJumlahDonasi" 
                        class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        min="0" 
                        step="50000" 
                        required 
                        placeholder="Rp 0"
                        oninput="formatRupiah(this)"
                    >
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="editDeskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="editDeskripsi" name="deskripsi" rows="3" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                <p id="editCharCount" class="text-sm text-gray-500 mt-1">Jumlah karakter: 0/50</p>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="editStatus" name="status" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="belum_valid">Belum Valid</option>
                    <option value="tidak_valid">Tidak Valid</option>
                    <option value="valid">Valid</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4 font-semibold">
                <button 
                    type="button" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                    id="closeEditModalBtn">
                    Batal
                </button>
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    // For edit modal
    function formatRupiah(value) {
        let formattedValue = '';
        value = value.replace(/[^0-9]/g, '').toString();
        while (value.length > 3) {
            formattedValue = '.' + value.slice(-3) + formattedValue; 
            value = value.slice(0, value.length - 3);
        }
        return 'Rp ' + value + formattedValue;
    }

    // For create Modal
    function AddformatRupiah(input){
        let value = input.value.replace(/[^0-9]/g, '').toString();
        let formattedValue = '';
        while (value.length > 3) {
            formattedValue = '.' + value.slice(-3) + formattedValue;
            value = value.slice(0, value.length - 3);
        }
        input.value = 'Rp ' + value + formattedValue;
    }

    // Open Modal
    const createGaleriBtn = document.getElementById('createGaleriBtn');
    const createDonaturModal = document.getElementById('createDonaturModal');
    const closeCreateModalBtn = document.getElementById('closeCreateModalBtn');

    createGaleriBtn.addEventListener('click', () => {
        createDonaturModal.classList.remove('hidden');
    });

    closeCreateModalBtn.addEventListener('click', () => {
        createDonaturModal.classList.add('hidden');
    });

    // Count 
    const deskripsiTextarea = document.getElementById('createDeskripsi');
    const charCountDisplay = document.getElementById('createCharCount');
    const maxChars = 50; 

    function updateCharCount() {
        const charCount = deskripsiTextarea.value.length; 
        charCountDisplay.textContent = `Jumlah karakter: ${charCount}/${maxChars}`;

        if (charCount > maxChars) {
            deskripsiTextarea.value = deskripsiTextarea.value.substring(0, maxChars);
            charCountDisplay.textContent = `Jumlah karakter: ${maxChars}/${maxChars}`;
        }
    }

    deskripsiTextarea.addEventListener('input', updateCharCount);
</script>
<script>
    $(document).ready(function() {
    $('#itemTable table').DataTable(); 
});

// Delete
const deleteModal = document.getElementById('deleteModal');
const openDeleteModalBtns = document.querySelectorAll('.openDeleteModalBtn');
const closeDeleteModalBtn = document.getElementById('closeDeleteModalBtn');
const deleteUserForm = document.getElementById('deleteUserForm');

openDeleteModalBtns.forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id'); 
        const deleteUrl = deleteUserForm.getAttribute('action').replace(':id', userId); // Replace :id with donor ID
        deleteUserForm.action = deleteUrl;  
        
        deleteModal.classList.remove('hidden');  
    });
});

closeDeleteModalBtn.addEventListener('click', function () {
    deleteModal.classList.add('hidden');  
});

// zoom In
const thumbnails = document.querySelectorAll('.thumbnail'); 
const modal = document.getElementById('imageModal');
const closeModal = document.getElementById('closeModal');
const modalImage = document.getElementById('modalImage');

thumbnails.forEach(function(thumbnail) {
    thumbnail.addEventListener('click', function() {
        modal.classList.remove('hidden');
        modalImage.src = thumbnail.src; 
    });
});

closeModal.addEventListener('click', function() {
    modal.classList.add('hidden'); 
});

modal.addEventListener('click', function(e) {
    if (e.target === modal) {
        modal.classList.add('hidden'); 
    }
});

// edit
document.querySelector('form').addEventListener('submit', function(event) {
    let jumlahDonasiInput = document.getElementById('jumlah_donasi');
    jumlahDonasiInput.value = jumlahDonasiInput.value.replace(/[^\d]/g, ''); 
});

const editModal = document.getElementById('editModal');
const closeEditModalBtn = document.getElementById('closeEditModalBtn');
const editDonasiForm = document.getElementById('editDonasiForm');

const openEditModalBtns = document.querySelectorAll('.openEditModalBtn');
openEditModalBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const donasiId = this.closest('tr').querySelector('.openDeleteModalBtn').getAttribute('data-id');
        const row = this.closest('tr');
        const namaDonatur = row.querySelector('td:nth-child(2)').innerText;
        const jumlahDonasi = row.querySelector('td:nth-child(3)').innerText.replace('Rp. ', '').replace('.', ''); // Remove 'Rp' and dots
        const deskripsi = row.querySelector('td:nth-child(4)').innerText;
        const statusText = row.querySelector('td:nth-child(6)').innerText.trim();

        const statusMapping = {
            'Belum Valid': 'belum_valid',
            'Tidak Valid': 'tidak_valid',
            'Valid': 'valid'
        };
        const statusValue = statusMapping[statusText];

        editModal.classList.remove('hidden');
        editDonasiForm.action = editDonasiForm.action.replace(':id', donasiId);
        document.getElementById('editNamaDonatur').value = namaDonatur;
        document.getElementById('editJumlahDonasi').value = formatRupiah(jumlahDonasi); 
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editStatus').value = statusValue;

        updateCharCount();
    });
});

closeEditModalBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
});

const editJumlahDonasiInput = document.getElementById('editJumlahDonasi');
editJumlahDonasiInput.addEventListener('input', function() {
    this.value = formatRupiah(this.value); 
});

// Word count
const editDeskripsiTextarea = document.getElementById('editDeskripsi');
const editCharCountDisplay = document.getElementById('editCharCount');
const maxEditChars = 50; 
function updateEditCharCount() {
    const charCount = editDeskripsiTextarea.value.length; 
    editCharCountDisplay.textContent = `Jumlah karakter: ${charCount}/${maxEditChars}`;

    if (charCount > maxEditChars) {
        editDeskripsiTextarea.value = editDeskripsiTextarea.value.substring(0, maxEditChars);
        editCharCountDisplay.textContent = `Jumlah karakter: ${maxEditChars}/${maxEditChars}`; // Update ke batas maksimal
    }
}
editDeskripsiTextarea.addEventListener('input', updateEditCharCount);

function updateCharCount() {
    const deskripsiTextarea = document.getElementById('editDeskripsi');
    const charCountDisplay = document.getElementById('editCharCount');
    const maxChars = 50; 

    const charCount = deskripsiTextarea.value.length;
    charCountDisplay.textContent = `Jumlah karakter: ${charCount}/${maxChars}`;
}
document.getElementById('editDeskripsi').addEventListener('input', updateCharCount);

</script>
@endsection
