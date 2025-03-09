<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="ml-5 flex flex-row gap-x-10 mb-5">
                    @foreach ([1, 2, 3, 4] as $angka)
                        <button class="bg-green-300 rounded-full px-5 shadow-sm"
                            onclick="plert({{ $angka }})">{{ $angka }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script></script>
