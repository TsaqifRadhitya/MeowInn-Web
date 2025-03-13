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
            @for ($index = 0; $index < count($reports); $index++)
                <tr class="{{ $index % 2 == 0 ? 'bg-' : 'bg-[#F4F6F5]' }} h-14">
                    <td class="textarea-md font-semibold pl-7">{{ $index + 1 }}</td>
                    <td class="textarea-md font-semibold">{{ $reports[$index]->user()->first()->name }}</td>
                    <td class="textarea-md font-semibold">
                        {{ $reports[$index]->isi }}
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
    <div class="my-5 md:my-0 w-fit mx-auto md:absolute md:bottom-5 md:left-1/2 md:-translate-x-1/2">
        {{ $reports->links() }}
    </div>
</x-meowinn-layout>
