<section class="sticky top-0 left-0 z-[999] w-full">
    <nav class="w-full bg-[#FF7B54] h-[60px] flex items-center justify-between px-4 md:px-8 shadow"
        style="min-height:60px;">
        <div class="flex items-center h-full">
            <span class="font-bold text-white text-lg">Meowinn</span>
        </div>
        <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <div class="hidden md:flex items-center h-full flex-1 justify-end">
            <div class="flex-1"></div>
            <ul class="flex items-center h-full gap-1 md:gap-2 font-semibold">
                <li class="flex items-center h-full">
                    <a href="{{ route('dashboard') }}"
                        class="@if (request()->routeIs('dashboard')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                        style="height:40px;display:flex;align-items:center;">
                        Home
                    </a>
                </li>
                <li class="flex items-center h-full">
                    <a href="{{ route('customer.pethouse.index') }}" id="cari-pethouse-link"
                        class="@if (request()->routeIs('customer.pethouse.index')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                        style="height:40px;display:flex;align-items:center;">
                        Cari Pethouse
                    </a>
                </li>
                @auth
                    <li class="flex items-center h-full">
                        <a href="{{ route('customer.penitipan.index') }}" id="riwayat-penitipan-link"
                            class="@if (request()->routeIs('customer.penitipan.index')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                            style="height:40px;display:flex;align-items:center;">
                            Riwayat
                        </a>
                    </li>
                    <li class="flex items-center h-full">
                        <button onclick="document.getElementById('dashboard-feedback-modal').classList.remove('hidden')"
                            class="text-white hover:text-[#FF8855] hover:bg-white px-3 md:px-6 py-1.5 rounded-full transition font-bold flex items-center h-full"
                            style="height:40px;display:flex;align-items:center;">
                            Feedback
                        </button>
                    </li>
                @endauth
            </ul>
            <div class="flex items-center gap-2 text-white ml-2 h-full">
                @auth
                    <a href="{{ route('customer.profile.index') }}" class="focus:outline-none">
                        <span
                            class="bg-white rounded-full flex items-center justify-center w-9 h-9 overflow-hidden border-2 border-[#FF8855] shadow">
                            <img src="{{ Auth::user()->profilePicture ??
                                'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=fff&color=FF8855' }}"
                                alt="Foto Profil" class="object-cover w-full h-full">
                        </span>
                    </a>
                    <span class="font-bold hidden md:inline">{{ Auth::user()->name }}</span>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white hover:bg-white hover:text-[#FF8855] px-3 md:px-4 py-1.5 rounded-full transition font-bold flex items-center h-full"
                        style="height:40px;display:flex;align-items:center;">
                        Login
                    </a>
                    <a href="{{ route('register.option') }}"
                        class="bg-white text-[#FF8855] px-3 md:px-4 py-1.5 rounded-full transition font-bold flex items-center h-full"
                        style="height:40px;display:flex;align-items:center;">
                        Register
                    </a>
                @endauth
            </div>
        </div>

    </nav>
    <div id="mobile-menu" class="hidden md:hidden absolute bg-[#FF7B54] w-full px-4 py-2 shadow-lg">
        <ul class="flex flex-col gap-2 font-semibold">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="@if (request()->routeIs('dashboard')) bg-white text-[#FF8855] @else text-white hover:bg-white hover:text-[#FF8855] @endif block px-4 py-2 rounded-full transition font-bold">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('customer.pethouse.index') }}" id="mobile-cari-pethouse-link"
                    class="text-white hover:bg-white hover:text-[#FF8855] block px-4 py-2 rounded-full transition font-bold">
                    Cari Pethouse
                </a>
            </li>
            @auth
                <li>
                    <a href="{{ route('customer.penitipan.index') }}" id="mobile-riwayat-penitipan-link"
                        class="text-white hover:bg-white hover:text-[#FF8855] block px-4 py-2 rounded-full transition font-bold">
                        Riwayat Penitipan
                    </a>
                </li>
                <li>
                    <button onclick="document.getElementById('dashboard-feedback-modal').classList.remove('hidden')"
                        class="text-white hover:bg-white hover:text-[#FF8855] w-full text-left px-4 py-2 rounded-full transition font-bold">
                        Feedback
                    </button>
                </li>
                <li class="pt-2 border-t border-white/20">
                    <a href="{{ route('customer.profile.index') }}" class="flex items-center gap-2 text-white px-4 py-2">
                        <span
                            class="bg-white rounded-full flex items-center justify-center w-8 h-8 overflow-hidden border-2 border-[#FF8855] shadow">
                            <img src="{{ Auth::user()->profilePicture ??
                                'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=fff&color=FF8855' }}"
                                alt="Foto Profil" class="object-cover w-full h-full">
                        </span>
                        <span class="font-bold">{{ Auth::user()->name }}</span>
                    </a>
                </li>
            @else
                <li class="pt-2 border-t border-white/20">
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 text-white px-4 py-2">
                        <span class="font-bold">Login</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register.option') }}"
                        class="flex items-center justify-center gap-2 bg-white text-[#FF8855] px-4 py-2 rounded-full">
                        <span class="font-bold">Register</span>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</section>

<div id="dashboard-feedback-modal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden p-4">
    <div class="relative bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-2xl shadow-black/30 w-full max-w-4xl flex flex-col md:flex-row items-stretch overflow-hidden"
        style="min-height:340px;">
        <div class="hidden md:flex flex-col justify-center items-center pl-6 md:pl-10 pr-0 py-6 md:py-10 relative"
            style="background:transparent;">
            <span
                class="absolute left-0 top-1/2 -translate-y-1/2 -z-10 block w-48 md:w-64 h-56 md:h-72 bg-[#FF8855] rounded-[40%_60%_60%_40%/50%_40%_60%_50%]"></span>
            <img src="{{ asset('asset/kucing5.png') }}" alt="Kucing"
                class="w-48 md:w-64 lg:w-72 h-56 md:h-64 lg:h-80 object-contain z-10" style="margin-left:10px;" />
        </div>
        <div class="flex-1 flex flex-col justify-center px-4 sm:px-6 md:px-8 lg:px-10 py-6 md:py-8 lg:py-10">
            <button onclick="document.getElementById('dashboard-feedback-modal').classList.add('hidden')"
                class="absolute top-2 sm:top-3 md:top-4 right-3 sm:right-4 md:right-6 text-gray-400 hover:text-gray-700 text-2xl sm:text-3xl font-bold z-10">&times;</button>
            <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 text-gray-700">
                Ceritakan pengalamanmu bersama <span class="text-[#FF8855]">MeowInn!</span>
            </h3>
            <p class="text-gray-500 mb-3 sm:mb-4 text-sm sm:text-base">
                Sampaikan pendapat, kesan, atau saranmu karena suara kamu sangat berarti bagi kami dan kucing-kucing
                tersayang.
            </p>
            <form method="POST" action="{{ route('customer.reports.store') }}">
                @csrf
                <textarea id="feedback-textarea" name="isi"
                    class="w-full border border-gray-200 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6 focus:outline-none focus:ring-2 focus:ring-[#FF8855] resize-none bg-white text-gray-700 text-sm sm:text-base"
                    rows="5" placeholder="Tulis feedback kamu di sini..." required>{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="text-red-500 text-xs sm:text-sm mb-2">{{ $message }}</div>
                @enderror
                <button type="submit"
                    class="bg-[#FF8855] text-white px-6 sm:px-8 py-2 sm:py-3 rounded-full font-bold hover:bg-[#ff6d1f] transition text-base sm:text-lg w-full sm:w-auto">
                    Kirim
                </button>
            </form>
        </div>
    </div>
</div>
<div id="alamat-warning-modal" class="fixed inset-0 bg-black/30 flex items-center justify-center z-50 hidden p-4">
    <div
        class="bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-2xl px-6 sm:px-8 py-6 sm:py-8 w-full max-w-md text-center relative">
        <button onclick="closeAlamatWarningModal()"
            class="absolute top-2 sm:top-3 right-3 sm:right-4 text-gray-400 hover:text-gray-700 text-xl sm:text-2xl font-bold">&times;</button>
        <h3 class="text-lg sm:text-xl font-bold mb-2 text-[#FF8855]">Alamat Belum Lengkap</h3>
        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Silakan lengkapi alamat Anda terlebih dahulu sebelum
            mengakses fitur ini.</p>
        <a href="{{ route('customer.profile.edit') }}"
            class="bg-[#FF8855] text-white px-4 sm:px-6 py-1.5 sm:py-2 rounded-full font-bold hover:bg-[#ff6d1f] transition inline-block text-sm sm:text-base">
            Edit Profil
        </a>
    </div>
</div>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    });
    document.getElementById('mobile-cari-pethouse-link').addEventListener('click', cekAlamatDanTampilkanModal);
    document.getElementById('mobile-riwayat-penitipan-link').addEventListener('click', cekAlamatDanTampilkanModal);
    function cekAlamatDanTampilkanModal(e) {
        var userAlamat = @json(Auth::user()?->address);
        var userVillage = @json(Auth::user()?->villageId);

        if (!userAlamat || !userVillage) {
            e.preventDefault();
            document.getElementById('alamat-warning-modal').classList.remove('hidden');
            return false;
        }
        return true;
    }

    function closeAlamatWarningModal() {
        document.getElementById('alamat-warning-modal').classList.add('hidden');
    }

    // Initialize address check for desktop links
    document.addEventListener('DOMContentLoaded', function() {
        var cariPethouseLink = document.getElementById('cari-pethouse-link');
        var riwayatLink = document.getElementById('riwayat-penitipan-link');
        if (cariPethouseLink) {
            cariPethouseLink.addEventListener('click', cekAlamatDanTampilkanModal);
        }
        if (riwayatLink) {
            riwayatLink.addEventListener('click', cekAlamatDanTampilkanModal);
        }
    });
</script>
