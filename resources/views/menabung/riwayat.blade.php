<x-layout>
    <h2 class="text-2xl font-bold mb-4">Riwayat Menabung: {{ $tabungan->judul }}</h2>

    <a href="{{ route('tabungan.index') }}" class="text-blue-500 hover:underline text-sm mb-4 inline-block">
        ← Kembali ke Tabungan
    </a>

    @if ($tabungan->menabung->count())
        <table class="w-full table-auto bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-100 text-left text-sm">
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabungan->menabung->sortByDesc('tanggal') as $m)
                    <tr class="border-b">
                        <td class="p-3">{{ \Carbon\Carbon::parse($m->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="p-3">Rp{{ number_format($m->nominal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">Belum ada transaksi menabung.</p>
    @endif
</x-layout>
