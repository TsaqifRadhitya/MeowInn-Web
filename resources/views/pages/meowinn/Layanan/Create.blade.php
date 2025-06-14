<x-meowinn-layout header="Tambah Layanan" id="content" activeMenu="Layanan" class="flex flex-col p-10 space-y-5">
    <form action="{{ route('meowinn.layanan.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-6 w-full mt-auto mx-auto bg-white p-8 rounded-xl shadow-sm">
        @csrf
        <div class="space-y-1">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">
            @error('name')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
        <div class="space-y-3">
            <label for="photos" class="block text-sm font-medium text-gray-700 mb-1">Foto Layanan</label>
            <div id="preview" class="flex flex-wrap gap-3 mt-2"></div>
            <div class="flex items-center justify-center w-full">
                <label for="photos"
                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-150">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</p>
                        <p class="text-xs text-gray-500">Format PNG, JPG, JPEG (Maks. 2MB)</p>
                    </div>
                    <input id="photos" name="photos[]" type="file" multiple accept="image/*" class="hidden"
                        onchange="previewImages(event)">
                </label>
            </div>
            @error('photos')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
            @error('photos.*')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
        <div class="space-y-1">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="5"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-5 justify-between pt-2">
            <a class="px-6 cursor-pointer py-2.5 hover:bg-[#FF7B54] ring ring-[#FF7B54] text-[#FF7B54] hover:text-white font-medium rounded-lg transition duration-200 shadow-sm"
                href="{{ route('meowinn.layanan.index') }}">Batal</a>
            <button type="submit"
                class="px-6 cursor-pointer py-2.5 bg-[#FF7B54] hover:ring hover:ring-[#FF7B54] hover:bg-transparent hover:text-[#FF7B54] text-white font-medium rounded-lg transition duration-200 shadow-sm">
                Simpan Layanan
            </button>
        </div>
    </form>
    <script>
        function previewImages(event) {
            const files = event.target.files;
            const preview = document.getElementById('preview');
            preview.innerHTML = "";

            if (files.length === 0) {
                return;
            }

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = e => {
                    const container = document.createElement('div');
                    container.className = 'relative group';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-24 h-24 object-cover rounded-lg shadow-sm border border-gray-200';

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className =
                        'absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.onclick = () => {
                        container.remove();
                        updateFileInput(files, file);
                    };

                    container.appendChild(img);
                    container.appendChild(removeBtn);
                    preview.appendChild(container);
                };
                reader.readAsDataURL(file);
            });
        }

        function updateFileInput(allFiles, fileToRemove) {
            const dt = new DataTransfer();
            Array.from(allFiles).forEach(file => {
                if (file !== fileToRemove) {
                    dt.items.add(file);
                }
            });
            document.getElementById('photos').files = dt.files;
        }
    </script>
</x-meowinn-layout>
