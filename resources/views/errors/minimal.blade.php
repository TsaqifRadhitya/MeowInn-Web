<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
</head>

<body class="antialiased">
    <section class="bg-white min-h-screen w-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 absolute top-1/2 left-1/2 -translate-1/2 text-[#ff8e3c]">
            <div class="mx-auto max-w-screen-sm text-center drop-shadow-md">
                <h1 class=" mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl">
                    @yield('code')</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold md:text-4xl ">
                    @yield('message')</p>
                <a onclick="history.back()"
                    class="bg-[#ff8e3c] text-white font-bold w-2/3 text-center inline-flex hover:cursor-pointer bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 focus:ring-primary-900 my-4">
                    <p class="mx-auto">Back</p></a>
            </div>
        </div>
    </section>
</body>

</html>
