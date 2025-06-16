<x-meowinn-layout header="Daftar Layanan" id="content" activeMenu="Layanan" class="p-10">
    @if (Session::has('message'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <p class="text-green-700 font-medium">{{ Session::get('message') }}</p>
            </div>
        </div>
    @endif
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Layanan</h1>
            <p class="text-gray-600 mt-1">Kelola semua layanan yang tersedia</p>
        </div>
        <a href="{{ route('meowinn.layanan.create') }}"
            class="btn flex items-center gap-2 px-4 py-2.5 bg-[#FF7B54] text-white rounded-lg shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Tambah Layanan
        </a>
    </div>
    <div class="grid grid-cols-1 gap-6 pb-16">
        @forelse ($layanans as $layanan)
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/3 h-56 lg:h-60 overflow-hidden relative">
                        <img src="{{ $layanan->photos }}" alt="{{ $layanan->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="lg:w-2/3 p-6 flex flex-col">
                        <div class="flex-grow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $layanan->name }}</h3>
                            <div class="prose prose-sm text-gray-600 mb-4 max-w-none break-words line-clamp-3">
                                {!! nl2br($layanan->description) !!}
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 justify-end mt-4">
                            <a href="{{ route('meowinn.layanan.edit', $layanan->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('meowinn.layanan.destroy', $layanan->id) }}"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(this.form, '{{ $layanan->name }}')"
                                    class="inline-flex cursor-pointer items-center px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 fixed bottom-0 left-0 right-0 bg-white py-3 shadow-md">
                <div class="flex justify-center">
                    {{ $layanans->links() }}
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-700">Belum ada layanan</h3>
                <p class="mt-1 text-gray-500">Tambahkan layanan baru untuk memulai</p>
                <div class="mt-6">
                    <a href="{{ route('meowinn.layanan.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-[#FF7B54] text-white rounded-lg hover:bg-[#fe6a3d] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Tambah Layanan Pertama
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(form, layananName) {
            Swal.fire({
                title: `Hapus Layanan ${layananName}?`,
                html: `Anda akan menghapus layanan <strong>${layananName}</strong> secara permanen`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6B7280",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</x-meowinn-layout>
