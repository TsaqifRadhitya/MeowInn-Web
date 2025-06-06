<x-MeowinnLayout header="Reports" class="px-5 pt-5 pb-20" id="content" activeMenu="Reports">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <!-- Header and Filter -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Reports Management</h1>
                <p class="text-gray-600 mt-1">View and manage all system reports</p>
            </div>

            <form method="GET" action="{{ request()->url() }}" id="filter-form" class="w-full md:w-64">
                <label for="report-type" class="sr-only">Filter by Type</label>
                <select id="report-type" name="type" onchange="this.form.submit()"
                    class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="">All Report Types</option>
                    <option value="admin" {{ request('type') == 'admin' ? 'selected' : '' }}>MeowInn Reports</option>
                    <option value="pethouse" {{ request('type') == 'pethouse' ? 'selected' : '' }}>Pet House Reports
                    </option>
                    <option value="penitipan" {{ request('type') == 'penitipan' ? 'selected' : '' }}>Penitipan Reports
                    </option>
                </select>
            </form>
        </div>

        <!-- Reports List -->
        <div class="space-y-4">
            @forelse($reports as $report)
                <div
                    class="bg-white rounded-lg border border-gray-200 hover:border-blue-300 transition-colors shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex items-center">
                                    <span class="text-lg font-semibold text-gray-800">Report #{{ $report->id }}</span>
                                    <span
                                        class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if ($report->jenis_reports === 'Admin') bg-blue-100 text-blue-800
                                        @elseif($report->pethouseId) bg-purple-100 text-purple-800
                                        @else bg-green-100 text-green-800 @endif">
                                        @if ($report->jenis_reports === 'Admin')
                                            MeowInn
                                        @elseif($report->pethouseId)
                                            Pet House
                                        @else
                                            Penitipan
                                        @endif
                                    </span>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $report->created_at->format('M d, Y \a\t h:i A') }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 whitespace-pre-line">{{ $report->isi }}</p>
                        </div>

                        @if ($report->pethouse)
                            <div class="mt-4 pt-3 border-t border-gray-100">
                                <span class="text-sm text-gray-500">Related Pet House:</span>
                                <a href="{{ route('meowinn.pethouse.show', $report->pethouse->id) }}"
                                    class="ml-2 text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $report->pethouse->name }}
                                </a>
                            </div>
                        @endif

                        @if ($report->penitipan)
                            <div class="mt-2">
                                <span class="text-sm text-gray-500">Related Penitipan ID:</span>
                                <span class="ml-2 text-sm font-medium text-gray-700">
                                    {{ $report->penitipan->id }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg border border-gray-200 p-8 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-700">No reports found</h3>
                    <p class="mt-1 text-gray-500">There are currently no reports matching your criteria</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 border-t border-gray-200 pt-4 flex justify-center">
            {{ $reports->links() }}
        </div>
    </div>
</x-MeowinnLayout>
