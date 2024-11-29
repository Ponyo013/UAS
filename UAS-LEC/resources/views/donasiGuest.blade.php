@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<section id="donasi" class="section py-20 pt-28 bg-white">
    <div class="container mx-auto px-6 md:px-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <div class="space-y-6">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Donasi</h1>
                    <p class="text-lg text-gray-600">
                        Mari berikan dukungan Anda melalui donasi. Isi formulir di bawah ini untuk melakukan donasi.
                    </p>
                </div>
                <!-- Form Section -->
                <div>
                    <form action="" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Nama Donatur -->
                        <div class="space-y-1">
                            <label for="nama_donatur" class="block text-sm font-medium text-gray-700">Nama Donatur</label>
                            <input type="text" name="nama_donatur" id="nama_donatur" value="{{ old('nama_donatur') }}" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
    
                        <!-- Jumlah Donasi -->
                        <div class="space-y-1">
                            <label for="jumlah_donasi" class="block text-sm font-medium text-gray-700">Jumlah Donasi</label>
                            <input type="number" name="jumlah_donasi" id="jumlah_donasi" value="{{ old('jumlah_donasi') }}" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
    
                        <!-- Deskripsi -->
                        <div class="space-y-1">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('deskripsi') }}</textarea>
                        </div>
    
                        <button type="submit" class="w-full bg-[#AF1740] text-white font-semibold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Donasi</button>
                    </form>
                </div>
            </div>
            
            <!-- Bank Details Section -->
            <div class="space-y-6">
                <h2 class="text-2xl font-semibold mb-4">Rekening Bank</h2>
                <div class="space-y-3">
                    <p><strong>Bank Central Asia</strong></p>
                    <p>a/c 401-7030-301</p>
                    <p>A/n Yayasan Tunas Mahardika</p>

                    <p><strong>Mandiri</strong></p>
                    <p>a/c 160-00-64-11111-7</p>
                    <p>A/n Yayasan Tunas Mahardika</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
