@extends('layouts.auth-layout')

@section('header', 'Opsi Register')

@section('content')
    <div class="w-full min-h-screen flex flex-col lg:flex-row">
        <div class="flex-1/2 lg:min-h-screen bg-orange-400 relative">
            <div class="absolute top-1/2 left-1/2 -translate-1/2 flex flex-col items-center gap-y-5">
                <p>Register Sebagai Pet House</p>
                <form action="{{ route('register.pethouse.index') }}" method="GET">
                    <button type="submit" class="btn mx-auto">Register</button>
                </form>
            </div>
        </div>
        <div class="flex-1/2 lg:min-h-screen bg-white relative">
            <div class="absolute top-1/2 left-1/2 -translate-1/2 flex flex-col items-center gap-y-5">
                <p>Register Sebagai Customer</p>
                <form action="{{ route('register') }}" method="GET">
                    <button type="submit" class="btn mx-auto">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
