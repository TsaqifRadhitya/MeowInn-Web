<x-pethouse-layout header="Layanan" class="p-5 md:p-10 md:pb-0" id="content" activeMenu="Pet House">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Layanan</h1>
                <p class="text-gray-600">Kelola layanan yang tersedia di pethouse Anda</p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow overflow-hidden">
            @if ($layanans->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach ($layanans as $layanan)
                        <div class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-48 h-40 flex-shrink-0 rounded-lg overflow-hidden">
                                    <img src="{{ $layanan->pethouselayanans?->photos ?? $layanan->photos }}"
                                        alt="{{ $layanan->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex flex-col h-full">
                                        <!-- Status and Name -->
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <span
                                                    class="px-2 py-1 text-xs rounded-full
                                                    @if ($layanan->pethouselayanans?->status) bg-green-100 text-green-800
                                                    @else bg-red-100 text-red-800 @endif">
                                                    {{ $layanan->pethouselayanans?->status ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                                <h3 class="text-lg font-semibold text-gray-800 mt-1">
                                                    {{ $layanan->name }}</h3>
                                            </div>
                                            <span
                                                class="text-lg font-bold text-[#F69246]">Rp{{ number_format($layanan->pethouselayanans?->price ?? 0, 0, ',', '.') }}</span>
                                        </div>
                                        <p class="text-gray-600 mt-2 line-clamp-2 break-words">{!! nl2br($layanan->pethouselayanans?->description ?? $layanan->description) !!}
                                        </p>
                                        <div class="mt-auto pt-4 flex flex-wrap gap-2">
                                            <a href="{{ route('pethouse.layanan.edit', $layanan->id) }}"
                                                class="px-3 py-1.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors text-sm flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('pethouse.layanan.status', $layanan->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status"
                                                    value="{{ $layanan->pethouselayanans?->status ? false : true }}">
                                                <button type="submit"
                                                    class="px-3 py-1.5 border border-gray-300 cursor-pointer text-gray-700 rounded-lg hover:bg-gray-100 transition-colors text-sm flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                                        </path>
                                                    </svg>
                                                    {{ $layanan->pethouselayanans?->status ? 'Nonaktifkan' : 'Aktifkan' }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                    {{ $layanans->links() }}
                </div>
            @endif
        </div>
    </div>
</x-pethouse-layout>
