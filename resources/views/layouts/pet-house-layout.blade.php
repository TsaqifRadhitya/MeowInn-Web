@props(['header', 'activeMenu'])

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        const handleOpen = () => {
            $('#default-sidebar').removeClass('-translate-x-full');
        }

        const handleClose = () => {
            $('#default-sidebar').addClass('-translate-x-full');
        }

        const handleOpenAndClose = (selectorDropDown, iconDropDown, buttonDropDown) => {
            console.log(buttonDropDown)
            const state = $(selectorDropDown).hasClass('hidden')
            if (state) {
                $(selectorDropDown).removeClass('hidden');
                $(iconDropDown).removeClass('rotate-90');
                $(buttonDropDown).addClass('rounded-tl-box');
                $(buttonDropDown).removeClass('rounded-l-full');

            } else {
                $(selectorDropDown).addClass('hidden');
                $(iconDropDown).addClass('rotate-90');
                $(buttonDropDown).addClass('rounded-l-full');
                $(buttonDropDown).removeClass('rounded-tl-box');
            }
        }
    </script>
</head>
<div class="min-h-screen">
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-linear-210 from-[#F69246] to-[#EC7070] shadow-sm">
            <ul class="font-medium space-y-8">
                <li class="flex flex-row items-center justify-between">
                    <span class="text-2xl sm:hidden">MeowInn</span>
                    <div onclick="document.location.href = '/'"
                        class="hidden hover:cursor-pointer sm:flex bg-white drop-shadow-xl w-full rounded-xl py-5 sm:flex-row items-center justify-between px-4">
                        <img src="{{ asset('asset/icon.png') }}" class="max-h-10 aspect-square" alt="icon">
                        <h1 class="text-center text-[#f69246] font-bold text-3xl">MeowInn</h1>
                    </div>
                    <button onclick="handleClose()" class="text-white hover:cursor-pointer sm:hidden">X</button>
                </li>
                <li
                    class="{{ $activeMenu == 'Dashboard' ? 'bg-white shadow-sm' : 'hover:bg-white hover:shadow-sm text-white hover:text-black group' }} rounded-l-full">
                    <a href="{{ route('pethouse.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span
                            class="{{ $activeMenu == 'Dashboard' ? '' : 'text-white group-hover:text-black' }} flex-1 ms-3 whitespace-nowrap font-semibold">Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        onclick="handleOpenAndClose('#dropdown-Pet-House','#icon-dropdown-Pet-House','#button-dropdown-Pet-House')"
                        id="button-dropdown-Pet-House"
                        class="flex items-center w-full p-2 text-base text-gray-900 {{ $activeMenu == 'Pet House' ? 'bg-white shadow-sm rounded-tl-box' : 'hover:bg-white hover:shadow-sm rounded-l-full text-white hover:text-black' }} transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="shrink-0 w-5 h-5 text-gray-500 transition duration-75" fill="currentColor"
                            class="icon icon-tabler icons-tabler-filled icon-tabler-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                        </svg>
                        <span class="font-semibold flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pet
                            House</span>
                        <svg id="icon-dropdown-Pet-House"
                            class="w-3 h-3 {{ $activeMenu == 'Pet House' ? null : 'rotate-90' }}" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-Pet-House"
                        class="{{ $activeMenu == 'Pet House' ? 'bg-white shadow-sm rounded-bl-box' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('pethouse.managepethouse.preview.index') }}"
                                class="{{ $activeMenu == 'Pet House' ? '' : 'text-white hover:text-black' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Preview</a>
                        </li>
                        <li>
                            <a href="{{ route('pethouse.managepethouse.setting.index') }}"
                                class="{{ $activeMenu == 'Pet House' ? '' : 'text-white hover:text-black' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Setting</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        onclick="handleOpenAndClose('#dropdown-Layanan','#icon-dropdown-Layanan','#button-dropdown-Layanan')"
                        id="button-dropdown-Layanan"
                        class="flex items-center w-full p-2 text-base text-gray-900 {{ $activeMenu == 'Penitipan' ? 'bg-white shadow-sm rounded-tl-box' : 'hover:bg-white hover:shadow-sm rounded-l-full text-white hover:text-black' }} transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Penitipan</span>
                        <svg id="icon-dropdown-Layanan"
                            class="w-3 h-3 {{ $activeMenu == 'Penitipan' ? null : 'rotate-90' }}" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-Layanan"
                        class="{{ $activeMenu == 'Penitipan' ? 'bg-white shadow-sm' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('pethouse.penitipan.daftarpenitipan.index') }}"
                                class="{{ $activeMenu == 'Penitipan' ? '' : 'text-white hover:text-black' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sedang Berlangsung</a>
                        </li>
                        <li>
                            <a href="{{ route('pethouse.penitipan.riwayatpenitipan.index') }}"
                                class="{{ $activeMenu == 'Penitipan' ? '' : 'text-white hover:text-black' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Riwayat</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="{{ $activeMenu == 'Reports' ? 'bg-white shadow-sm' : 'hover:bg-white hover:shadow-sm group' }} rounded-l-full">
                    <a href="{{ route('pethouse.reports.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span
                            class="{{ $activeMenu == 'Reports' ? '' : 'text-white group-hover:text-black' }} flex-1 ms-3 whitespace-nowrap">Reports</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        onclick="handleOpenAndClose('#dropdown-Profile','#icon-dropdown-Profile','#button-dropdown-Profile')"
                        id="button-dropdown-Profile"
                        class="flex items-center w-full p-2 text-base text-gray-900 {{ $activeMenu == 'Profile' ? 'bg-white shadow-sm rounded-tl-box' : 'hover:bg-white hover:shadow-sm rounded-l-full text-white hover:text-black' }} transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Profile</span>
                        <svg id="icon-dropdown-Profile"
                            class="w-3 h-3 {{ $activeMenu == 'Profile' ? null : 'rotate-90' }}" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-Profile"
                        class="{{ $activeMenu == 'Profile' ? 'bg-white shadow-sm' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="{{ $activeMenu == 'Profile' ? '' : 'text-white hover:text-black' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Profile
                                Information</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit"
                                    class="{{ $activeMenu == 'Profile' ? '' : 'text-white hover:text-black' }} hover:cursor-pointer w-full flex items-center p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <div class="sm:ml-64 min-h-screen relative">
        <div class="sticky top-0 bg-linear-90 from-[#F69246] to-[#EB6F6F] shadow-sm p-3 sm:hidden">
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" onclick="handleOpen()" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:cursor-pointer dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
        </div>
        <div class="relative">
            <div class="sticky top-0 z-40 bg-[#F69246] sm:lm-64 p-4 hidden sm:block shadow-sm">
                <h1 class="text-white font">{{ $header }}</h1>
            </div>
            <div {{ $attributes->merge(['class' => 'bg-white min-h-[calc(100vh-56px)]']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
