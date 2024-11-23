<div class="font-sans antialiased" style="background-color: #AF1740;">
    <nav class="flex items-center gap-5 py-5 mx-36">
        <a href="" class="flex items-center space-x-3 px-auto rtl:space-x-reverse">
            <img src="{{ asset('images/tm-logo.png') }}" alt="Tunas Mahardika Logo" class="h-10">
            <span class="self-center text-2xl font-bold whitespace-nowrap dark:text-dark">Tunas Mahardika</span>
        </a>
        <div class="ml-auto relative">
            @if (Route::has('login'))
                @auth
                    <div class="relative">
                        <button 
                            class="flex items-center space-x-2 text-white dark:text-white focus:outline-none"
                            id="dropdownUserButton" 
                            data-dropdown-toggle="dropdownUserMenu"
                        >
                            <span class="text-white dark:text-white mr-4">Hello, {{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-4 h-4">
                                <path fill="none" stroke="currentColor" stroke-width="2" d="M6 9l6 6 6-6"></path>
                            </svg>
                        </button>
                        <div id="dropdownUserMenu" class="absolute right-0 mt-4 w-52 bg-white shadow-md rounded-md ring-1 ring-[#AF1740] ring-opacity-5 dark:bg-[#AF1740] dark:ring-[#AF1740] dark:ring-opacity-50 hidden z-50">
                            <div class="py-1">
                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="block w-full px-4 py-2 text-white  hover:text-white/70 dark:text-white dark:hover:text-white/80"
                                    >
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
</div>
