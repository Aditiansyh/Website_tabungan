<x-layout>
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md mt-8">
        <div class="flex items-center mb-6 space-x-4">
            {{-- Avatar huruf depan nama --}}
            <div class="w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-xl font-bold">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Profil Pengguna</h2>
                <p class="text-sm text-gray-500">Informasi akun kamu</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 text-gray-800 text-sm">
            <div class="font-medium text-gray-600">Nama Lengkap</div>
            <div>{{ Auth::user()->name }}</div>

            <div class="font-medium text-gray-600">Email</div>
            <div>{{ Auth::user()->email }}</div>

            <div class="font-medium text-gray-600">Terdaftar Sejak</div>
            <div>{{ Auth::user()->created_at->translatedFormat('d F Y') }}</div>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('home') }}" 
               class="inline-block px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                ← Kembali ke Home
            </a>
        </div>
    </div>
</x-layout>
