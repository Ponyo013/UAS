@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<html>
<section id="individualPage" class="section px-2 py-4 mx-auto mt-28 mb-24 rounded-lg overflow-hidden max-w-screen-xl w-full">
    <div class="bg-gray-100 pb-12" style="border-radius: 20px;">
        <div class="bg-[#CC2B52] grid grid-cols-5 mb-10 mt-2 justify-items-center text-center" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <div class="tab py-8 text-lg md:text-xl font-semibold text-white p-4 flex items-center justify-center w-full hover:bg-gray-100 hover:text-[#CC2B52] transition-colors duration-300 active" style="border-top-left-radius: 18px;" onclick="selectTab(this, 'profil')">
                Profil Yayasan
            </div>
            <div class="tab py-8 text-lg md:text-xl font-semibold text-white p-4 flex items-center justify-center w-full hover:bg-gray-100 hover:text-[#CC2B52] transition-colors duration-300" onclick="selectTab(this, 'visimisi')">
                Visi dan Misi
            </div>
            <div class="tab py-8 text-lg md:text-xl font-semibold text-white p-4 flex items-center justify-center w-full hover:bg-gray-100 hover:text-[#CC2B52] transition-colors duration-300" onclick="selectTab(this, 'programJangkaPanjang')">
                Program Jangka Panjang
            </div>
            <div class="tab py-8 text-lg md:text-xl font-semibold text-white p-4 flex items-center justify-center w-full hover:bg-gray-100 hover:text-[#CC2B52] transition-colors duration-300" onclick="selectTab(this, 'lokasi')">
                Lokasi Kami
            </div>
            <div class="tab py-8 text-lg md:text-xl font-semibold text-white p-4 flex items-center justify-center w-full hover:bg-gray-100 hover:text-[#CC2B52] transition-colors duration-300" style="border-top-right-radius: 18px;" onclick="selectTab(this, 'susunan')">
                Susunan Pengurus
            </div>
        </div>
        <div class="mb-5">
            <!-- Profil Yayasan -->
            <div id="profil" class="content grid grid-cols-1 gap-4 justify-items-center text-center">
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 w-full px-12">
                    <div class="p-4 flex justify-center items-center">
                        <img src="{{ asset('images/tm-logo.png') }}" alt="Tunas Mahardika Logo" class="h-36 w-36">
                    </div>
                    <div class="p-4">
                        <h2 class="text-4xl font-semibold text-[#CC2B52] mb-8">Yayasan Tunas Mahardika</h2>
                        <p class="text-xl font-semibold text-gray-700 mb-14">
                            Panti Asuhan Tunas Mahardika didirikan pada tanggal 28 Oktober 2005 berdasarkan Akte Notaris no.71,
                            <br>yang dibuat dihadapan Notaris Winarto Wiryawartani S.H., M.Hum.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Vision and Mission -->
            <div id="visimisi" class="content grid grid-cols-1 gap-4 justify-items-center text-center hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full px-12">
                    <!-- Vision -->
                    <div class="p-4">
                        <h2 class="text-4xl font-semibold text-[#CC2B52] mb-8">Visi</h2>
                        <p class="text-xl font-semibold text-gray-700 mb-14 text-justify">
                            Memandang setiap anak berharga mulia dimata Tuhan, dan Tuhan mengasihi mereka. Mempersiapkan anak-anak Tuhan hidup dalam tujuan-tujuan Tuhan dan sesuai dengan rencana Tuhan sehingga mereka dapat menjadi duta-duta Kristus yang baik dan setia.
                        </p>
                    </div>

                    <!-- Mission -->
                    <div class="p-4">
                        <h2 class="text-4xl font-semibold text-[#CC2B52] mb-8">Misi</h2>
                        <p class="text-xl font-semibold text-gray-700 text-justify">
                            1. Mengangkat bayi-bayi yang telah kehilangan orang tua atau yang diserahkan penuh oleh orang tua mereka karena ketidakmapuan mereka, baik secara sosial maupun ekonomi.
                        </p>
                        <p class="text-xl font-semibold text-gray-700 text-justify">
                            2. Membina pengebangan spiritual, moral, emosional, dan bakat setiap anak.
                        </p>
                        <p class="text-xl font-semibold text-gray-700 text-justify">
                            3. Memproritaskan pertumbuhan pribadi setiap anak melebihi pengembangan fasilitas panti Asuhan.
                        </p>
                    </div>
                </div>
            </div>

            <div id="programJangkaPanjang" class="content grid grid-cols-1 gap-4 justify-items-center text-center hidden">
                <div class="grid grid-cols-1 gap-4 w-full px-12">
                    <div class="mb-10 text-center">
                        <h2 class="text-4xl mb-10 font-semibold text-[#CC2B52]">Tujuan Program</h2>
                        <p class="text-xl font-semibold text-gray-700 text-justify">Pelayanan ini untuk menolong dan mempersiapkan anak-anak yang mengasihi Tuhan hidup dengan satu ketetapan hati yang mantap untuk hidup takut akan Tuhan. Anak-anak diarahkan untuk memilih profesi dan hidup sesuai dengan panggilan yang Tuhan anugrahkan kepada mereka. Pelayanan yang berkecimpung dalam bidang sosial, keagamaan dan pendidikan anak, yang terbagi menjadi 3 Tahap yaitu:</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="p-10 flex flex-col bg-gray-50 rounded-lg items-center text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" width="50" height="50" viewBox="0 0 24 24">
                                <path fill="black" d="M10 10a1 1 0 1 0-1 1a1 1 0 0 0 1-1m4.5 4.06a1 1 0 0 0-1.37.36a1.3 1.3 0 0 1-2.26 0a1 1 0 0 0-1.37-.36a1 1 0 0 0-.37 1.36a3.31 3.31 0 0 0 5.74 0a1 1 0 0 0-.37-1.36M15 9a1 1 0 1 0 1 1a1 1 0 0 0-1-1m-3-7a10 10 0 1 0 10 10A10 10 0 0 0 12 2m0 18A8 8 0 0 1 9 4.57A3 3 0 0 0 9 5a3 3 0 0 0 3 3a1 1 0 0 0 0-2a1 1 0 0 1 0-2a8 8 0 0 1 0 16" />
                            </svg>
                            <h3 class="text-2xl font-semibold text-black mb-4">Tahap 1: BALITA<span><br>(0-5 tahun)</span></h3>
                        </div>
                        <div class="p-10 bg-gray-50 flex flex-col rounded-lg items-center text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" width="50" height="50" viewBox="0 0 640 512">
                                <path fill="black" d="M160 0a64 64 0 1 1 0 128a64 64 0 1 1 0-128M88 480v-80H70.2c-10.9 0-18.6-10.7-15.2-21.1l31.1-93.4l-28.6 37.8c-10.7 14.1-30.8 16.8-44.8 6.2s-16.8-30.7-6.2-44.8L65.4 207c22.4-29.6 57.5-47 94.6-47s72.2 17.4 94.6 47l58.9 77.7c10.7 14.1 7.9 34.2-6.2 44.8s-34.2 7.9-44.8-6.2l-28.6-37.8l31.1 93.4c3.5 10.4-4.3 21.1-15.2 21.1H232v80c0 17.7-14.3 32-32 32s-32-14.3-32-32v-80h-16v80c0 17.7-14.3 32-32 32s-32-14.3-32-32M480 0a64 64 0 1 1 0 128a64 64 0 1 1 0-128m-8 384v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V300.5L395.1 321c-9.4 15-29.2 19.4-44.1 10s-19.4-29.2-10-44.1l51.7-82.1c17.6-27.9 48.3-44.9 81.2-44.9h12.3c33 0 63.7 16.9 81.2 44.9l51.7 82.2c9.4 15 4.9 34.7-10 44.1s-34.7 4.9-44.1-10l-13-20.6V480c0 17.7-14.3 32-32 32s-32-14.3-32-32v-96z" />
                            </svg>
                            <h3 class="text-2xl font-semibold text-black mb-4">Tahap 2: Namdulasta<span><br>(6-12 tahun)</span></h3>
                        </div>
                        <div class="p-10 bg-gray-50 flex flex-col rounded-lg items-center text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" width="50" height="50" viewBox="0 0 1200 1200">
                                <path fill="black" d="M605.096 480c-135.542-2.098-239.082-111.058-239.999-240C367.336 105.667 477.133.942 605.096 0c135.662 5.13 239.036 108.97 240.001 240c-2.668 134.439-111.907 239.09-240.001 240m194.043 49.788c170.592 1.991 257.094 151.63 257.881 301.269V1200H889.784l.001-324.254c-4.072-22.416-19.255-30.018-33.164-27.82c-13.022 2.059-24.929 12.701-25.56 27.82V1200h-464.67V875.746c-3.557-21.334-17.128-29.537-30.331-28.709c-14.138.889-27.853 12.135-28.393 28.709V1200h-164.68V831.057c-.98-159.475 99.901-300.087 259.137-301.269z" />
                            </svg>
                            <h3 class="text-2xl font-semibold text-black mb-4">Tahap 3: Gapanlasta<span><br>(13-18 tahun)</span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div id="lokasi" class="content grid grid-cols-1 gap-4 justify-items-center text-center hidden">
                <div class="container mx-auto px-6 ">
                    <h2 class="text-4xl font-semibold text-[#CC2B52] text-center pb-4">Kunjungi Kami</h2>
                    <div class="flex justify-center mx-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6639366060235!2d106.67885607528137!3d-6.307806993681454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e52bf63789e5%3A0xb9c593811dbbca67!2sPanti%20Asuhan%20Tunas%20Mahardika!5e0!3m2!1sid!2sid!4v1732780511199!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md"></iframe>
                        <a href="https://www.google.com/maps/place/Panti+Asuhan+Tunas+Mahardika/@-6.2819666,106.6280052,14z/data=!4m6!3m5!1s0x2e69e52bf63789e5:0xb9c593811dbbca67!8m2!3d-6.307807!4d106.681431!16s%2Fg%2F11bc7stxc6?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D" class="bg-[#AF1740] text-white px-4 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300 flex items-center hover:translate-x-4 "> Kunjungi Kami</a>
                    </div>
                </div>
            </div>

            <div id="susunan" class="content grid grid-cols-1 gap-4 justify-items-center text-center hidden">
                <div class="grid grid-cols-1 gap-4 w-full px-12">
                    <div class="mb-10 text-center">
                        <h2 class="text-4xl font-semibold text-[#CC2B52]">Susunan Pengurus</h2>
                        <img src="{{ asset('images/Pengurus.png') }}" alt="Tunas Mahardika Logo" class="w-full">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-4 mt-10 text-center">
        <a href="{{ route('welcome') }}" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Kembali ke Halaman Utama</a>
    </div>

</section>

</html>

<script>
function selectTab(tabElement, contentId) {
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.content');

    tabs.forEach(tab => tab.classList.remove('active'));
    contents.forEach(content => content.classList.add('hidden'));

    tabElement.classList.add('active');
    document.getElementById(contentId).classList.remove('hidden');
}

</script>

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
        transform: translateY(0); /* Slide to the original position */
    }
</style>

@endsection