@extends('layouts.app')

@section('title', 'Newsletter')

@section('content')
    <div id="scrollToTopBtn" class="scroll-to-top-btn sticky top-1/4 z-10 pr-14 absolute right-0">
        <a class="bg-[#AF1740] text-white p-2 w-12 h-12 rounded-full font-semibold hover:bg-[#CC2B52] transition duration-300 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" class="text-white">
                <path fill="currentColor" d="M11.47 5.47a.753.753 0 0 1 1.06 0l5 5a.75.75 0 1 1-1.06 1.06l-3.72-3.72V18a.75.75 0 0 1-1.5 0V7.81l-3.72 3.72a.75.75 0 0 1-1.06-1.06z"/>
            </svg>
        </a>
    </div>

<section id="individualPage" class="section mt-48 mb-8 md:mt-20 bg-white">
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
    <div class="mt-16 text-center">
        <a href="{{ route('welcome') }}" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Kembali ke Halaman Utama</a>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        const section = document.getElementById("individualPage");
        section.classList.add("visible");
    }, 100);
});
</script>

<style>
    .tab.active {
        background-color: rgb(243 244 246);
        color: #CC2B52;
    }

    .content.hidden {
        display: none;
    }
    
    #individualPage {
    opacity: 0;
    transform: translateY(14px);
    transition: opacity 300ms ease-in-out, transform 1s ease-in-out;
    }   

    #individualPage.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-to-top-btn {
    position: fixed;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    
    }

    .scroll-to-top-btn.show {
    opacity: 1;
    visibility: visible;
    }

</style>

<script>
    // Get the button
const scrollToTopBtn = document.getElementById('scrollToTopBtn');

// Show the button when the user scrolls down
window.onscroll = function () {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollToTopBtn.classList.add('show');
    } else {
        scrollToTopBtn.classList.remove('show');
    }
};

scrollToTopBtn.onclick = function () {
    document.documentElement.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
};


</script>


@endsection