<x-layout>
    <h2 class="text-xl font-bold mb-4">Menabung untuk: {{ $tabungan->judul }}</h2>

    <form action="{{ route('menabung.store', $tabungan->id) }}" method="POST" class="space-y-4">
        @csrf
        <input type="number" name="nominal" placeholder="Nominal" required
            class="w-full border p-2 rounded">

        <input type="date" name="tanggal" required
            class="w-full border p-2 rounded">

        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
</x-layout>
