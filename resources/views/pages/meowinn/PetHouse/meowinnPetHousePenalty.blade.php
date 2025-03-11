<x-meowinn-layout header="Penalty" class="px-5 pt-5" id="content" activeMenu="Pet House">
    <table class="table table-xs table-pin-rows table-pin-cols drop">
        <thead>
            <tr class="bg-[#34314E] text-white h-12">
                <td class="pl-5">No</td>
                <td>Nama Pethouse</td>
                <td>Durasi Penalty</td>
                <th class="bg-[#34314E]"></th>
            </tr>
        </thead>
        <tbody>
            <td class="textarea-md font-semibold pl-7">{{ 1 }}</td>
            <td class="textarea-md font-semibold">{{ 'MeowInn' }}</td>
            <td class="textarea-md font-semibold">
                {{ 5 }} hari
            </td>
            <td>
                <div class="text-md flex flex-row space-x-5 justify-center">
                    <button class="w-fit btn btn-error min-w-24"
                        onclick="handleDelete({{ 1 }})">Remove</button>
                </div>
            </td>
            </tr>
            @for ($index = 0; $index < count($daftarPenalty); $index++)
                <tr class="{{ $index % 2 == 0 ? 'bg-' : 'bg-[#F4F6F5]' }}">
                    <td class="textarea-md font-semibold pl-7">{{ $index + 1 }}</td>
                    <td class="textarea-md font-semibold">{{ $daftarPenalty[$index]->name }}</td>
                    <td class="textarea-md font-semibold">
                        {{ $daftarPenalty[$index]->penalty }}
                    </td>
                    <td>
                        <div class="text-md flex flex-row space-x-5 justify-center">
                            <button class="w-fit btn btn-error min-w-24"
                                onclick="handleDelete({{ $daftarPenalty[$index] }})">Remove</button>
                        </div>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
    <script>

        const handleDelete = async (id) => {
            const resultPopup = await swal.fire({
                icon: 'warning',
                title: 'Apakah Anda Yakin ?',
                // text: data.namaLayanan,
                confirmButtonText: 'Konfirmasi',
                cancelButtonText: 'Batalkan',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                showConfirmButton: true,
                showCancelButton: true,
                reverseButtons: true
            })

            if (resultPopup.isConfirmed) {
                $.ajax({
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Sertakan CSRF token di dalam data
                    },
                    type: "DELETE",
                    url: `penalty/${id}/delete`,
                    success: async function(response) {
                        await swal.fire({
                            icon: 'success',
                            title: response
                        })
                        location.reload()
                    }
                });
            }
        }
    </script>
</x-meowinn-layout>
