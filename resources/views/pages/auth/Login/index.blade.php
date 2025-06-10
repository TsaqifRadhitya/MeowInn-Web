@extends('layouts.auth-layout')

@section('header', 'Login')

@section('content')
    {{-- Latar belakang menggunakan versi sangat terang dari #FF7B54 --}}
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#FFF1EC] to-white px-4">
        <div class="w-full max-w-lg px-8 py-12 bg-white rounded-2xl shadow-xl transition-all duration-300 hover:shadow-2xl">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang!</h1>
                <p class="text-gray-500 mt-2">Masukkan email dan password untuk login</p>
            </div>
            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 text-sm rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus
                            class="block w-full pl-10 pr-3 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#FF7B54] focus:border-[#FF7B54] sm:text-sm transition duration-200"
                            placeholder="email">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" autocomplete="current-password"
                            class="block w-full pl-10 pr-3 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#FF7B54] focus:border-[#FF7B54] sm:text-sm transition duration-200"
                            placeholder="password">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        {{-- Warna checkbox diubah ke #FF7B54 --}}
                        <input id="remember_me" type="checkbox" name="remember"
                            class="h-4 w-4 text-[#FF7B54] focus:ring-[#FF7B54] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                </div>
                <div>
                    {{-- Warna tombol utama diubah ke gradasi #FF7B54 --}}
                    <button type="submit"
                        class="w-full cursor-pointer flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#FFB26B] to-[#FF7B54] hover:from-[#FF7B54] hover:to-[#F06C44] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF7B54] transition-all duration-300 transform hover:scale-[1.02]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.5 8.25V6a4.5 4.5 0 10-9 0v2.25H6.75A2.25 2.25 0 004.5 10.5v6A2.25 2.25 0 006.75 18.75h6.5A2.25 2.25 0 0015.5 16.5v-6A2.25 2.25 0 0013.25 8.25H16.5zm-8.25-2.25a3 3 0 116 0v2.25H8.25V6z"
                                clip-rule="evenodd" />
                        </svg>
                        Sign In
                    </button>
                </div>
            </form>
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-gray-500">Or</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-3">
                    <a href="#"
                        class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-gray-200 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF7B54] transition-all duration-200 hover:border-[#FFB26B]">
                        <svg class="w-5 h-5 mr-2 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12.545 10.239v3.821h5.445c-0.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866 0.549 3.921 1.453l2.814-2.814c-1.784-1.664-4.13-2.675-6.735-2.675-5.522 0-10 4.477-10 10s4.478 10 10 10c8.396 0 10-7.524 10-10 0-0.671-0.068-1.325-0.182-1.977h-9.818z" />
                        </svg>
                        Google
                    </a>
                </div>
            </div>
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register.option') }}"
                        class="font-medium text-[#FF7B54] hover:text-[#E0623D] transition-colors duration-200">
                        Register
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
