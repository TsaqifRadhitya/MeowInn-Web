<x-pethouse-layout header="Ubah Layanan" class="p-5 md:p-10" id="content" activeMenu="Pet House">
    <form action="{{ route('pethouse.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Foto Layanan</h2>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Sebelumnya</label>
                <div class="flex flex-wrap gap-4">
                    @foreach (json_decode($layanan->pethouselayanans?->photos ?? $layanan->photos) as $photo)
                        <div class="relative">
                            <img src="{{ $photo }}" alt="Service Photo"
                                class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Foto Baru (Max 5 foto)</label>
                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col w-full h-32 border-[#FF7B54] border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 text-[#FF7B54]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="py-1 text-sm text-[#FF7B54]">Klik untuk upload atau drag & drop</p>
                            <p class="text-xs text-[#FF7B54]">PNG, JPG, JPEG (Max. 2MB per foto)</p>
                        </div>
                        <input type="file" name="photos[]" multiple accept="image/*" class="hidden" id="photoInput">
                    </label>
                </div>
                <div class="mt-4 hidden" id="photoPreviewContainer">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Preview Foto Baru</label>
                    <div class="flex flex-wrap gap-4" id="photoPreview"></div>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Layanan</label>
            <textarea id="description" name="description" rows="4"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Masukkan deskripsi layanan...">{{ old('description', $layanan->pethouselayanans->description ?? $layanan->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
            <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500">Rp</span>
                </div>
                <input type="number" id="price" name="price"
                    value="{{ old('price', $layanan->pethouselayanans?->price ?? 0) }}"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="0">
            </div>
            @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <div class="flex items-center">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="status" class="sr-only peer" @checked(old('status', $layanan->pethouselayanans?->status))>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#F69246]">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-700">
                        {{ old('status', $layanan->pethouselayanans?->status) ? 'Buka' : 'Tutup' }} -
                        <span
                            class="text-gray-500">{{ old('status', $layanan->pethouselayanans?->status) ? 'Menerima penitipan baru' : 'Tidak menerima penitipan baru' }}</span>
                    </span>
                </label>
            </div>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('pethouse.layanan.index') }}"
                class="mr-3 px-4 py-2 cursor-pointer rounded-md shadow-sm text-sm font-medium text-[#FF7B54] bg-white hover:bg-[#FF7B54] hover:text-white ring ring-[#FF7B54]">
                Batal
            </a>
            <button type="submit"
                class="px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white bg-[#FF7B54] hover:bg-white hover:text-[#FF7B54] hover:ring hover:ring-[#FF7B54] cursor-pointer">
                Simpan Perubahan
            </button>
        </div>
    </form>
    <script>
        document.getElementById('photoInput').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('photoPreviewContainer');
            const previewDiv = document.getElementById('photoPreview');
            previewDiv.innerHTML = '';
            const files = event.target.files;
            if (files.length > 0) {
                previewContainer.classList.remove('hidden');
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const imgContainer = document.createElement('div');
                            imgContainer.className = 'relative';
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'w-32 h-32 object-cover rounded-lg';
                            previewDiv.appendChild(imgContainer);
                            imgContainer.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-pethouse-layout>
