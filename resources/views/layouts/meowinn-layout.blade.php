@props(['header','activeMenu'])
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const handleOpen = () => {
        $('#default-sidebar').removeClass('-translate-x-full');
    }

    const handleClose = () => {
        $('#default-sidebar').addClass('-translate-x-full');
    }
</script>
<div class="bg-linear-90 from-[#F69246] to-[#EB6F6F] shadow-sm p-3 sm:hidden">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        onclick="handleOpen()" type="button"
        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:cursor-pointer dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
</div>
<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full pl-3 py-4 overflow-y-auto bg-linear-210 from-[#F69246] via-[#EB6F6F] to-[#C0618C] shadow-sm">
        <ul class="font-medium space-y-8">
            <li class="flex flex-row items-center justify-between px-5 sm:px-2 sm:x-2">
                <span class="text-2xl sm:hidden">MeowInn</span>
                <div
                    class="hidden sm:flex bg-white shadow-sm w-full mr-4 rounded-xl py-5 sm:flex-row items-center justify-between px-2">
                    <img src="{{ asset('asset/icon.png') }}" class="max-h-10 aspect-square" alt="icon">
                    <h1 class="text-center text-[#F69246] font-bold text-3xl">MeowInn</h1>
                </div>
                <button onclick="handleClose()" class="text-white hover:cursor-pointer sm:hidden">X</button>
            </li>
            <li class="{{$activeMenu == 'Dashboard' ?  "bg-white shadow-sm" : "hover:bg-white hover:shadow-sm"}} rounded-l-full pl-2">
                <a href="/dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
            <li class="{{$activeMenu == 'Pet House' ?  "bg-white shadow-sm" : "hover:bg-white hover:shadow-sm"}} rounded-l-full pl-2">
                <a href="/meowinn/pethouse"
                    class="flex items-center p-2 text-gray-900 rounded-lg">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Pet House</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<div class="sm:ml-64 bg-white min-h-screen relative">
    <div class="bg-[#F69246] sm:lm-64 p-4 hidden sm:block shadow-sm">
        <h1 class="text-white">{{ $header }}</h1>
    </div>
    <div {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </div>
</div>
</div>
