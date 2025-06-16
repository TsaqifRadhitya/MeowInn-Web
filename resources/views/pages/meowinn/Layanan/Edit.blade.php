<x-meowinn-layout header="Edit Layanan" id="content" activeMenu="Layanan" class="flex flex-col p-10 space-y-5">
    <form action="{{ route('meowinn.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6 w-full mt-auto mx-auto bg-white p-8 rounded-xl shadow-sm">
        @csrf
        @method('PATCH')

        <div class="space-y-3">
            <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto Layanan</label>
            <div id="preview-container"
                class="relative w-full max-w-xl mx-auto cursor-pointer aspect-video bg-gray-100 rounded-lg overflow-hidden mb-4">
                <img id="preview" src="{{ $layanan->photos }}"
                    alt="{{ $layanan->name }}" class="w-full h-full object-cover object-center">
            </div>
            <input id="photo" name="photos" type="file" accept="image/*" class="hidden"
                onchange="previewImage(event)">
            @error('photos')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
        <div class="space-y-1">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
            <input type="text" name="name" id="name" value="{{ old('name', $layanan->name) }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">
            @error('name')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>


        <div class="space-y-1">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="5"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">{{ old('description', $layanan->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between pt-2">
            <a href="{{ route('meowinn.layanan.index') }}"
                class="px-6 py-2.5 font-medium rounded-lg ring ring-[#FF7B54] text-[#FF7B54] hover:bg-[#FF7B54] hover:text-white transition duration-200 shadow-sm">
                Batal
            </a>
            <button type="submit"
                class="px-6 cursor-pointer py-2.5 bg-[#FF7B54] text-white font-medium rounded-lg hover:bg-white hover:text-[#FF7B54] hover:ring hover:ring-[#FF7B54] transition duration-200 shadow-sm">
                Update Layanan
            </button>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('preview-container');
            const uploadArea = document.querySelector('label[for="photo"]').parentElement;

            if (!file) {
                return;
            }

            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        document.getElementById('preview-container').addEventListener('click', function() {
            document.getElementById('photo').click();
        });
    </script>
</x-meowinn-layout>
