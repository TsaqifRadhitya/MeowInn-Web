@extends('layouts.CustomerLayout')
@section('main')

    <body class="bg-[#fdf5f0]">
        <div
            class="max-w-7xl mx-auto bg-white rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl p-6 sm:p-8 md:p-10 lg:p-14 mt-6 sm:mt-8 md:mt-10 mb-16 sm:mb-20 md:mb-24">
            <div class="flex flex-col md:flex-row md:items-start gap-4 sm:gap-6 md:gap-8">
                <img src="{{ $petHouse->user->profilePicture }}" alt="Pethouse"
                    class="w-full md:w-64 lg:w-80 h-48 sm:h-56 object-cover rounded-lg mb-4 sm:mb-6 md:mb-0">
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-2">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold sm:font-extrabold text-orange-500">
                            {{ $petHouse->name ?? '-' }}</h1>
                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                            <a href="{{ route('customer.penitipan.create', $petHouse->id) }}"
                                class="bg-[#FF8855] hover:bg-orange-500 text-white font-bold px-4 sm:px-6 md:px-8 py-1.5 sm:py-2 rounded-full transition shadow text-sm sm:text-base text-center">
                                Titipkan
                            </a>
                            <a href="#" id="btn-laporkan"
                                class="bg-red-400 hover:bg-red-500 text-white font-bold px-4 sm:px-6 md:px-8 py-1.5 sm:py-2 rounded-full transition shadow text-sm sm:text-base text-center">
                                Laporkan
                            </a>
                        </div>
                    </div>

                    <div class="mb-3 flex flex-col sm:flex-row gap-1 sm:gap-0">
                        <span class="font-semibold w-28 sm:w-32">Alamat :</span>
                        <span>
                            {{ $petHouse->user->village->villageName }},
                            {{ $petHouse->user->village->district->districtName }},
                            {{ $petHouse->user->village->district->city->cityName }},
                            {{ $petHouse->user->village->district->city->province->provinceName }}
                        </span>
                    </div>

                    <div class="mb-3 flex flex-col sm:flex-row gap-1 sm:gap-0">
                        <span class="font-semibold w-28 sm:w-32">Deskripsi :</span>
                        <span class="whitespace-pre-line break-words max-w-2xl text-sm sm:text-base">
                            {!! nl2br($petHouse->description) !!}
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4">Fasilitas Pethouse</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                    @foreach (json_decode($petHouse->locationPhotos) as $photo)
                        <img src="{{ $photo }}" class="w-full h-48 sm:h-56 object-cover object-center rounded-lg"
                            alt="Fasilitas">
                    @endforeach
                </div>
            </div>

            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4">Layanan Tambahan</h3>
                <div class="flex flex-wrap gap-2 sm:gap-3 md:gap-4">
                    @forelse ($petHouse->pethouseLayanansActive as $layanan)
                        <div class="p-4 hover:bg-gray-50 transition-colors shadow rounded-lg w-full">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-48 h-40 flex-shrink-0 rounded-lg overflow-hidden">
                                    <img src="{{ $layanan->pethouselayanans?->photos ?? $layanan->layanan->photos }}"
                                        alt="{{ $layanan->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex flex-col h-full">
                                        <div class="flex items-start justify-between">
                                            <div>

                                                <h3 class="text-lg font-semibold text-gray-800 mt-1">
                                                    {{ $layanan->layanan->name }}</h3>
                                            </div>
                                            <span
                                                class="text-lg font-bold text-[#F69246]">Rp{{ number_format($layanan?->price, 0, ',', '.') }}</span>
                                        </div>
                                        <p class="text-gray-600 mt-2 line-clamp-2 break-words">{!! nl2br($layanan->description ?? $layanan->pethouselayanans?->description) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="font-bold text-2xl text-center my-auto">Belum Tersedia Layanan Tambahan Lainnya</h1>
                    @endforelse
                </div>
            </div>

            <div class="mt-8 sm:mt-10 md:mt-12 flex justify-end">
                <a href="{{ route('customer.pethouse.index') }}"
                    class="inline-flex items-center gap-1 sm:gap-2 bg-red-400 hover:bg-red-500 text-white font-bold px-4 sm:px-6 py-1.5 sm:py-2 rounded-full shadow transition text-sm sm:text-base">
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4 sm:h-5 sm:w-5' fill='none' viewBox='0 0 24 24'
                        stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 19l-7-7 7-7' />
                    </svg>
                    Kembali ke Daftar Pethouse
                </a>
            </div>
        </div>
    </body>

    <!-- Modal Laporkan -->
    <div id="laporkan-modal" class="fixed inset-0 bg-black/30 items-center justify-center z-50 hidden p-4">
        <div
            class="relative bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-2xl shadow-black/30 w-full max-w-4xl flex flex-col md:flex-row items-stretch overflow-hidden">
            <!-- Left - Hidden on mobile -->
            <div class="hidden md:flex flex-col justify-center items-center pl-6 md:pl-10 pr-0 py-6 md:py-10 relative"
                style="background:transparent;">
                <span
                    class="absolute left-0 top-1/2 -translate-y-1/2 -z-10 block w-48 md:w-64 h-56 md:h-72 bg-[#FF8855] rounded-[40%_60%_60%_40%/50%_40%_60%_50%]"></span>
                <img src="{{ asset('asset/kucing5.png') }}" alt="Kucing"
                    class="w-48 md:w-64 lg:w-72 h-56 md:h-64 lg:h-80 object-contain z-10" style="margin-left:10px;" />
            </div>

            <!-- Right -->
            <div class="flex-1 flex flex-col justify-center px-4 sm:px-6 md:px-8 lg:px-10 py-6 md:py-8 lg:py-10">
                <button onclick="closeLaporkanModal()"
                    class="absolute top-2 right-3 sm:top-3 sm:right-4 text-gray-400 hover:text-gray-700 text-2xl sm:text-3xl font-bold z-10">&times;</button>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 text-gray-700">
                    Laporkan Pethouse
                </h3>
                <p class="text-gray-500 mb-3 sm:mb-4 text-sm sm:text-base">
                    Sampaikan keluhan dan permasalahanmu untuk pethouse ini.
                </p>
                <form method="POST" action="{{ route('customer.pethouse.store', $petHouse->id) }}">
                    @csrf
                    <textarea id="report-textarea" name="isi"
                        class="w-full border border-gray-200 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6 focus:outline-none focus:ring-2 focus:ring-[#FF8855] resize-none bg-white text-gray-700 text-sm sm:text-base"
                        rows="5" placeholder="Tulis laporan kamu di sini..." required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="text-red-500 text-xs sm:text-sm mb-2">{{ $message }}</div>
                    @enderror
                    <button type="submit"
                        class="bg-red-500 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-full font-bold hover:bg-red-600 transition text-base sm:text-lg shadow-none w-full sm:w-auto">
                        Kirim Laporan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function closeLaporkanModal() {
            const modal = document.getElementById('laporkan-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex', 'items-center', 'justify-center');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('btn-laporkan');
            const modal = document.getElementById('laporkan-modal');

            if (btn && modal) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.classList.remove('hidden');
                    modal.classList.add('flex', 'items-center', 'justify-center');
                });
            }
        });
    </script>
@endsection
