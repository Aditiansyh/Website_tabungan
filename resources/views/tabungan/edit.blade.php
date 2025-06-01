<x-layout>
    <h2 class="text-2xl font-bold mb-4">Edit Tabungan</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tabungan.update', $tabungan->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="judul" value="{{ $tabungan->judul }}" class="w-full border p-2 rounded" required>

        <input type="number" name="target_nominal" value="{{ $tabungan->target_nominal }}"
            class="w-full border p-2 rounded" required>

        <input type="date" name="target_tanggal" value="{{ $tabungan->target_tanggal }}"
            class="w-full border p-2 rounded" required>

        @if ($tabungan->foto)
            <div>
                <img src="{{ asset('storage/' . $tabungan->foto) }}" alt="Foto" class="w-40 rounded mb-2">
            </div>
        @endif

        <input type="file" name="foto" class="w-full border p-2 rounded">

        {{-- Tambahkan hidden untuk meng-handle uncheck --}}
        <input type="hidden" name="status" value="0">

        


        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Update
        </button>
    </form>
</x-layout>
