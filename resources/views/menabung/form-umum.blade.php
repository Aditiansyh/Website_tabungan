<x-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-blue-700">Menabung ke Tujuan Tabungan</h2>

        <form action="{{ route('menabung.store.umum') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Tujuan</label>
                <select name="tabungan_id" class="w-full border rounded px-3 py-2">
                    @foreach ($tabungans as $t)
                        <option value="{{ $t->id }}">{{ $t->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                <input type="number" name="nominal" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Menabung</label>
                <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="text-right">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layout>