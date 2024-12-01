@extends('layouts.app')

@section('title', 'Newsletter')

@section('content')
<section class="section pt-16 md:pt-28 md:pb-14 bg-white">
    <div class="container mx-auto px-6 md:px-24">
        <h1 class="text-black text-3xl md:text-4xl font-bold mb-8">Newsletters</h1>
        
        @foreach($newsletters as $newsletter)
            <div class="mb-6 p-6 bg-gray-50 border border-gray-300 rounded-lg">
                <div class="flex flex-col items-center space-y-4">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $newsletter->image) }}" alt="Image" class="w-full h-auto max-w-xs max-h-48 object-cover rounded-lg">
                    </div>

                    <div class="flex-1">
                        <h2 class="text-4xl font-semibold text-center text-gray-800">{{ $newsletter->title }}</h2>
                        <p class="text-sm text-center text-gray-500">{{ \Carbon\Carbon::parse($newsletter->publish_date)->format('F d, Y') }}</p>
                        <div class="text-gray-700">
                            {!! $newsletter->description !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
