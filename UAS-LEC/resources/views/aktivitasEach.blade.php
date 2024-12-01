@extends('layouts.app')

@section('title', 'Aktivitas')

@section('content')
<section class="pt-16 md:pt-28 md:pb-14 bg-white">
    <div class="container mx-auto px-6 md:px-24">
        <!-- Judul -->
        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $aktivitas->judul }}</h3>
        
        <!-- Kategori dan Tanggal -->
        <div class="flex flex-wrap gap-6 mb-6 text-lg text-gray-600">
            <p class="font-medium">{{ $aktivitas->kategori }}</p>
            <p class="text-gray-500">{{ \Carbon\Carbon::parse($aktivitas->tanggal)->format('F d, Y') }}</p>
        </div>

        <!-- Gambar -->
        <div class="mb-6">
            <img src="{{ asset('storage/' . $aktivitas->gambar) }}" alt="{{ $aktivitas->judul }}" class="w-full max-w-2xl h-auto rounded-lg  mx-auto bject-cover">
        </div>

        <!-- Deskripsi -->
        <div class="prose prose-sm sm:prose-base lg:prose-lg text-gray-700 text-lg">
            <p>{!! $aktivitas->deskripsi !!}</p>
        </div>
    </div>
</section>
@endsection
