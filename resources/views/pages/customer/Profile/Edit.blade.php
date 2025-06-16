@extends('layouts.CustomerLayout')
@section('main')
    <div
        class="mx-auto bg-gradient-to-br rounded-xl md:rounded-2xl shadow-lg md:shadow-xl p-0 flex flex-col md:flex-row gap-0 overflow-hidden border border-[#FF8855]/30">
        <div class="flex flex-col items-center justify-center md:w-2/5 w-full bg-[#ffe3d0] py-8 md:py-12 px-4 md:px-6">
            <label for="profilePicture"
                class="cursor-pointer w-32 h-32 sm:w-36 sm:h-36 md:w-40 md:h-40 lg:w-44 lg:h-44 rounded-full overflow-hidden bg-[#FF8855] mb-3 sm:mb-4 flex items-center justify-center border-4 sm:border-6 md:border-8 border-white shadow-lg group relative">
                <img id="profilePreview"
                    src="{{ $user->profilePicture ? $user->profilePicture : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=FF8855&color=fff' }}"
                    alt="Foto Profil" class="object-cover w-full h-full">
                <div
                    class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                    <span class="text-white font-semibold text-sm sm:text-base">Ganti Foto</span>
                </div>
            </label>
            @error('profilePicture')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="text-center mt-2">
                <div class="font-bold text-lg sm:text-xl text-[#FF8855]">{{ $user->name }}</div>
                <div class="text-gray-500 text-xs sm:text-sm">{{ $user->email }}</div>
            </div>
        </div>
        <div class="flex-1 bg-white py-6 md:py-10 px-4 md:px-6 lg:px-12">
            <form method="POST" action="{{ route('customer.profile.update') }}" enctype="multipart/form-data"
                class="space-y-4 sm:space-y-6 md:space-y-7">
                @csrf
                @method('patch')
                <h2 class="text-xl sm:text-2xl font-bold text-[#FF8855] mb-4 sm:mb-6 tracking-tight">Edit Profil</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <div>
                        <label for="name" class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1">Nama</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                            class="block w-full px-3 sm:px-4 py-1 sm:py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FF8855] focus:border-[#FF8855] text-sm sm:text-base">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phoneNumber" class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1">No.
                            Telp</label>
                        <input id="phoneNumber" name="phoneNumber" type="text"
                            value="{{ old('phoneNumber', $user->phoneNumber) }}"
                            class="block w-full px-3 sm:px-4 py-1 sm:py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FF8855] focus:border-[#FF8855] text-sm sm:text-base">
                        @error('phoneNumber')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                        class="block w-full px-3 sm:px-4 py-1 sm:py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FF8855] focus:border-[#FF8855] text-sm sm:text-base bg-gray-100"
                        readonly>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <input id="profilePicture" name="profilePicture" type="file" accept="image/*" class="hidden"
                    onchange="previewProfilePicture(event)">
                <div class="pt-2">
                    <h2
                        class="text-base sm:text-lg font-semibold text-[#FF8855] border-b border-[#FF8855]/30 pb-2 mb-3 sm:mb-4">
                        Lokasi</h2>
                    <div class="space-y-3 sm:space-y-4">
                        <div>
                            <label for="province"
                                class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                            <select id="province" name="province"
                                class="mt-1 block w-full px-2 sm:px-3 py-1 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm">
                                <option value="">Pilih Provinsi</option>
                            </select>
                            @error('province')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="city"
                                class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Kota/Kabupaten</label>
                            <select id="city" name="city"
                                class="mt-1 block w-full px-2 sm:px-3 py-1 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm"
                                disabled>
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="district"
                                class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                            <select id="district" name="district"
                                class="mt-1 block w-full px-2 sm:px-3 py-1 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm"
                                disabled>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            @error('district')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="village"
                                class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Kelurahan/Desa</label>
                            <select id="village" name="village"
                                class="mt-1 block w-full px-2 sm:px-3 py-1 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm"
                                disabled>
                                <option value="">Pilih Kelurahan/Desa</option>
                            </select>
                            @error('village')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Alamat
                                Lengkap</label>
                            <textarea name="address" id="address" rows="2"
                                class="mt-1 block w-full px-2 sm:px-3 py-1 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-4 sm:mt-6">
                            <button type="submit"
                                class="flex-1 bg-[#FF7B54] hover:bg-[#e76844] text-white font-semibold py-2 px-4 rounded-md shadow-sm transition-colors text-sm sm:text-base">
                                Simpan
                            </button>
                            <a href="{{ route('customer.profile.index') }}"
                                class="flex-1 inline-block text-center hover:bg-[#FF8855]/20 text-[#FF8855] font-semibold py-2 px-4 rounded-md shadow-sm border border-[#FF8855]/40 transition-colors text-sm sm:text-base">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewProfilePicture(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('profilePreview').src = URL.createObjectURL(file);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
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
                            JSON.parse(initialData.cityId).id);
                    }

                    if (initialData.cityId) {
                        const cityId = JSON.parse(initialData.cityId).id
                        const districtResponse = await fetch(
                            `${API_BASE_URL}/districts/${cityId}`);
                        const districts = await districtResponse.json();
                        populateDropdown(districtSelect, districts, 'Pilih Kecamatan', initialData
                            .districtId && JSON.parse(initialData.districtId).id);
                    }

                    if (initialData.districtId) {
                        const districtId = JSON.parse(initialData.districtId).id
                        const villageResponse = await fetch(
                            `${API_BASE_URL}/villages/${districtId}`);
                        const villages = await villageResponse.json();
                        populateDropdown(villageSelect, villages, 'Pilih Kelurahan/Desa', initialData
                            .villageId && JSON.parse(initialData.villageId).id);
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
@endsection
