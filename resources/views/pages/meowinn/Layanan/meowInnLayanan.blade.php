<x-meowinn-layout header="Daftar Layanan" class="px-5 pt-5" id="content" activeMenu="Layanan"
    class="flex flex-col pt-5 px-5 space-y-5">
    @if (Session::has('error'))
        <div class="bg-red-300 p-5 rounded-xl border-2 border-red-400 drop-shadow-sm">
            <p class="text-xl font-semibold">{{ Session::get('error') }}</p>
        </div>
    @endif
    @if (Session::has('message'))
        <div class="bg-green-300 p-5 rounded-xl border-2 border-green-400 drop-shadow-sm">
            <p class="text-xl font-semibold">{{ Session::get('message') }}</p>
        </div>
    @endif
    <button class="btn btn-primary w-fit ml-auto" onclick="handleTambah()">Tambah</button>
    <div class="overflow-x-auto max-h-[calc(100vh-160px)]">
        <table class="table table-xs table-pin-rows table-pin-cols drop">
            <thead>
                <tr class="bg-[#34314E] text-white h-12">
                    <td class="pl-5">No</td>
                    <td>Nama Layanan</td>
                    <td>Jenis Pengajuan</td>
                    <th class="bg-[#34314E]"></th>
                </tr>
            </thead>
            <tbody>
                @for ($index = 0; $index < count($daftarLayanan); $index++)
                    <tr class="{{ $index % 2 == 0 ? 'bg-' : 'bg-[#F4F6F5]' }}">
                        <td class="textarea-md font-semibold pl-7">{{ $index + 1 }}</td>
                        <td class="textarea-md font-semibold">{{ $daftarLayanan[$index]->nama_layanan }}</td>
                        <td class="textarea-md font-semibold">
                            {{ $daftarLayanan[$index]->persetujuan ? 'Butuh Persetujuan' : 'Tidak Butuh Persetujuan' }}
                        </td>
                        <td>
                            <div class="text-md flex flex-row space-x-5 justify-center">
                                <button class="w-fit btn btn-error min-w-24"
                                    onclick="handleDelete({{ $daftarLayanan[$index] }})">Delete</button><button
                                    class="w-fit btn btn-info min-w-24"
                                    onclick="handleEdit({{ $daftarLayanan[$index] }})">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <dialog id="modalDialog" class="w-screen h-screen bg-black/40 fixed top-0 left-0 z-40">
            <div class="rounded-lg w-1/3 p-6 shadow-lg bg-white absolute left-1/2 top-1/2 -translate-1/2 z-50">
                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 id="modalTitle" class="text-xl font-semibold">Tambah Layanan</h2>
                    <button id="closeModalButton" class="text-gray-500 hover:text-gray-800"
                        onclick="handleCloseModal()">&times;</button>
                </div>

                <!-- Modal Form -->
                <form id="modalForm">
                    <div class="flex flex-col gap-y-3">
                        <!-- Nama Layanan -->
                        <label for="nama_layanan" class="text-sm font-medium text-gray-700">Nama Layanan</label>
                        <input type="text" id="nama_layanan" name="nama_layanan"
                            class="swal2-input p-3 border border-gray-300 rounded-md" placeholder="Nama Layanan"
                            required>

                        <!-- Checkbox Persetujuan -->
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="persetujuan" name="persetujuan" class="mr-2" />
                            <label for="persetujuan" class="text-sm">Butuh Persetujuan</label>
                        </div>

                        <!-- Button untuk Submit -->
                        <button type="submit"
                            class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Simpan
                            Layanan</button>
                    </div>
                </form>
            </div>
        </dialog>
    </div>
    <script>
        const handleDelete = async (data) => {
            const responseDialog = await Swal.fire({
                title: `Hapus Layanan ${data.nama_layanan}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal",
                reverseButtons: true
            });
            if (responseDialog.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `daftarlayanan/${data.id}/delete`,
                    success: function(response) {
                        swal.fire({
                            icon: 'success',
                            title: 'Berhapus Menghapus Layanan'
                        }).then(() => location.reload())
                    }
                });
            }
        }
        const handleTambah = () => {
            $('#modalDialog').show();
            $('#modalForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: 'daftarlayanan/create',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response)
                        swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(() => {
                            handleCloseModal()
                            location.reload();
                        });
                    },
                    error: function(error) {
                        console.log(error)
                        swal.fire({
                            icon: 'error',
                            title: error.responseJSON.message
                        }).then(() => handleCloseModal());
                    }
                });
            });
        }
        const handleEdit = (data) => {
            console.log(data)
            $('#nama_layanan').val(data.nama_layanan);
            $('#persetujuan').prop('checked', data.persetujuan ? true : false);
            $('#modalForm').submit(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                let formData = $(this).serialize();

                $.ajax({
                    type: 'PATCH',
                    url: `daftarlayanan/${data.id}/edit`,
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        swal.fire({
                            icon: 'success',
                            title: 'Layanan berhasil diperbarui!'
                        }).then(() => {
                            handleCloseModal()
                            location.reload();
                        });
                    },
                    error: function(error) {
                        swal.fire({
                            icon: 'error',
                            title: 'Gagal memperbarui layanan!'
                        }).then(() => handleCloseModal());
                    }
                });
            });
            $('#modalDialog').show();
        }
        const handleCloseModal = () => {
            $(':input', '#modalForm')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .prop('checked', false)
                .prop('selected', false);
            $('#modalDialog').hide();
        }
    </script>
</x-meowinn-layout>
