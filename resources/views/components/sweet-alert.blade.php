@if (session('success'))
    <div id="sweetAlert" class="fixed top-5 left-1/2 -translate-x-1/2 md:right-10 md:-translate-x-0 md:left-auto md:top-auto w-full md:w-fit md:bottom-10 z-[1000]">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center animate-fade-in-up">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('error'))
    <div id="sweetAlertError" class="fixed top-5 md:right-10 -translate-x-1/2 md:-translate-0 md:bottom-10 w-full md:w-fit md:top-auto md:left-auto z-[1000]">
        <div class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center animate-fade-in-up">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.3s ease-out forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-out {
        animation: fadeOut 0.3s ease-out forwards;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(20px);
        }
    }
</style>

<script>
    // Success notification
    @if (session('success'))
        setTimeout(() => {
            const alert = document.getElementById('sweetAlert');
            alert.querySelector('div').classList.add('animate-fade-out');
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    @endif

    // Error notification
    @if (session('error'))
        setTimeout(() => {
            const alert = document.getElementById('sweetAlertError');
            alert.querySelector('div').classList.add('animate-fade-out');
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    @endif
</script>
