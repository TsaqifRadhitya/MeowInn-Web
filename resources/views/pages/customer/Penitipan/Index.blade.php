@extends('layouts.CustomerLayout')
@section('main')

    <body class="bg-[#FFF6F2]">
        <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-xl p-10 mt-10 mb-24">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Penitipan</h2>
            <div class="space-y-6">
                @forelse ($penitipans as $penitipan)
                    @if ($penitipan->userId == Auth::id())
                        <div
                            class="flex flex-col md:flex-row items-center bg-white rounded-xl shadow p-5 md:p-7 border border-gray-200">
                            <img src="{{ $penitipan->pethouse->user->profilePicture }}" alt="Pethouse"
                                class="w-40 h-28 object-cover rounded-lg mr-0 md:mr-7 mb-4 md:mb-0">
                            <div class="flex-1 w-full">
                                <div class="flex items-center mb-1">
                                    <img src="{{ asset('asset/logo pethouse.png') }}" alt="Logo Pethouse"
                                        class="w-6 h-6 mr-2">
                                    <span
                                        class="font-bold text-gray-800 text-lg">{{ $penitipan->pethouse->name ?? '-' }}</span>
                                </div>
                                <div class="flex items-center mb-1">
                                    <img src="{{ asset('asset/logo alamat.png') }}" alt="Logo Lokasi" class="w-5 h-5 mr-2">
                                    <span class="text-gray-700 text-base">
                                        {{ $penitipan->petHouse->user->village->villageName }},
                                        {{ $penitipan->petHouse->user->village->district->districtName }},
                                        {{ $penitipan->petHouse->user->village->district->city->cityName }},
                                        {{ $penitipan->petHouse->user->village->district->city->province->provinceName }}
                                    </span>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center md:items-end justify-between h-full ml-0 md:ml-8 mt-4 md:mt-0">
                                <div class="mb-2 w-full flex justify-center md:justify-end">
                                    @if ($penitipan->status === 'menunggu pembayaran')
                                        <span
                                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Menunggu Pembayaran <span>🕒</span>
                                        </span>
                                    @elseif($penitipan->status === 'gagal')
                                        <span
                                            class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Pembayaran Gagal <span>❌</span>
                                        </span>
                                    @elseif($penitipan->status === 'menunggu penjemputan')
                                        <span
                                            class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Menunggu Penjemputan <span>👋</span>
                                        </span>
                                    @elseif($penitipan->status === 'menunggu diantar ke pethouse')
                                        <span
                                            class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Menunggu Antar ke Pethouse <span>🏠</span>
                                        </span>
                                    @elseif($penitipan->status === 'sedang dititipkan')
                                        <span
                                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Sedang Dititipkan <span>🐱</span>
                                        </span>
                                    @elseif($penitipan->status === 'sedang diantar pulang')
                                        <span
                                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Sedang Diantar Pulang <span>🚗</span>
                                        </span>
                                    @elseif($penitipan->status === 'selesai')
                                        <span
                                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                            Selesai <span>✅</span>
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('customer.penitipan.show', $penitipan->id) }}"
                                    class="bg-[#FF8855] hover:bg-orange-500 text-white font-bold px-8 py-2 rounded-full transition shadow">Detail
                                    Penitipan</a>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="text-center text-gray-500 py-10">Anda belum melakukan penitipan kucing.</div>
                @endforelse
            </div>
            <div class="mt-8">{{ $penitipans->links() }}</div>
        </div>
    </body>
@endsection
