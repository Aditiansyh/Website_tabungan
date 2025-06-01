<x-layout>
    <h2 class="text-2xl font-bold mb-4">Tambah Tabungan Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tabungan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="text" name="judul" placeholder="Judul Tabungan" class="w-full border p-2 rounded" required>

        <input type="number" name="target_nominal" placeholder="Target Nominal" class="w-full border p-2 rounded" required>

        <input type="date" name="target_tanggal" class="w-full border p-2 rounded" required>

        <input type="file" name="foto" class="w-full border p-2 rounded">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
    </form>
</x-layout>
