<x-guest-layout>
    <div class="max-w-md mx-auto p-6 rounded-lg md:max-w-lg lg:max-w-xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">{{ __('Email Verification') }}</h2>
        <p class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col sm:flex-row sm:justify-between items-center space-y-4 sm:space-y-0">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                @csrf

                <x-primary-button 
                    class="px-6 py-2 w-full sm:w-auto text-white rounded-md hover:bg-red-800 focus:ring focus:ring-red-300" 
                    style="background-color: #AF1740;">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                @csrf

                <button type="submit" 
                        class="w-full sm:w-auto px-4 py-2 text-sm text-gray-600 underline hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
