<x-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Daftar Akun</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nama" required
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400">

            <input type="email" name="email" placeholder="Email" required
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400">

            <input type="password" name="password" placeholder="Password" required
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400">

            <button type="submit"
                class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Register</button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login di sini</a>
        </p>
    </div>
</x-layout>
