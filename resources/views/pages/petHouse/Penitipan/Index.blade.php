<x-pethouse-layout header="Daftar Penitipan Berlangsung" class="p-5 md:p-10" id="content" activeMenu="Penitipan">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Penitipan</h2>
        <div class="relative">
            <button id="filterDropdownButton"
                class="flex cursor-pointer items-center space-x-2 px-4 py-2 border border-gray-200 rounded-lg bg-white hover:bg-gray-50 transition-colors">
                <span>{{ request('status') ?? 'Filter Status' }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div id="filterDropdown"
                class="hidden absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg z-10 border border-gray-100">
                <div class="p-2">
                    @foreach (['menunggu penjemputan', 'menunggu diantar ke pethouse', 'sedang dititipkan', 'sedang diantar pulang'] as $status)
                        <a href="{{ request()->fullUrlWithQuery(['status' => $status]) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-md transition-colors {{ request('status') == $status ? 'bg-orange-50 text-orange-600' : '' }}">
                            {{ ucfirst($status) }}
                        </a>
                    @endforeach
                    @if (request('status'))
                        <div class="border-t border-gray-100 mt-1 pt-1">
                            <a href="{{ request()->url() }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-md transition-colors">
                                Reset Filter
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @forelse ($penitipans as $penitipan)
        <a href="{{ route('pethouse.penitipan.show', $penitipan->id) }}">
            <div
                class="mb-6 p-5 border border-gray-100 rounded-xl shadow-sm bg-white hover:shadow-md transition-shadow duration-200">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100">
                    <span class="px-3 py-1 rounded-full text-sm font-medium"
                        style="background-color: rgba(246, 146, 70, 0.1); color: #F69246;">
                        {{ ucfirst($penitipan->status) }}
                    </span>
                    <div class="text-xl font-bold" style="color: #F69246;">
                        Rp
                        {{ number_format($penitipan->duration * $penitipan->petCareCosts * $penitipan->hewans->count() + $penitipan->hewans->sum(fn($hewan) => $hewan->penitipanLayanans->sum('price')), 0, ',', '.') }}
                    </div>
                </div>
                <div class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0"
                                style="color: #F69246;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-medium text-gray-700">Durasi Penitipan</p>
                                <p class="text-gray-600">{{ $penitipan->duration }} hari</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0"
                                style="color: #F69246;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <p class="font-medium text-gray-700">Lokasi</p>
                                <p class="text-gray-600">{{ $penitipan->address }},
                                    {{ $penitipan->village->villageName }},
                                    {{ $penitipan->village->district->districtName }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0"
                                style="color: #F69246;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <div>
                                <p class="font-medium text-gray-700">Pembayaran</p>
                                <p class="text-gray-600">{{ $penitipan->isCash ? 'Tunai' : 'Non-tunai' }} •
                                    {{ $penitipan->isPickUp ? 'Diantar' : 'Dititipkan langsung' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0"
                                style="color: #F69246;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="font-medium text-gray-700">Tanggal Penitipan</p>
                                <p class="text-gray-600">
                                    {{ \Carbon\Carbon::parse($penitipan['created_at'])->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-100">
                    <h4 class="text-sm font-medium text-gray-500 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" style="color: #F69246;"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informasi Pemilik
                    </h4>
                    <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                        <div class="relative">
                            @if ($penitipan->users->profilePicture)
                                <img src="{{ $penitipan->users->profilePicture }}" alt="{{ $penitipan->users->name }}"
                                    class="w-12 h-12 rounded-full object-cover border-2"
                                    style="border-color: #F69246;">
                            @else
                                <div class="w-12 h-12 rounded-full flex items-center justify-center border-2"
                                    style="background-color: rgba(246, 146, 70, 0.1); border-color: #F69246; color: #F69246;">
                                    {{ substr($penitipan['users']['name'], 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $penitipan['users']['name'] }}</p>
                            <div class="flex items-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" style="color: #F69246;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <p class="text-sm text-gray-600">{{ $penitipan['users']['phoneNumber'] }}</p>
                            </div>
                            <div class="flex items-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" style="color: #F69246;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <p class="text-sm text-gray-600">{{ $penitipan['users']['email'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="text-center py-16">
            <div class="mx-auto w-24 h-24 mb-4 flex items-center justify-center rounded-full"
                style="background-color: rgba(246, 146, 70, 0.1);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" style="color: #F69246;" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Tidak ada penitipan berlangsung</h3>
            <p class="mt-2 text-gray-500">Belum ada hewan yang sedang dititipkan saat ini.</p>
        </div>
    @endforelse

    <div class="w-fit mx-auto">
        {{ $penitipans->links() }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('filterDropdownButton');
            const dropdownMenu = document.getElementById('filterDropdown');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target)) {
                    dropdownMenu.classList.add('hidden')
                }
            })
        })
    </script>
</x-pethouse-layout>
