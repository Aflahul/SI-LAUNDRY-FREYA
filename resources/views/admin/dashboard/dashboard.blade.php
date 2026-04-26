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
            <!-- Navbar-like breadcrumb or title area (matching wireframe top bar) -->
            <div class="glass w-full py-3 px-6 rounded-2xl mb-8 border border-white/30 flex justify-between items-center bg-white/20">
                <h2 class="text-lg font-black text-tulisan tracking-tight uppercase">Overview Dashboard</h2>
                <div class="flex items-center gap-2 text-[10px] font-bold text-gray-400">
                    <i class="fas fa-home"></i> / <span>Dashboard</span>
                </div>
            </div>

            <!-- Stat Cards Row (4 boxes) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Stat Card: Pelanggan -->
                <div class="glass p-5 rounded-3xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-kuning/20 rounded-2xl">
                            <i class="fa-solid fa-users text-2xl text-kuning"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-2xl font-black text-tulisan">{{ count($pelanggan) }}</h5>
                            <p class="text-[9px] text-gray-400 uppercase tracking-widest font-black">Users</p>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Layanan -->
                <div class="glass p-5 rounded-3xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-sudah/20 rounded-2xl">
                            <i class="fa-solid fa-tags text-2xl text-sudah"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-2xl font-black text-tulisan">{{ count($produk) }}</h5>
                            <p class="text-[9px] text-gray-400 uppercase tracking-widest font-black">Service</p>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Proses -->
                <div class="glass p-5 rounded-3xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-sedang/20 rounded-2xl">
                            <i class="fa-solid fa-spinner animate-spin-slow text-2xl text-sedang"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-2xl font-black text-tulisan">{{ count($proses) }}</h5>
                            <p class="text-[9px] text-gray-400 uppercase tracking-widest font-black">Active</p>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Profit -->
                <div class="glass p-5 rounded-3xl shadow-sm border border-white/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-navbar1/20 rounded-2xl">
                            <i class="fa-solid fa-comments-dollar text-2xl text-navbar1"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-xl font-black text-tulisan">
                                {{ number_format(optional($arus)->saldo ?? 0, 0, ',', '.') }}
                            </h5>
                            <p class="text-[9px] text-gray-400 uppercase tracking-widest font-black">Profit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 Column Content Area (Matching wireframe blocks) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-12">
                
                <!-- Column 1: Stacked (2 blocks) -->
                <div class="space-y-8">
                    <!-- Block 1-1: Sedang Proses -->
                    <div class="glass overflow-hidden rounded-[2.5rem] shadow-sm border border-white/30 h-fit bg-white/40">
                        <div class="bg-sudah/10 px-6 py-4 border-b border-white/20 flex justify-between items-center">
                            <h3 class="font-black text-sudah text-[10px] uppercase tracking-[0.2em] flex items-center gap-2">
                                <i class="fa-solid fa-spinner animate-spin-slow"></i>
                                Sedang Proses
                            </h3>
                            <a href="/laporan" class="text-sudah font-black hover:underline text-[9px] uppercase tracking-tighter">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-[11px] text-left">
                                <tbody class="divide-y divide-white/20">
                                    @forelse ($proses->take(4) as $item)
                                        <tr class="hover:bg-white/40 transition-colors">
                                            <td class="px-6 py-4">
                                                <p class="font-black text-tulisan uppercase tracking-tight">{{ $item->pelanggan->namapel }}</p>
                                                <p class="text-[9px] text-gray-400 font-bold">{{ $item->produk->nama_layanan }}</p>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <span class="bg-sudah/10 text-sudah px-2 py-1 rounded-lg font-black text-[9px]">{{ $item->estimasi_selesai->format('d/m') }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-6 py-12 text-center text-gray-400 italic">No active process</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Block 1-2: Business Insights -->
                    <div class="glass rounded-[2.5rem] shadow-sm border border-white/30 p-8 bg-gradient-to-br from-navbar1/10 to-transparent">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="font-black text-tulisan text-[10px] uppercase tracking-[0.2em]">System Status</h3>
                            <div class="flex gap-1">
                                <div class="w-1.5 h-1.5 rounded-full bg-sudah animate-pulse"></div>
                                <div class="w-1.5 h-1.5 rounded-full bg-sudah/30"></div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between items-end mb-2">
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Efficiency</p>
                                    <p class="text-xs font-black text-sudah">85%</p>
                                </div>
                                <div class="w-full bg-white/30 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-sudah h-full rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 pt-2">
                                <div class="bg-white/40 p-4 rounded-3xl border border-white/50">
                                    <p class="text-[8px] font-black text-gray-400 uppercase tracking-widest mb-1">Queue</p>
                                    <p class="text-sm font-black text-tulisan">{{ count($proses) }} Items</p>
                                </div>
                                <div class="bg-white/40 p-4 rounded-3xl border border-white/50">
                                    <p class="text-[8px] font-black text-gray-400 uppercase tracking-widest mb-1">Health</p>
                                    <p class="text-sm font-black text-sudah">Optimal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Tall (1 block) -->
                <div class="h-full">
                    <!-- Block 2-1: Arus Kas (Tall) -->
                    <div class="glass overflow-hidden rounded-[2.5rem] shadow-sm border border-white/30 h-full bg-white/40 flex flex-col">
                        <div class="bg-navbar1/10 px-8 py-6 border-b border-white/20 flex justify-between items-center">
                            <h3 class="font-black text-navbar1 text-[10px] uppercase tracking-[0.2em] flex items-center gap-2">
                                <i class="fa-solid fa-file-invoice-dollar"></i>
                                Cash Flow Timeline
                            </h3>
                            <a href="/laporan" class="text-navbar1 font-black hover:underline text-[9px] uppercase tracking-tighter">Full Report</a>
                        </div>
                        <div class="flex-1 overflow-y-auto hide-scrollbar">
                            <div class="divide-y divide-white/20">
                                @forelse ($aruss->take(12) as $item)
                                    <div class="px-8 py-5 hover:bg-white/40 transition-colors flex items-center justify-between">
                                        <div>
                                            <p class="font-black text-tulisan text-xs uppercase tracking-tight">{{ $item->nama }}</p>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="text-[8px] px-2 py-0.5 bg-{{ $item->arus == 'Masuk' ? 'sudah' : 'belum' }}/10 text-{{ $item->arus == 'Masuk' ? 'sudah' : 'belum' }} font-black rounded-full uppercase tracking-tighter">{{ $item->arus }}</span>
                                                <span class="text-[8px] text-gray-400 font-bold">{{ $item->created_at->format('H:i') }}</span>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs font-black text-garis">Rp{{ number_format($item->total, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-8 py-20 text-center text-gray-400 italic">No transactions today</div>
                                @endforelse
                            </div>
                        </div>
                        <div class="p-6 bg-white/20 border-t border-white/10 text-center">
                             <p class="text-[9px] font-black text-gray-400 uppercase tracking-[0.3em]">Operational Transparency</p>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Stacked (2 blocks) -->
                <div class="space-y-8">
                    <!-- Block 3-1: Revenue Statistics -->
                    <div class="glass rounded-[2.5rem] shadow-sm border border-white/30 p-8 bg-white/40">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="font-black text-tulisan text-[10px] uppercase tracking-[0.2em]">Revenue Stats</h3>
                            <i class="fas fa-chart-area text-navbar1/30"></i>
                        </div>
                        <div class="h-44">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>

                    <!-- Block 3-2: Recent Customers -->
                    <div class="glass rounded-[2.5rem] shadow-sm border border-white/30 overflow-hidden bg-white/40">
                        <div class="p-8 border-b border-white/20 flex justify-between items-center">
                            <h3 class="font-black text-tulisan text-[10px] uppercase tracking-[0.2em]">Recent Users</h3>
                            <a href="/pelanggan" class="bg-kuning/80 text-garis px-3 py-1.5 rounded-xl text-[8px] font-black hover:bg-kuning transition-colors tracking-widest shadow-sm">EXPLORE</a>
                        </div>
                        <div class="divide-y divide-white/20">
                            @foreach ($pelanggan->sortByDesc('created_at')->take(4) as $pel)
                                <div class="px-8 py-4 flex items-center gap-4 hover:bg-white/40 transition-all cursor-pointer">
                                    <div class="w-10 h-10 bg-garis/5 rounded-2xl flex items-center justify-center text-garis/20 border border-white/50">
                                        <i class="fas fa-user text-xs"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-[11px] font-black text-tulisan truncate uppercase tracking-tighter">{{ $pel->namapel }}</p>
                                        <p class="text-[9px] text-gray-400 font-bold">{{ $pel->kontak }}</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="bg-sudah/10 text-sudah px-2 py-1 rounded-lg font-black text-[9px]">{{ count($pel->orders ?? []) }}</div>
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
