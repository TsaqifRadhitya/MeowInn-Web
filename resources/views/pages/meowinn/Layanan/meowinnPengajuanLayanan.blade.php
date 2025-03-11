<x-meowinn-layout header="Pengajuan Layanan" class="px-5 pt-5" id="content" activeMenu="Layanan">
    <table class="table table-xs table-pin-rows table-pin-cols drop">
        <thead>
            <tr class="bg-[#34314E] text-white h-12">
                <td class="pl-5">No</td>
                <td>Nama Pethouse</td>
                <td>Layanan</td>
                <th class="bg-[#34314E]"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-[#F4F6F5]">
                <td class="textarea-md font-semibold pl-7">{{ 1 }}</td>
                <td class="textarea-md font-semibold">{{ 'MeowInn' }}</td>
                <td class="textarea-md font-semibold">
                    {{ 'Vaksin' }}
                </td>
                <td>
                    <div class="text-md flex flex-row space-x-5 justify-center">
                        <button class="w-fit btn btn-error min-w-24"
                            onclick="handleDelete({{ 1 }})">Tolak</button><button
                            class="w-fit btn btn-info min-w-24"
                            onclick="handleApprove({{ 1 }})">Setuju</button>
                    </div>
                </td>
            </tr>
            </tr>
            @for ($index = 0; $index < count($daftarPengajuanLayanan); $index++)
                <tr class="{{ $index % 2 == 0 ? 'bg-' : 'bg-[#F4F6F5]' }}">
                    <td class="textarea-md font-semibold pl-7">{{ $index + 1 }}</td>
                    <td class="textarea-md font-semibold">{{ $daftarPenalty[$index]->pethouse()->get()->name }}</td>
                    <td class="textarea-md font-semibold">
                        {{ $daftarPengajuanLayanan[$index]->layanan()->get()->nama_layanan }}
                    </td>
                    <td>
                        <div class="text-md flex flex-row space-x-5 justify-center">
                            <button class="w-fit btn btn-error min-w-24"
                                onclick="handleDelete({{ $daftarPengajuanLayanan[$index]->id }})">Tolak</button><button
                                class="w-fit btn btn-info min-w-24"
                                onclick="handleApprove({{ $daftarPengajuanLayanan[$index]->id }})">Setuju</button>
                        </div>
                    </td>
                </tr>
                </tr>
            @endfor
        </tbody>
    </table>
    <script>
        const Popup = async () => {
            return await swal.fire({
                icon: 'warning',
                title: 'Apakah Anda Yakin ?',
                confirmButtonText: 'Konfirmasi',
                cancelButtonText: 'Batalkan',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                showConfirmButton: true,
                showCancelButton: true,
                reverseButtons: true
            })
        }

        const alertSucces = async (header) => await swal.fire({
            icon: "success",
            title: header,
        })

        const handleDelete = async (id) => {
            const resultPopup = await Popup()
            if (resultPopup.isConfirmed) {
                console.log(id)
                $.ajax({
                    type: "DELETE",
                    url: `pengajuanlayanan/${id}/delete`,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Sertakan CSRF token di dalam data
                    },
                    success: async function(response) {
                        await alertSucces("Berhasil Menolak Pengajuan Layanan")
                        location.reload()
                    }
                })
            }
        };



        const handleApprove = async (id) => {
            const resultPopup = await Popup()
            if (resultPopup.isConfirmed) {
                console.log(id)
                $.ajax({
                    type: "PATCH",
                    url: `pengajuanlayanan/${id}/edit`,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Sertakan CSRF token di dalam data
                    },
                    success: async function(response) {
                        await alertSucces("Berhasil Menyetujui Pengajua Layanan")
                        location.reload()
                    }
                })
            }
        };
    </script>
</x-meowinn-layout>
