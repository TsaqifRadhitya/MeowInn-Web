@extends('layouts.CustomerLayout')
@section('main')

    <body class="bg-[#fdf5f0]">
        <div class="bg-[#fdf5f0] min-h-screen pt-4 sm:pt-6 pb-2">
            <div class="max-w-6xl mx-auto px-3 sm:px-4">
                <div class="flex justify-between w-full">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#FF8855] mb-4 sm:mb-6">Detail
                        Penitipan
                    </h1>
                    <a href="#" id="btn-laporkan"
                        class="bg-red-400 hover:bg-red-500 text-white font- h-fit px-4 sm:px-6 md:px-8 py-1.5 sm:py-2 rounded-full transition shadow text-sm sm:text-base text-center">
                        Laporkan
                    </a>
                </div>
                <div class="mb-4 sm:mb-6 flex flex-col-reverse md:flex-row md:justify-between md:items-end">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                        <div class="flex flex-col">
                            <label class="block text-[#FF8855] font-semibold mb-1 text-lg sm:text-xl">Durasi
                                Penitipan</label>
                            <div
                                class="border border-gray-300 rounded-lg px-3 sm:px-4 py-1 sm:py-2 w-full sm:w-56 text-base sm:text-lg bg-gray-100">
                                {{ $penitipan->duration }} Hari
                            </div>
                        </div>
                        <div class="flex items-end sm:h-full sm:mt-7">
                            <span
                                class="bg-[#FF8855] text-white font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-lg text-base sm:text-lg shadow text-center w-full sm:w-56 inline-flex justify-center items-center"
                                style="height:42px; sm:height:48px;">
                                Rp{{ number_format($penitipan->petCareCosts ?? 0, 0, ',', '.') }}/Hari
                            </span>
                        </div>
                    </div>
                    @if ($penitipan->status === 'menunggu pembayaran')
                        <div class="flex flex-col items-end gap-2">
                            <span
                                class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs md:text-lg font-bold flex items-center gap-1 w-max">
                                Menunggu Pembayaran <span>🕒</span>
                            </span>
                        </div>
                    @elseif($penitipan->status === 'gagal')
                        <span
                            class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold md:text-lg flex items-center gap-1 w-max">
                            Pembayaran Gagal <span>❌</span>
                        </span>
                    @elseif($penitipan->status === 'menunggu penjemputan')
                        <span
                            class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold md:text-lg flex items-center gap-1 w-max">
                            Menunggu Penjemputan <span>👋</span>
                        </span>
                    @elseif($penitipan->status === 'menunggu diantar ke pethouse')
                        <span
                            class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold md:text-lg flex items-center gap-1 w-max">
                            Menunggu Antar ke Pethouse <span>🏠</span>
                        </span>
                    @elseif($penitipan->status === 'sedang dititipkan')
                        <span
                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold flex md:text-lg items-center gap-1 w-max">
                            Sedang Dititipkan <span>🐱</span>
                        </span>
                    @elseif($penitipan->status === 'sedang diantar pulang')
                        <span
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex md:text-lg items-center gap-1 w-max">
                            Sedang Diantar Pulang <span>🚗</span>
                        </span>
                    @elseif($penitipan->status === 'selesai')
                        <span
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex md:text-lg items-center gap-1 w-max">
                            Selesai <span>✅</span>
                        </span>
                    @endif
                </div>
                <div class="flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8">
                    <div class="flex-1 relative" style="min-height: 100px;">
                        @foreach ($penitipan->hewans as $i => $cat)
                            <div class="cat-form mb-4 sm:mb-6">
                                <div class="flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8">
                                    <!-- Cat Data -->
                                    <div
                                        class="flex-1 bg-white rounded-xl sm:rounded-2xl shadow p-4 sm:p-6 md:p-8 border border-gray-200">
                                        <div class="font-bold text-blue-700 mb-3 sm:mb-4 text-base sm:text-lg">
                                            Data Kucing <span class="cat-number">{{ $i + 1 }}</span>
                                        </div>

                                        <div class="mb-3 sm:mb-4">
                                            <label class="block text-gray-700 mb-1 font-semibold text-sm sm:text-base">Nama
                                                Kucing</label>
                                            <div
                                                class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-1 sm:py-2 text-sm sm:text-base bg-gray-100">
                                                {{ $cat->name }}
                                            </div>
                                        </div>

                                        <div class="mb-3 sm:mb-4">
                                            <label class="block text-gray-700 mb-1 font-semibold text-sm sm:text-base">Jenis
                                                Kucing</label>
                                            <div
                                                class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-1 sm:py-2 text-sm sm:text-base bg-gray-100">
                                                {{ $cat->description }}
                                            </div>
                                        </div>

                                        <div class="mb-3 sm:mb-4">
                                            <label class="block text-gray-700 mb-1 font-semibold text-sm sm:text-base">Foto
                                                Kucing</label>
                                            <img src="{{ $cat->foto }}"
                                                class="mt-2 sm:mt-4 aspect-video w-full rounded-lg border-[#FF8855] object-center object-cover shadow border-2"
                                                alt="Foto Kucing">
                                        </div>
                                    </div>

                                    <!-- Services -->
                                    <div class="w-full md:w-[300px] lg:w-[370px] flex flex-col items-center">
                                        <div
                                            class="bg-[#FF8855] rounded-xl sm:rounded-2xl shadow p-4 sm:p-6 md:p-8 w-full border border-gray-200">
                                            <div class="flex justify-between items-center mb-3 sm:mb-4">
                                                <span class="font-bold text-white text-base sm:text-lg">Layanan
                                                    Dipilih</span>
                                                <span class="font-bold text-white text-base sm:text-lg">Harga</span>
                                            </div>
                                            <div class="flex flex-col gap-0.5 layanan-list">
                                                @foreach ($cat->penitipanLayanans as $layanan)
                                                    <div
                                                        class="flex items-center justify-between text-white font-semibold bg-transparent rounded text-sm sm:text-base">
                                                        <span>{{ $layanan->pethouseLayanan->layanan->name }}</span>
                                                        <span
                                                            class="font-bold text-white">Rp{{ number_format($layanan->price ?? 0, 0, ',', '.') }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-2.5 flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8 items-start relative">
                    <div class="flex-1 w-full">
                        <div
                            class="bg-white rounded-lg sm:rounded-xl shadow p-4 sm:p-6 border border-gray-200 mb-4 sm:mb-6">
                            <h2 class="font-bold text-blue-700 mb-2 text-base sm:text-lg">Kondisi Kucing</h2>
                            <section>
                                @forelse ($penitipan->laporans as $laporan)
                                    <div class=" p-4 gap-x-5 gap-y-2.5 flex flex-col md:flex-row ">
                                        <article class="md:flex-2/5 space-y-2.5">
                                            <h1 class="font-semibold">Foto Kondisi Kucing</h1>
                                            <img src="{{ $laporan->photos }}" alt="Report Photo"
                                                class="aspect-video h-fit object-center rounded-lg object-cover border border-gray-200">
                                        </article>
                                        <article class="md:flex-3/5 space-y-2.5 flex flex-col justify-between">
                                            <div>
                                                <h1 class="font-semibold">Keterangan</h1>
                                                <p class="break-words">{!! nl2br($laporan->caption) !!}</p>
                                            </div>
                                            <h3 class="font-medium text-gray-600 text-right">
                                                {{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}</h3>
                                        </article>
                                    </div>
                                @empty
                                    <div class="text-center py-8 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada laporan</h3>
                                        <p class="mt-1 text-sm text-gray-500">Tidak ada laporan harian yang tersedia untuk
                                            penitipan ini.
                                        </p>
                                    </div>
                                @endforelse
                            </section>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- Payment Summary -->
                    <div class="mt-6 sm:mt-8 flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8 items-start relative">
                        <div class="flex-1 w-full">
                            <div
                                class="bg-white rounded-lg sm:rounded-xl shadow p-4 sm:p-6 border border-gray-200 mb-4 sm:mb-6">
                                <div class="font-bold text-blue-700 mb-2 text-base sm:text-lg">Ringkasan Pembayaran</div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-xs sm:text-sm mb-2">
                                        <thead>
                                            <tr class="text-[#1A1A1A] font-semibold">
                                                <th class="text-left py-1 sm:py-2">Layanan</th>
                                                <th class="text-left py-1 sm:py-2">Keterangan</th>
                                                <th class="text-right py-1 sm:py-2">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="py-1 sm:py-2">Penitipan</td>
                                                <td class="py-1 sm:py-2">{{ $penitipan->hewans->count() }} kucing x
                                                    {{ $penitipan->duration }} hari</td>
                                                <td class="text-right py-1 sm:py-2">
                                                    Rp{{ number_format(($penitipan->petCareCosts ?? 0) * $penitipan->hewans->count() * $penitipan->duration, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @foreach ($penitipan->hewans as $cat)
                                                @foreach ($cat->penitipanLayanans as $layanan)
                                                    <tr>
                                                        <td class="py-1 sm:py-2">
                                                            {{ $layanan->pethouseLayanan->layanan->name ?? '-' }}
                                                        </td>
                                                        <td class="py-1 sm:py-2">Kucing: {{ $cat->name }}</td>
                                                        <td class="text-right py-1 sm:py-2">
                                                            Rp{{ number_format($layanan->price, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" class="font-bold text-[#FF3B3B] py-1 sm:py-2">Total
                                                    Pembayaran</td>
                                                <td class="text-right font-bold text-[#FF3B3B] py-1 sm:py-2">
                                                    Rp{{ number_format(($penitipan->petCareCosts ?? 0) * $penitipan->hewans->count() * $penitipan->duration + $penitipan->hewans->flatMap->penitipanLayanans->sum('price'), 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($penitipan->status === 'menunggu pembayaran')
                        <div class="flex justify-end w-full">
                            <button id="pay-button"
                                class="bg-green-500 w-full md:w-fit hover:bg-green-600 text-white font-bold px-4 py-2 rounded-lg text-sm sm:text-base shadow transition">
                                Bayar Sekarang
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
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
                    Laporkan Penitipan
                </h3>
                <p class="text-gray-500 mb-3 sm:mb-4 text-sm sm:text-base">
                    Sampaikan keluhan dan permasalahanmu untuk pethouse ini.
                </p>
                <form method="POST" action="{{ route('customer.penitipan.report', $penitipan->id) }}">
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
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('app.midtrans.client_key') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const payButton = document.getElementById('pay-button');
            if (payButton) {
                payButton.onclick = function() {
                    snap.pay('{{ $penitipan->snapToken ?? '' }}', {
                        onSuccess: function(result) {
                            // Redirect or show success message
                            window.location.reload();
                        },
                        onPending: function(result) {
                            // Handle pending payment
                            window.location.reload();
                        },
                        onError: function(result) {
                            // Handle error
                            window.location.reload();
                        }
                    });
                };
            }

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

        function closeLaporkanModal() {
            const modal = document.getElementById('laporkan-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex', 'items-center', 'justify-center');
        }
    </script>
@endsection
