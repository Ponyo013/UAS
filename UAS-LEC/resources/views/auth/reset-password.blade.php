<x-guest-layout>
    <div class="max-w-md mx-auto p-6 rounded-lg md:max-w-lg lg:max-w-xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">{{ __('Reset Password') }}</h2>
        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input 
                    id="email" 
                    class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                    type="email" 
                    name="email" 
                    :value="old('email', $request->email)" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="Enter your email" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Enter your new password" 
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input 
                    id="password_confirmation" 
                    class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Confirm your new password" 
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between items-center mt-4 space-y-4 sm:space-y-0">
                <a href="{{ route('login') }}" 
                   class="text-sm text-indigo-600 hover:text-indigo-800 focus:outline-none focus:underline">
                    {{ __('Back to Login') }}
                </a>

                <x-primary-button 
                    class="px-6 py-2 w-full sm:w-auto text-white rounded-md hover:bg-red-800 focus:ring focus:ring-red-300" 
                    style="background-color: #AF1740;">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
