<x-guest-layout>
    <div class="max-w-md mx-auto p-6 rounded-lg md:max-w-lg lg:max-w-xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">{{ __('Forgot Password') }}</h2>
        <p class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Beritahu kami alamat email Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi sehingga Anda dapat memilih yang baru.') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input 
                    id="email" 
                    class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    placeholder="Enter your email" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between items-center mt-4 space-y-4 sm:space-y-0">
                <a href="{{ route('login') }}" 
                   class="text-sm text-indigo-600 hover:text-indigo-800 focus:outline-none focus:underline">
                    {{ __('Back to Login') }}
                </a>

                <x-primary-button 
                    class="px-6 py-2 w-full sm:w-auto text-white rounded-md hover:bg-red-800 focus:ring focus:ring-red-300" 
                    style="background-color: #AF1740;">
                    {{ __('Send Email') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
