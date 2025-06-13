<x-pethouse-layout header="Pengajuan Verifikasi Pethouse" class="md:p-10 md:pb-0 p-5" id="content">
    <div class="mx-auto bg-white overflow-hidden mb-8">
        <div class="text-center mb-8">
            <div class="w-16 h-2 bg-[#F69246] mx-auto mb-4 rounded-full"></div>
            <h1 class="text-3xl font-bold text-gray-800">Formulir Verifikasi Pethouse</h1>
            <p class="text-gray-600 mt-2">Lengkapi data berikut untuk mengajukan verifikasi pethouse Anda</p>
        </div>

        <form method="POST" action="{{ route('pethouse.verifikasi.store') }}" enctype="multipart/form-data"
            class="space-y-8">
            @csrf
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Informasi Dasar
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pethouse</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', $user->petHouses?->name) }}" placeholder="nama pethouse"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246] placeholder-gray-400">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                            Telepon</label>
                        <input type="text" id="phoneNumber" name="phoneNumber"
                            value="{{ old('phoneNumber', $user->phoneNumber) }}" placeholder="nomor telepon"
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
                                value="{{ old('petCareCost', $user->petHouses?->petCareCost) }}"
                                placeholder="biaya penitipan"
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246]">
                        </div>
                        @error('petCareCost')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                        Pethouse</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#F69246] focus:border-[#F69246] placeholder-gray-400"
                        placeholder="penjelasan pethouse">{{ old('description', $user->petHouses?->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Informasi Lokasi
                </h2>
                <div class="space-y-4">
                    <div>
                        <label for="province" class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                        <select id="province" name="province"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Pilih Provinsi</option>
                        </select>
                        @error('province')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="city"
                            class="block text-sm font-medium text-gray-700 mb-1">Kota/Kabupaten</label>
                        <select id="city" name="city"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            disabled>
                            <option value="">Pilih Kota/Kabupaten</option>
                        </select>
                        @error('city')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="district" class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                        <select id="district" name="district"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            disabled>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        @error('district')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="village"
                            class="block text-sm font-medium text-gray-700 mb-1">Kelurahan/Desa</label>
                        <select id="village" name="village"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            disabled>
                            <option value="">Pilih Kelurahan/Desa</option>
                        </select>
                        @error('village')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                            Lengkap</label>
                        <textarea name="address" id="address" rows="3"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Jangkauan Antar Jemput</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label
                            class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                            <input id="range-village" name="range" type="radio" value="village"
                                class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                                {{ old('range', $user->petHouses?->range) == 'village' ? 'checked' : '' }}>
                            <span class="ml-3 block text-sm font-medium text-gray-700">
                                Dalam Desa/Kelurahan
                            </span>
                        </label>
                        <label
                            class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                            <input id="range-district" name="range" type="radio" value="district"
                                class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                                {{ old('range') == 'district' ? 'checked' : '' }}>
                            <span class="ml-3 block text-sm font-medium text-gray-700">
                                Dalam Kecamatan
                            </span>
                        </label>
                        <label
                            class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-orange-50 hover:border-[#F69246] transition-colors has-[:checked]:border-[#F69246] has-[:checked]:bg-orange-50">
                            <input id="range-city" name="range" type="radio" value="city"
                                class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300"
                                {{ old('range', $user->petHouses?->range) == 'city' ? 'checked' : '' }}>
                            <span class="ml-3 block text-sm font-medium text-gray-700">
                                Dalam Kota/Kabupaten
                            </span>
                        </label>
                    </div>
                    @error('range')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6 flex items-center">
                    <input id="pickUpService" name="pickUpService" type="checkbox"
                        class="h-4 w-4 text-[#F69246] focus:ring-[#F69246] border-gray-300 rounded"
                        {{ old('pickUpService', $user->petHouses?->pickUpService) ? 'checked' : '' }}>
                    <label for="pickUpService" class="ml-3 block text-sm font-medium text-gray-700">
                        Menyediakan layanan penjemputan hewan
                    </label>
                </div>
                @error('pickUpService')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <span class="w-3 h-3 bg-[#F69246] rounded-full mr-2"></span>
                    Foto Pethouse
                </h2>
                <p class="text-sm text-gray-600 mb-6">Unggah foto yang menunjukkan fasilitas pethouse Anda (maksimal
                    5MB per foto)</p>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Foto Fasilitas Pethouse</label>
                    <div
                        class="h-32 border-2 border-dashed border-gray-300 rounded-xl flex flex-col items-center justify-center p-4 bg-white hover:border-[#F69246] transition-colors relative group cursor-pointer">
                        <input id="locationPhotos" name="locationPhotos[]" type="file" multiple
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                        <svg class="w-12 h-12 text-gray-400 group-hover:text-[#F69246] mb-2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="text-sm text-gray-500 group-hover:text-[#F69246] text-center">
                            Klik untuk memilih foto pethouse<br>
                            <span class="text-xs">(Bisa pilih beberapa foto sekaligus)</span>
                        </span>
                    </div>
                    <div id="photoPreviewsContainer"></div>
                    @error('locationPhotos')
                        <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('locationPhotos.*')
                        <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-8">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Foto Profil Anda</label>
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0 h-20 w-20 rounded-full overflow-hidden border-2 border-gray-300 relative group cursor-pointer"
                            onclick="document.getElementById('profilePicture').click()">
                            <img id="profilePreview" class="h-full w-full object-cover hidden" alt="Profile preview">
                            <div id="profilePlaceholder"
                                class="h-full w-full bg-gray-100 flex items-center justify-center">
                                <svg class="h-10 w-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
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
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="px-8 py-3 cursor-pointer bg-[#F69246] text-white font-medium rounded-lg shadow-md hover:bg-[#e07f35] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F69246] transition-colors duration-200 transform hover:scale-105">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Ajukan {{ !!$user->petHouses ? 'Ulang' : '' }} Verifikasi
                        {{ !$user->petHouses ? 'Sekarang' : '' }}
                    </span>
                </button>
            </div>
        </form>
    </div>
    <style>
        input[type="file"]::file-selector-button {
            display: none;
        }

        input[type="file"]::-webkit-file-upload-button {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profilePictureInput = document.getElementById('profilePicture');
            const profilePreview = document.getElementById('profilePreview');
            const profilePlaceholder = document.getElementById('profilePlaceholder');

            profilePictureInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        profilePreview.src = event.target.result;
                        profilePreview.classList.remove('hidden');
                        profilePlaceholder.classList.add('hidden');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
            const locationPhotosInput = document.getElementById('locationPhotos');
            const photoPreviewsContainer = document.getElementById('photoPreviewsContainer');
            let selectedFiles = [];

            locationPhotosInput.addEventListener('change', function(e) {
                const files = Array.from(e.target.files);
                files.forEach(file => {
                    if (!selectedFiles.some(f => f.name === file.name && f.size === file.size)) {
                        selectedFiles.push(file);
                    }
                });

                updatePhotoPreview();
                updateFileInput();
            });

            function updatePhotoPreview() {
                photoPreviewsContainer.innerHTML = '';

                if (selectedFiles.length > 0) {
                    const gridDiv = document.createElement('div');
                    gridDiv.className = 'grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mt-4';

                    selectedFiles.forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const previewItem = document.createElement('div');
                            previewItem.className =
                                'relative border-2 border-gray-200 rounded-lg overflow-hidden bg-white';

                            previewItem.innerHTML = `
                                <img src="${e.target.result}" alt="Preview" class="w-full h-30 object-cover">
                                <button type="button" class="absolute top-1 right-1 bg-red-500 bg-opacity-90 text-white border-0 rounded-full w-6 h-6 flex items-center justify-center cursor-pointer text-xs leading-none transition-colors hover:bg-red-600" onclick="removePhoto(${index})">×</button>
                            `;

                            gridDiv.appendChild(previewItem);
                        };
                        reader.readAsDataURL(file);
                    });

                    photoPreviewsContainer.appendChild(gridDiv);
                }
            }

            function updateFileInput() {
                const dt = new DataTransfer();
                selectedFiles.forEach(file => dt.items.add(file));
                locationPhotosInput.files = dt.files;
            }

            window.removePhoto = function(index) {
                selectedFiles.splice(index, 1);
                updatePhotoPreview();
                updateFileInput();
            };

            const API_BASE_URL = 'https://open-api.my.id/api/wilayah';
            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');
            const districtSelect = document.getElementById('district');
            const villageSelect = document.getElementById('village');

            const initialData = {
                provinceId: {!! json_encode(
                    old(
                        'province',
                        !!$user->village?->district?->city?->province
                            ? json_encode($user->village?->district?->city?->province?->toArray())
                            : null,
                    ),
                ) !!},
                cityId: {!! json_encode(
                    old('city', !!$user->village?->district?->city ? json_encode($user->village?->district?->city?->toArray()) : null),
                ) !!},
                districtId: {!! json_encode(
                    old('district', !!$user->village?->district ? json_encode($user->village?->district?->toArray()) : null),
                ) !!},
                villageId: {!! json_encode(old('village', !!$user->villageId ? json_encode(['id' => $user->villageId]) : null)) !!}
            };
            const populateDropdown = (selectElement, data, placeholder, selectedValue = null) => {
                selectElement.innerHTML = `<option value="">${placeholder}</option>`;
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = JSON.stringify(item);
                    option.textContent = item.name;
                    if (selectedValue && selectedValue == item.id) {
                        option.selected = true;
                    }
                    selectElement.appendChild(option);
                });
                selectElement.disabled = false;
            };

            const resetDropdowns = (...selects) => {
                selects.forEach(select => {
                    select.innerHTML =
                        `<option value="">Pilih ${select.id.charAt(0).toUpperCase() + select.id.slice(1)}</option>`;
                    select.disabled = true;
                });
            };

            provinceSelect.addEventListener('change', async function() {
                const provinceId = JSON.parse(this.value).id;
                resetDropdowns(citySelect, districtSelect, villageSelect);

                if (provinceId) {
                    try {
                        const response = await fetch(`${API_BASE_URL}/regencies/${provinceId}`);
                        const cities = await response.json();
                        populateDropdown(citySelect, cities, 'Pilih Kota/Kabupaten');
                    } catch (error) {
                        console.error('Error fetching cities:', error);
                    }
                }
            });

            citySelect.addEventListener('change', async function() {
                const cityId = JSON.parse(this.value).id;
                resetDropdowns(districtSelect, villageSelect);

                if (cityId) {
                    try {
                        const response = await fetch(`${API_BASE_URL}/districts/${cityId}`);
                        const districts = await response.json();
                        populateDropdown(districtSelect, districts, 'Pilih Kecamatan');
                    } catch (error) {
                        console.error('Error fetching districts:', error);
                    }
                }
            });

            districtSelect.addEventListener('change', async function() {
                const districtId = JSON.parse(this.value).id;
                villageSelect.innerHTML = `<option value="">Pilih Kelurahan/Desa</option>`;
                villageSelect.disabled = true;

                if (districtId) {
                    try {
                        const response = await fetch(`${API_BASE_URL}/villages/${districtId}`);
                        const villages = await response.json();
                        populateDropdown(villageSelect, villages, 'Pilih Kelurahan/Desa');
                    } catch (error) {
                        console.error('Error fetching villages:', error);
                    }
                }
            });

            const initializeLocation = async () => {
                try {
                    const provinceResponse = await fetch(`${API_BASE_URL}/provinces`);
                    const provinces = await provinceResponse.json();
                    populateDropdown(provinceSelect, provinces, 'Pilih Provinsi', initialData.provinceId &&
                        JSON.parse(initialData.provinceId).id);
                    if (initialData.provinceId) {
                        const provinceId = JSON.parse(initialData.provinceId).id
                        const cityResponse = await fetch(
                            `${API_BASE_URL}/regencies/${provinceId}`);
                        const cities = await cityResponse.json();
                        populateDropdown(citySelect, cities, 'Pilih Kota/Kabupaten', initialData.cityId &&
                            JSON.parse(initialData
                                .cityId).id)
                    }
                    if (initialData.cityId) {
                        const cityId = JSON.parse(initialData.cityId).id
                        const districtResponse = await fetch(
                            `${API_BASE_URL}/districts/${cityId}`);
                        const districts = await districtResponse.json();
                        populateDropdown(districtSelect, districts, 'Pilih Kecamatan', initialData
                            .districtId && JSON.parse(
                                initialData.districtId).id);
                    }
                    if (initialData.districtId) {
                        const districtId = JSON.parse(initialData.districtId).id
                        const villageResponse = await fetch(
                            `${API_BASE_URL}/villages/${districtId}`);
                        const villages = await villageResponse.json();
                        populateDropdown(villageSelect, villages, 'Pilih Kelurahan/Desa', initialData
                            .villageId && JSON.parse(
                                initialData.villageId).id);
                    }

                } catch (error) {
                    console.error('Gagal memuat data lokasi awal:', error);
                    const errorElement = document.createElement('div');
                    errorElement.className = 'text-red-500 text-sm mt-2';
                    errorElement.textContent = 'Gagal memuat data wilayah. Silakan refresh halaman.';
                    document.querySelector('.space-y-4').prepend(errorElement);
                }
            };
            initializeLocation();
        });
    </script>
</x-pethouse-layout>
