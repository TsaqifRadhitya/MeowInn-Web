<x-pethouse-layout header="{{ 'Penitipan - #' . $penitipan->id }}" class="p-5 md:p-10" id="content"
    activeMenu="Penitipan">
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <div class="flex flex-col md:flex-row md:justify-between">
                <h1 class="font-bold text-xl">Status Penitipan</h1>
                <h1 class="px-3 py-1 rounded-full text-sm font-medium text-[#F69246] w-fit bg-[#F69246]/30">
                    {{ ucfirst($penitipan->status) }}
                </h1>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <h2 class="text-xl font-bold mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>
                Daftar Hewan ({{ $penitipan->hewans->count() }})
            </h2>

            <div class="space-y-4">
                @foreach ($penitipan->hewans as $hewan)
                    <div class="border border-gray-100 rounded-lg p-4 hover:border-orange-200 transition-colors">
                        <div class="flex flex-col md:flex-row ">
                            <div class="flex-shrink-0 mb-3 md:mb-0 md:mr-4">
                                <img src="{{ $hewan->foto }}" alt="{{ $hewan->name }}"
                                    class="aspect-square w-full md:w-50 rounded-lg object-cover border border-orange-100">
                            </div>

                            <div class="flex-grow">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div>
                                        <h3 class="font-semibold text-lg text-gray-800">{{ $hewan->name }}</h3>
                                        <p class="text-gray-600">{{ $hewan->description }}</p>
                                    </div>
                                    <div class="mt-2 md:mt-0">
                                        <span class="px-2 py-1 text-xs rounded-full bg-orange-100 text-orange-800">
                                            {{ $hewan->penitipanLayanans->count() }} Layanan
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h4 class="text-sm font-medium text-gray-500 mb-2">Layanan:</h4>
                                    <div class="flex flex-col gap-2 w-full">
                                        @foreach ($hewan->penitipanLayanans as $layanan)
                                            <div class="border border-gray-100 rounded p-3 bg-gray-50">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <p class="font-medium text-gray-800">
                                                            {{ $layanan->pethouseLayanan->layanan->name }}</p>
                                                    </div>
                                                    <span class="text-orange-500 font-medium">Rp
                                                        {{ number_format($layanan->price, 0, ',', '.') }}</span>
                                                </div>
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

        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <div class="flex flex-col md:justify-between">
                <h1 class="font-bold text-xl mb-5">Total Transaksi</h1>
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Total Pembayaran:</span>
                        <span class="text-xl font-bold text-orange-500">
                            Rp
                            {{ number_format($penitipan->duration * $penitipan->petCareCosts * $penitipan->hewans->count() + $penitipan->hewans->sum(fn($hewan) => $hewan->penitipanLayanans->sum('price')), 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Metode Pembayaran:</span>
                        <span class="font-medium">{{ $penitipan->isCash ? 'Tunai' : 'Non-tunai' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Pengantaran:</span>
                        <span class="font-medium">{{ $penitipan->isPickUp ? 'Diantar' : 'Dititipkan langsung' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <h2 class="text-xl font-bold mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Informasi Pemilik
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        @if ($penitipan->users->profilePicture)
                            <img src="{{ $penitipan->users->profilePicture }}" alt="{{ $penitipan->users->name }}"
                                class="h-12 w-12 rounded-full border-2 border-orange-200">
                        @else
                            <div
                                class="h-12 w-12 rounded-full bg-orange-100 border-2 border-orange-200 flex items-center justify-center text-orange-500 font-medium">
                                {{ substr($penitipan->users->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $penitipan->users->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $penitipan->users->email }}</p>
                        <p class="text-sm text-gray-600">{{ $penitipan->users->phoneNumber }}</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-700">{{ $penitipan->address }}, {{ $penitipan->village->villageName }},
                            {{ $penitipan->village->district->districtName }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-700">Mulai:
                            {{ \Carbon\Carbon::parse($penitipan->created_at)->format('d M Y H:i') }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700">Durasi: {{ $penitipan->duration }} hari</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Section -->
        <div class="bg-white rounded-xl shadow-sm p-5 border space-y-5 border-gray-100">
            <section class="flex justify-between items-center">
                <h2 class="text-xl font-bold mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Laporan Harian
                </h2>
                @if ($penitipan->laporans->count() > 0 && $penitipan->status === 'sedang dititipkan')
                    <a href="{{ route('pethouse.reports.create', $penitipan->id) }}"
                        class="btn bg-orange-500 text-white border border-orange-500 mt-2 rounded-lg hover:text-orange-500 hover:bg-transparent">Tambah
                        Laporan</a>
                @endif
            </section>
            @if ($penitipan->laporans->count() > 0)
                <div class="space-y-4 text-gray-600">
                    @foreach ($penitipan->laporans as $laporan)
                        <div
                            class="border border-gray-100 rounded-lg p-4 gap-x-5 gap-y-2.5 flex flex-col md:flex-row hover:shadow-md transition-shadow">
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
                                <div class="flex flex-col md:flex-row justify-between md:items-center gap-y-1.5">
                                    <h3 class="font-medium text-gray-600 w-fit">
                                        {{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}</h3>
                                    @if ($penitipan->status === 'sedang dititipkan')
                                        <div class="flex w-full md:w-fit flex-col md:flex-row gap-2.5">
                                            <a href="{{ route('pethouse.reports.edit', $laporan->id) }}"
                                                class="btn btn-warning min-w-32 text-white rounded-lg">Edit</a>
                                            <form id="delete-form"
                                                action="{{ route('pethouse.reports.destroy', $laporan->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete()"
                                                    class="px-6 py-2 w-full cursor-pointer bg-red-500 text-white font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                                    Hapus Laporan
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 bg-gray-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada laporan</h3>
                    <p class="mt-1 text-sm text-gray-500">Tidak ada laporan harian yang tersedia untuk penitipan ini.
                    </p>
                    @if ($penitipan->status === 'sedang dititipkan')
                        <a href="{{ route('pethouse.reports.create', $penitipan->id) }}"
                        class="btn bg-orange-500 text-white border border-orange-500 mt-2 rounded-lg hover:text-orange-500 hover:bg-transparent">Tambah
                        Laporan</a>
                    @endif
                </div>
            @endif
        </div>
        @if (!in_array($penitipan->status, ['menunggu pembayaran', 'gagal', 'selesai']))
            <form action="{{ route('pethouse.penitipan.update', $penitipan->id) }}" method="POST"
                class="flex justify-end">
                @csrf
                @method('PATCH')
                <button type="submit"
                    class="px-4 py-2 cursor-pointer bg-orange-500 text-white rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors">
                    Perbarui Status
                </button>
            </form>
        @endif
    </div>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan laporan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
</x-pethouse-layout>
