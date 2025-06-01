<x-layout>
    <!-- Hero Section -->
    <section class="min-h-[90vh] flex flex-col justify-center items-center text-center px-4  from-blue-50 to-white">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold text-blue-600 mb-6 leading-tight">
                Kelola Keuangan dengan <span class="text-blue-800">Rencana Tabungan</span>
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8 text-lg md:text-xl">
                Solusi lengkap untuk merencanakan, memantau, dan mencapai tujuan finansial Anda dengan lebih mudah dan terorganisir.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <a href="{{ route('register') }}" 
                   class="bg-blue-600 hover:bg-blue-800 text-white px-8 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 font-medium text-lg">
                    Mulai Sekarang - Gratis
                </a>
                <a href="{{ route('login') }}" 
                   class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 px-8 py-3 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 font-medium text-lg">
                    Masuk Akun
                </a>
            </div>

            <div class="relative w-full max-w-4xl mx-auto mt-8">
                <div class="absolute -inset-2 bg-blue-600/20 rounded-xl blur-md"></div>
                <div class="relative bg-white p-1 rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Dashboard Preview" 
                         class="w-full h-auto rounded-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Semua yang Anda butuhkan untuk mengelola tabungan dengan efektif</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="bg-blue-600/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Target Tabungan</h3>
                    <p class="text-gray-600">Buat berbagai target tabungan dengan mudah dan pantau perkembangannya secara real-time.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="bg-blue-600/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Analisis Cerdas</h3>
                    <p class="text-gray-600">Dapatkan insight dan rekomendasi untuk mengoptimalkan tabungan Anda.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="bg-blue-600/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Multi-Akun</h3>
                    <p class="text-gray-600">Kelola berbagai rekening bank dalam satu platform yang terintegrasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">Cara Kerjanya</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Hanya perlu 3 langkah sederhana untuk memulai</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center mb-4 mx-auto text-lg font-bold">1</div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Buat Akun</h3>
                    <p class="text-gray-600">Daftar akun gratis dalam waktu kurang dari 1 menit.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center mb-4 mx-auto text-lg font-bold">2</div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Set Target</h3>
                    <p class="text-gray-600">Tentukan tujuan tabungan Anda dengan mudah.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center mb-4 mx-auto text-lg font-bold">3</div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Pantau Progress</h3>
                    <p class="text-gray-600">Lihat perkembangan tabungan Anda kapan saja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Progress Demo Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">Contoh Progress Tabungan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Lihat bagaimana kami membantu Anda mencapai tujuan finansial</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-gray-700">Tabungan Liburan</span>
                        <span class="font-medium text-blue-600">75%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-yellow-400 h-4 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-gray-700">Dana Darurat</span>
                        <span class="font-medium text-blue-600">45%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-green-500 h-4 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-gray-700">DP Rumah</span>
                        <span class="font-medium text-blue-600">30%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-indigo-400 h-4 rounded-full" style="width: 30%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">Apa Kata Pengguna?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Ribuan orang telah mencapai tujuan finansial mereka</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600/10 w-12 h-12 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">AS</div>
                        <div>
                            <h4 class="font-semibold">Andi Setiawan</h4>
                            <p class="text-gray-500 text-sm">Pengguna sejak 2022</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"Aplikasi ini membantu saya mencapai target DP rumah dalam waktu 1 tahun lebih cepat dari rencana awal!"</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600/10 w-12 h-12 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">SD</div>
                        <div>
                            <h4 class="font-semibold">Siti Dewi</h4>
                            <p class="text-gray-500 text-sm">Pengguna sejak 2021</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"Saya akhirnya bisa berlibur ke Eropa berkat bantuan fitur target tabungan yang sangat membantu."</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600/10 w-12 h-12 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">BJ</div>
                        <div>
                            <h4 class="font-semibold">Budi Jatmiko</h4>
                            <p class="text-gray-500 text-sm">Pengguna sejak 2023</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"Analisis pengeluarannya sangat detail, membantu saya mengidentifikasi kebocoran keuangan."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 nav-gradient text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Mulai Perjalanan Finansial Anda Sekarang</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto opacity-90">Bergabung dengan ribuan orang yang telah mencapai tujuan finansial mereka</p>
            <a href="{{ route('register') }}" 
               class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 font-medium text-lg inline-block">
                Daftar Gratis
            </a>
        </div>
    </section>
</x-layout>