<x-meowinn-layout header="Pet House Preview" class="m-5 p-5 rounded-2xl shadow-sm" id="content" activeMenu="Pet House">
    {{-- @dd($profilePethouse) --}}
    <!-- Profile Section -->
    <!-- Nama Pet House -->
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $profilePethouse->name }}</h1>

    <!-- Alamat -->
    <p class="text-gray-600 mb-4">
        <span class="font-semibold">Alamat:</span> {{ $profilePethouse->alamat }}
    </p>

    <!-- Jumlah Layanan -->
    <p class="text-gray-600 mb-4">
        <span class="font-semibold">Jumlah Layanan:</span>
        {{ $profilePethouse->pethouseLayanans()->whereStatusPengajuan('disetujui')->count() }} Layanan
    </p>

    <!-- Jumlah Transaksi -->
    <p class="text-gray-600 mb-4">
        <span class="font-semibold">Jumlah Transaksi:</span> {{ $profilePethouse->penitipans()->count() }}
        Transaksi
    </p>

    <div class="carousel w-full h-full md:space-x-5">
        <div id="slide1" class="carousel-item h-fit relative w-full md:w-1/3 p-5 rounded-2xl shadow-md">
            <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp"
                class="w-full aspect-video" />
        </div>
        <div id="slide2" class="carousel-item h-fit relative w-full md:w-1/3 p-5 rounded-2xl shadow-md">
            <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
                class="w-full aspect-square" />
        </div>
        <div id="slide3" class="carousel-item h-fit relative w-full md:w-1/3 p-5 rounded-2xl shadow-md">
            <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp"
                class="w-full aspect-video" />
        </div>
        <div id="slide4" class="carousel-item h-fit relative w-full md:w-1/3 p-5 rounded-2xl shadow-md">
            <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp"
                class="w-full aspect-video" />
        </div>
    </div>
</x-meowinn-layout>
