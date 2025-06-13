<x-pethouse-layout header="Profile" class="p-10 flex w-full bg-none relative" id="content" activeMenu="Profile">
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
            </div>
        </div>
    </section>
</x-pethouse-layout>
