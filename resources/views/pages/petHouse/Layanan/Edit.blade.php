<x-pethouse-layout header="Ubah Layanan" class="p-5 md:p-10" id="content" activeMenu="Pet House">
    <form action="{{ route('pethouse.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Photo Section -->
        <div class="space-y-3">
            <h2 class="text-lg font-semibold">Foto Layanan</h2>
            <div id="preview-container" class="relative cursor-pointer max-w-xl mx-auto w-full aspect-video bg-gray-100 rounded-lg overflow-hidden">
                <img id="preview" src="{{ $layanan->pethouselayanans?->photos ?? $layanan->photos }}"
                    alt="Current Service Photo" class="w-full h-full object-cover">
            </div>
            <input id="photos" name="photos" type="file" accept="image/*" class="hidden"
                onchange="previewImage(event)">
            @error('photos')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Layanan</label>
            <textarea id="description" name="description" rows="4"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Masukkan deskripsi layanan...">{{ old('description', $layanan->pethouselayanans->description ?? $layanan->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
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

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <div class="flex items-center">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="status" class="sr-only peer" @checked(old('status', $layanan->pethouselayanans?->status))>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#F69246]">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-700">
                        <span
                            class="text-gray-500">{{ old('status', $layanan->pethouselayanans?->status) ? 'Aktif' : 'NonAktif' }}</span>
                    </span>
                </label>
            </div>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-end pt-4">
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
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (!file) return;
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        document.getElementById('preview-container').addEventListener('click', function() {
            document.getElementById('photos').click();
        });
    </script>
</x-pethouse-layout>
