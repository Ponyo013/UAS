<!-- contoh buat login nanti burger menu -->
<nav id="sidebar">
    <ul>
      <li>
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('images/tm-logo.png') }}" alt="Tunas Mahardika Logo" style="width: 50px; height: 50px;">
        </a>
        <button onclick="toggleSidebar()" id="toggle-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
            <path d="m313-480 155 156q11 11 11.5 27.5T468-268q-11 11-28 11t-28-11L228-452q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l184-184q11-11 27.5-11.5T468-692q11 11 11 28t-11 28L313-480Zm264 0 155 156q11 11 11.5 27.5T732-268q-11 11-28 11t-28-11L492-452q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l184-184q11-11 27.5-11.5T732-692q11 11 11 28t-11 28L577-480Z"/>
          </svg>
        </button>
      </li>
      <li>
        <a href="" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="white" d="M10 4a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4m0 2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2m7 6q-.24 0-.24.24l-.26 1.26c-.22.18-.54.34-.78.5l-1.28-.5c-.08 0-.24 0-.32.1l-.96 1.76c-.08.08-.08.24.08.32l1.04.82v1l-1.04.82c-.08.08-.16.24-.08.32l.96 1.76c.08.1.24.1.32.1l1.28-.5c.24.16.56.32.78.5l.26 1.26q0 .24.24.24h2c.08 0 .24-.08.24-.24l.16-1.26c.32-.18.64-.34.88-.5l1.22.5c.14 0 .3 0 .3-.1l1.04-1.76c.08-.08 0-.24-.08-.32l-1.04-.82v-1l1.04-.82c.08-.08.16-.24.08-.32L21.8 13.6c0-.1-.16-.1-.3-.1l-1.22.5c-.24-.16-.56-.32-.88-.5l-.16-1.26c0-.16-.16-.24-.24-.24zm-7 1c-2.67 0-8 1.33-8 4v3h9.67c-.28-.59-.48-1.23-.58-1.9H3.9V17c0-.64 3.13-2.1 6.1-2.1c.43 0 .87.04 1.3.1c.2-.64.47-1.24.82-1.79c-.78-.13-1.52-.21-2.12-.21m8.04 2.5c.8 0 1.46.66 1.46 1.54c0 .8-.66 1.46-1.46 1.46c-.88 0-1.54-.66-1.54-1.46c0-.88.66-1.54 1.54-1.54"/>
          </svg>
          <span class="text-white">Manage Account</span>
        </a>
      </li>
      <li>
        <button onclick="toggleSubMenu(this)" class="dropdown-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h207q16 0 30.5 6t25.5 17l57 57h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Zm400-160v40q0 17 11.5 28.5T600-320q17 0 28.5-11.5T640-360v-40h40q17 0 28.5-11.5T720-440q0-17-11.5-28.5T680-480h-40v-40q0-17-11.5-28.5T600-560q-17 0-28.5 11.5T560-520v40h-40q-17 0-28.5 11.5T480-440q0 17 11.5 28.5T520-400h40Z"/>
          </svg>
          <span>Manage Content</span>
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
            <path d="M480-361q-8 0-15-2.5t-13-8.5L268-556q-11-11-11-28t11-28q11-11 28-11t28 11l156 156 156-156q11-11 28-11t28 11q11 11 11 28t-11 28L508-372q-6 6-13 8.5t-15 2.5Z"/>
          </svg>
        </button>
        <ul class="sub-menu">
          <div>
            <li><a href="#">About Us</a></li>
            <li><a href="{{ Route('show.newsletter') }}">Newsletter</a></li>
            <li><a href="#">Galeri Foto</a></li>
            <li><a href="#">Kalender</a></li>
          </div>
        </ul>
      </li>
      <li>
        <a href="" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="white" d="M16 2c-2.76 0-5 2.24-5 5s2.24 5 5 5s5-2.24 5-5s-2.24-5-5-5m0 8c-1.66 0-3-1.34-3-3s1.34-3 3-3s3 1.34 3 3s-1.34 3-3 3m3 6h-2c0-1.2-.75-2.28-1.87-2.7L8.97 11H1v11h6v-1.44l7 1.94l8-2.5v-1c0-1.66-1.34-3-3-3M5 20H3v-7h2zm8.97.41L7 18.5V13h1.61l5.82 2.17c.34.13.57.46.57.83c0 0-2-.05-2.3-.15l-2.38-.79l-.63 1.9l2.38.79c.51.17 1.04.25 1.58.25H19c.39 0 .74.24.9.57z"/>
          </svg>
          <span class="text-white">List Donasi</span>
        </a>
      </li>
      <li>
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/>
          </svg>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="{{ Route('welcome') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
            <g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round">
              <path d="M7 13.5a6.5 6.5 0 1 0 0-13a6.5 6.5 0 0 0 0 13M.5 7h13" />
              <path d="M9.5 7A11.22 11.22 0 0 1 7 13.5A11.22 11.22 0 0 1 4.5 7A11.22 11.22 0 0 1 7 .5A11.22 11.22 0 0 1 9.5 7" />
            </g>
          </svg>
          <span>Return to Web page</span>
        </a>
      </li>
      <li class="logout-item">
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <a href="#" onclick="this.closest('form').submit();" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mr-2">
                        <path fill="white" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/>
                    </svg>
                    <span>Log Out</span>
                </a>
            </form>
       </li>
    </ul>
</nav>
<script>
    const toggleButton = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');

    function toggleSidebar() {
      sidebar.classList.toggle('close');
      toggleButton.classList.toggle('rotate');
      closeAllSubMenus();
    }

    function toggleSubMenu(button) {
      if (!button.nextElementSibling.classList.contains('show')) {
        closeAllSubMenus();
      }

      button.nextElementSibling.classList.toggle('show');
      button.classList.toggle('rotate');

      if (sidebar.classList.contains('close')) {
        sidebar.classList.toggle('close');
        toggleButton.classList.toggle('rotate');
      }
    }

    function closeAllSubMenus() {
      Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
        ul.classList.remove('show');
        ul.previousElementSibling.classList.remove('rotate');
      });
    }
  </script>