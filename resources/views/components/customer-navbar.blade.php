<nav class="w-full bg-[#FF7B54] sticky top-0 left-0 z-[999] h-[60px] flex items-center justify-between px-4 md:px-8 shadow"
    style="min-height:60px;">
    <!-- Logo -->
    <div class="flex items-center h-full">
        <span class="font-bold text-white text-lg">Meowinn</span>
    </div>

    <!-- Mobile Menu Button (Hamburger) -->
    <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Desktop Navigation -->
    <div class="hidden md:flex items-center h-full flex-1 justify-end">
        <div class="flex-1"></div>
        <ul class="flex items-center h-full gap-1 md:gap-2 font-semibold">
            <li class="flex items-center h-full">
                <a href="{{ route('dashboard') }}"
                    class="@if (request()->routeIs('dashboard')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                    style="height:40px;display:flex;align-items:center;">
                    Home
                </a>
            </li>
            <li class="flex items-center h-full">
                <a href="{{ route('customer.pethouse.index') }}" id="cari-pethouse-link"
                    class="@if (request()->routeIs('customer.pethouse.index')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                    style="height:40px;display:flex;align-items:center;">
                    Cari Pethouse
                </a>
            </li>
            @auth
                <li class="flex items-center h-full">
                    <a href="{{ route('customer.penitipan.index') }}" id="riwayat-penitipan-link"
                        class="@if (request()->routeIs('customer.penitipan.index')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                        style="height:40px;display:flex;align-items:center;">
                        Riwayat
                    </a>
                </li>
                <li class="flex items-center h-full">
                    <button onclick="document.getElementById('dashboard-feedback-modal').classList.remove('hidden')"
                        class="text-white hover:text-[#FF8855] hover:bg-white px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                        style="height:40px;display:flex;align-items:center;">
                        Feedback
                    </button>
                </li>
            @endauth
        </ul>
        <div class="flex items-center gap-2 text-white ml-2 h-full">
            @auth
                <!-- Profile for logged in users -->
                <a href="{{ route('customer.profile.index') }}" class="focus:outline-none">
                    <span
                        class="bg-white rounded-full flex items-center justify-center w-9 h-9 overflow-hidden border-2 border-[#FF8855] shadow">
                        <img src="{{ Auth::user()->profilePicture ??
                            'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=fff&color=FF8855' }}"
                            alt="Foto Profil" class="object-cover w-full h-full">
                    </span>
                </a>
                <span class="font-bold hidden md:inline">{{ Auth::user()->name }}</span>
            @else
                <!-- Login/Register buttons for guests -->
                <a href="{{ route('login') }}"
                    class="text-white hover:bg-white hover:text-[#FF8855] px-3 md:px-4 py-1.5 rounded-full transition font-bold flex items-center h-full"
                    style="height:40px;display:flex;align-items:center;">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="bg-white text-[#FF8855] px-3 md:px-4 py-1.5 rounded-full transition font-bold flex items-center h-full"
                    style="height:40px;display:flex;align-items:center;">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<!-- Mobile Menu (Hidden by default) -->
<div id="mobile-menu" class="hidden md:hidden bg-[#FF7B54] w-full px-4 py-2 absolute shadow-lg">
    <ul class="flex flex-col gap-2 font-semibold">
        <li>
            <a href="{{ route('dashboard') }}"
                class="@if (request()->routeIs('dashboard')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif block px-4 py-2 rounded-full transition font-bold">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('customer.pethouse.index') }}" id="mobile-cari-pethouse-link"
                class="text-white hover:bg-white hover:text-[#FF8855] block px-4 py-2 rounded-full transition font-bold">
                Cari Pethouse
            </a>
        </li>
        @auth
            <li>
                <a href="{{ route('customer.penitipan.index') }}" id="mobile-riwayat-penitipan-link"
                    class="text-white hover:bg-white hover:text-[#FF8855] block px-4 py-2 rounded-full transition font-bold">
                    Riwayat Penitipan
                </a>
            </li>
            <li>
                <button onclick="document.getElementById('dashboard-feedback-modal').classList.remove('hidden')"
                    class="text-white hover:bg-white hover:text-[#FF8855] w-full text-left px-4 py-2 rounded-full transition font-bold">
                    Feedback
                </button>
            </li>
            <li class="pt-2 border-t border-white/20">
                <a href="{{ route('customer.profile.index') }}" class="flex items-center gap-2 text-white px-4 py-2">
                    <span
                        class="bg-white rounded-full flex items-center justify-center w-8 h-8 overflow-hidden border-2 border-[#FF8855] shadow">
                        <img src="{{ Auth::user()->profilePicture ??
                            'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=fff&color=FF8855' }}"
                            alt="Foto Profil" class="object-cover w-full h-full">
                    </span>
                    <span class="font-bold">{{ Auth::user()->name }}</span>
                </a>
            </li>
        @else
            <li class="pt-2 border-t border-white/20">
                <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 text-white px-4 py-2">
                    <span class="font-bold">Login</span>
                </a>
            </li>
            <li>
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center gap-2 bg-white text-[#FF8855] px-4 py-2 rounded-full">
                    <span class="font-bold">Register</span>
                </a>
            </li>
        @endauth
    </ul>
</div>
