<x-meowinn-layout header="Detail Layanan" id="content" activeMenu="Layanan" class="p-10">
    <div class="mx-auto space-y-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Swiper Gallery -->
            <div class="relative">
                @if ($layanan->photos)
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($layanan->photos) as $photo)
                                <img src="{{ $photo }}" class="swiper-slide object-cover object-top"
                                    alt="">
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                @else
                    <div class="h-96 bg-gray-100 flex items-center justify-center">
                        <p class="text-gray-500">Tidak ada foto.</p>
                    </div>
                @endif
            </div>

            <!-- Info Layanan -->
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $layanan->name }}</h1>
                    <div class="flex space-x-3">
                        <a href="{{ route('meowinn.layanan.edit', $layanan->id) }}"
                            class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('meowinn.layanan.destroy', $layanan->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(this.form, '{{ $layanan->name }}')"
                                class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <p class="text-gray-700 break-words break-all">{!! nl2br($layanan->description) !!}</p>
            </div>
        </div>
    </div>

    <!-- SwiperJS & SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".mySwiper", {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });

        function confirmDelete(form, layananName) {
            Swal.fire({
                title: `Hapus Layanan "${layananName}"?`,
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

    <style>
        .swiper {
            width: 100%;
            height: 400px;
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</x-meowinn-layout>
