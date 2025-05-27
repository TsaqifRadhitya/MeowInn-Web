<x-meowinn-layout header="Pet House" class="m-5 p-5 rounded-xl shadow-md flex flex-col space-y-5 relative" id="content"
    activeMenu="Pet House">
    <div class="shadow-sm rounded-full">
        <form class="w-full mx-auto" action="{{ route('meowinn.pethouse.daftarpethouse.index') }}" method="GET">
            <div class="relative w-full">
                <input type="search" id="search-dropdown" name="search" value="{{ old('search') }}"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="Search Pet House" />
                <button type="submit"
                    class="h-full absolute top-0 end-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
    </div>
    </form>
    @if (count($daftarPethouse) == 0)
        <h1 class="font-semibold text-center">Pethouse Tidak Ditemukan</h1>
    @endif
    <div class="max-h-[80vh] flex flex-col gap-5 overflow-y-auto">
        @foreach ($daftarPethouse as $petHouse)
            <div class="card card-side bg-base-100 shadow-md">
                <figure>
                    <img class=" " src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                        alt="Movie" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <p>Click the button to watch on Jetflix app.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary"
                            onclick="document.location.href = '/meowinn/preview/{{ $petHouse->id }}'">Watch</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-auto w-fit mx-auto pb-5">
        {{ $daftarPethouse->links() }}
    </div>
</x-meowinn-layout>
