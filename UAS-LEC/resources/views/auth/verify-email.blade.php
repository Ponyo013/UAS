<x-guest-layout>
    <div class="max-w-md mx-auto p-6 rounded-lg md:max-w-lg lg:max-w-xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">{{ __('Verifikasi Akun') }}</h2>
        <p class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Akun anda akan diverifikasi oleh pengurus dari pihak Yayasan Tunas Mahardika dalam kurun waktu 2x24 jam, silahkan ditunggu.') }}
        </p>

        <div class="mt-8 flex flex-col items-center space-y-4 sm:space-y-0">
            <form method="GET" action="{{ route('login') }}" class="w-full sm:w-auto">
                @csrf

                <x-primary-button 
                    class="px-6 py-2 w-full sm:w-auto text-white rounded-md hover:bg-red-800 focus:ring focus:ring-red-300" 
                    style="background-color: #AF1740;">
                    {{ __('Masuk ke Halaman Utama') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
