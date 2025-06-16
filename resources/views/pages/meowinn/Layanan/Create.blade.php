<x-meowinn-layout header="Tambah Layanan" id="content" activeMenu="Layanan" class="flex flex-col p-10 space-y-5">
    <form action="{{ route('meowinn.layanan.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-6 w-full mt-auto mx-auto bg-white p-8 rounded-xl shadow-sm">
        @csrf
        <div class="space-y-3">
            <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto Layanan</label>
            <div id="preview-container"
                class="relative w-full max-w-xl mx-auto aspect-video bg-gray-100 rounded-lg overflow-hidden hidden">
                <img onclick="document.getElementById('photos').click()" id="preview" alt="Preview"
                    class="w-full mx-aut aspect-video object-center cursor-pointer object-cover h-full object-cover">
            </div>
            <div id="upload-area" onclick="document.getElementById('photos').click()"
                class="flex items-center justify-center w-full">
                <label for="photo"
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
                    <input id="photos" name="photos" type="file" accept="image/*" class="hidden"
                        onchange="previewImage(event)">
                </label>
            </div>
            @error('photo')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
        <div class="space-y-1">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">
            @error('name')
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
        <div class="flex md:flex-row flex-col-reverse gap-5 justify-between pt-2">
            <a class="px-6 cursor-pointer py-2.5 text-center hover:bg-[#FF7B54] ring ring-[#FF7B54] text-[#FF7B54] hover:text-white font-medium rounded-lg transition duration-200 shadow-sm"
                href="{{ route('meowinn.layanan.index') }}">Batal</a>
            <button type="submit"
                class="px-6 cursor-pointer py-2.5 bg-[#FF7B54] hover:ring hover:ring-[#FF7B54] hover:bg-transparent hover:text-[#FF7B54] text-white font-medium rounded-lg transition duration-200 shadow-sm">
                Simpan Layanan
            </button>
        </div>
    </form>
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('preview-container');
            const uploadArea = document.getElementById('upload-area');

            if (!file) {
                previewContainer.classList.add('hidden');
                uploadArea.classList.remove('hidden');
                return;
            }

            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                uploadArea.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
        document.getElementById('preview-container').addEventListener('click', function() {
            document.getElementById('photo').click();
        });
    </script>
</x-meowinn-layout>
