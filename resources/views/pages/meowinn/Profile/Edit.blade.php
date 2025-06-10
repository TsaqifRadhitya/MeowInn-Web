<x-meowinn-layout header="Edit Profile" class="p-5 md:p-10 md:pb-0 flex w-full bg-none" id="content" activeMenu="Profile">
    <section class="flex-1">
        <form action="{{ route('meowinn.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="bg-white rounded-xl shadow-md overflow-hidden h-full">
                <div class="bg-gradient-to-r from-[#F69246] to-[#EC7070] p-6 text-white">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="relative group">
                            <label for="profilePicture" class="cursor-pointer block">
                                <img id="pp" src="{{ $user->profilePicture ?? asset('asset/profile.png') }}"
                                    class="aspect-square rounded-full shadow w-20 object-cover border-2 border-white/50 group-hover:border-white transition-all duration-200"
                                    alt="Profile Picture">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </label>
                            <input type="file" id="profilePicture" name="profilePicture" accept="image/*"
                                class="hidden">
                        </div>
                        <div class="w-full text-center md:text-left">
                            <p class="text-2xl font-bold bg-transparent">
                                {{ $user->name }}</p>
                            <p class="text-blue-100 bg-transparent">
                                {{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                        <div class="space-y-4">
                            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">Informasi Pribadi</h2>
                            <div>
                                <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama</label>
                                <input type="text" name="name" id="phoneNumber"
                                    value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                    HP</label>
                                <input type="tel" name="phoneNumber" id="phoneNumber"
                                    value="{{ old('phoneNumber', $user->phoneNumber) }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('phoneNumber')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="space-y-4">
                            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">Lokasi</h2>
                            <div>
                                <label for="province"
                                    class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
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
                                <label for="district"
                                    class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
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
                    </div>
                    <div class="mt-8 flex flex-col md:flex-row justify-end gap-4">
                        <a href="{{ route('meowinn.profile.index') }}"
                            class="px-6 py-2 bg-gray-200 cursor-pointer text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-2 cursor-pointer bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profilePictureInput = document.getElementById('profilePicture');
            const profilePicturePreview = document.getElementById('pp');

            profilePictureInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        profilePicturePreview.src = event.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            const API_BASE_URL = 'https://open-api.my.id/api/wilayah';
            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');
            const districtSelect = document.getElementById('district');
            const villageSelect = document.getElementById('village');

            const initialData = {
                provinceId: {!! json_encode(old('province', $user->village?->district?->city?->province)) !!},
                cityId: {!! json_encode(old('city', $user->village?->district?->city)) !!},
                districtId: {!! json_encode(old('district', $user->village?->district)) !!},
                villageId: {!! json_encode(old('village', ['id' => $user->villageId])) !!}
            };

            console.log(initialData)

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
                    populateDropdown(provinceSelect, provinces, 'Pilih Provinsi', initialData.provinceId);

                    if (initialData.provinceId) {
                        const provinceId = JSON.parse(initialData.provinceId).id

                        const cityResponse = await fetch(
                            `${API_BASE_URL}/regencies/${provinceId}`);
                        const cities = await cityResponse.json();
                        populateDropdown(citySelect, cities, 'Pilih Kota/Kabupaten', provinceId);
                    }

                    if (initialData.cityId) {
                        const cityId = JSON.parse(initialData.cityId).id
                        const districtResponse = await fetch(
                            `${API_BASE_URL}/districts/${cityId}`);
                        const districts = await districtResponse.json();
                        populateDropdown(districtSelect, districts, 'Pilih Kecamatan', cityId);
                    }

                    if (initialData.districtId) {
                        const districtId = JSON.parse(initialData.districtId).id
                        const villageResponse = await fetch(
                            `${API_BASE_URL}/villages/${districtId}`);
                        const villages = await villageResponse.json();
                        populateDropdown(villageSelect, villages, 'Pilih Kelurahan/Desa', districtId);
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
</x-meowinn-layout>
