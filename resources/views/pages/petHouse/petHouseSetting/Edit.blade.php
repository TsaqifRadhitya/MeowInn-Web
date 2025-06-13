<x-pethouse-layout header="Pet House Setting" class="md:p-10 md:pb-0 p-5" id="content" activeMenu="Pet House">
    <div class=" bg-white overflow-hidden mb-8">
        <div class="text-center mb-8">
            <div class="w-16 h-2 bg-[#F69246] mx-auto mb-4 rounded-full"></div>
            <h1 class="text-3xl font-bold text-gray-800">Pengaturan Pethouse</h1>
            <p class="text-gray-600 mt-2">Kelola pengaturan dasar pethouse Anda</p>
        </div>
        <form method="POST" action="{{ route('pethouse.setting.update') }}" enctype="multipart/form-data"
            class="space-y-8">
            @csrf
            @method('PATCH')
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Status Pethouse
                </h2>

                <div class="flex items-center">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="isOpen" class="sr-only peer" @checked(old('isOpen', $pethouse->isOpen))>
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#F69246]">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-700">
                            {{ old('isOpen', $pethouse->isOpen) ? 'Buka' : 'Tutup' }} -
                            <span
                                class="text-gray-500">{{ old('isOpen', $pethouse->isOpen) ? 'Menerima penitipan baru' : 'Tidak menerima penitipan baru' }}</span>
                        </span>
                    </label>
                </div>
            </div>

            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Informasi Dasar
                </h2>
                <div class="mt-8 mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Foto Profil Anda</label>
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0 h-20 w-20 rounded-full overflow-hidden border-2 border-gray-300 relative group cursor-pointer"
                            onclick="document.getElementById('profilePicture').click()">
                            <img id="profilePreview"
                                src="{{ $pethouse->user->profilePicture ?? asset('asset/profile.png') }}"
                                class="h-full w-full object-cover" alt="Profile preview">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <label class="block">
                            <span class="sr-only">Pilih foto profil</span>
                            <input id="profilePicture" name="profilePicture" type="file"
                                class="block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:cursor-pointer
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-[#F69246] file:text-white
                                  hover:file:bg-[#e07f35] file:transition-colors"
                                accept="image/*">
                        </label>
                    </div>
                    @error('profilePicture')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                            Telepon</label>
                        <input type="text" id="phoneNumber" name="phoneNumber"
                            value="{{ old('phoneNumber', $pethouse->user->phoneNumber) }}" placeholder="nomor telepon"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246] placeholder-gray-400">
                        @error('phoneNumber')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
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
                    <div class="mb-6 md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                            Pethouse</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246] placeholder-gray-400"
                            placeholder="Jelaskan fasilitas dan layanan yang tersedia">{{ old('description', $pethouse->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-orange-50 p-6 rounded-lg space-y-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Pengantaran dan Penjemputan
                </h2>
                <div class="flex items-center justify-end md:justify-start mt-6 md:mt-0">
                    <input id="pickUpService" name="pickUpService" type="checkbox"
                        class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300 rounded"
                        @checked(old('pickUpService', $pethouse->pickUpService))>
                    <label for="pickUpService" class="ml-3 block text-sm font-medium text-gray-700">
                        Menyediakan layanan pengantaran dan penjemputan hewan
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <label
                        class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                        <input id="range-village" name="range" type="radio" value="village"
                            class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                            @checked(old('range', $pethouse->range) === 'village')>
                        <span class="ml-3 block text-sm font-medium text-gray-700">
                            Dalam Desa/Kelurahan
                        </span>
                    </label>
                    <label
                        class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                        <input id="range-district" name="range" type="radio" value="district"
                            class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                            @checked(old('range', $pethouse->range) === 'district')>
                        <span class="ml-3 block text-sm font-medium text-gray-700">
                            Dalam Kecamatan
                        </span>
                    </label>
                    <label
                        class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                        <input id="range-city" name="range" type="radio" value="city"
                            class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                            @checked(old('range', $pethouse->range) === 'city')>
                        <span class="ml-3 block text-sm font-medium text-gray-700">
                            Dalam Kota/Kabupaten
                        </span>
                    </label>
                </div>
                @error('range')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

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
                            <img src="{{ $photo }}" alt="Foto Pethouse {{ $index + 1 }}"
                                class="w-full h-32 object-cover rounded-lg">
                        @endforeach
                    </div>
                </div>
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
                <div class="flex justify-end mt-10">
                    <button type="submit"
                        class="px-6 py-3 bg-[#F69246] cursor-pointer text-white font-medium rounded-lg shadow-md hover:bg-[#e07f35] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F69246] transition-colors duration-200 transform hover:scale-[1.02]">
                        Simpan Perubahan
                    </button>
                </div>
        </form>
    </div>
    <script>
        const profilePictureInput = document.getElementById('profilePicture');
        profilePictureInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    profilePreview.src = event.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        function previewMultipleImages(input) {
            const previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = '';
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
