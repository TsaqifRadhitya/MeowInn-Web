@extends('layouts.CustomerLayout')
@section('main')
    <div class="bg-[#fdf5f0] p-4 sm:p-6 md:p-8 lg:p-10">
        <div class="mx-auto flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8">
            <!-- Sidebar -->
            <div
                class="bg-white rounded-xl sm:rounded-2xl shadow-lg w-full md:w-1/3 flex flex-col justify-center items-center py-8 sm:py-12 md:py-16 lg:py-24 px-4 sm:px-6 md:px-6 mb-4 sm:mb-6 md:mb-0">
                <div
                    class="w-28 h-28 sm:w-36 sm:h-36 md:w-40 md:h-40 lg:w-44 lg:h-44 rounded-full border-4 sm:border-6 md:border-8 border-white shadow-lg overflow-hidden bg-[#FF8855] flex items-center justify-center mb-3 sm:mb-4">
                    <img src="{{ $user->profilePicture ? $user->profilePicture : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=FF8855&color=fff' }}"
                        alt="Foto Profil" class="object-cover w-full h-full">
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 md:p-8 lg:p-10">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-x-4 sm:gap-x-6 md:gap-x-8 gap-y-3 sm:gap-y-4 md:gap-y-6 mb-6 sm:mb-8 md:mb-10">
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Nama</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">{{ $user->name }}
                        </div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Email</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">{{ $user->email }}
                        </div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">No. HP</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">
                            {{ $user->phoneNumber ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Alamat</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">
                            {{ $user->address ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Provinsi</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">
                            {{ $user->village?->district?->city?->province?->provinceName ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Kota/Kabupaten</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">
                            {{ $user->village?->district?->city?->cityName ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Kecamatan</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">
                            {{ $user->village?->district?->districtName ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Kelurahan/Desa</div>
                        <div class="border-b border-[#FFB6A0] pb-1 text-sm sm:text-base text-gray-800">
                            {{ $user->village?->villageName ?? '-' }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 sm:gap-3 md:gap-4 justify-end">
                    <a href="{{ route('customer.profile.edit', $user->id) }}"
                        class="w-full md:w-auto px-6 sm:px-8 md:px-10 py-1.5 sm:py-2 bg-[#FF8855] text-white rounded-lg font-bold shadow hover:bg-[#ff6d1f] transition-all duration-200 text-center text-sm sm:text-base">
                        Edit Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full md:w-auto">
                        @csrf
                        <button type="submit"
                            class="w-full md:w-auto px-6 sm:px-8 md:px-10 py-1.5 sm:py-2 bg-[#FF3B3F] text-white rounded-lg font-bold shadow hover:bg-red-700 transition-all duration-200 text-center text-sm sm:text-base">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
