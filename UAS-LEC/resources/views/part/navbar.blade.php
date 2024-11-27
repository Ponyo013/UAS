<div class="font-sans antialiased" style="background-color: #AF1740;">
    <nav class="flex items-center justify-between py-5 px-16">
        <!-- Hamburger Button -->
        <div class="flex md:hidden pr-6">
            <button id="hamburgerButton" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-6 h-6">
                    <path fill="none" stroke="currentColor" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Logo Section -->
        <a href="/" class="flex items-center space-x-3 px-auto rtl:space-x-reverse">
            <img src="{{ asset('images/tm-logo.png') }}" alt="Tunas Mahardika Logo" class="h-10">
            <span class="self-center text-2xl sm:text-xl md:text-lg font-bold whitespace-nowrap dark:text-dark">Tunas Mahardika</span>
        </a>

        <!-- Navbar Links -->
        <div class="hidden md:flex space-x-8 mx-auto pl-8">
            <a href="{{ url('#home') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Beranda</a>
            <a href="{{ url('#aboutus') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Tentang Kami</a>
            <a href="{{ url('#visimisi') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Visi dan Misi</a>
            <a href="{{ url('#program') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Program Jangka Panjang</a>
            <a href="{{ url('#newsletter') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Newsletter</a>
            <a href="{{ url('#aktivitas') }}" class="text-white hover:text-white/70 text-base sm:text-sm md:text-base">Aktivitas Terakhir</a>
        </div>

        <!-- Authentication Section -->
        <div class="ml-auto relative">
            @if (Route::has('login'))
            @auth
            <!-- Form for logged-in users -->
            <div class="relative">
                <button
                    class="flex items-center space-x-2 text-white dark:text-white focus:outline-none"
                    id="dropdownUserButton"
                    data-dropdown-toggle="dropdownUserMenu">
                    <span class="text-white dark:text-white mr-4 text-base sm:text-sm md:text-base">Hello, {{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-4 h-4">
                        <path fill="none" stroke="currentColor" stroke-width="2" d="M6 9l6 6 6-6"></path>
                    </svg>
                </button>
                <div id="dropdownUserMenu" class="absolute right-0 mt-4 w-52 bg-white shadow-md ring-1 ring-[#AF1740] ring-opacity-5 dark:bg-[#AF1740] dark:ring-[#AF1740] dark:ring-opacity-50 hidden z-50">
                    <hr>
                    <div class="py-1">
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button
                            type="submit"
                            class="block w-full px-4 py-2 text-white hover:text-white/70 dark:text-white dark:hover:text-white/80">
                                Logout
                            </button>
                        </form>
                    </div>
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

<!-- Mobile Navbar Links (Initially Hidden) -->
<div id="mobileMenu" class="md:hidden bg-[#AF1740] text-white flex flex-col space-y-4 py-4 px-6 hidden">
    <a href="{{ url('#home') }}" class="hover:text-white/70">Home</a>
    <a href="{{ url('#aboutus') }}" class="hover:text-white/70">Tenatang Kami</a>
    <a href="{{ url('#visimisi') }}" class="hover:text-white/70">Visi dan Misi</a>
    <a href="{{ url('#program') }}" class="hover:text-white/70">Program Jangka Panjang</a>
    <a href="{{ url('#newsletter') }}" class="hover:text-white/70">Newsletter</a>
    <a href="{{ url('#aktivitas') }}" class="hover:text-white/70">Aktivitas Terakhir</a>
</div>

<!-- Styling for Dropdown -->
<style>
    #dropdownUserMenu hr {
        border: 0;
        height: 2px;
        background-color: #fff;
    }

    #dropdownUserMenu hr {
    border: 0;
    height: 2px;
    background-color: #fff;
}

nav {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
    background-color: #AF1740;
}

nav.hidden {
    top: -100px;
}
</style>

<script>
    // Script for Dropdown Menu (Logout)
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownUserButton");
        const dropdownMenu = document.getElementById("dropdownUserMenu");

        function toggleDropdown() {
            dropdownMenu.classList.toggle("hidden");
        }

        dropdownButton.addEventListener("click", toggleDropdown);

        document.addEventListener("click", function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>

<script>
    // Script for Hamburger Menu
    document.addEventListener("DOMContentLoaded", function() {
        const hamburgerButton = document.getElementById("hamburgerButton");
        const mobileMenu = document.getElementById("mobileMenu");

        if (hamburgerButton && mobileMenu) {
            hamburgerButton.addEventListener("click", function() {
                mobileMenu.classList.toggle("hidden");
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let lastScrollTop = 0; // Initial scroll position
        const navbar = document.querySelector('nav'); // Select the navbar

        // Listen for scroll event
        window.addEventListener('scroll', function () {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop; // Get current scroll position

            // Check if scrolling down
            if (currentScroll > lastScrollTop) {
                // Scrolling Down: Hide the navbar
                navbar.classList.add('hidden');
            } else {
                // Scrolling Up: Show the navbar
                navbar.classList.remove('hidden');
            }

            // Update the last scroll position
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });
    });
</script>

