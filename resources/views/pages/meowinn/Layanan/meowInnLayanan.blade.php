<x-meowinn-layout header="Daftar Layanan" id="content" activeMenu="Layanan" class="px-5 pt-5">
    @if (Session::has('message'))
        <div class="bg-green-100 p-4 mb-5 rounded-lg border border-green-300 shadow-sm">
            <p class="text-green-800 font-medium">{{ Session::get('message') }}</p>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Layanan</h2>
        <a href="{{ route('meowinn.layanan.create') }}"
            class="btn btn-primary flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Tambah Layanan
        </a>
    </div>

    <div class="flex flex-col gap-6 pb-8">
        @foreach ($layanans as $layanan)
            <div
                class="bg-white rounded-xl shadow-md flex flex-col lg:flex-row overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow">
                <div class="h-48 overflow-hidden flex-1/3">
                    <img src="{{ asset('storage/' . json_decode($layanan->photos)[0]) }}" alt="{{ $layanan->name }}"
                        class="w-full h-full object-cover aspect-3/2 object-center">
                </div>

                <div class="p-5 flex-2/3">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $layanan->name }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $layanan->description }}</p>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('meowinn.layanan.show', $layanan->id) }}"
                            class="px-3 py-1.5 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition-colors flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Detail
                        </a>

                        <form method="POST" action="{{ route('meowinn.layanan.destroy', $layanan->id) }}"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(this.form, '{{ $layanan->name }}')"
                                class="px-3 py-1.5 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
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
        @endforeach
    </div>

    <script>
        function confirmDelete(form, layananName) {
            Swal.fire({
                title: `Hapus Layanan ${layananName}?`,
                text: "Data yang dihapus tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</x-meowinn-layout>
