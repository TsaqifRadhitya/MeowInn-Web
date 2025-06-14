<x-pethouse-layout header="Dashboard" class="p-5 md:p-10 md:pb-0 relative" id="content" activeMenu="Dashboard">
    @if ($statusPethouse !== 'disetujui')
        <section
            class="absolute inset-0 z-10 backdrop-blur-md flex flex-col items-center justify-center p-6 transition-all duration-300">
            <div class="max-w-md w-full p-8  text-center animate-fade-in-up">
                <div class="mb-6 animate-bounce-slow">
                    <svg class="w-32 h-32 mx-auto" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="64" cy="64" r="60" fill="#FEE2E2" />
                        <path
                            d="M64 24C42.4 24 24 42.4 24 64C24 85.6 42.4 104 64 104C85.6 104 104 85.6 104 64C104 42.4 85.6 24 64 24ZM64 96C48.5 96 32 79.5 32 64C32 48.5 48.5 32 64 32C79.5 32 96 48.5 96 64C96 79.5 79.5 96 64 96Z"
                            fill="#EF4444" />
                        <path
                            d="M64 40C67.3 40 70 42.7 70 46V66C70 69.3 67.3 72 64 72C60.7 72 58 69.3 58 66V46C58 42.7 60.7 40 64 40Z"
                            fill="#EF4444" />
                        <circle cx="64" cy="82" r="6" fill="#EF4444" />
                        <path d="M88 24L104 8" stroke="#EF4444" stroke-width="4" stroke-linecap="round" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-3">
                    @if ($statusPethouse)
                        Menunggu Verifikasi Pethouse
                    @else
                        Verifikasi Pethouse Diperlukan
                    @endif
                </h2>
                <p class="text-gray-600 mb-6">Untuk mengakses semua fitur, Anda perlu menyelesaikan verifikasi pethouse
                    terlebih dahulu. Proses verifikasi biasanya memakan waktu 1-2 hari kerja.</p>
                <div class="space-y-4">
                    <a href="{{ route($statusPethouse ? 'pethouse.verifikasi.index' : 'pethouse.verifikasi.create') }}"
                        class="inline-flex items-center justify-center w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        @if ($statusPethouse)
                            Periksa Status Verifikasi
                        @else
                            Ajukan Verifikasi Sekarang
                        @endif
                    </a>
                </div>
            </div>
        </section>
    @endif
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="flex-grow flex flex-col gap-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Informasi Pethouse</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="bg-red-100 p-4 rounded-xl flex flex-col gap-4 shadow">
                        <svg width="38" height="40" viewBox="0 0 38 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="18.8053" cy="20" rx="18.4026" ry="20" fill="#FA5A7D" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.3644 11C11.348 11 10.5241 11.8954 10.5241 13V27C10.5241 28.1046 11.348 29 12.3644 29H25.2462C26.2626 29 27.0865 28.1046 27.0865 27V13C27.0865 11.8954 26.2626 11 25.2462 11H12.3644ZM15.1248 21C15.1248 20.4477 14.7128 20 14.2046 20C13.6965 20 13.2845 20.4477 13.2845 21V25C13.2845 25.5523 13.6965 26 14.2046 26C14.7128 26 15.1248 25.5523 15.1248 25V21ZM18.8053 17C19.3135 17 19.7254 17.4477 19.7254 18V25C19.7254 25.5523 19.3135 26 18.8053 26C18.2971 26 17.8852 25.5523 17.8852 25V18C17.8852 17.4477 18.2971 17 18.8053 17ZM24.3261 15C24.3261 14.4477 23.9141 14 23.406 14C22.8978 14 22.4858 14.4477 22.4858 15V25C22.4858 25.5523 22.8978 26 23.406 26C23.9141 26 24.3261 25.5523 24.3261 25V15Z"
                                fill="white" />
                        </svg>
                        <p class="text-2xl font-bold text-gray-800">Rp2.500.000</p>
                        <p class="text-sm text-gray-600 font-semibold">Pendapatan Bulanan</p>
                    </div>
                    <div class="bg-[#FFF4DE] p-4 rounded-xl flex flex-col gap-4 justify-center shadow">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="20" cy="20.1305" rx="20" ry="19.5652" fill="#FF947A" />
                            <g clip-path="url(#clip0_167_50)">
                                <path
                                    d="M12.5 18C13.8807 18 15 16.8807 15 15.5C15 14.1193 13.8807 13 12.5 13C11.1193 13 10 14.1193 10 15.5C10 16.8807 11.1193 18 12.5 18Z"
                                    fill="white" />
                                <path
                                    d="M17 14C18.3807 14 19.5 12.8807 19.5 11.5C19.5 10.1193 18.3807 9 17 9C15.6193 9 14.5 10.1193 14.5 11.5C14.5 12.8807 15.6193 14 17 14Z"
                                    fill="white" />
                                <path
                                    d="M23 14C24.3807 14 25.5 12.8807 25.5 11.5C25.5 10.1193 24.3807 9 23 9C21.6193 9 20.5 10.1193 20.5 11.5C20.5 12.8807 21.6193 14 23 14Z"
                                    fill="white" />
                                <path
                                    d="M27.5 18C28.8807 18 30 16.8807 30 15.5C30 14.1193 28.8807 13 27.5 13C26.1193 13 25 14.1193 25 15.5C25 16.8807 26.1193 18 27.5 18Z"
                                    fill="white" />
                                <path
                                    d="M25.34 20.86C24.47 19.84 23.74 18.97 22.86 17.95C22.4 17.41 21.81 16.87 21.11 16.63C21 16.59 20.89 16.56 20.78 16.54C20.53 16.5 20.26 16.5 20 16.5C19.74 16.5 19.47 16.5 19.21 16.55C19.1 16.57 18.99 16.6 18.88 16.64C18.18 16.88 17.6 17.42 17.13 17.96C16.26 18.98 15.53 19.85 14.65 20.87C13.34 22.18 11.73 23.63 12.03 25.66C12.32 26.68 13.05 27.69 14.36 27.98C15.09 28.13 17.42 27.54 19.9 27.54H20.08C22.56 27.54 24.89 28.12 25.62 27.98C26.93 27.69 27.66 26.67 27.95 25.66C28.26 23.62 26.65 22.17 25.34 20.86Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_167_50">
                                    <rect width="24" height="24" fill="white" transform="translate(8 6)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalHewanDititipkan }}</p>
                        <p class="text-sm text-gray-600 font-semibold">Total Hewan Dititipkan</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-xl flex flex-col gap-4 shadow">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="20" cy="20.1305" rx="20" ry="19.5652" fill="#3CD856" />
                            <path
                                d="M21 10.03V10.05V12.05C25.39 12.59 28.5 16.58 27.96 20.97C27.5 24.61 24.64 27.5 21 27.93V29.93C26.5 29.38 30.5 24.5 29.95 19C29.5 14.25 25.73 10.5 21 10.03ZM19 10.06C17.05 10.25 15.19 11 13.67 12.26L15.1 13.74C16.22 12.84 17.57 12.26 19 12.06V10.06ZM12.26 13.67C11 15.19 10.25 17.04 10.05 19H12.05C12.24 17.58 12.8 16.23 13.69 15.1L12.26 13.67ZM10.06 21C10.26 22.96 11.03 24.81 12.27 26.33L13.69 24.9C12.81 23.77 12.24 22.42 12.06 21H10.06ZM15.1 26.37L13.67 27.74C15.18 29 17.04 29.79 19 30V28C17.58 27.82 16.23 27.25 15.1 26.37ZM20.5 15V20.25L25 22.92L24.25 24.15L19 21V15H20.5Z"
                                fill="white" />
                        </svg>
                        <p class="text-2xl font-bold text-gray-800">{{ $penitipanBerlangsung }}</p>
                        <p class="text-sm text-gray-600 font-semibold">Penitipan Berlangsung</p>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-xl flex flex-col gap-4 shadow">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="20" cy="20.1305" rx="20" ry="19.5652" fill="#BF83FF" />
                            <path
                                d="M17.3733 12.6326L17.3856 9.40155L20.6133 9.41843C22.9296 9.4308 23.8994 9.45105 24.0445 9.4893C25.0716 9.76268 25.8738 10.4456 26.2743 11.3883C26.5713 12.2073 26.8548 13.0319 27.1259 13.8599L27.8538 16.0402L29.0463 16.3349C30.5695 16.7107 30.8631 16.8434 31.4256 17.4116C31.8678 17.857 32.1366 18.3205 32.2806 18.8842C32.3639 19.2093 32.3695 19.3916 32.3695 21.8328V24.436H28.4714L28.2734 24.8298C27.9933 25.3855 27.424 25.9559 26.8795 26.2259C26.6691 26.3306 26.3654 26.4498 26.2045 26.4914C25.804 26.5949 24.9771 26.5927 24.5845 26.4881C23.6856 26.2417 22.9353 25.6229 22.5235 24.7871L22.357 24.4417L18.9685 24.4383L15.58 24.436L15.4866 24.6498C15.2391 25.2179 14.7115 25.8153 14.1715 26.1404C13.1961 26.7277 11.8529 26.7277 10.8775 26.1404C10.3375 25.8153 9.80989 25.2179 9.56239 24.6498L9.46902 24.436H6.62952V15.8861L11.9958 15.8748L17.362 15.8636L17.3733 12.6326ZM23.6463 11.6178C23.5248 11.5818 22.8621 11.5661 21.4851 11.5661H19.4995V18.001L8.76702 18.0236V22.2985L9.10789 22.312L9.44764 22.3244L9.63439 21.9521C10.0641 21.0959 10.9158 20.413 11.7854 20.2285C12.2703 20.1431 12.7675 20.1431 13.2524 20.2297C14.1355 20.4142 14.9815 21.0881 15.4135 21.9498L15.5991 22.3211H22.339L22.4324 22.1073C22.6799 21.5392 23.2188 20.9261 23.7588 20.5987C24.3933 20.2128 25.345 20.0609 26.1145 20.2229C27.0325 20.4164 27.9246 21.1376 28.3341 22.0184L28.477 22.3233L29.3545 22.3109L30.232 22.2985V20.8586C30.232 19.4332 30.2309 19.4163 30.1251 19.2014C29.9215 18.7886 29.782 18.7256 28.2295 18.3408L26.857 17.9999H24.2583L21.6595 18.001V15.8861H23.5641C24.6126 15.8861 25.4811 15.8748 25.4958 15.8602C25.525 15.8309 24.3584 12.3221 24.2504 12.1128C24.1548 11.9272 23.8521 11.6797 23.6463 11.6178ZM25.7129 22.3481C25.4418 22.2682 25.4046 22.2671 25.147 22.3267C24.7454 22.4324 24.4394 22.7564 24.3584 23.1637C24.3145 23.3268 24.3235 23.5 24.382 23.6587C24.4765 23.9849 24.7915 24.3134 25.0874 24.3933C25.4676 24.5035 25.8771 24.3978 26.1561 24.1177C26.4363 23.8387 26.542 23.4292 26.4318 23.0489C26.3541 22.762 26.0234 22.4392 25.7129 22.3481ZM12.952 22.3863C11.845 21.9307 10.9304 23.3212 11.8011 24.1357C12.2354 24.5429 12.8136 24.5429 13.2479 24.1357C13.8149 23.6058 13.6574 22.6777 12.952 22.3863Z"
                                fill="white" />
                        </svg>
                        <p class="text-2xl font-bold text-gray-800">{{ $menujuKePethouse }}</p>
                        <p class="text-sm text-gray-600 font-semibold">Menuju ke Pethouse</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Total Pemasukan Mingguan</h3>
                <div>
                    <canvas id="weeklyIncomeChart"></canvas>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-[320px] shrink-0 h-fit max-h-full overflow-y-auto p-1 md:mt-10">
            <div class="bg-white p-6 rounded-xl shadow h-full">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Layanan Aktif</h3>
                <div class="space-y-4 min-h-10 md:min-h-20 relative">
                    @forelse ($layananAktif as $layanan)
                        <label class="flex items-center gap-3">
                            <input type="checkbox" checked
                                class="form-checkbox h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500">
                            <span class="text-gray-700">{{ $layanan->layanan->name }}</span>
                        </label>
                    @empty
                        <p
                            class="text-gray-700 font-semibold absolute top-1/2 left-1/2 -translate-1/2 w-full text-center">
                            Tidak Terdapat Layanan Aktif</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('weeklyIncomeChart').getContext('2d');
            const weeklyIncomeChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                    datasets: [{
                        label: 'Cash',
                        data: {!! json_encode($statusPethouse ? [12000, 19000, 3000, 21000, 15000, 17000, 22000] : []) !!}, // Data contoh
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 4,
                    }, {
                        label: 'Noncash',
                        data: {!! json_encode($statusPethouse ? [12000, 19000, 3000, 21000, 15000, 17000, 22000] : []) !!}, // Data contoh
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 1,
                        borderRadius: 4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return value / 1000 + 'k';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 8
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-pethouse-layout>
