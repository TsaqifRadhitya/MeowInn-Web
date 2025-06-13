<x-meowinn-layout header="Status Verifikasi Pethouse" class="p-5 md:p-10 md:pb-0" id="content">
    <div class="mx-auto bg-white overflow-hidden mb-8">
        <div class="text-center mb-8">
            <div class="w-16 h-2 bg-[#F69246] mx-auto mb-4 rounded-full"></div>
            <h1 class="text-3xl font-bold text-gray-800">Status Verifikasi Pethouse</h1>
            <p class="text-gray-600 mt-2">Lihat status pengajuan verifikasi pethouse Anda</p>
        </div>

        <div class="bg-white p-6 space-y-5 mb-8 transition-all duration-300">
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <div class="flex items-center">
                    <div
                        class="p-3 rounded-full mr-4
                        @if ($pethouse->verificationStatus == 'disetujui') bg-green-100 text-green-600
                        @elseif($pethouse->verificationStatus == 'ditolak') bg-red-100 text-red-600
                        @else bg-yellow-100 text-yellow-600 @endif">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if ($pethouse->verificationStatus == 'disetujui')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            @elseif($pethouse->verificationStatus == 'ditolak')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @endif
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            @if ($pethouse->verificationStatus == 'disetujui')
                                Verifikasi Disetujui
                            @elseif($pethouse->verificationStatus == 'ditolak')
                                Verifikasi Ditolak
                            @else
                                Menunggu Verifikasi
                            @endif
                        </h3>
                        <p class="text-sm text-gray-500">
                            @if ($pethouse->verificationStatus == 'disetujui')
                                Pethouse Anda telah diverifikasi dan aktif
                            @elseif($pethouse->verificationStatus == 'ditolak')
                                Pengajuan verifikasi Anda ditolak
                            @else
                                Pengajuan sedang dalam proses verifikasi
                            @endif
                        </p>
                    </div>
                </div>

                <span
                    class="px-4 py-2 rounded-full text-sm font-medium capitalize flex items-center justify-center
                    @if ($pethouse->verificationStatus == 'disetujui') bg-green-100 text-green-800
                    @elseif($pethouse->verificationStatus == 'ditolak') bg-red-100 text-red-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                    <p> {{ $pethouse->verificationStatus }}</p>
                </span>
            </div>


            <div class="bg-orange-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Informasi Pethouse
                </h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Nama Pethouse</h4>
                        <p class="text-gray-800 mt-1">{{ $pethouse->name }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Nomor Telepon</h4>
                        <p class="text-gray-800 mt-1">
                            {{ $pethouse->user->phoneNumber }}
                        </p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Biaya Perawatan</h4>
                        <p class="text-gray-800 mt-1">
                            Rp{{ number_format($pethouse->petCareCost, 0, ',', '.') }}/hari
                        </p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Lokasi</h4>
                        <p class="text-gray-800 mt-1">{{ $pethouse->user->village->villageName }},
                            {{ $pethouse->user->village->district->districtName }},
                            {{ $pethouse->user->village->district->city->cityName }}
                        </p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Jangkauan Antar jemputan</h4>
                        <p class="text-gray-800 mt-1">
                            @if ($pethouse->range == 'village')
                                Dalam Desa/Kelurahan
                            @elseif($pethouse->range == 'district')
                                Dalam Kecamatan
                            @elseif($pethouse->range == 'city')
                                Dalam Kota/Kabupaten
                            @else
                                -
                            @endif
                        </p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Alamat Lengkap</h4>
                        <p class="text-gray-800 mt-1">{{ $pethouse->user->address }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500">Deskripsi</h4>
                        <p class="text-gray-800 mt-1 break-words">{!! nl2br($pethouse->description) !!}</p>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Foto Pethouse
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach (json_decode($pethouse->locationPhotos) as $photo)
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

            <div class="mt-8 flex flex-col sm:flex-row justify-end gap-4">
                @if ($pethouse->verificationStatus == 'menunggu persetujuan')
                    <section class="flex flex-col gap-y-2.5 gap-x-5 md:flex-row w-full justify-end">
                        <form method="POST" action="{{ route('meowinn.pengajuanpethouse.delete', $pethouse->id) }}"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-3 min-w-32 border w-full border-[#F69246] cursor-pointer hover:bg-[#F69246] hover:text-white text-[#F69246] font-medium rounded-lg bg-orange-50 text-center transition-colors duration-200"">
                                <i class="fas fa-times mr-1"></i> Tolak
                            </button>
                        </form>
                        <form method="POST" action="{{ route('meowinn.pengajuanpethouse.update', $pethouse->id) }}"
                            class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="px-6 py-3 min-w-32 border w-full border-[#F69246] cursor-pointer hover:text-[#F69246] bg-[#F69246] text-white font-medium rounded-lg hover:bg-orange-50 text-center transition-colors duration-200"">
                                <i class="fas fa-check mr-1"></i> Approve
                            </button>
                        </form>
                    </section>
                @endif
            </div>
        </div>
</x-meowinn-layout>
