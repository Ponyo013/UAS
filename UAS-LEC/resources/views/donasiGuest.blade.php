@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<section id="donasi" class="section mt-48 mb-8 md:mt-20 bg-white">
    <div class="container py-5 mx-auto px-6 md:px-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Form Section -->
            <div>
                <div class="space-y-2">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Donasi</h1>
                    @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                    @endif
                    <p class="text-xl text-gray-600">
                        Isi formulir di bawah ini untuk melakukan donasi dan nama anda akan ditampilkan di dalam daftar donasi (setelah proses validasi).
                    </p>
                    <p class="text-xs text-gray-500">*Donasi dapat dilakukan tanpa mengisi formulir di bawah, namun nama anda tidak akan ditampilkan dalam daftar donasi.</p>
                </div>

                <form action="{{ route('donasi.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Donatur -->
                    <div class="space-y-1">
                        <label for="nama_donatur" class="block text-sm font-medium text-gray-700">Nama Donatur</label>
                        <input type="text" name="nama_donatur" id="nama_donatur" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Jumlah Donasi -->
                    <div class="space-y-1">
                        <label for="jumlah_donasi" class="block text-sm font-medium text-gray-700">Jumlah Donasi</label>
                        <input
                            type="text"
                            name="jumlah_donasi"
                            id="jumlah_donasi"
                            class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            min="0"
                            step="50000"
                            required
                            placeholder="Rp 0"
                            oninput="formatRupiah(this)">
                    </div>

                    <!-- Deskripsi -->
                    <div class="space-y-1">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="2" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('deskripsi') }}</textarea>
                        <p id="charCount" class="text-sm text-gray-500 mt-1">Jumlah karakter: 0/50</p>
                    </div>

                    <!-- File Upload: Bukti Transfer -->
                    <div class="space-y-1">
                        <label for="image" class="block text-sm font-medium text-gray-700">Bukti Transfer</label>
                        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*" required>
                        <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                        <p class="text-xs text-red-600">Max 2MB</p>
                    </div>

                    <div class="space-y-1">
                        <img src="{{ asset('images/qris.jpg') }}" alt="QRIS" class="w-60 h-60">
                    </div>

                    <button type="submit" class="w-full bg-[#AF1740] text-white font-semibold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none">Donasi</button>
                </form>
            </div>

            <!-- List Donasi Section -->
            <div class="space-y-6 text-black">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-3">Rekening Bank</h1>
                    <div class="mb-3">
                        <p class="text-2xl font-semibold text-gray-600">Bank Central Asia</p>
                        <p class="text-xl">a/c 401-7030-301</p>
                        <p class="text-xl">A/n Yayasan Tunas Mahardika</p>
                    </div>

                    <div>
                        <p class="text-2xl font-semibold text-gray-600">Mandiri</p>
                        <p class="text-xl">a/c 164-00-64-11111-7</p>
                        <p class="text-xl">KK Tangerang ITC BSD</p>
                        <p class="text-xl">A/n Yayasan Tunas Mahadrika</p>
                    </div>
                </div>
                <!-- Donation list wrapper with overflow scroll -->
                <div class="overflow-y-auto max-h-[500px] space-y-4">
                    @foreach($donasi as $item)
                    <div class="p-6 shadow-md rounded-lg border border-gray-200">
                        <div class="flex justify-left">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">{{ $item->nama_donatur }}</h3>
                                <p class="mt-2 text-lg font-bold text-[#AF1740]">
                                    Rp {{ number_format($item->jumlah_donasi, 0, ',', '.') }}
                                </p>
                                <p class="mt-2 text-xs text-gray-500">{{ $item->created_at->format('d-m-Y') }}</p>
                            </div>
                            <div class="flex-1 pl-8">
                                <p class="mt-4 text-sm text-gray-600">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- If no donations exist -->
                @if($donasi->isEmpty())
                <p class="text-gray-500 text-center py-6">Belum ada donasi yang tercatat.</p>
                @endif

            </div>
        </div>
    </div>
</section>

<script>
    function formatRupiah(input) {
        let value = input.value.replace(/[^0-9]/g, '').toString();
        let formattedValue = '';
        while (value.length > 3) {
            formattedValue = '.' + value.slice(-3) + formattedValue;
            value = value.slice(0, value.length - 3);
        }
        input.value = 'Rp ' + value + formattedValue;
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        let jumlahDonasiInput = document.getElementById('jumlah_donasi');
        jumlahDonasiInput.value = jumlahDonasiInput.value.replace(/[^\d]/g, '');
    });

    const deskripsiTextarea = document.getElementById('deskripsi');
    const charCountDisplay = document.getElementById('charCount');
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
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            const section = document.getElementById("donasi");
            section.classList.add("visible");
        }, 100);
    });
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
<style>
    .tab.active {
        background-color: rgb(243 244 246);
        color: #CC2B52;
    }

    .content.hidden {
        display: none;
    }

    #donasi {
        opacity: 0;
        transform: translateY(14px);
        transition: opacity 300ms ease-in-out, transform 1s ease-in-out;
    }

    #donasi.visible {
        opacity: 1;
        transform: translateY(0);
        /* Slide to the original position */
    }
</style>
@endsection