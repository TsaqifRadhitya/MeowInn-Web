<x-meowinn-layout header="Pet House Preview" class="p-10 rounded-2xl shadow-sm flex flex-col gap-5 text-[#787878]"
    id="content" activeMenu="Pet House">
    <section class="flex flex-col md:flex-row gap-10">
        <img src="{{ $profilePethouse->user->profilePicture }}"
            class="aspect-video h-fit md:w-1/3 object-cover object-center" alt="">
        <article class="md:w-2/3 w-full text-lg">
            <div class="flex justify-between items-start">
                <h1 class="font-black text-[#FF7B54] text-4xl">{{ $profilePethouse->name }}</h1>
                @if ($profilePethouse->penalty)
                    <div class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                        Penalty: {{ $profilePethouse->penalty }} hari
                    </div>
                @endif
            </div>
            <div class="flex gap-x-2.5 gap-y-1 flex-col md:flex-row">
                <h1 class="md:w-1/5">Nomor Telepon : </h1>
                <h1>{{ $profilePethouse->user->phoneNumber }}</h1>
            </div>
            <div class="flex gap-x-2.5 gap-y-1 flex-col md:flex-row">
                <h1 class="md:w-1/9">Alamat : </h1>
                <h1>{{ $profilePethouse->user->address }}, {{ $profilePethouse->user->village->villageName }},
                    {{ $profilePethouse->user->village->district->districtName }},
                    {{ $profilePethouse->user->village->district->city->cityName }},
                    {{ $profilePethouse->user->village->district->city->province->provinceName }}</h1>
            </div>
            <div class="flex flex-col md:flex-row gap-x-2.5 gap-y-1">
                <h1 class="md:w-1/8">Deskripsi : </h1>
                <h1 class="break-words">{!! nl2br($profilePethouse->description) !!}</h1>
            </div>
        </article>
    </section>

    <!-- Penalty Action Buttons -->
    <section class="flex gap-4 justify-end">
        @if ($profilePethouse->penalty)
            <form id="delete-penalty-form" method="POST"
                action="{{ route('meowinn.penalty.delete', $profilePethouse->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 bg-green-500 cursor-pointer text-white rounded-lg hover:bg-green-600 transition-colors">
                    Hapus Penalty
                </button>
            </form>
        @else
            <form id="create-penalty-form" method="POST"
                action="{{ route('meowinn.penalty.create', $profilePethouse->id) }}">
                @csrf
                <input type="hidden" id="penalty-duration" name="penalty">
                <button type="submit"
                    class="px-4 py-2 bg-red-500 cursor-pointer text-white rounded-lg hover:bg-red-600 transition-colors">
                    Berikan Penalty
                </button>
            </form>
        @endif
    </section>

    <section class="space-y-2.5">
        <h1 class="font-bold text-2xl">Fasilitas Pet House</h1>
        <div class="grid md:grid-cols-3 gap-10">
            @foreach (json_decode($profilePethouse->locationPhotos) as $photos)
                <img src="{{ $photos }}" class="aspect-video object-center object-cover" alt="">
            @endforeach
        </div>
    </section>
    <section class="flex flex-col gap-2.5 min-h-56">
        <h1 class="font-bold text-2xl">Layanan</h1>
        @forelse ($profilePethouse->pethouseLayanansActive as $layanan)
            <div class="p-4 hover:bg-gray-50 transition-colors shadow rounded-lg">
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
                                    class="text-lg font-bold text-[#F69246]">Rp{{ number_format($layanan->pethouselayanans?->price, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-gray-600 mt-2 line-clamp-2 break-words">{!! nl2br($layanan->pethouselayanans?->description ?? $layanan->description) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1 class="font-bold text-2xl text-center my-auto">Belum Tersedia Layanan Tambahan Lainnya</h1>
        @endforelse
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteForm = document.getElementById('delete-penalty-form');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin menghapus penalty?',
                        text: 'Pet House ini akan kembali aktif',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
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
                        title: 'Berikan Penalty',
                        html: `
                            <p class="mb-4">Masukkan durasi penalty (dalam hari)</p>
                            <input type="number" id="duration-input" class="swal2-input" min="1" placeholder="Jumlah hari" required>
                            <p class="mt-2 text-sm text-gray-500">Pet House akan dinonaktifkan selama periode penalty</p>
                        `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Berikan Penalty',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        preConfirm: () => {
                            const value = document.getElementById('duration-input').value;
                            if (!value || value < 1) {
                                Swal.showValidationMessage('Durasi harus lebih dari 0 hari');
                                return false;
                            }
                            return value;
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('penalty-duration').value = result.value;
                            createForm.submit();
                        }
                    });
                });
            }
        });
    </script>
</x-meowinn-layout>
