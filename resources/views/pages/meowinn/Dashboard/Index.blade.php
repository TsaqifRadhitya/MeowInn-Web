<x-meowinn-layout header="Dashboard" class="p-5 md:p-10 md:pb-0 relative" id="content" activeMenu="Dashboard">
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="flex-grow flex flex-col gap-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Aktivitas MeowInn</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div
                        class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl shadow-md border border-blue-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Total Transaksi Bulan Ini</p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">{{ number_format(array_sum($pendapatan['cash']) + array_sum($pendapatan['nonCash']), 0, ',', '.') }}</p>
                            </div>
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl shadow-md border border-green-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-green-600 font-medium">Total Pelanggan</p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">{{ $totalPelanggan }}</p>
                                <p class="text-xs text-green-500 mt-1 flex items-center">
                                </p>
                            </div>
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-amber-50 to-amber-100 p-4 rounded-xl shadow-md border border-amber-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-amber-600 font-medium">Jumlah Pethouse</p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">{{ $jumlahPethouse }}</p>
                            </div>
                            <div class="p-2 bg-amber-100 rounded-lg">
                                <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-xl shadow-md border border-purple-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-purple-600 font-medium break-words">Jumlah Penitipan Berlangsung
                                </p>
                                <div class="flex items-center mt-2">
                                    <p class="text-2xl font-bold text-gray-800">{{ $jumlahPenitipanBerhangsung }}</p>
                                    <div class="flex ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl md:col-span-3 shadow-md border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Pendapatan Mingguan</h3>
                    </div>
                    <div>
                        <canvas id="weeklyIncomeChart"></canvas>
                    </div>
                </div>
                <div class="w-full shrink-0 space-y-6">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border relative border-gray-100 h-full max-h-full overflow-y-auto">
                        <h3 class="text-lg font-semibold text-gray-800 mb-5">Layanan</h3>
                        @forelse ($layanans as $layanan)
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg mt-2.5">
                                <div class="flex items-center">
                                    <span class="text-gray-700 font-medium">{{ $layanan->name }}</span>
                                </div>
                            </div>
                        @empty
                            <p
                                class="font-semibold text-gray-500 w-full text-center absolute top-1/2 left-1/2 -translate-1/2">
                                Belum ada layanan</p>
                        @endforelse
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const weeklyIncomeCtx = document.getElementById('weeklyIncomeChart').getContext('2d');
                            const weeklyIncomeChart = new Chart(weeklyIncomeCtx, {
                                type: 'bar',
                                data: {
                                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                                    datasets: [{
                                            label: 'Cash',
                                            data: @json($pendapatan['cash']),
                                            backgroundColor: 'rgba(59, 130, 246, 0.7)',
                                            borderColor: 'rgba(59, 130, 246, 1)',
                                            borderWidth: 1,
                                            borderRadius: 4,
                                        },
                                        {
                                            label: 'Non-Cash',
                                            data: @json($pendapatan['nonCash']),
                                            backgroundColor: 'rgba(16, 185, 129, 0.7)',
                                            borderColor: 'rgba(16, 185, 129, 1)',
                                            borderWidth: 1,
                                            borderRadius: 4,
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                            labels: {
                                                usePointStyle: true,
                                                boxWidth: 8
                                            }
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    return context.dataset.label + ': Rp' + context.raw.toLocaleString(
                                                        'id-ID');
                                                }
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                callback: function(value) {
                                                    return 'Rp' + (value / 1000000).toFixed(1) + 'jt';
                                                }
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            }
                                        }
                                    }
                                }
                            })
                        })
                    </script>
</x-meowinn-layout>
