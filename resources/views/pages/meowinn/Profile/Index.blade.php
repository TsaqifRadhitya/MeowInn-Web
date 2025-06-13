<x-meowinn-layout header="Profile" class="p-10 flex w-full bg-none relative" id="content" activeMenu="Profile">
    <section class="flex-1">
        <div class="bg-white rounded-xl shadow-md overflow-hidden h-full">
            <div class="bg-gradient-to-r from-[#F69246] to-[#EC7070] p-6 text-white">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <img src="{{ $user->profilePicture ?? asset('asset/profile.png') }}"
                        class="aspect-square rounded-full shadow w-20 object-center object-cover" alt="">
                    <div class="text-center md:text-left">
                        <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                        <p class="text-blue-100">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">Informasi Pribadi</h2>
                        <div>
                            <p class="text-sm text-gray-500">Nama</p>
                            <p class="text-gray-800 mt-1">
                                {{ $user->name ?? '-' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="text-gray-800 mt-1">
                                {{ $user->email ?? '-' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nomor Hp</p>
                            <p class="text-gray-800 mt-1">
                                {{ $user->phoneNumber ?? '-' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Buat Akun</p>
                            <p class="text-gray-800 mt-1">
                                {{ $user->created_at->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">Lokasi</h2>
                        <div>
                            <p class="text-sm text-gray-500">Provinsi</p>
                            <p class="text-gray-800 mt-1">
                                @if ($user->village?->district?->city?->province)
                                    {{ $user->village->district->city->province->provinceName }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kota</p>
                            <p class="text-gray-800 mt-1">
                                @if ($user->village?->district?->city)
                                    {{ $user->village->district->city->cityName }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kecamatan</p>
                            <p class="text-gray-800 mt-1">
                                @if ($user->village?->district)
                                    {{ $user->village->district->districtName }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kelurahan</p>
                            <p class="text-gray-800 mt-1">
                                @if ($user->village)
                                    {{ $user->village->villageName }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Alamat</p>
                            <p class="text-gray-800 mt-1">
                                {{ $user->address ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-end md:absolute bottom-20 right-20">
                    <a href="{{ route('meowinn.profile.edit') }}"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-meowinn-layout>
