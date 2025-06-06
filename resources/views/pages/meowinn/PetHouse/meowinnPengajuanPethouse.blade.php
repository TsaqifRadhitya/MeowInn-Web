<x-MeowinnLayout header="Pengajuan Pet House" class="px-5 pt-5" id="content" activeMenu="Pet House">
    <div class="space-y-6 mb-20">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row-reverse justify-between items-start md:items-center gap-4">
            <div>
                <p class="text-gray-600">Kelola pengajuan pendaftaran pet house baru</p>
            </div>
            <div class="bg-blue-50 px-4 py-2 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-blue-700">Total Pengajuan: {{ $daftarPengajuan->total() }}</span>
            </div>
        </div>

        <!-- Desktop Table Header -->
        <div
            class="hidden md:grid grid-cols-12 gap-4 bg-gradient-to-r from-[#F69246] to-[#EC7070] text-white p-4 rounded-lg font-semibold">
            <div class="col-span-1">No</div>
            <div class="col-span-3">Tanggal Pengajuan</div>
            <div class="col-span-4">Nama Pethouse</div>
            <div class="col-span-4 text-center">Aksi</div>
        </div>

        <!-- Card List -->
        @forelse ($daftarPengajuan as $index => $pengajuan)
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 border border-gray-100">
                <!-- Mobile View -->
                <div class="md:hidden p-4 space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-gray-500">No.
                            {{ ($daftarPengajuan->currentPage() - 1) * $daftarPengajuan->perPage() + $index + 1 }}</span>
                        <span
                            class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $pengajuan->updated_at->diffForHumans() }}</span>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div
                            class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $pengajuan->name }}</h3>
                            <p class="text-sm text-gray-500">Diajukan pada:
                                {{ $pengajuan->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="pt-2 flex justify-end space-x-2">
                        <a href="{{ route('meowinn.pethouse.show', ['id' => $pengajuan->id]) }}"
                            class="btn btn-sm btn-info hover:bg-blue-600 transition-colors">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>

                        <form method="POST" action="{{ route('meowinn.pengajuanlayanan.delete', $pengajuan->id) }}"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-error hover:bg-red-600 transition-colors delete-btn"
                                data-name="{{ $pengajuan->name }}">
                                <i class="fas fa-times mr-1"></i> Tolak
                            </button>
                        </form>

                        <form method="POST" action="{{ route('meowinn.pengajuanlayanan.update', $pengajuan->id) }}"
                            class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="btn btn-sm btn-success hover:bg-green-600 transition-colors approve-btn"
                                data-name="{{ $pengajuan->name }}">
                                <i class="fas fa-check mr-1"></i> Approve
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Desktop View -->
                <div class="hidden md:grid grid-cols-12 gap-4 items-center p-4">
                    <div class="col-span-1 text-gray-700">
                        {{ ($daftarPengajuan->currentPage() - 1) * $daftarPengajuan->perPage() + $index + 1 }}
                    </div>
                    <div class="col-span-3">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $pengajuan->updated_at->format('d M Y H:i') }}</span>
                        </div>
                    </div>
                    <div class="col-span-4 font-medium text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        {{ $pengajuan->name }}
                    </div>
                    <div class="col-span-4 flex justify-center space-x-3">
                        <a href="{{ route('meowinn.pethouse.show', ['id' => $pengajuan->id]) }}"
                            class="btn btn-info hover:bg-blue-600 transition-colors flex items-center">
                            <i class="fas fa-eye mr-2"></i> Detail
                        </a>

                        <form method="POST" action="{{ route('meowinn.pengajuanlayanan.delete', $pengajuan->id) }}"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-error hover:bg-red-600 transition-colors flex items-center delete-btn"
                                data-name="{{ $pengajuan->name }}">
                                <i class="fas fa-times mr-2"></i> Tolak
                            </button>
                        </form>

                        <form method="POST" action="{{ route('meowinn.pengajuanlayanan.update', $pengajuan->id) }}"
                            class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="btn btn-success hover:bg-green-600 transition-colors flex items-center approve-btn"
                                data-name="{{ $pengajuan->name }}">
                                <i class="fas fa-check mr-2"></i> Approve
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-700">Tidak ada pengajuan pet house</h3>
                <p class="mt-1 text-gray-500">Semua pengajuan telah diproses atau belum ada pengajuan baru</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="fixed flex justify-center bottom-0 left-0 right-0 bg-white py-3 shadow-md border-t border-gray-200">
        <div class="flex justify-center w-fit mx-auto">
            {{ $daftarPengajuan->links() }}
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Approve Confirmation
            document.querySelectorAll('.approve-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const petHouseName = this.getAttribute('data-name');

                    Swal.fire({
                        title: 'Approve Pengajuan?',
                        html: `Anda akan menyetujui pengajuan untuk <strong>${petHouseName}</strong>`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Approve',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#10B981',
                        cancelButtonColor: '#EF4444',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Reject Confirmation
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const petHouseName = this.getAttribute('data-name');

                    Swal.fire({
                        title: 'Tolak Pengajuan?',
                        html: `Anda akan menolak pengajuan untuk <strong>${petHouseName}</strong>`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Tolak',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#EF4444',
                        cancelButtonColor: '#6B7280',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-MeowinnLayout>
