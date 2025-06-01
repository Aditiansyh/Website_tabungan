<x-layout>
    <!-- Header Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-2">Halo, {{ Auth::user()->name }} 👋</h2>
        <p class="text-gray-600 mb-4">Pantau perkembangan tabunganmu di sini</p>
        <h2
            class="text-3xl font-extrabold text-center bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">
            Dashboard Tabungan Kamu
        </h2>
    </div>

    @if ($tabungan->count())
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Tabungan</p>
                        <p class="text-2xl font-bold text-gray-800">Rp{{ number_format($totalDitabung) }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Tercapai</p>
                        <p class="text-2xl font-bold text-green-600">{{ $jumlahTercapai }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Belum Tercapai</p>
                        <p class="text-2xl font-bold text-yellow-600">{{ $jumlahBelum }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>
                    Status Tabungan
                </h3>
                <div class="h-64">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Total per Tujuan
                </h3>
                <div class="h-64">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Savings Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tabungan as $item)
                @php
                    $today = \Carbon\Carbon::now();
                    $targetDate = \Carbon\Carbon::parse($item->target_tanggal);

                    // Amanin sisa hari (tidak boleh minus)
                    $sisaHari = max(0, $today->diffInDays($targetDate, false));

                    $sisaTarget = $item->target_nominal - $item->menabung->sum('nominal');

                    // Hitung per hari
                    $nabungPerHari = $sisaHari > 0 ? ceil($sisaTarget / $sisaHari) : 0;

                    // Hitung minggu dengan floor (biar integer)
                    $minggu = floor($sisaHari / 7);
                    $nabungPerMinggu = $minggu > 0 ? ceil($sisaTarget / $minggu) : $nabungPerHari * 7;

                    // Bulatkan ke ribuan
                    $nabungPerHari = round($nabungPerHari / 1000) * 1000;
                    $nabungPerMinggu = round($nabungPerMinggu / 1000) * 1000;

                    $total_nabung = $item->menabung->sum('nominal');
                    $persen = min(100, round(($total_nabung / $item->target_nominal) * 100));
                    $warna = $persen < 50 ? 'bg-red-400' : ($persen < 100 ? 'bg-yellow-400' : 'bg-green-500');
                    $cardBorder = $item->status
                        ? 'border-green-500'
                        : ($sisaHari <= 0
                            ? 'border-red-500'
                            : 'border-blue-500');
                @endphp

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 {{ $cardBorder }} transition-all duration-300 hover:shadow-lg">
                    <!-- Card Header -->
                    <div class="relative h-48">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                class="w-full h-full object-cover">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        @endif

                        @if ($item->status)
                            <div
                                class="absolute top-3 right-3 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full flex items-center shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tercapai
                            </div>
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 truncate" title="{{ $item->judul }}">
                                {{ $item->judul }}
                            </h3>
                            <span
                                class="text-xs font-semibold px-2 py-1 rounded-full {{ $item->status ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ $item->status ? 'Selesai' : 'Aktif' }}
                            </span>
                        </div>

                        <!-- Progress Section -->
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Terkumpul: Rp{{ number_format($total_nabung) }}</span>
                                <span>Target: Rp{{ number_format($item->target_nominal) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                                <div class="{{ $warna }} h-2.5" style="width: {{ $persen }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500 mt-1">
                                <span>0%</span>
                                <span>{{ $persen }}%</span>
                                <span>100%</span>
                            </div>
                        </div>

                        <!-- Deadline Info -->
                        <div class="flex items-center text-sm text-gray-600 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Deadline: {{ \Carbon\Carbon::parse($item->target_tanggal)->format('d M Y') }}
                            @if ($sisaHari > 0)
                                <span class="ml-2 text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full">
                                    {{ number_format($sisaHari) }} hari lagi
                                </span>
                            @endif
                        </div>

                        <!-- Calculator Section -->
                        @if ($item->status == false)
                            <div class="bg-blue-50 rounded-lg p-3 mb-4 border border-blue-100">
                                <p class="text-xs font-semibold text-blue-800 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    KALKULATOR MENABUNG
                                </p>

                                @if ($sisaHari > 0)
                                    <div class="grid grid-cols-2 gap-2 text-xs">
                                        <div class="bg-white p-2 rounded text-center border border-blue-100">
                                            <p class="font-medium text-gray-500">Per Hari</p>
                                            <p class="font-bold text-blue-700">Rp{{ number_format($nabungPerHari) }}
                                            </p>
                                        </div>
                                        <div class="bg-white p-2 rounded text-center border border-blue-100">
                                            <p class="font-medium text-gray-500">Per Minggu</p>
                                            <p class="font-bold text-blue-700">Rp{{ number_format($nabungPerMinggu) }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2 italic">* Dibulatkan ke ribuan terdekat</p>
                                @else
                                    <p class="text-xs text-red-600 font-medium">
                                        ⏳ Target waktu sudah lewat! Yuk kejar ketertinggalan!
                                    </p>
                                @endif
                            </div>
                        @else
                            <div class="bg-green-50 rounded-lg p-3 mb-4 border border-green-200">
                                <p class="text-xs font-semibold text-green-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    SELAMAT! Target tercapai
                                </p>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <a href="{{ route('menabung.riwayat', $item->id) }}"
                                class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-white border border-blue-500 text-blue-600 rounded-lg text-sm hover:bg-blue-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Riwayat
                            </a>
                            <a href="{{ route('menabung.create', $item->id) }}"
                                class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Menabung
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center mt-16">
            <div class="mx-auto w-48 h-48 bg-blue-50 rounded-full flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada tabungan</h3>
            <p class="text-gray-500 max-w-md mx-auto mb-6">Mulai perjalanan finansialmu dengan membuat tabungan pertama
                untuk mencapai impianmu!</p>
            <a href="{{ route('tabungan.create') }}"
                class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Buat Tabungan Baru
            </a>
        </div>
    @endif
</x-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Status Chart (Doughnut)
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tercapai', 'Belum Tercapai'],
                datasets: [{
                    data: [{{ $jumlahTercapai }}, {{ $jumlahBelum }}],
                    backgroundColor: ['#10B981', '#F59E0B'],
                    borderColor: '#FFFFFF',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} tabungan`;
                            }
                        }
                    }
                }
            }
        });

        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total Ditabung',
                    data: {!! json_encode($totals) !!},
                    backgroundColor: '#3B82F6',
                    borderRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp' + value.toLocaleString();
                            }
                        },
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    });
</script>
