<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
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
