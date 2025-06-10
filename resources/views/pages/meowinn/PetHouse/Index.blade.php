<x-meowinn-layout header="Pet House" class="m-5 md:m-10 md:mb-0 shadow rounded-2xl overflow-hidden" id="content"
    activeMenu="Pet House">
    <div class="bg-white p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Pet House</h1>
                <p class="text-gray-600 mt-1">Kelola semua pet house yang terdaftar</p>
            </div>

            <form class="w-full md:w-auto" action="{{ route('meowinn.pethouse.index') }}" method="GET">
                <div class="relative">
                    <input type="search" id="search-dropdown" name="search" value="{{ request('search') }}"
                        class="w-full md:w-64 pl-4 pr-10 py-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Cari Pet House..." />
                    <button type="submit"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-[#FF7B54] cursor-pointer">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        @if (count($daftarPethouse) == 0)
            <div
                class="bg-gray-50 rounded-lg p-8 text-center border border-gray-200 h-2/3 flex flex-col justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>


                @if (count($daftarPethouse) == 0 && request('search'))
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Pecarian Pet House Tidak Ditemukan</h3>
                @else
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Pet House Belum Tersedia</h3>
                @endif
                @if (count($daftarPethouse) == 0 && request('search'))
                    <p class="mt-1 text-gray-500">Coba dengan kata kunci pencarian yang berbeda</p>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4 max-h-[65vh] overflow-y-auto">
            @foreach ($daftarPethouse as $petHouse)
                <div
                    class="bg-white rounded-lg max-h-50 shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/4 h-48 md:h-auto overflow-hidden">
                            <img class="w-full object-cover h-48 object-center"
                                src="{{ $petHouse->locationPhotos ? $petHouse->locationPhotos[0] : 'https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp' }}"
                                alt="{{ $petHouse->name }}" />
                        </div>

                        <div class="md:w-3/4 p-4 flex flex-col">
                            <div class="flex-grow">
                                <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $petHouse->name }}</h2>
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $petHouse->address }}
                                </div>
                                <p class="text-gray-600 line-clamp-2">{{ $petHouse->description }}</p>
                            </div>

                            <div class="mt-4 flex justify-end">
                                <a href="{{ route('meowinn.pethouse.show', ['id' => $petHouse->id]) }}"
                                    class="btn btn-primary px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            {{ $daftarPethouse->links() }}
        </div>
    </div>
</x-meowinn-layout>
