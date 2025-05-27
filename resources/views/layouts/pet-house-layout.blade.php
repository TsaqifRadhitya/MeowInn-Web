@props(['header', 'activeMenu'])

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        const handleOpen = () => {
            $('#default-sidebar').removeClass('-translate-x-full');
            $('#sidebar-overlay').removeClass('hidden');
        }

        const handleClose = () => {
            $('#default-sidebar').addClass('-translate-x-full');
            $('#sidebar-overlay').addClass('hidden');
        }

        const handleOpenAndClose = (selectorDropDown, iconDropDown, buttonDropDown) => {
            const state = $(selectorDropDown).hasClass('hidden');
            if (state) {
                $(selectorDropDown).removeClass('hidden');
                $(iconDropDown).removeClass('rotate-90');
                $(buttonDropDown).addClass('rounded-tl-lg');
                $(buttonDropDown).removeClass('rounded-l-full');
            } else {
                $(selectorDropDown).addClass('hidden');
                $(iconDropDown).addClass('rotate-90');
                $(buttonDropDown).addClass('rounded-l-full');
                $(buttonDropDown).removeClass('rounded-tl-lg');
            }
        }
    </script>
</head>

<div class="min-h-screen bg-gray-50">
    <!-- Mobile overlay -->
    <div id="sidebar-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 sm:hidden" onclick="handleClose()">
    </div>

    <!-- Sidebar -->
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-4 py-6 overflow-y-auto bg-gradient-to-b from-[#F69246] to-[#EC7070] shadow-lg">
            <ul class="space-y-2">
                <!-- Logo/Brand -->
                <li class="flex items-center justify-between mb-8">
                    <span class="text-2xl font-bold text-white sm:hidden">MeowInn</span>
                    <div onclick="document.location.href = '/'"
                        class="hidden sm:flex items-center justify-center space-x-3 bg-white p-3 rounded-xl shadow-md cursor-pointer hover:shadow-lg transition-all">
                        <img src="{{ asset('asset/icon.png') }}" class="h-8 w-auto" alt="MeowInn Logo">
                        <h1
                            class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#F69246] to-[#EC7070]">
                            MeowInn</h1>
                    </div>
                    <button onclick="handleClose()" class="text-white text-xl font-bold sm:hidden">✕</button>
                </li>

                <!-- Dashboard -->
                <li class="group">
                    <a href="{{ route('pethouse.dashboard') }}"
                        class="flex items-center p-3 rounded-lg transition-all duration-200
                               {{ $activeMenu == 'Dashboard'
                                   ? 'bg-white text-[#F69246] shadow-md'
                                   : 'text-white hover:bg-white hover:bg-opacity-20 hover:shadow-sm group-hover:text-[#F69246]' }}">
                        <svg class="w-6 h-6 {{ $activeMenu == 'Dashboard' ? 'text-[#F69246]' : 'text-white group-hover:text-[#F69246]' }}"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="ml-3 font-semibold">Dashboard</span>
                        @if ($activeMenu == 'Dashboard')
                            <span class="ml-auto w-2 h-2 bg-[#F69246] rounded-full"></span>
                        @endif
                    </a>
                </li>

                <!-- Pet House -->
                <li>
                    <button type="button"
                        onclick="handleOpenAndClose('#dropdown-Pet-House','#icon-dropdown-Pet-House','#button-dropdown-Pet-House')"
                        id="button-dropdown-Pet-House"
                        class="flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200
                               {{ $activeMenu == 'Pet House'
                                   ? 'bg-white text-[#F69246] shadow-md rounded-tl-lg'
                                   : 'text-white hover:bg-white hover:bg-opacity-20 hover:shadow-sm rounded-l-full hover:text-[#F69246]' }}">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 {{ $activeMenu == 'Pet House' ? 'text-[#F69246]' : 'text-white hover:text-[#F69246]' }}"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                            </svg>
                            <span class="ml-3 font-semibold">Pet House</span>
                        </div>
                        <svg id="icon-dropdown-Pet-House"
                            class="w-4 h-4 transition-transform duration-200 {{ $activeMenu == 'Pet House' ? '' : 'rotate-90' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="dropdown-Pet-House"
                        class="{{ $activeMenu == 'Pet House' ? 'block' : 'hidden' }} py-2 space-y-1 ml-4 pl-4 border-l-2 border-white border-opacity-20">
                        <li>
                            <a href="{{ route('pethouse.managepethouse.preview.index') }}"
                                class="flex items-center p-2 text-white hover:text-[#F69246] rounded-lg transition-all hover:bg-white hover:bg-opacity-10">
                                <span
                                    class="w-2 h-2 bg-white rounded-full mr-2 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Preview
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pethouse.managepethouse.setting.index') }}"
                                class="flex items-center p-2 text-white hover:text-[#F69246] rounded-lg transition-all hover:bg-white hover:bg-opacity-10">
                                <span
                                    class="w-2 h-2 bg-white rounded-full mr-2 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Setting
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Penitipan -->
                <li>
                    <button type="button"
                        onclick="handleOpenAndClose('#dropdown-Layanan','#icon-dropdown-Layanan','#button-dropdown-Layanan')"
                        id="button-dropdown-Layanan"
                        class="flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200
                               {{ $activeMenu == 'Penitipan'
                                   ? 'bg-white text-[#F69246] shadow-md rounded-tl-lg'
                                   : 'text-white hover:bg-white hover:bg-opacity-20 hover:shadow-sm rounded-l-full hover:text-[#F69246]' }}">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 {{ $activeMenu == 'Penitipan' ? 'text-[#F69246]' : 'text-white hover:text-[#F69246]' }}"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="ml-3 font-semibold">Penitipan</span>
                        </div>
                        <svg id="icon-dropdown-Layanan"
                            class="w-4 h-4 transition-transform duration-200 {{ $activeMenu == 'Penitipan' ? '' : 'rotate-90' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="dropdown-Layanan"
                        class="{{ $activeMenu == 'Penitipan' ? 'block' : 'hidden' }} py-2 space-y-1 ml-4 pl-4 border-l-2 border-white border-opacity-20">
                        <li>
                            <a href="{{ route('pethouse.penitipan.daftarpenitipan.index') }}"
                                class="flex items-center p-2 text-white hover:text-[#F69246] rounded-lg transition-all hover:bg-white hover:bg-opacity-10">
                                <span
                                    class="w-2 h-2 bg-white rounded-full mr-2 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Sedang Berlangsung
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pethouse.penitipan.riwayatpenitipan.index') }}"
                                class="flex items-center p-2 text-white hover:text-[#F69246] rounded-lg transition-all hover:bg-white hover:bg-opacity-10">
                                <span
                                    class="w-2 h-2 bg-white rounded-full mr-2 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Riwayat
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Reports -->
                <li class="group">
                    <a href="{{ route('pethouse.reports.index') }}"
                        class="flex items-center p-3 rounded-lg transition-all duration-200
                               {{ $activeMenu == 'Reports'
                                   ? 'bg-white text-[#F69246] shadow-md'
                                   : 'text-white hover:bg-white hover:bg-opacity-20 hover:shadow-sm group-hover:text-[#F69246]' }}">
                        <svg class="w-6 h-6 {{ $activeMenu == 'Reports' ? 'text-[#F69246]' : 'text-white group-hover:text-[#F69246]' }}"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z" />
                        </svg>
                        <span class="ml-3 font-semibold">Reports</span>
                        @if ($activeMenu == 'Reports')
                            <span class="ml-auto w-2 h-2 bg-[#F69246] rounded-full"></span>
                        @endif
                    </a>
                </li>

                <!-- Profile -->
                <li class="pt-4 mt-4 border-t border-white border-opacity-20">
                    <button type="button"
                        onclick="handleOpenAndClose('#dropdown-Profile','#icon-dropdown-Profile','#button-dropdown-Profile')"
                        id="button-dropdown-Profile"
                        class="flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200
                               {{ $activeMenu == 'Profile'
                                   ? 'bg-white text-[#F69246] shadow-md rounded-tl-lg'
                                   : 'text-white hover:bg-white hover:bg-opacity-20 hover:shadow-sm rounded-l-full hover:text-[#F69246]' }}">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 {{ $activeMenu == 'Profile' ? 'text-[#F69246]' : 'text-white hover:text-[#F69246]' }}"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                                <path
                                    d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="ml-3 font-semibold">Profile</span>
                        </div>
                        <svg id="icon-dropdown-Profile"
                            class="w-4 h-4 transition-transform duration-200 {{ $activeMenu == 'Profile' ? '' : 'rotate-90' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="dropdown-Profile"
                        class="{{ $activeMenu == 'Profile' ? 'block' : 'hidden' }} py-2 space-y-1 ml-4 pl-4 border-l-2 border-white border-opacity-20">
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-white hover:text-[#F69246] rounded-lg transition-all hover:bg-white hover:bg-opacity-10">
                                <span
                                    class="w-2 h-2 bg-white rounded-full mr-2 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Profile Information
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit"
                                    class="w-full flex items-center p-2 text-white hover:text-[#F69246] rounded-lg transition-all hover:bg-white hover:bg-opacity-10">
                                    <span
                                        class="w-2 h-2 bg-white rounded-full mr-2 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main content -->
    <div class="sm:ml-64 min-h-screen relative">
        <!-- Mobile header -->
        <div
            class="sticky top-0 z-30 bg-gradient-to-r from-[#F69246] to-[#EB6F6F] shadow-md p-4 sm:hidden flex items-center">
            <button onclick="handleOpen()" type="button"
                class="text-white hover:bg-white hover:bg-opacity-20 p-1 rounded-lg transition-all">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <h1 class="text-white font-semibold text-lg ml-3">{{ $header }}</h1>
        </div>

        <!-- Desktop header -->
        <div class="sticky top-0 z-40 bg-gradient-to-r from-[#F69246] to-[#EB6F6F] p-4 hidden sm:block shadow-md">
            <div class="flex justify-between items-center">
                <h1 class="text-white font-semibold text-xl">{{ $header }}</h1>
                <div class="flex items-center space-x-4">
                    <!-- User profile dropdown -->
                    <div class="relative">
                        <button
                            onclick="handleOpenAndClose('#user-dropdown','#user-dropdown-icon','#user-dropdown-button')"
                            id="user-dropdown-button" class="flex items-center space-x-2 focus:outline-none">
                            <div
                                class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#F69246] font-bold  cursor-pointer">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <svg id="user-dropdown-icon" class="w-4 h-4 text-white  cursor-pointer" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="user-dropdown"
                            class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                                Profile</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content area -->
        <div {{ $attributes->merge(['class' => 'bg-white min-h-[calc(100vh-60px)]']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
