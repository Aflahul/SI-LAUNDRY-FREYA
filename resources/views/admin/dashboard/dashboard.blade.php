@extends('layout.index')

@section('content')
    <div class="p-3 mt-1 sm:ml-[17rem] text-sm">
        <div class="px-4 mb-1">
            <span class="py-1 rounded justify-end text-xs"><i>{{ $tanggal }}</i></span>
            <!-- Di dalam template Blade Laravel -->
            @if (session('success'))
                <div
                    class="border hover:bg-sudah hover:text-white   border-sudah p-1 w-fit my-1 text-sudah rounded px-5 py-2">
                    {{ session('success') }}
                </div>
            @endif
            <p class="pb-4  ">Hi! <b><i>{{ ucfirst(auth()->user()->username) }},</i></b> Selamat datang</p>
            <hr>
        </div>
        <div class="px-4 mt-6">
            <!-- Stat Cards Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Stat Card: Pelanggan -->
                <div class="glass p-4 rounded-2xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-kuning/20 rounded-xl">
                            <i class="fa-solid fa-users text-2xl text-kuning"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-2xl font-bold text-tulisan">{{ count($pelanggan) }}</h5>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Pelanggan</p>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Layanan -->
                <div class="glass p-4 rounded-2xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-sudah/20 rounded-xl">
                            <i class="fa-solid fa-tags text-2xl text-sudah"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-2xl font-bold text-tulisan">{{ count($produk) }}</h5>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Layanan</p>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Proses -->
                <div class="glass p-4 rounded-2xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-sedang/20 rounded-xl">
                            <i class="fa-solid fa-spinner animate-spin-slow text-2xl text-sedang"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-2xl font-bold text-tulisan">{{ count($proses) }}</h5>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Proses</p>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Profit -->
                <div class="glass p-4 rounded-2xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-navbar1/20 rounded-xl">
                            <i class="fa-solid fa-comments-dollar text-2xl text-navbar1"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-xl font-bold text-tulisan">
                                {{ number_format(optional($arus)->saldo ?? 0, 0, ',', '.') }}
                            </h5>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Profit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content: 3 Columns Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Column 1: Processes -->
                <div class="space-y-6">
                    <div class="glass overflow-hidden rounded-2xl shadow-sm border border-white/20 h-fit">
                        <div class="bg-sudah/10 px-4 py-2 border-b border-white/10 flex justify-between items-center">
                            <h3 class="font-bold text-sudah text-[10px] uppercase tracking-wider flex items-center gap-2">
                                <i class="fa-solid fa-spinner animate-spin-slow"></i>
                                Sedang Proses
                            </h3>
                            <a href="/laporan" class="text-sudah font-bold hover:underline text-[10px]">Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-[11px] text-left">
                                <thead class="text-[9px] uppercase bg-white/50 text-gray-500">
                                    <tr>
                                        <th class="px-4 py-2 font-semibold">Pelanggan</th>
                                        <th class="px-4 py-2 font-semibold text-right">Estimasi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @forelse ($proses as $item)
                                        <tr class="hover:bg-white/30 transition-colors">
                                            <td class="px-4 py-2">
                                                <p class="font-bold text-tulisan">{{ $item->pelanggan->namapel }}</p>
                                                <p class="text-[9px] text-gray-400">{{ $item->produk->nama_layanan }}</p>
                                            </td>
                                            <td class="px-4 py-2 text-right font-bold text-sudah">{{ $item->estimasi_selesai->format('d/m') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-8 text-center text-gray-400 italic">Tidak ada proses</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Placeholder Box -->
                    <div class="glass rounded-3xl shadow-sm border border-white/20 p-8 flex flex-col items-center justify-center text-gray-300 border-dashed border-2 opacity-50 min-h-[150px]">
                        <i class="fas fa-plus-circle text-3xl mb-3"></i>
                        <p class="text-[10px] font-black uppercase tracking-[0.2em]">Add Widget</p>
                    </div>
                </div>

                <!-- Column 2: Cash Flow -->
                <div class="space-y-6">
                    <div class="glass overflow-hidden rounded-2xl shadow-sm border border-white/20 h-fit">
                        <div class="bg-navbar1/10 px-4 py-2 border-b border-white/10 flex justify-between items-center">
                            <h3 class="font-bold text-navbar1 text-[10px] uppercase tracking-wider flex items-center gap-2">
                                <i class="fa-solid fa-file-invoice-dollar"></i>
                                Arus Kas
                            </h3>
                            <a href="/laporan" class="text-navbar1 font-bold hover:underline text-[10px]">Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-[11px] text-left">
                                <thead class="text-[9px] uppercase bg-white/50 text-gray-500">
                                    <tr>
                                        <th class="px-4 py-2 font-semibold">Sumber</th>
                                        <th class="px-4 py-2 font-semibold text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @forelse ($aruss->take(8) as $item)
                                        <tr class="hover:bg-white/30 transition-colors">
                                            <td class="px-4 py-2">
                                                <p class="font-bold text-tulisan text-xs">{{ $item->nama }}</p>
                                                <span class="text-[8px] px-1 bg-{{ $item->arus == 'Masuk' ? 'sudah' : 'belum' }}/10 text-{{ $item->arus == 'Masuk' ? 'sudah' : 'belum' }} font-black rounded">{{ $item->arus }}</span>
                                            </td>
                                            <td class="px-4 py-2 text-right font-black text-garis">
                                                Rp{{ number_format($item->total, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-8 text-center text-gray-400 italic">Belum ada transaksi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Placeholder Box -->
                    <div class="glass rounded-3xl shadow-sm border border-white/20 p-8 flex flex-col items-center justify-center text-gray-300 border-dashed border-2 opacity-50 min-h-[150px]">
                        <i class="fas fa-plus-circle text-3xl mb-3"></i>
                        <p class="text-[10px] font-black uppercase tracking-[0.2em]">Add Widget</p>
                    </div>
                </div>

                <!-- Column 3: Analytics & Insights -->
                <div class="space-y-6">
                    <!-- Chart -->
                    <div class="glass rounded-2xl shadow-sm border border-white/20 overflow-hidden">
                        <div class="p-6">
                            <h3 class="font-bold text-tulisan text-[10px] mb-6 uppercase tracking-wider">Revenue Stats</h3>
                            <div class="h-40">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Insights -->
                    <div class="glass rounded-2xl shadow-sm border border-white/20 overflow-hidden bg-gradient-to-br from-sudah/10 to-transparent">
                        <div class="p-6 text-center">
                            <h3 class="font-bold text-tulisan text-[10px] uppercase tracking-wider mb-4">Business Insights</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-3 bg-white/40 rounded-2xl border border-white/50">
                                    <p class="text-[9px] text-gray-400 font-bold uppercase mb-1">Target</p>
                                    <p class="text-sm font-black text-sudah">85%</p>
                                </div>
                                <div class="p-3 bg-white/40 rounded-2xl border border-white/50">
                                    <p class="text-[9px] text-gray-400 font-bold uppercase mb-1">Load</p>
                                    <p class="text-sm font-black text-belum">Normal</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Customers -->
                    <div class="glass rounded-2xl shadow-sm border border-white/20 overflow-hidden">
                        <div class="p-4 border-b border-white/10 flex justify-between items-center bg-white/40">
                            <h3 class="font-bold text-tulisan text-[10px] uppercase tracking-wider">Recent Users</h3>
                            <a href="/pelanggan" class="bg-kuning/80 text-garis px-2 py-1 rounded text-[8px] font-black hover:bg-kuning transition-colors">VIEW</a>
                        </div>
                        <div class="divide-y divide-white/10">
                            @foreach ($pelanggan->sortByDesc('created_at')->take(3) as $pel)
                                <div class="p-4 flex items-center gap-3 hover:bg-white/30 transition-all">
                                    <div class="w-8 h-8 bg-garis/5 rounded-lg flex items-center justify-center text-garis/20">
                                        <i class="fas fa-user text-xs"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-[11px] font-bold text-tulisan truncate">{{ $pel->namapel }}</p>
                                        <p class="text-[9px] text-gray-400">{{ $pel->kontak }}</p>
                                    </div>
                                    <div class="text-right text-[10px] font-black text-sudah">
                                        {{ count($pel->orders ?? []) }} Trx
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [1200000, 1900000, 1500000, 2500000, 2200000, 3000000, 2800000],
                        borderColor: '#2D31FA',
                        backgroundColor: 'rgba(45, 49, 250, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#2D31FA',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { display: false },
                            ticks: { display: false }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 10 } }
                        }
                    }
                }
            });
        });
    </script>
@endsection
