<x-meowinn-layout header="Pengajuan Pet House" class="px-5 pt-5" id="content" activeMenu="Pet House">
    <table class="table table-xs table-pin-rows table-pin-cols drop">
        <thead>
            <tr class="bg-[#34314E] text-white h-12">
                <td class="pl-5">No</td>
                <td>Nama Pethouse</td>
                <th class="bg-[#34314E]"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-[#F4F6F5] h-16">
                <td class="textarea-md font-semibold pl-7">{{ 1 }}</td>
                <td class="textarea-md font-semibold">{{ 'MeowInn' }}</td>
                <td>
                    <div class="text-md flex flex-row space-x-5 justify-center">
                        <button class="w-fit btn btn-info min-w-24"
                            onclick="document.location.href = '/meowinn/preview/{{ 1 }}'">View
                            Detail</button>
                        <button class="w-fit btn btn-error min-w-24"
                            onclick="handleTolak({{ 1 }})">Tolak</button>
                        <button class="w-fit btn btn-success min-w-24"
                            onclick="handleApprove({{ 1 }})">Appove</button>
                    </div>
                </td>
            </tr>
            @for ($index = 0; $index < count($daftarPengajuan); $index++)
                <tr class="{{ $index % 2 == 0 ? 'bg-' : 'bg-[#F4F6F5]' }}">
                    <td class="textarea-md font-semibold pl-7">{{ $index + 1 }}</td>
                    <td class="textarea-md font-semibold">{{ $daftarPengajuan[$index]->name }}</td>
                    <td>
                        <div class="text-md flex flex-row space-x-5 justify-center">
                            <button class="w-fit btn btn-info min-w-24"
                                onclick="document.location.href = '/meowinn/preview/{{ $daftarPengajuan[$index]->id }}'">View
                                Detail</button>
                            <button class="w-fit btn btn-error min-w-24"
                                onclick="handleTolak({{ $daftarPengajuan[$index]->id }})">Tolak</button>
                            <button class="w-fit btn btn-success min-w-24"
                                onclick="handleApprove({{ $daftarPengajuan[$index]->id }})">Appove</button>
                        </div>
                    </td>
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

        const handleTolak = async (id) => {
            const resultPopup = await Popup()
            if (resultPopup.isConfirmed) {
                console.log(id)
                $.ajax({
                    type: "DELETE",
                    url: `pengajuanpethouse/${id}/delete`,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Sertakan CSRF token di dalam data
                    },
                    success: async function(response) {
                        await alertSucces(response)
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
                    url: `pengajuanpethouse/${id}/edit`,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Sertakan CSRF token di dalam data
                    },
                    success: async function(response) {
                        await alertSucces(response)
                        location.reload()
                    }
                })
            }
        };
    </script>
</x-meowinn-layout>
