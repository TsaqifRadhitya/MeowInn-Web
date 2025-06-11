<x-pethouse-layout header="Pet House Setting" class="md:p-10 md:pb-0 p-5" id="content" activeMenu="Pet House">
    <div class=" bg-white rounded-xl shadow-lg overflow-hidden p-6 mb-8 border border-gray-100">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="w-16 h-2 bg-[#F69246] mx-auto mb-4 rounded-full"></div>
            <h1 class="text-3xl font-bold text-gray-800">Pengaturan Pethouse</h1>
            <p class="text-gray-600 mt-2">Kelola pengaturan dasar pethouse Anda</p>
        </div>

        <form method="POST" action="{{ route('pethouse.setting.update') }}" enctype="multipart/form-data"
            class="space-y-8">
            @csrf
            @method('PATCH')

            <!-- Status Section -->
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Status Pethouse
                </h2>

                <div class="flex items-center">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="isOpen" class="sr-only peer"
                            {{ $pethouse->isOpen ? 'checked' : '' }}>
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#F69246]">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-700">
                            {{ $pethouse->isOpen ? 'Buka' : 'Tutup' }} -
                            <span
                                class="text-gray-500">{{ $pethouse->isOpen ? 'Menerima penitipan baru' : 'Tidak menerima penitipan baru' }}</span>
                        </span>
                    </label>
                </div>
            </div>

            <!-- Basic Information Section -->
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Informasi Dasar
                </h2>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                        Pethouse</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246] placeholder-gray-400"
                        placeholder="Jelaskan fasilitas dan layanan yang tersedia">{{ old('description', $pethouse->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pet Care Cost -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="petCareCost" class="block text-sm font-medium text-gray-700 mb-1">Biaya Perawatan
                            per Hari</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" id="petCareCost" name="petCareCost"
                                value="{{ old('petCareCost', $pethouse->petCareCost) }}"
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246]"
                                placeholder="Contoh: 75000">
                        </div>
                        @error('petCareCost')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Service Range Section -->
            <div class="bg-orange-50 p-6 rounded-lg space-y-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Pengantaran dan Penjemputan
                </h2>
                <div class="flex items-center justify-end md:justify-start mt-6 md:mt-0">
                    <input id="pickUpService" name="pickUpService" type="checkbox"
                        class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300 rounded"
                        {{ $pethouse->pickUpService ? 'checked' : '' }}>
                    <label for="pickUpService" class="ml-3 block text-sm font-medium text-gray-700">
                        Menyediakan layanan pengantaran dan penjemputan hewan
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <label
                        class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                        <input id="range-village" name="range" type="radio" value="village"
                            class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                            {{ $pethouse->range == 'village' ? 'checked' : '' }}>
                        <span class="ml-3 block text-sm font-medium text-gray-700">
                            Dalam Desa/Kelurahan
                        </span>
                    </label>
                    <label
                        class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                        <input id="range-district" name="range" type="radio" value="district"
                            class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                            {{ $pethouse->range == 'district' ? 'checked' : '' }}>
                        <span class="ml-3 block text-sm font-medium text-gray-700">
                            Dalam Kecamatan
                        </span>
                    </label>
                    <label
                        class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                        <input id="range-city" name="range" type="radio" value="city"
                            class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                            {{ $pethouse->range == 'city' ? 'checked' : '' }}>
                        <span class="ml-3 block text-sm font-medium text-gray-700">
                            Dalam Kota/Kabupaten
                        </span>
                    </label>
                </div>
                @error('range')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Photos Section -->
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Foto Lokasi
                </h2>
                <p class="text-sm text-gray-600 mb-6">Unggah foto yang menunjukkan fasilitas pethouse Anda</p>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-3">Foto Saat Ini</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach (json_decode($pethouse->locationPhotos) as $index => $photo)
                            <div class="relative group">
                                <img src="{{ $photo }}" alt="Foto Pethouse {{ $index + 1 }}"
                                    class="w-full h-32 object-cover rounded-lg">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button type="button"
                                        class="text-white p-2 bg-black bg-opacity-50 rounded-full hover:bg-opacity-70"
                                        onclick="confirm('Yakin ingin menghapus foto ini?') ? document.getElementById('remove-photo-{{ $index }}').submit() : null">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- New Photos Upload -->
                <!-- Photos Section -->
                <!-- New Photos Upload -->
                <div>
                    <input id="locationPhotos" name="locationPhotos[]" type="file" multiple accept="image/*"
                        class="w-full border border-gray-300 rounded-lg p-3 text-sm cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200"
                        onchange="previewMultipleImages(this)">
                    @error('locationPhotos')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG (Maksimal 2MB per foto)</p>
                </div>

                <div id="previewContainer" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mt-4">
                </div>


                <!-- Form Submission -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-[#F69246] text-white font-medium rounded-lg shadow-md hover:bg-[#e07f35] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F69246] transition-colors duration-200 transform hover:scale-[1.02]">
                        Simpan Perubahan
                    </button>
                </div>
        </form>
    </div>

    <script>
        // Function to preview uploaded images
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                input.parentElement.querySelector('svg').classList.add('hidden');
                input.parentElement.querySelector('span').classList.add('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function previewMultipleImages(input) {
            const previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = ''; // Reset container
            const files = input.files;

            if (files) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-32 object-cover rounded-lg shadow';
                        previewContainer.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                });
            }
        }

        // Toggle switch label update
        const toggleSwitch = document.querySelector('input[name="isOpen"]');
        const toggleLabel = document.querySelector('input[name="isOpen"] + div + span');

        toggleSwitch.addEventListener('change', function() {
            if (this.checked) {
                toggleLabel.innerHTML = 'Buka - <span class="text-gray-500">Menerima penitipan baru</span>';
            } else {
                toggleLabel.innerHTML = 'Tutup - <span class="text-gray-500">Tidak menerima penitipan baru</span>';
            }
        });
    </script>
</x-pethouse-layout>
