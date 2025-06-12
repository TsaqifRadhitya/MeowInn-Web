<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>@yield('title')</title>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        .bg-gradient {
            background: linear-gradient(135deg, #ff8e3c 0%, #ff5277 100%);
        }

        .btn-hover {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(255, 142, 60, 0.3);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255, 142, 60, 0.4);
        }
    </style>
</head>

<body class="antialiased bg-gray-50">
    <section class="flex items-center justify-center">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-64 h-64 bg-[#ff8e3c] opacity-10 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-[#ff5277] opacity-10 rounded-full filter blur-3xl"></div>
        </div>

        <div class="relative py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 text-center">
            <div class="animate__animated animate__fadeIn">
                <!-- Animated illustration -->
                <div class="floating mb-8 mx-auto w-48 h-48">
                    @if (trim($__env->yieldContent('code')) === '403')
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-full h-full text-[#ff8e3c]">
                            <path fill-rule="evenodd"
                                d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                clip-rule="evenodd" />
                        </svg>
                    @elseif(trim($__env->yieldContent('code')) === '404')
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-full h-full text-[#ff8e3c]">
                            <path fill-rule="evenodd"
                                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-full h-full text-[#ff8e3c]">
                            <path fill-rule="evenodd"
                                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>

                <h1
                    class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-[#ff8e3c] animate__animated animate__bounceIn">
                    @yield('code')
                </h1>

                <p
                    class="mb-8 text-3xl tracking-tight font-bold md:text-4xl text-gray-800 animate__animated animate__fadeInUp">
                    @yield('message')
                </p>

                <p
                    class="mb-8 text-lg text-gray-600 max-w-md mx-auto animate__animated animate__fadeInUp animate__delay-1s">
                    Oops! Something went wrong. Don't worry, let's get you back on track.
                </p>

                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ trim($__env->yieldContent('code')) === '403' ? route('dashboard') : url()->previous() }}"
                        class="bg-gradient text-white font-bold w-2/3 text-center inline-flex items-center justify-center btn-hover rounded-lg text-lg px-6 py-3 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 mr-2">
                            <path fill-rule="evenodd"
                                d="M11.03 3.97a.75.75 0 010 1.06l-6.22 6.22H21a.75.75 0 010 1.5H4.81l6.22 6.22a.75.75 0 11-1.06 1.06l-7.5-7.5a.75.75 0 010-1.06l7.5-7.5a.75.75 0 011.06 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Take me back
                    </a>
                </div>

                <div class="mt-8 text-gray-500 text-sm animate__animated animate__fadeIn animate__delay-3s">
                    Need help? <a href="/contact" class="text-[#ff8e3c] hover:underline">Contact support</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            const errorCode = document.querySelector('h1');

            errorCode.addEventListener('mouseover', () => {
                errorCode.classList.add('animate__animated', 'animate__wobble');
            });

            errorCode.addEventListener('animationend', () => {
                errorCode.classList.remove('animate__animated', 'animate__wobble');
            });
        });
    </script>
</body>

</html>
