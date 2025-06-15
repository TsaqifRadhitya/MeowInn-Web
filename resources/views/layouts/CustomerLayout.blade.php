<head>
    <title>MeowInn</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <script>
        const handleOpen = () => {
            $('#default-sidebar').removeClass('-translate-x-full');
        }

        const handleClose = () => {
            $('#default-sidebar').addClass('-translate-x-full');
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <x-customer-navbar />
    <main class="p-5 md:p-10 bg-[#FFF6F2]">@yield('main')</main>
    <x-customer-footer />
    <x-sweet-alert />
</body>
