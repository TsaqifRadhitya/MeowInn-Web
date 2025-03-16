<x-meowinn-layout header="Pet House Preview" class="m-5 p-5 rounded-2xl shadow-sm" id="content" activeMenu="Pet House">
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

    <p class="text-gray-600 mb-4">
        <span class="font-semibold">Deskripsi:</span> {{ $profilePethouse->deskripsi }}
    </p>

    <div class="flex flex-row w-full h-fit md:gap-x-5 overflow-x-hidden hover:overflow-x-scroll py-5">
        @foreach ($profilePethouse->url as $url)
            @if (str_contains($url, 'Image'))
                <div id="slide1" class="carousel-item h-fit relative w-full md:w-1/3 p-5 rounded-2xl shadow-md">
                    <img src= {{ $url }}
                        class="w-full aspect-video object-center object-cover" />
                </div>
                <div id="slide1" class="carousel-item h-fit relative w-full md:w-1/3 p-5 rounded-2xl shadow-md">
                    <img src= {{ $url }}
                        class="w-full aspect-video object-center object-cover" />
                </div>
            @else
                <video class="h-full w-full rounded-lg" controls>
                    <source
                        src="https://bucketmeowinn.s3.ap-southeast-1.amazonaws.com/Image/2024-06-05%2020-10-23.mkv" />
                    Your browser does not support the video tag.
                </video>
            @endif
        @endforeach
    </div>
</x-meowinn-layout>
