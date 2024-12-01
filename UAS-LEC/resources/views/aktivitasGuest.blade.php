@extends('layouts.app')

@section('title', 'Aktivitas')

@section('content')
<section class="section pt-16 md:pt-28 md:pb-14 bg-white">
    <div class="container mx-auto px-6 md:px-24">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Aktivitas Terakhir</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($aktivitas as $activity)
                <a href="{{ route('aktivitas.showEach', $activity->id) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('storage/' . $activity->gambar) }}" alt="{{ $activity->judul }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-black">{{ $activity->judul }}</h3>
                        <p class="text-gray-500 mt-2">{{ $activity->kategori }}</p>
                        <p class="text-gray-400 mt-1 text-sm">{{ \Carbon\Carbon::parse($activity->tanggal)->format('F d, Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
