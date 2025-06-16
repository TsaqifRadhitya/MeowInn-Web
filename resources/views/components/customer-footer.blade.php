<footer class="bg-[#fdf5f0] text-[#232B3A] py-8 md:py-10 mt-0 font-[Poppins,sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start gap-6 md:gap-8">
            <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6 w-full md:w-auto mb-6 md:mb-0">
                <img src="{{ asset('Logo.png') }}" alt="Meowinn Logo"
                    class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-[#FF8855] p-2 shadow">
                <div>
                    <div class="font-semibold text-lg sm:text-xl mb-1 text-[#FF8855]">Meowinn</div>
                    <div class="text-sm sm:text-base mb-1">Indonesia, Jember 44635</div>
                    <div class="mb-1">
                        <a href="tel:+62823344557778" class="text-sm sm:text-base text-[#232B3A] hover:underline">(+62)
                            823344557778</a>
                    </div>
                    <a href="mailto:Meowinn@gmail.com"
                        class="text-sm sm:text-base text-blue-700 hover:underline">Meowinn@gmail.com</a>
                </div>
            </div>
            <div class="w-full md:flex-1 grid grid-cols-2 sm:grid-cols-3 gap-6 md:gap-8 max-w-2xl">
                <ul class="space-y-2 text-sm sm:text-base">
                    <li class="font-medium text-[#FF8855] mb-1">Quick Links</li>
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="{{ route('customer.pethouse.index') }}" class="hover:underline">Cari Pethouse</a></li>
                    <li><a href="{{ route('customer.penitipan.index') }}" class="hover:underline">Riwayat</a></li>
                    <li><a onclick="document.getElementById('dashboard-feedback-modal').classList.remove('hidden')"
                            class="hover:underline">Feedback</a></li>
                </ul>
                <ul class="space-y-2 text-sm sm:text-base">
                    <li class="font-medium text-[#FF8855] mb-1">Social Media</li>
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Twitter</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                    <li><a href="#" class="hover:underline">LinkedIn</a></li>
                </ul>
                <ul class="space-y-2 text-sm sm:text-base hidden sm:block">
                    <li class="font-medium text-[#FF8855] mb-1">Company</li>
                    <li><a href="#" class="hover:underline">About Us</a></li>
                    <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="#" class="hover:underline">Terms of Service</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 md:mt-10 pt-6 md:pt-8 border-t border-gray-200 text-center text-xs sm:text-sm text-gray-500">
            &copy; {{ date('Y') }} Meowinn. All rights reserved.
        </div>
    </div>
</footer>
