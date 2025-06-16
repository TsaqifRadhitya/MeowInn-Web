@extends('layouts.CustomerLayout')
@section('main')
    <div class=" bg-[#FFF6F2] min-h-screen">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-[1fr_auto] items-center py-12 gap-8">
            <div class="flex-1 px-4 md:px-8">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-700 mb-4 leading-tight">
                    Selamat Datang di <span class="text-[#FF8855]">Meowinn</span><br>
                    Layanan Penitipan Kucing Terpercaya
                </h1>
                <p class="text-gray-500 mb-8 max-w-lg text-base md:text-lg">Kami menyediakan solusi penitipan yang aman dan
                    nyaman untuk kucing kesayangan Anda. Bergabunglah dengan kami dan nikmati layanan terbaik yang dirancang
                    khusus untuk kenyamanan dan kebutuhan si manis berbulu Anda.</p>
                <div class="flex gap-4">
                    <a href="{{ route('register') }}"
                        class="bg-[#FF8855] text-white px-8 py-3 rounded-full font-bold shadow hover:bg-[#ff6d1f] transition text-lg">Bergabung</a>
                    <a href="#Fitur Mitra"
                        class="border-2 border-[#FF8855] text-[#FF8855] px-8 py-3 rounded-full font-bold hover:bg-[#FF8855] hover:text-white transition text-lg bg-white">Pelajari</a>
                </div>
            </div>
            <div class="flex-1 flex justify-end relative">
                <img src="{{ asset('asset/kucing1.png') }}" alt="Kucing"
                    class="object-contain md:object-cover md:w-[420px] w-full md:max-w-none max-w-xs md:rounded-none rounded-lg" />
                <div
                    class="absolute top-
            0 right-0 w-[370px] h-[370px] bg-[#FF8855] rounded-tl-[120px] rounded-br-[180px] rounded-tr-[80px] rounded-bl-[80px] -z-10 flex flex-col items-end justify-end">

                </div>
                <span class="absolute top-10 right-10 w-6 h-6 bg-white/0 rounded-full"></span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-[auto_1fr] items-center py-12 gap-8">
            <div class="flex-1 flex justify-start relative">
                <img src="{{ asset('asset/kucing2.png') }}" alt="Kucing Fitur"
                    class="object-contain md:object-cover md:w-[370px] w-full md:max-w-none max-w-xs md:rounded-none rounded-lg" />
                <div
                    class="absolute -z-10 left-0 top-0 w-[370px] h-[370px] bg-[#FF8855]/20 rounded-tl-[120px] rounded-br-[180px] rounded-tr-[80px] rounded-bl-[80px]">
                </div>
            </div>
            <div class="flex-1 px-4 md:px-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-700 mb-4 leading-tight">Fitur Unggulan Layanan Penitipan
                    Kucing <span class="text-[#FF8855]">Meowinn</span></h2>
                <p class="text-gray-500 mb-8 text-base md:text-lg">Kami menyediakan pengawasan 24/7 untuk memastikan kucing
                    Anda selalu aman dan nyaman. Dengan makanan berkualitas dan area bermain yang luas, kucing Anda akan
                    merasa betah selama penitipan.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-[#FF8855] text-white rounded-xl p-6 shadow text-center">
                        <h3 class="font-bold mb-2 text-lg">Rekomendasi Lokasi Pet House Terdekat</h3>
                        <p class="text-sm">Temukan pet house terdekat secara otomatis berdasarkan lokasi Anda praktis,
                            cepat, dan sesuai kebutuhan.</p>
                    </div>
                    <div class="bg-[#FF8855] text-white rounded-xl p-6 shadow text-center">
                        <h3 class="font-bold mb-2 text-lg">Pelaporan Kondisi Kucing Secara Berkala</h3>
                        <p class="text-sm">Pantau kondisi kucing Anda dari jarak jauh melalui laporan berkala dari pet
                            house.</p>
                    </div>
                    <div class="bg-[#FF8855] text-white rounded-xl p-6 shadow text-center">
                        <h3 class="font-bold mb-2 text-lg">Sistem Laporan & Monitoring Lengkap</h3>
                        <p class="text-sm">Pantau seluruh aktivitas penitipan dengan sistem laporan lengkap untuk customer,
                            pet house, dan admin.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-[auto_1fr] items-center py-12 gap-8">
            <div class="flex-1 flex justify-start relative">
                <img src="{{ asset('asset/kucing3.png') }}" alt="Kucing Pengguna"
                    class="object-contain md:object-cover md:w-[500px] w-full md:max-w-none max-w-xs md:rounded-none rounded-lg" />
                <div
                    class="absolute -z-10 left-0 top-0 w-[370px] h-[370px] bg-[#FF8855]/20 rounded-tl-[120px] rounded-br-[180px] rounded-tr-[80px] rounded-bl-[80px]">
                </div>
            </div>
            <div class="flex-1 px-4 md:px-8">
                <div class="mb-2 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-700 leading-tight">
                        Fitur Lengkap untuk Pengguna
                    </h2>
                    <div class="text-[#FF8855] font-bold text-2xl md:text-3xl mt-1">MeowInn</div>
                </div>
                <div class="relative mt-8">
                    <div class="absolute left-6 top-0 bottom-0 w-1 bg-[#FF8855] z-0"></div>
                    <div class="flex flex-col gap-8 relative z-10 pl-16">
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#FF8855] text-white font-bold text-lg">
                                    1</div>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 text-lg block">Rekomendasi Lokasi Pet House
                                    Terdekat</span>
                                <span class="text-gray-500 text-base block">Temukan pet house terpercaya secara otomatis
                                    berdasarkan lokasi Anda praktis, cepat, dan sesuai kebutuhan.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#FF8855] text-white font-bold text-lg">
                                    2</div>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 text-lg block">Pelaporan Kondisi Kucing Secara
                                    Berkala</span>
                                <span class="text-gray-500 text-base block">Pantau aktivitas dan kondisi kucing Anda dari
                                    jarak jauh melalui laporan rutin yang dikirim oleh pet house.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#FF8855] text-white font-bold text-lg">
                                    3</div>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 text-lg block">Riwayat Penitipan</span>
                                <span class="text-gray-500 text-base block">Akses catatan lengkap pemesanan, durasi
                                    penitipan, dan laporan kondisi kucing Anda di satu tempat.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#FF8855] text-white font-bold text-lg">
                                    4</div>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 text-lg block">Opsi Penjemputan (Jika Tersedia)</span>
                                <span class="text-gray-500 text-base block">Beberapa pet house menyediakan layanan
                                    antar-jemput untuk menambah kenyamanan Anda.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#FF8855] py-16 mt-12">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-[1fr_auto] items-center gap-8">
                <div class="flex-1 px-4 md:px-8">
                    <div class="mb-2 text-center"id="Fitur Mitra">
                        <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                            Fitur Lengkap untuk Untuk Mitra Pet House
                        </h2>
                        <div class="text-white font-bold text-2xl md:text-3xl mt-1">MeowInn</div>
                    </div>
                    <div class="relative mt-8">
                        <div class="absolute left-6 top-0 bottom-0 w-1 bg-white z-0"></div>
                        <div class="flex flex-col gap-8 relative z-10 pl-16">
                            <div class="flex items-start gap-4">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-[#FF8855] font-bold text-lg border-2 border-[#FF8855] shadow">
                                        1</div>
                                </div>
                                <div>
                                    <span class="font-bold text-white text-lg block">Manajemen Layanan Penitipan</span>
                                    <span class="text-white text-base block">Tambahkan dan kelola informasi layanan seperti
                                        kapasitas, harga, fasilitas, dan area layanan secara fleksibel.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-[#FF8855] font-bold text-lg border-2 border-[#FF8855] shadow">
                                        2</div>
                                </div>
                                <div>
                                    <span class="font-bold text-white text-lg block">Atur Radius Penjemputan</span>
                                    <span class="text-white text-base block">Tentukan radius penjemputan layanan Anda sesuai
                                        jangkauan wilayah, untuk menjangkau lebih banyak pelanggan potensial.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-[#FF8855] font-bold text-lg border-2 border-[#FF8855] shadow">
                                        3</div>
                                </div>
                                <div>
                                    <span class="font-bold text-white text-lg block">Terima & Kelola Reservasi</span>
                                    <span class="text-white text-base block">Terima pemesanan penitipan dari pengguna
                                        langsung melalui sistem Meowinn dan kelola semua reservasi dalam satu
                                        dashboard.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-[#FF8855] font-bold text-lg border-2 border-[#FF8855] shadow">
                                        4</div>
                                </div>
                                <div>
                                    <span class="font-bold text-white text-lg block">Pelaporan Kondisi Kucing</span>
                                    <span class="text-white text-base block">Kirim laporan harian atau berkala kepada
                                        pemilik kucing sebagai bentuk tanggung jawab dan transparansi pelayanan.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-[#FF8855] font-bold text-lg border-2 border-[#FF8855] shadow">
                                        5</div>
                                </div>
                                <div>
                                    <span class="font-bold text-white text-lg block">Notifikasi & Pembaruan
                                        Real–Time</span>
                                    <span class="text-white text-base block">Dapatkan notifikasi pemesanan, laporan, dan
                                        permintaan pelanggan secara langsung di sistem.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 flex justify-end relative">
                    <img src="{{ asset('asset/kucing4.png') }}" alt="Kucing4"
                        class="object-contain md:object-cover md:w-[500px] w-full md:max-w-none max-w-xs md:rounded-none rounded-lg" />
                    <a href="#"
                        class="absolute bottom-0 right-0 bg-white text-[#FF8855] font-bold px-8 py-3 rounded-full shadow hover:bg-[#FF8855] hover:text-white transition text-lg mb-4 mr-4">Bergabung
                        Sekarang</a>
                    <div
                        class="absolute -z-10 left-0 top-0 w-[370px] h-[370px] bg-white/30 rounded-tl-[120px] rounded-br-[180px] rounded-tr-[80px] rounded-bl-[80px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
