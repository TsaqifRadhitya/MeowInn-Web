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
                                onclick="handleDelete({{ $daftarPenalty[$index] }})">Delete</button><button
                                class="w-fit btn btn-info min-w-24"
                                onclick="handleEdit({{ $daftarPenalty[$index] }})">Edit</button>
                        </div>
                    </td>
                </tr>
                </tr>
            @endfor
        </tbody>
    </table>
</x-meowinn-layout>
