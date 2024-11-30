@vite(['resources/js/donasi.js'])

@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<section id="donasi" class="section py-20 pt-28 bg-white">


    <div class="container mx-auto px-6 md:px-24">
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
                    <p class="text-lg text-gray-600">
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
                            oninput="formatRupiah(this)"
                        >
                    </div>

                    <!-- Deskripsi -->
                    <div class="space-y-1">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    
                    <!-- File Upload: Bukti Transfer -->
                    <div class="space-y-1">
                        <label for="image" class="block text-sm font-medium text-gray-700">Bukti Transfer</label>
                        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 file:py-2 file:px-4 file:rounded-md file:border-none file:bg-gray-200 hover:file:bg-gray-300 focus:outline-none" accept="image/*" required>
                        <p class="mt-1 text-xs text-gray-500">Pilih gambar dengan format JPG, PNG, atau GIF.</p>
                        <p class="text-xs text-red-600">Max 2MB</p>
                    </div>
                    
                    <div class="space-y-1">
                        <img src="{{ asset('storage/images/qris.jpg') }}" alt="QRIS" class="w-60 h-60">
                    </div>

                    <button type="submit" class="w-full bg-[#AF1740] text-white font-semibold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none">Donasi</button>
                </form>
            </div>
            
            <!-- Bank Details Section (Optional) -->
            <div class="space-y-6 text-black">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">List Donasi</h1>
                <!-- List of Donations (to be added dynamically or via backend) -->
            </div>
        </div>
    </div>
</section>

<script>
    function formatRupiah(input){
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
</script>
@endsection
