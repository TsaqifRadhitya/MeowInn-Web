@extends('layouts.CustomerLayout')
@section('main')

    <body class="bg-[#fdf5f0]">
        <div class="bg-[#fdf5f0] min-h-screen pt-4 sm:pt-6 pb-2">
            <div class="max-w-6xl mx-auto px-3 sm:px-4">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#FF8855] mb-4 sm:mb-6">{{ $pethouse->name }}</h1>
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm sm:text-base">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('customer.penitipan.store', $pethouse->id) }}" method="POST"
                    enctype="multipart/form-data" id="penitipanForm">
                    @csrf
                    <input type="hidden" name="petHouseId" value="{{ $pethouse->id }}">
                    <div class="mb-4 sm:mb-6">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                            <div class="flex flex-col w-full sm:w-auto">
                                <label for="durasi-penitipan"
                                    class="block text-[#FF8855] font-semibold mb-1 text-lg sm:text-xl">Durasi
                                    Penitipan</label>
                                <input type="number" id="durasi-penitipan" name="duration"
                                    class="border border-gray-300 rounded-lg px-3 sm:px-4 py-1 sm:py-2 w-full sm:w-56 text-base sm:text-lg focus:ring-2 focus:ring-[#FF8855] focus:border-[#FF8855] bg-white shadow-sm">
                            </div>
                            <div class="flex items-end sm:h-full sm:mt-7">
                                <span
                                    class="bg-[#FF8855] text-white font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-lg text-base sm:text-lg shadow text-center w-full sm:w-56 inline-flex justify-center items-center"
                                    style="height:42px; sm:height:48px;">
                                    Rp{{ number_format($pethouse->petCareCost ?? 0, 0, ',', '.') }}/Hari
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8">
                        <div class="flex-1 relative" style="min-height: 100px;">
                            <div id="cat-forms-container"></div>
                            <div class="sticky sm:absolute right-0 bottom-0 flex gap-2 z-10 mt-4 sm:mt-0">
                                <button type="button" id="add-cat-form"
                                    class="bg-[#FF8855] text-white px-4 sm:px-5 py-2 rounded font-bold shadow hover:bg-[#ff6d1f] transition text-sm sm:text-base">
                                    Tambah Kucing
                                </button>
                                <button type="button" id="remove-cat-form"
                                    class="bg-[#F44336] text-white px-4 sm:px-5 py-2 rounded font-bold shadow hover:bg-[#d32f2f] transition text-sm sm:text-base">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="petCareCosts" id="petCareCosts" value="{{ $pethouse->petCareCost }}">
                    <input type="hidden" name="total" id="total" value="">
                    @if ($pickupServiceStatus)
                        <div class="mt-4 sm:mt-6 bg-white rounded-xl shadow p-4 sm:p-6 border border-gray-200 mb-4 sm:mb-6">
                            <div class="font-bold text-blue-700 mb-3 sm:mb-4 text-lg">Layanan Antar Jemput</div>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="isPickUp" value="1"
                                        class="form-radio text-[#FF8855] h-4 sm:h-5 w-4 sm:w-5">
                                    <span class="ml-2 text-gray-700 text-sm sm:text-base">Gunakan Layanan Antar Jemput
                                        (FREE)</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="isPickUp" value="0"
                                        class="form-radio text-[#FF8855] h-4 sm:h-5 w-4 sm:w-5" checked>
                                    <span class="ml-2 text-gray-700 text-sm sm:text-base">Tidak Menggunakan Layanan</span>
                                </label>
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="isPickUp" value="0">
                    @endif
                    <div class="mt-4 sm:mt-6 bg-white rounded-xl shadow p-4 sm:p-6 border border-gray-200 mb-4 sm:mb-6">
                        <div class="font-bold text-blue-700 mb-3 sm:mb-4 text-lg">Metode Pembayaran</div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="isCash" value="1"
                                    class="form-radio text-[#FF8855] h-4 sm:h-5 w-4 sm:w-5" checked>
                                <span class="ml-2 text-gray-700 text-sm sm:text-base">Bayar di Tempat (Cash)</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="isCash" value="0"
                                    class="form-radio text-[#FF8855] h-4 sm:h-5 w-4 sm:w-5">
                                <span class="ml-2 text-gray-700 text-sm sm:text-base">Transfer Online</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-6 sm:mt-8 flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8 items-start relative">
                        <div class="flex-1 w-full">
                            <div class="bg-white rounded-xl shadow p-4 sm:p-6 border border-gray-200 mb-4 sm:mb-6">
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
                                        <tbody id="ringkasan-body"></tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" class="font-bold text-[#FF3B3B] py-1 sm:py-2">Total
                                                    Pembayaran</td>
                                                <td class="text-right font-bold text-[#FF3B3B] py-1 sm:py-2"
                                                    id="total-pembayaran">Rp0</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="flex justify-end gap-3 sm:gap-4 mt-4">
                                    <button type="submit"
                                        class="bg-[#FF8855] text-white px-4 sm:px-6 py-2 rounded font-bold cursor-pointer shadow hover:bg-[#ff6d1f] transition text-sm sm:text-base">
                                        Lanjutkan Pembayaran
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="layanan-template" style="display:none">
            @foreach ($pethouse->pethouseLayanans as $layanan)
                @if ($layanan->status)
                    <label
                        class="flex items-center justify-between text-white font-semibold bg-transparent rounded px-2 py-1">
                        <span class="flex items-center">
                            <input type="checkbox" name="layanans[]"
                                class="layanan-checkbox accent-[#FF8855] mr-2 sm:mr-3 w-4 sm:w-5 h-4 sm:h-5 rounded focus:ring-2 focus:ring-white"
                                data-nama="{{ $layanan->layanan->name ?? '-' }}" data-harga="{{ $layanan->price ?? 0 }}"
                                value="{{ $layanan->id }}">
                            <span class="text-sm sm:text-base">{{ $layanan->layanan->name ?? '-' }}</span>
                        </span>
                        <span
                            class="font-bold text-white text-sm sm:text-base">Rp{{ number_format($layanan->price ?? 0, 0, ',', '.') }}</span>
                    </label>
                @endif
            @endforeach
        </div>
        <script>
            const petCareCost = {{ $pethouse->petCareCost ?? 0 }};
            let catCount = 1;
            const maxCat = 5;
            const catFormsContainer = document.getElementById('cat-forms-container');
            const layananListHtml = document.getElementById('layanan-template').innerHTML;

            function createCatForm(index) {
                const form = document.createElement('div');
                form.className = 'cat-form mb-4 sm:mb-6';
                form.innerHTML = `
        <div class="flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8">
            <div class="flex-1 bg-white rounded-xl sm:rounded-2xl shadow p-4 sm:p-6 md:p-8 border border-gray-200">
                <div class="font-bold text-blue-700 mb-3 sm:mb-4 text-base sm:text-lg">Data Kucing <span class="cat-number">${index+1}</span></div>
                <div class="mb-3 sm:mb-4">
                    <label class="block text-gray-700 mb-1 font-semibold text-sm sm:text-base">Nama Kucing</label>
                    <input type="text" name="cats[${index}][nama]" class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-1 sm:py-2 text-sm sm:text-base" placeholder="Cemara" required>
                </div>
                <div class="mb-3 sm:mb-4">
                    <label class="block text-gray-700 mb-1 font-semibold text-sm sm:text-base">Jenis Kucing</label>
                    <input type="text" name="cats[${index}][description]" class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-1 sm:py-2 text-sm sm:text-base" placeholder="Persia" required>
                </div>
                <div class="mb-3 sm:mb-4">
                    <label class="block text-gray-700 mb-1 font-semibold text-sm sm:text-base">Foto Kucing</label>
                    <div class="upload-area border-1 border-dashed rounded-xl flex flex-col items-center justify-center py-6 sm:py-8 cursor-pointer bg-[#FAFAFA] transition relative group min-h-[120px] sm:min-h-[150px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 sm:h-12 w-10 sm:w-12 text-[#FF8855] mb-2 sm:mb-3 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4 4h-4a1 1 0 01-1-1v-4m6 5a1 1 0 001-1v-4m-6 5a1 1 0 01-1-1v-4" /></svg>
                        <span class="text-xs sm:text-sm font-semibold text-[#FF8855] mb-1 text-center group-hover:underline">Click to upload <span class='text-gray-400 font-normal'>or drag and drop</span></span>
                        <span class="text-xs text-gray-400 mb-2 text-center">JPG, JPEG, PNG MAX 2MB</span>
                        <input type="file" name="cats[${index}][foto]" accept="image/*" required class="foto-input absolute inset-0 opacity-0 cursor-pointer">
                        <img class="preview-img hidden mt-3 sm:mt-4 rounded-lg max-h-24 sm:max-h-32 shadow border" alt="Preview Foto Kucing">
                    </div>
                </div>
            </div>
            <div class="w-full md:w-[300px] lg:w-[370px] flex flex-col items-center">
                <div class="bg-[#FF8855] rounded-xl sm:rounded-2xl shadow p-4 sm:p-6 md:p-8 w-full border border-gray-200">
                    <div class="flex justify-between items-center mb-3 sm:mb-4">
                        <span class="font-bold text-white text-sm sm:text-base md:text-lg">Pilih layanan</span>
                        <span class="font-bold text-white text-sm sm:text-base md:text-lg">Harga</span>
                    </div>
                    <div class="flex flex-col gap-2 sm:gap-3 md:gap-4 layanan-list">
                        ${layananListHtml.replace(/name="layanans\[\]"/g, `name="cats[${index}][layanans][]"`)}
                    </div>
                </div>
            </div>
        </div>
    `;
                return form;
            }

            function addCatForm() {
                if (catCount >= maxCat) return;
                const form = createCatForm(catCount);
                catFormsContainer.appendChild(form);
                catCount++;
                updateEventListeners();
                updateRingkasan();
            }

            function removeCatForm() {
                if (catCount <= 1) return;
                catFormsContainer.removeChild(catFormsContainer.lastElementChild);
                catCount--;
                updateRingkasan();
            }

            function updateEventListeners() {
                document.querySelectorAll('.foto-input').forEach(input => {
                    input.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const preview = e.target.parentElement.querySelector('.preview-img');
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(ev) {
                                preview.src = ev.target.result;
                                preview.classList.remove('hidden');
                            };
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = '';
                            preview.classList.add('hidden');
                        }
                    });
                });
                document.querySelectorAll('.layanan-checkbox').forEach(cb => {
                    cb.addEventListener('change', updateRingkasan);
                });
            }

            function updateRingkasan() {
                const ringkasanBody = document.getElementById('ringkasan-body');
                const totalPembayaran = document.getElementById('total-pembayaran');
                ringkasanBody.innerHTML = '';
                let total = 0;
                const durasi = parseInt(document.getElementById('durasi-penitipan').value) || 1;

                document.querySelectorAll('.cat-form').forEach((form, i) => {
                    const nama = form.querySelector(`[name^="cats"][name$="[nama]"]`).value || '-';
                    const biayaHarian = petCareCost;
                    const subtotalPenitipan = biayaHarian * durasi;
                    ringkasanBody.innerHTML +=
                        `<tr><td class="py-1 sm:py-2">Penitipan</td><td class="py-1 sm:py-2">Kucing: ${nama} x ${durasi} hari</td><td class="text-right py-1 sm:py-2">Rp${subtotalPenitipan.toLocaleString('id-ID')}</td></tr>`;
                    total += subtotalPenitipan;

                    form.querySelectorAll('.layanan-checkbox:checked').forEach(cb => {
                        const layananNama = cb.getAttribute('data-nama') || '-';
                        const layananHarga = parseInt(cb.getAttribute('data-harga')) || 0;
                        ringkasanBody.innerHTML +=
                            `<tr><td class="py-1 sm:py-2">${layananNama}</td><td class="py-1 sm:py-2">Kucing: ${nama}</td><td class="text-right py-1 sm:py-2">Rp${layananHarga.toLocaleString('id-ID')}</td></tr>`;
                        total += layananHarga;
                    });
                });

                totalPembayaran.textContent = `Rp${total.toLocaleString('id-ID')}`;
                document.getElementById('total').value = total;
            }

            document.getElementById('durasi-penitipan').addEventListener('change', updateRingkasan);

            document.getElementById('add-cat-form').addEventListener('click', addCatForm);
            document.getElementById('remove-cat-form').addEventListener('click', removeCatForm);

            window.addEventListener('DOMContentLoaded', () => {
                catFormsContainer.innerHTML = '';
                catCount = 0;
                addCatForm();
            });
        </script>
    @endsection
