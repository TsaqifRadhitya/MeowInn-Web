<x-pethouse-layout header="Pet House Preview" class="p-5 md:p-10 flex flex-col gap-5 text-[#787878]" id="content"
    activeMenu="Pet House">
    <section class="flex flex-col md:flex-row gap-10">
        <img src="{{ $petHouse->user->profilePicture }}" class="aspect-video h-fit object-cover object-center md:w-1/3"
            alt="">
        <article class="md:w-2/3 w-full text-lg">
            <h1 class="font-black text-[#FF7B54] text-4xl">{{ $petHouse->name }}</h1>
            <div class="flex gap-x-2.5 gap-y-1 flex-col md:flex-row">
                <h1 class="md:w-1/5">Nomor Telepon : </h1>
                <h1>{{ $petHouse->user->phoneNumber }}</h1>
            </div>
            <div class="flex gap-x-2.5 gap-y-1 flex-col md:flex-row">
                <h1 class="md:w-1/9">Alamat : </h1>
                <h1>{{ $petHouse->user->address }}, {{ $petHouse->user->village->villageName }},
                    {{ $petHouse->user->village->district->districtName }},
                    {{ $petHouse->user->village->district->city->cityName }},
                    {{ $petHouse->user->village->district->city->province->provinceName }}</h1>
            </div>
            <div class="flex flex-col md:flex-row gap-x-2.5 gap-y-1">
                <h1 class="md:w-1/8">Deskripsi : </h1>
                <h1 class="break-words">{!! nl2br($petHouse->description) !!}</h1>
            </div>
        </article>
    </section>
    <section class="space-y-2.5">
        <h1 class="font-bold text-2xl">Fasilitas Pethouse</h1>
        <div class="grid md:grid-cols-3 gap-10">
            @foreach (json_decode($petHouse->locationPhotos) as $photos)
                <img src="{{ $photos }}" class="aspect-video object-center object-cover" alt="">
            @endforeach
        </div>
    </section>
    <section class="flex flex-col gap-2.5 min-h-56">
        <h1 class="font-bold text-2xl">Layanan</h1>
        @forelse ($petHouse->pethouseLayanansActive as $layanan)
            <div class="p-4 hover:bg-gray-50 transition-colors shadow rounded-lg">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="w-full md:w-48 h-40 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ $layanan->pethouselayanans?->photos ?? $layanan->layanan->photos }}"
                            alt="{{ $layanan->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <div class="flex flex-col h-full">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mt-1">
                                        {{ $layanan->layanan->name }}</h3>
                                </div>
                                <span
                                    class="text-lg font-bold text-[#F69246]">Rp{{ number_format($layanan->price ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-gray-600 mt-2 line-clamp-2 break-words">{!! nl2br($layanan->description ?? $layanan->pethouselayanans?->description) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1 class="font-bold text-2xl text-center my-auto">Belum Tersedia Layanan Tambahan Lainnya</h1>
        @endforelse
    </section>
</x-pethouse-layout>
