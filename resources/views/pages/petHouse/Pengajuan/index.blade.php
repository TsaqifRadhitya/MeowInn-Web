<x-pethouse-layout header="Status Verifikasi Pethouse" class="p-5 md:p-10 md:pb-0" id="content">
    <div class="mx-auto bg-white rounded-xl shadow-lg overflow-hidden p-6 mb-8 border border-gray-100">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="w-16 h-2 bg-[#F69246] mx-auto mb-4 rounded-full"></div>
            <h1 class="text-3xl font-bold text-gray-800">Status Verifikasi Pethouse</h1>
            <p class="text-gray-600 mt-2">Lihat status pengajuan verifikasi pethouse Anda</p>
        </div>

        <!-- Status Card -->
        <div class="bg-white border rounded-xl p-6 mb-8 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center">
                    <!-- Status Icon -->
                    <div
                        class="p-3 rounded-full mr-4
                        @if ($user->pethouses->verificationStatus == 'disetujui') bg-green-100 text-green-600
                        @elseif($user->pethouses->verificationStatus == 'ditolak') bg-red-100 text-red-600
                        @else bg-yellow-100 text-yellow-600 @endif">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if ($user->pethouses->verificationStatus == 'disetujui')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            @elseif($user->pethouses->verificationStatus == 'ditolak')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @endif
                        </svg>
                    </div>

                    <!-- Status Text -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            @if ($user->pethouses->verificationStatus == 'disetujui')
                                Verifikasi Disetujui
                            @elseif($user->pethouses->verificationStatus == 'ditolak')
                                Verifikasi Ditolak
                            @else
                                Menunggu Verifikasi
                            @endif
                        </h3>
                        <p class="text-sm text-gray-500">
                            @if ($user->pethouses->verificationStatus == 'disetujui')
                                Pethouse Anda telah diverifikasi dan aktif
                            @elseif($user->pethouses->verificationStatus == 'ditolak')
                                Pengajuan verifikasi Anda ditolak
                            @else
                                Pengajuan sedang dalam proses verifikasi
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Status Badge -->
                <span
                    class="px-4 py-2 rounded-full text-sm font-medium
                    @if ($user->pethouses->verificationStatus == 'disetujui') bg-green-100 text-green-800
                    @elseif($user->pethouses->verificationStatus == 'ditolak') bg-red-100 text-red-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                    {{ ucfirst($user->pethouses->verificationStatus) }}
                </span>
            </div>


            <!-- Pethouse Info -->
            <div class="bg-orange-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Informasi Pethouse
                </h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Nama Pethouse</h4>
                        <p class="text-gray-800 mt-1">{{ $user->pethouses->name }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Biaya Perawatan</h4>
                        <p class="text-gray-800 mt-1">
                            Rp{{ number_format($user->pethouses->petCareCost, 0, ',', '.') }}/hari
                        </p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Lokasi</h4>
                        <p class="text-gray-800 mt-1">{{ $user->village->name }},
                            {{ $user->village->district->name }}, {{ $user->village->district->city->name }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Jangkauan Layanan</h4>
                        <p class="text-gray-800 mt-1">
                            @if ($user->pethouses->range == 'village')
                                Dalam Desa/Kelurahan
                            @elseif($user->pethouses->range == 'district')
                                Dalam Kecamatan
                            @else
                                Dalam Kota/Kabupaten
                            @endif
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500">Alamat Lengkap</h4>
                        <p class="text-gray-800 mt-1">{{ $user->address }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500">Deskripsi</h4>
                        <p class="text-gray-800 mt-1 break-words">{!! nl2br($user->pethouses->description) !!}</p>
                    </div>
                </div>
            </div>

            <!-- Photos Section -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Foto Pethouse
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach (json_decode($user->pethouses->locationPhotos) as $photo)
                        <div class="relative group">
                            <img src="{{ $photo }}" alt="Foto Pethouse"
                                class="w-full h-48 object-cover rounded-lg">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ $photo }}" target="_blank"
                                    class="text-white p-2 bg-black bg-opacity-50 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 10V7m0 3h3m-3 3h3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                @if ($user->pethouses->verificationStatus == 'ditolak')
                    <a href="{{ route('pethouse.verifikasi.create') }}"
                        class="px-6 py-3 bg-[#F69246] text-white font-medium rounded-lg shadow-md hover:bg-[#e07f35] text-center transition-colors duration-200">
                        Ajukan Ulang Verifikasi
                    </a>
                @endif

                <a href="{{ route('pethouse.dashboard') }}"
                    class="px-6 py-3 border border-[#F69246] text-[#F69246] font-medium rounded-lg hover:bg-orange-50 text-center transition-colors duration-200">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
</x-pethouse-layout>
