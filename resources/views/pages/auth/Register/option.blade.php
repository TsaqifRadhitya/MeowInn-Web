@extends('layouts.auth-layout')

@section('header', 'Pilih Jenis Registrasi')

@section('content')
    <div class="w-full min-h-screen flex flex-col lg:flex-row">
        <div class="flex-1 lg:w-1/2 min-h-screen bg-gradient-to-br from-teal-400 to-teal-500 relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center flex-col gap-y-6 px-4 text-center">
                <div class="max-w-md">
                    <h2 class="text-3xl font-bold text-white mb-3">Daftar Sebagai Pet House</h2>
                    <p class="text-teal-100 mb-6">
                        Untuk pemilik usaha pet house yang ingin menawarkan layanan penitipan hewan peliharaan.
                    </p>
                    <a href="{{ route('register.pethouse.index') }}"
                        class="btn bg-white text-teal-500 hover:bg-teal-50 font-medium px-8 py-3 rounded-full shadow-lg transition-all transform hover:scale-105">
                        Daftar Pet House
                    </a>
                </div>
            </div>

            <div class="absolute bottom-10 left-10 w-16 h-16 rounded-full bg-teal-300 opacity-20"></div>
            <div class="absolute top-20 right-20 w-24 h-24 rounded-full bg-teal-300 opacity-20"></div>
        </div>

        <div class="flex-1 lg:w-1/2 min-h-screen bg-gradient-to-br from-[#FF7B54] to-[#FF9A6C] relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center flex-col gap-y-6 px-4 text-center">
                <div class="max-w-md">
                    <h2 class="text-3xl font-bold text-white mb-3">Daftar Sebagai Customer</h2>
                    <p class="text-orange-100 mb-6">
                        Untuk pemilik hewan peliharaan yang ingin mencari layanan penitipan hewan terbaik.
                    </p>
                    <a href="{{ route('register') }}"
                        class="btn bg-white text-[#FF7B54] hover:bg-orange-50 font-medium px-8 py-3 rounded-full shadow-lg transition-all transform hover:scale-105">
                        Daftar Customer
                    </a>
                </div>
            </div>
            <div class="absolute bottom-20 right-10 w-20 h-20 rounded-full bg-[#FFB38E] opacity-20"></div>
            <div class="absolute top-10 left-20 w-32 h-32 rounded-full bg-[#FFB38E] opacity-20"></div>
        </div>
    </div>
@endsection
