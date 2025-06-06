<x-MeowinnLayout header="Pet House Preview" class="m-5 p-5 rounded-2xl shadow-sm" id="content" activeMenu="Pet House">
    <!-- Profile Section -->
    <div class="mb-8">
        <!-- Header with Name and Rating -->
        <div class="flex  md:items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">{{ $profilePethouse->name }}</h1>
            @if ($profilePethouse->verificationStatus === 'disetujui')
                @if ($profilePethouse->penalty)
                    <form id="delete-penalty-form"
                        action="{{ route('meowinn.penalty.delete', ['id' => $profilePethouse->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error rounded-xl">Hapus Penalty</button>
                    </form>
                @else
                    <form id="create-penalty-form"
                        action="{{ route('meowinn.penalty.create', ['id' => $profilePethouse->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="penalty" id="penalty-duration">
                        <button class="btn btn-error rounded-xl">Penalty</button>
                    </form>
                @endif
            @else
                <div class="flex flex-col md:flex-row gap-2.5">
                    <form id="form-tolak"
                        action="{{ route('meowinn.pengajuanlayanan.delete', ['id' => $profilePethouse->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error min-w-22">Tolak</button>
                    </form>
                    <form id="form-terima"
                        action="{{ route('meowinn.pengajuanlayanan.update', ['id' => $profilePethouse->id]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success">Terima</button>

                    </form>
                </div>
            @endif
        </div>

        <!-- Address -->
        <div class="flex items-start mb-4">
            <svg class="w-5 h-5 text-gray-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <p class="text-gray-600">{{ $profilePethouse->alamat ?? 'Jalan Manggar No. 127' }}</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                <p class="text-sm text-gray-500">Layanan</p>
                <p class="font-semibold text-blue-600 text-2xl">{{ $profilePethouse->pethouseLayanans->count() }}</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                <p class="text-sm text-gray-500">Transaksi</p>
                <p class="font-semibold text-green-600 text-2xl">{{ $profilePethouse->penitipans->count() }}</p>
            </div>
        </div>

        <!-- Description -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200">
            <h3 class="font-semibold text-gray-700 mb-2">Deskripsi</h3>
            <p class="text-gray-600">{{ $profilePethouse->deskripsi }}</p>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Foto Lokasi</h2>
        @if ($profilePethouse->locationPhotos && count($profilePethouse->locationPhotos) > 0)
            <div class="swiper mySwiper rounded-2xl shadow lg:max-w-2/3 aspect- mx-auto">
                <div class="swiper-wrapper">
                    @foreach ($profilePethouse->locationPhotos as $photo)
                        <div class="swiper-slide">
                            <img src="{{ $photo }}" class="w-full object-cover" alt="Pet House Photo" />
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>
        @else
            <div class="h-64 bg-gray-100 rounded-xl flex items-center justify-center">
                <p class="text-gray-500">Tidak ada foto tersedia</p>
            </div>
        @endif
    </div>

    <!-- Services Section -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Layanan Kami</h2>
            <span class="text-sm text-gray-500">{{ $profilePethouse->pethouseLayanans->count() }} layanan
                tersedia</span>
        </div>

        @if ($profilePethouse->pethouseLayanans->count() > 0)
            <div class="swiper mySwiper rounded-2xl shadow lg:max-w-2/3 mx-auto aspect-video">
                <!-- Tambahkan aspect-ratio di sini -->
                <div class="swiper-wrapper">
                    @foreach ($profilePethouse->locationPhotos as $photo)
                        <div class="swiper-slide">
                            <!-- Gunakan parent div untuk aspect ratio -->
                            <div class="aspect-video w-full">
                                <img src="{{ $photo }}" class="w-full h-full object-cover"
                                    alt="Pet House Photo" />
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        @else
            <div class="bg-gray-50 p-8 rounded-lg text-center">
                <p class="text-gray-500">Belum ada layanan yang tersedia</p>
            </div>
        @endif
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiper = new Swiper(".mySwiper", {
                pagination: {
                    el: ".swiper-pagination",
                },
            });

            const deleteForm = document.getElementById('delete-penalty-form');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin menghapus penalty?',
                        text: 'Tindakan ini tidak bisa dibatalkan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.submit();
                        }
                    });
                });
            }

            const createForm = document.getElementById('create-penalty-form');
            if (createForm) {
                createForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Masukkan durasi penalty (dalam hari)',
                        input: 'number',
                        inputAttributes: {
                            min: 1
                        },
                        inputValidator: (value) => {
                            if (!value || value < 1) {
                                return 'Durasi harus lebih dari 0 hari';
                            }
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Kirim',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('penalty-duration').value = result.value;
                            createForm.submit();
                        }
                    });
                });
            }

            const formTolak = document.getElementById('form-tolak');
            const formTerima = document.getElementById('form-terima');

            if (formTolak) {
                formTolak.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Tolak Pengajuan?',
                        text: 'Pengajuan layanan akan ditolak.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Tolak',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            formTolak.submit();
                        }
                    });
                });
            }

            if (formTerima) {
                formTerima.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Terima Pengajuan?',
                        text: 'Pengajuan layanan akan disetujui.',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Terima',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            formTerima.submit();
                        }
                    });
                });
            }

        });
    </script>

    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #000;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</x-MeowinnLayout>
