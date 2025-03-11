<x-meowinn-layout header="Reports" class="px-5 pt-5" id="content" activeMenu="Reports">
    <table class="table table-xs table-pin-rows table-pin-cols drop">
        <thead>
            <tr class="bg-[#34314E] text-white h-12">
                <td class="pl-5">No</td>
                <td>Nama Pengiriman</td>
                <td>Isi Report</td>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-[#F4F6F5] h-14">
                <td class="textarea-md font-semibold pl-7">{{ 1 }}</td>
                <td class="textarea-md font-semibold">{{ 'MeowInn' }}</td>
                <td class="textarea-md font-semibold">
                    {{ 'Vaksin' }}
                </td>
            </tr>
            </tr>
            @for ($index = 0; $index < count($reports); $index++)
                <tr class="{{ $index % 2 == 0 ? 'bg-' : 'bg-[#F4F6F5]' }} h-14">
                    <td class="textarea-md font-semibold pl-7">{{ $index + 1 }}</td>
                    <td class="textarea-md font-semibold">{{ $reports[$index]->users()->name }}</td>
                    <td class="textarea-md font-semibold">
                        {{ $reports[$index]->isi }}
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</x-meowinn-layout>
