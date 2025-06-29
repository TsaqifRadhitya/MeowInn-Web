<x-pethouse-layout header="Tambah Laporan Harian" class="p-5 md:p-10" id="content" activeMenu="Reports">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Laporan Baru</h2>
    <form action="{{ route('pethouse.reports.store', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Laporan</label>
            <input type="file" id="photos" name="photos" class="absolute opacity-0" accept="image/*">
            <div id="upload-area"
                class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-orange-400 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="mt-2 text-sm text-gray-600">
                    <span class="font-medium text-orange-600">Klik untuk upload</span> atau drag & drop
                </p>
                <p class="text-xs text-gray-500 mt-1">Format PNG, JPG, JPEG (maks. 5MB)</p>
            </div>
            <div id="preview-area" class="mt-4 max-w-xl mx-auto hidden cursor-pointer">
                <div class="relative group w-full">
                    <img id="photo-preview" src="" alt="Preview"
                        class="w-full aspect-video object-cover rounded-lg border border-gray-200">
                    <button type="button"
                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition-colors"
                        onclick="removePhoto()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-2">Klik pada gambar untuk mengganti foto</p>
            </div>
            @error('photos')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-20">
            <label for="caption" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Laporan</label>
            <textarea id="caption" name="caption" rows="4"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                placeholder="Tulis deskripsi laporan harian...">{{ old('caption') }}</textarea>
            @error('caption')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col-reverse md:flex-row justify-end gap-5 md:absolute md:bottom-10 md:right-10">
            <a href="{{ route('pethouse.penitipan.show', $id) }}"
                class="px-6 py-2 border cursor-pointer text-center border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-2 bg-orange-500 text-white cursor-pointer font-medium rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                Simpan Laporan
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('photos');
            const uploadArea = document.getElementById('upload-area');
            const previewArea = document.getElementById('preview-area');
            const photoPreview = document.getElementById('photo-preview');

            uploadArea.addEventListener('click', () => fileInput.click());

            photoPreview.addEventListener('click', () => fileInput.click());

            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('border-orange-500', 'bg-orange-50');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('border-orange-500', 'bg-orange-50');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('border-orange-500', 'bg-orange-50');
                if (e.dataTransfer.files.length) {
                    handleFileSelection(e.dataTransfer.files[0]);
                }
            });

            // Handle file selection
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    handleFileSelection(e.target.files[0]);
                }
            });

            function handleFileSelection(file) {
                if (!file.type.match('image.*')) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    photoPreview.src = e.target.result;
                    uploadArea.classList.add('hidden');
                    previewArea.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            window.removePhoto = function() {
                fileInput.value = '';
                photoPreview.src = '';
                previewArea.classList.add('hidden');
                uploadArea.classList.remove('hidden');
            };
        });
    </script>
</x-pethouse-layout>
