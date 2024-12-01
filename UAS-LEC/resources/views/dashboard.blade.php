@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<main>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-2">Dashboard Admin</h1>
        <p class="text-md text-gray-600">Selamat Kembali, {{ auth()->user()->name }}</p>

        <!-- Box informasi -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">

            <!-- Total User Box -->
            <div class="bg-gray-100 p-6 rounded-lg flex items-center space-x-4 hover:bg-gray-200 transition">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-600">
                        <path fill="#000" fill-rule="evenodd" d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5M8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0M12 12.25c-2.313 0-4.445.526-6.024 1.414C4.42 14.54 3.25 15.866 3.25 17.5v.102c-.001 1.162-.002 2.62 1.277 3.662c.629.512 1.51.877 2.7 1.117c1.192.242 2.747.369 4.773.369s3.58-.127 4.774-.369c1.19-.24 2.07-.605 2.7-1.117c1.279-1.042 1.277-2.5 1.276-3.662V17.5c0-1.634-1.17-2.96-2.725-3.836c-1.58-.888-3.711-1.414-6.025-1.414M4.75 17.5c0-.851.622-1.775 1.961-2.528c1.316-.74 3.184-1.222 5.29-1.222c2.104 0 3.972.482 5.288 1.222c1.34.753 1.961 1.677 1.961 2.528c0 1.308-.04 2.044-.724 2.6c-.37.302-.99.597-2.05.811c-1.057.214-2.502.339-4.476.339s-3.42-.125-4.476-.339c-1.06-.214-1.68-.509-2.05-.81c-.684-.557-.724-1.293-.724-2.601" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Total User</h2>
                    <p class="text-xl font-bold text-gray-800">{{ $userCount }}</p>
                </div>
            </div>

            <!-- Total Donatur Box -->
            <div class="bg-gray-100 p-6 rounded-lg flex items-center space-x-4 hover:bg-gray-200 transition">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-600">
                        <g fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1.5">
                            <path d="M16 6.28a2.28 2.28 0 0 1-.662 1.606c-.976.984-1.923 2.01-2.936 2.958a.597.597 0 0 1-.822-.017l-2.918-2.94a2.28 2.28 0 0 1 0-3.214a2.277 2.277 0 0 1 3.232 0L12 4.78l.106-.107A2.276 2.276 0 0 1 16 6.28Z" />
                            <path stroke-linecap="round" d="m18 20l3.824-3.824a.6.6 0 0 0 .176-.424V10.5A1.5 1.5 0 0 0 20.5 9v0a1.5 1.5 0 0 0-1.5 1.5V15" />
                            <path stroke-linecap="round" d="m18 16l.858-.858a.48.48 0 0 0 .142-.343v0a.49.49 0 0 0-.268-.433l-.443-.221a2 2 0 0 0-2.308.374l-.895.895a2 2 0 0 0-.586 1.414V20M6 20l-3.824-3.824A.6.6 0 0 1 2 15.752V10.5A1.5 1.5 0 0 1 3.5 9v0A1.5 1.5 0 0 1 5 10.5V15" />
                            <path stroke-linecap="round" d="m6 16l-.858-.858A.5.5 0 0 1 5 14.799v0c0-.183.104-.35.268-.433l.443-.221a2 2 0 0 1 2.308.374l.895.895a2 2 0 0 1 .586 1.414V20" />
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Total Donatur</h2>
                    <p class="text-xl font-bold text-gray-800">{{ $donasiCount }}</p>
                </div>
            </div>

            <!-- Total Newsletter Box -->
            <div class="bg-gray-100 p-6 rounded-lg flex items-center space-x-4 hover:bg-gray-200 transition">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-2 -5 24 24" class="text-gray-600">
                        <path fill="#000" d="M2 0h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m0 2v10h16V2zm3 6h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2m10-5h2v2h-2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Total Terbitan Newsletter</h2>
                    <p class="text-xl font-bold text-gray-800">{{ $newsletterCount }}</p>
                </div>
            </div>

            <!-- Total Post Aktivitas Box -->
            <div class="bg-gray-100 p-6 rounded-lg flex items-center space-x-4 hover:bg-gray-200 transition">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-600">
                        <g fill="none" stroke="#000" stroke-width="1.5">
                            <path d="M2.906 17.505L5.337 3.718a2 2 0 0 1 2.317-1.623L19.472 4.18a2 2 0 0 1 1.622 2.317l-2.431 13.787a2 2 0 0 1-2.317 1.623L4.528 19.822a2 2 0 0 1-1.622-2.317Z" />
                            <path stroke-linecap="round" d="m8.929 6.382l7.879 1.389m-8.574 2.55l7.879 1.39M7.54 14.26l4.924.869" />
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Total Post Aktivitas</h2>
                    <p class="text-xl font-bold text-gray-800">{{ $aktivitasCount  }}</p>
                </div>
            </div>
        </div>

         <!-- Total Uang Donasi Box -->
         <div class="bg-green-100 p-6 md:p-10 rounded-lg mt-6 hover:bg-green-200 transition">
            <div class="flex flex-col md:flex-row items-center md:space-x-4">
                <div class="flex-shrink-0 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
                        <path fill="#000" d="M9 7a2 2 0 1 1-4 0a2 2 0 0 1 4 0M8 7a1 1 0 1 0-2 0a1 1 0 0 0 2 0M1 4.25C1 3.56 1.56 3 2.25 3h9.5c.69 0 1.25.56 1.25 1.25v5.5c0 .69-.56 1.25-1.25 1.25h-9.5C1.56 11 1 10.44 1 9.75zM2.25 4a.25.25 0 0 0-.25.25V5h.5a.5.5 0 0 0 .5-.5V4zM2 9.75c0 .138.112.25.25.25H3v-.5a.5.5 0 0 0-.5-.5H2zm2-.25v.5h6v-.5A1.5 1.5 0 0 1 11.5 8h.5V6h-.5A1.5 1.5 0 0 1 10 4.5V4H4v.5A1.5 1.5 0 0 1 2.5 6H2v2h.5A1.5 1.5 0 0 1 4 9.5m7 .5h.75a.25.25 0 0 0 .25-.25V9h-.5a.5.5 0 0 0-.5.5zm1-5v-.75a.25.25 0 0 0-.25-.25H11v.5a.5.5 0 0 0 .5.5zm-7.5 8a1.5 1.5 0 0 1-1.427-1.036Q3.281 12 3.5 12h8.25A2.25 2.25 0 0 0 14 9.75V5.085A1.5 1.5 0 0 1 15 6.5v3.25A3.25 3.25 0 0 1 11.75 13z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Total Uang Donasi</h2>
                    <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalDonasi, 2) }}</p>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-sm">
                    <h2 class="text-base font-semibold">Total Hari ini</h2>
                    <p class="text-xl font-bold text-gray-800">Rp {{ number_format($totalDonasiToday, 2) }}</p>
                </div>
                <div class="text-sm">
                    <h2 class="text-base font-semibold">Total Minggu ini</h2>
                    <p class="text-xl font-bold text-gray-800">Rp {{ number_format($totalDonasiThisWeek, 2) }}</p>
                </div>
                <div class="text-sm">
                    <h2 class="text-base font-semibold">Total Tahun ini</h2>
                    <p class="text-xl font-bold text-gray-800">Rp {{ number_format($totalDonasiThisYear, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
