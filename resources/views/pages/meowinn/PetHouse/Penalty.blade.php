<x-meowinn-layout header="Daftar Penalty" class="px-5 pt-5" id="content" activeMenu="Pet House">
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <!-- Table Header with Summary -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#F69246] to-[#EC7070]">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-white">Penalty</h2>
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm">
                    Total Penalties: {{ count($daftarPenalty) }}
                </span>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Pet
                            House</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Duration</th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($daftarPenalty as $index => $penalty)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $penalty->name }}</div>
                                        <div class="text-sm text-gray-500">ID: {{ $penalty->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $penalty->penalty > 7 ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $penalty->penalty }} days
                                </span>
                            </td>
                            <td class="px-6 flex justify-center py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form id="form-delete-{{ $penalty->id }}"
                                    action="{{ route('meowinn.penalty.delete', ['id' => $penalty->id]) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 transition-colors duration-200 delete-btn"
                                        data-pethouse="{{ $penalty->name }}"
                                        data-duration="{{ $penalty->penalty }} days">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="mt-2 text-lg font-medium text-gray-600">No penalties found</p>
                                    <p class="text-gray-500">All pet houses are in good standing</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination would go here if needed -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert for delete confirmation
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const pethouseName = this.getAttribute('data-pethouse');
                    const duration = this.getAttribute('data-duration');

                    Swal.fire({
                        title: 'Remove Penalty?',
                        html: `You're about to remove the penalty for <strong>${pethouseName}</strong><br>Duration: <span class="text-red-500">${duration}</span>`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, remove it!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-meowinn-layout>
