<div class="font-sans antialiased min-w-screen" style="background-color: #AF1740;">
    <nav class="flex items-center justify-between py-5 px-4 bg-[#AF1740] fixed top-0 z-10 w-full">
        <!-- Hamburger Button -->
        <div class="flex xl:hidden pr-6">
            <button id="hamburgerButton" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-6 h-6">
                    <path fill="none" stroke="currentColor" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Navbar Links (Initially Hidden) -->
        <div id="mobileMenu" class="xl:hidden bg-[#AF1740] text-white flex flex-col space-y-4 py-3 px-6 min-w-screen">
            <hr>
            <a href="{{ url('#home') }}" class="py-1 hover:text-white/70">Beranda</a>
            <a href="{{ url('#aboutus') }}" class="py-1 hover:text-white/70">Tentang Kami</a>
            <a href="{{ url('#kalender') }}" class="py-1 hover:text-white/70">Kalender</a>
            <a href="{{ url('#newsletter') }}" class="py-1 hover:text-white/70">Newsletter</a>
            <a href="{{ url('#aktivitas') }}" class="py-1 hover:text-white/70">Aktivitas Terakhir</a>
        </div>
        <!-- Logo Section -->
        <a href="/" class="flex md:items-center space-y-2 flex-col space-x-0 md:flex-row md:space-x-3 md:space-y-0 md:rtl:space-x-reverse">
            <img src="{{ asset('images/tm-logo.png') }}" alt="Tunas Mahardika Logo" class="h-10 w-10">
            <span class="self-center text-2xl sm:text-xl md:text-lg font-bold whitespace-nowrap dark:text-dark">Tunas Mahardika</span>
        </a>

        <!-- Navbar Links -->
        <div class="hidden xl:flex space-x-8 mx-auto pl-24">
            <a href="{{ url('#home') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Beranda</a>
            <a href="{{ url('#aboutus') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Tentang Kami</a>
            <a href="{{ url('#kalendar') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Kalendar</a>
            <a href="{{ url('#newsletter') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Newsletter</a>
            <a href="{{ url('#aktivitas') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Aktivitas Terakhir</a>
        </div>

        <!-- Authentication Section -->
        <div class="ml-auto relative">
            @if (Route::has('login'))
            @auth
            <!-- Form for logged-in users -->
            <button
                class="flex items-center space-x-2 text-white focus:outline-none"
                id="dropdownUserButton"
                aria-expanded="false" data-dropdown-toggle="dropdownUserMenu">
                <span class="text-white mr-4 text-base sm:text-sm md:text-base">Hello, {{ Auth::user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-4 h-4">
                    <path fill="none" stroke="currentColor" stroke-width="2" d="M6 9l6 6 6-6"></path>
                </svg>
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownUserMenu" class="absolute right-0 mt-2 w-52 bg-white shadow-md rounded-b-lg ring-1 ring-[#AF1740] ring-opacity-5 dark:bg-[#AF1740] dark:ring-[#AF1740] dark:ring-opacity-50 hidden z-50">
                <hr>
                <div class="py-1">
                    @if(Auth::user()->role == 1)
                        <!-- Admin Link -->
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                            Admin Dashboard
                        </a>
                    @endif
                    <button
                        type="submit"
                        class="block w-full text-sm px-4 py-2 text-black text-left dark:text-white hover:bg-[#740938] dark:hover:bg-[#740938] focus:outline-none focus:ring-2 focus:ring-[#AF1740]">
                        My Account
                    </button>
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button
                            type="submit"
                            class="block w-full text-sm px-4 py-2 text-black text-left dark:text-white hover:bg-[#740938] dark:hover:bg-[#740938] focus:outline-none focus:ring-2 focus:ring-[#AF1740]">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            @else
            <!-- Login Section -->
            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] text-base sm:text-sm md:text-base">
                Log in
            </a>
            @if (Route::has('register'))
            <a
                href="{{ route('register') }} "
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] text-base sm:text-sm md:text-base">
                Register
            </a>
            @endif
            @endauth
            @endif
        </div>
    </nav>

</div>



<!-- Styling for Dropdown and navbar -->
<style>
    #dropdownUserMenu hr {
        border: 0;
        height: 2px;
        background-color: #ffff;
    }
    
    #hamburgerButton hr {
        border: 0;
        height: 4px;
        background-color: #ffff;
    }

    #mobileMenu{
        position: absolute;
        top: 100%; /* This ensures it appears below the navbar */
        left: 0;
        right: 0;
        width: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 50; /* Ensure it's in front of other elements */
    }
</style>

<!-- dropdown -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Script for Dropdown Menu (Logout)
        const dropdownButton = document.getElementById("dropdownUserButton");
        const dropdownMenu = document.getElementById("dropdownUserMenu");

        function toggleDropdown() {
            dropdownMenu.classList.toggle("hidden");
        }

        dropdownButton.addEventListener("click", toggleDropdown);

        document.addEventListener("click", function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });

        // Script for Hamburger Menu
        const hamburgerButton = document.getElementById("hamburgerButton");
        const mobileMenu = document.getElementById("mobileMenu");

        if (hamburgerButton && mobileMenu) {
            hamburgerButton.addEventListener("click", function () {
                mobileMenu.classList.toggle("hidden");
            });
        }

        // Navbar scroll behavior to hide dropdown when scrolling up
        const navbar = document.querySelector("nav");
        let lastScrollTop = 0;

        window.addEventListener("scroll", function () {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            // Check if user is scrolling down or up
            if (currentScroll > lastScrollTop) {
                // Scrolling down
                navbar.classList.add("hidden");

                // Hide dropdown if open when scrolling down
                dropdownMenu.classList.add("hidden");
                mobileMenu.classList.add("hidden");
            } else {
                // Scrolling up
                navbar.classList.remove("hidden");

                // If the dropdown is open, hide it when scrolling up
                dropdownMenu.classList.add("hidden");
                mobileMenu.classList.add("hidden");
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative values
        });
    });
</script>


<!-- navbar scroll hidden -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector("nav");
    let lastScrollTop = 0;

    window.addEventListener("scroll", function () {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        // Check if user is scrolling down or up
        if (currentScroll > lastScrollTop) {
            // Scrolling down
            navbar.classList.add("hidden");
        } else {
            // Scrolling up
            navbar.classList.remove("hidden");
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative values
        });
    });

</script>
