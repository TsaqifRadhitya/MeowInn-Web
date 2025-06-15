@extends('layouts.CustomerLayout')
@section('main')

    <body class="bg-[#FFF6F2]">
        <div
            class="max-w-6xl mx-auto bg-white rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl p-4 sm:p-6 md:p-8 lg:p-10 mt-6 sm:mt-8 md:mt-10 mb-16 sm:mb-20 md:mb-24">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">Pethouse Terdekat</h2>
            <div class="space-y-4 sm:space-y-6">
                @forelse($petHouses as $petHouse)
                    <div
                        class="flex flex-col sm:flex-row items-center bg-white rounded-lg sm:rounded-xl shadow p-3 sm:p-4 md:p-5 lg:p-7 border border-gray-200">
                        <img src="{{ $petHouse->user->profilePicture }}" alt="Pethouse"
                            class="w-full sm:w-32 md:w-40 h-24 sm:h-28 object-cover rounded-lg sm:mr-4 md:mr-7 mb-3 sm:mb-0">
                        <div class="flex-1 w-full mt-3 sm:mt-0">
                            <div class="flex items-center mb-1">
                                <img src="{{ asset('asset/logo pethouse.png') }}" alt="Logo Pethouse"
                                    class="w-5 h-5 sm:w-6 sm:h-6 mr-2">
                                <span
                                    class="font-bold text-gray-800 text-base sm:text-lg">{{ $petHouse->name ?? '-' }}</span>
                            </div>
                            <div class="flex items-start mb-1">
                                <img src="{{ asset('asset/logo alamat.png') }}" alt="Logo Lokasi"
                                    class="w-4 h-4 sm:w-5 sm:h-5 mr-2 mt-0.5">
                                <span class="text-gray-700 text-sm sm:text-base">
                                    {{ $petHouse->user->village->villageName }},
                                    {{ $petHouse->user->village->district->districtName }},
                                    {{ $petHouse->user->village->district->city->cityName }},
                                    {{ $petHouse->user->village->district->city->province->provinceName }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('customer.pethouse.show', $petHouse->id) }}"
                            class="w-full sm:w-auto mt-4 sm:mt-0 sm:ml-4 md:ml-8 bg-[#FF7B54] hover:bg-orange-500 text-white font-bold px-4 sm:px-6 md:px-8 py-1.5 sm:py-2 rounded-full transition shadow text-sm sm:text-base text-center">
                            Lihat Pethouse
                        </a>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-6 sm:py-8 md:py-10">Tidak ada pethouse ditemukan di kota Anda.
                    </div>
                @endforelse
            </div>
            <div class="mt-6 sm:mt-8">{{ $petHouses->links() }}</div>
        </div>
    </body>
@endsection
