<!-- resources/views/profile/index.blade.php -->

<x-meowinn-layout header="Profile" class="m-5 p-5 rounded-2xl shadow-sm" id="content" activeMenu="Profile">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">Your Profile Information</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">

        {{-- Name --}}
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Name:</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $user->name }}</p>
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Email:</p>
            <p class="text-lg text-gray-900">{{ $user->email }}</p>
        </div>

        {{-- Phone Number --}}
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Phone Number:</p>
            <p class="text-lg text-gray-900">{{ $user->phoneNumber ?? 'N/A' }}</p> {{-- Tampilkan N/A jika kosong --}}
        </div>

        {{-- Address --}}
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Address:</p>
            <p class="text-lg text-gray-900">{{ $user->address ?? 'N/A' }}</p> {{-- Tampilkan N/A jika kosong --}}
        </div>

        {{-- Village --}}
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Village:</p>
            <p class="text-lg text-gray-900">
                {{ $user->village->name ?? 'N/A' }} {{-- Akses nama desa dari relasi, tampilkan N/A jika tidak ada --}}
            </p>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('meowinn.profile.edit') }}"
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Edit Profile
            </a>
        </div>
    </div>

</x-meowinn-layout>
