<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Daftar Tabungan</h2>
        <a href="{{ route('tabungan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tambah Tabungan
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($tabungan->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tabungan as $item)
                <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition-all duration-200">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-40 object-cover rounded mb-4">
                    @endif

                    <h3 class="text-lg font-semibold text-blue-700">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-500">Target: Rp{{ number_format($item->target_nominal) }}</p>
                    <p class="text-sm text-gray-500">Tercapai sebelum:
                        {{ \Carbon\Carbon::parse($item->target_tanggal)->translatedFormat('d F Y') }}</p>

                    {{-- Progress Bar --}}
                    @php
                        $total_nabung = $item->menabung->sum('nominal');
                        $persen = min(100, round(($total_nabung / $item->target_nominal) * 100));
                        $warna = $persen < 50 ? 'bg-red-400' : ($persen < 100 ? 'bg-yellow-400' : 'bg-green-500');
                    @endphp

                    <div class="mt-3">
                        <div class="text-xs text-gray-500 mb-1">
                            Rp{{ number_format($total_nabung) }} dari Rp{{ number_format($item->target_nominal) }}
                        </div>
                        <div class="w-full bg-gray-200 h-3 rounded">
                            <div class="h-3 rounded {{ $warna }}" style="width: {{ $persen }}%"></div>
                        </div>
                        <div class="text-xs text-right text-gray-400 mt-1">{{ $persen }}%</div>
                    </div>

                    {{-- Status --}}

                    <p class="text-sm text-gray-600">Status:
                        <span class="{{ $item->status ? 'text-green-600' : 'text-yellow-500' }}">
                            {{ $item->status ? 'Tercapai' : 'Belum' }}
                        </span>
                    </p>
                    <div class="mt-4 flex justify-between text-sm">
                        <a href="{{ route('menabung.create', $item->id) }}"
                            class="text-green-600 hover:underline">Menabung</a>
                        <a href="{{ route('tabungan.edit', $item->id) }}"
                            class="text-blue-600 hover:underline">Edit</a>
                        <a href="{{ route('menabung.riwayat', $item->id) }}"
                            class="text-indigo-600 hover:underline text-sm">Riwayat</a>

                        <form action="{{ route('tabungan.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada tabungan.</p>
    @endif
</x-layout>
