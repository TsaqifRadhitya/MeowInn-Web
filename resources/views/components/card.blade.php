@props(['id'])

<tr class="p-5 rounded-md bg-cyan-200 shadow-sm space-y-2" id="{{ $id }}">
    <td class="text-center w-fit bg-slate-50">
        <h1 class="w-fit px-5">
            {{ $id }}
        </h1>
    </td>
    <td class="text-center">{{ fake()->name() }}</td>
    <td class="">
        <button onclick="Delete({{ $id }})"
            class="btn btn-primary rounded-sm px-2 w-full shadow-sm">Cancel</button>
    </td>
    <td class="">
        <button id="ok" onclick="Save({{ $id }})"
            class="btn btn-error w-full">Ok</button>
    </td>
</tr>
