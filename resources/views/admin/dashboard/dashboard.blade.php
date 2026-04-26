@extends('layout.index')

@section('content')
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <main 
        style="margin-left: 304px; padding-top: 112px; padding-right: 24px; padding-bottom: 48px;"
        class="min-h-screen">
        <div class="flex flex-col lg:flex-row gap-6 w-full">
            <!-- Left Column (Main Area) - Approx 65% on Laptop -->
            <div class="lg:flex-[3.5] flex flex-col gap-6">
                
                <!-- Metric Cards Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Metric: Pelanggan -->
                    <div class="glass-card p-5 rounded-[24px] group hover:border-[#508D8D]/30 transition-all shadow-sm">
                        <div class="flex justify-between items-start mb-3">
                            <div class="w-10 h-10 rounded-xl bg-[#508D8D]/10 flex items-center justify-center group-hover:bg-[#508D8D] transition-colors duration-500">
                                <span class="material-symbols-outlined text-[#508D8D] group-hover:text-white" style="font-size: 20px;">group</span>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+12%</span>
                        </div>
                        <p class="text-slate-500 text-[11px] font-bold uppercase tracking-[0.1em]">Pelanggan</p>
                        <h4 class="text-2xl font-black text-slate-800 mt-1 leading-none">{{ count($pelanggan) }}</h4>
                    </div>

                    <!-- Metric: Layanan -->
                    <div class="glass-card p-5 rounded-[24px] group hover:border-sky-500/30 transition-all shadow-sm">
                        <div class="flex justify-between items-start mb-3">
                            <div class="w-10 h-10 rounded-xl bg-sky-500/10 flex items-center justify-center group-hover:bg-sky-500 transition-colors duration-500">
                                <span class="material-symbols-outlined text-sky-600 group-hover:text-white" style="font-size: 20px;">dry_cleaning</span>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded-full uppercase">Tetap</span>
                        </div>
                        <p class="text-slate-500 text-[11px] font-bold uppercase tracking-[0.1em]">Layanan</p>
                        <h4 class="text-2xl font-black text-slate-800 mt-1 leading-none">{{ count($produk) }}</h4>
                    </div>

                    <!-- Metric: Proses -->
                    <div class="glass-card p-5 rounded-[24px] group hover:border-[#FFD95A]/50 transition-all shadow-sm border-[#FFD95A]/10">
                        <div class="flex justify-between items-start mb-3">
                            <div class="w-10 h-10 rounded-xl bg-[#FFD95A]/10 flex items-center justify-center group-hover:bg-[#FFD95A] transition-colors duration-500">
                                <span class="material-symbols-outlined text-[#735d00] group-hover:text-white" style="font-size: 20px; font-variation-settings: 'FILL' 1;">sync</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-[11px] font-bold uppercase tracking-[0.1em]">Proses</p>
                        <h4 class="text-2xl font-black text-slate-800 mt-1 leading-none">{{ count($proses) }}</h4>
                    </div>

                    <!-- Metric: Profit -->
                    <div class="glass-card p-5 rounded-[24px] group hover:border-rose-500/30 transition-all shadow-sm">
                        <div class="flex justify-between items-start mb-3">
                            <div class="w-10 h-10 rounded-xl bg-rose-500/10 flex items-center justify-center group-hover:bg-rose-500 transition-colors duration-500">
                                <span class="material-symbols-outlined text-rose-600 group-hover:text-white" style="font-size: 20px;">payments</span>
                            </div>
                            <span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full uppercase">-5%</span>
                        </div>
                        <p class="text-slate-500 text-[11px] font-bold uppercase tracking-[0.1em]">Profit</p>
                        <h4 class="text-xl font-black text-slate-800 mt-1 leading-none">Rp{{ number_format(optional($arus)->saldo ?? 0, 0, ',', '.') }}</h4>
                    </div>
                </div>

                <!-- Sub Grid: Tables & Chart -->
                <div class="flex flex-col xl:flex-row gap-6">
                    <!-- Left: Tables (60% on XL) -->
                    <div class="flex-[1.5] flex flex-col gap-6">
                        <!-- Table: Sedang Proses -->
                        <div class="glass-card rounded-[28px] overflow-hidden flex flex-col shadow-sm">
                            <div class="p-5 border-b border-white/20 flex justify-between items-center">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-800">Sedang Proses</h3>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">Cucian Aktif</p>
                                </div>
                                <button class="w-8 h-8 flex items-center justify-center hover:bg-white/50 rounded-lg text-[#508D8D] transition-all">
                                    <span class="material-symbols-outlined" style="font-size: 18px;">more_vert</span>
                                </button>
                            </div>
                            <div class="p-2 overflow-x-auto hide-scrollbar">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr class="text-slate-400 uppercase text-[10px] tracking-widest font-bold">
                                            <th class="px-4 py-3">Pelanggan</th>
                                            <th class="px-4 py-3">Layanan</th>
                                            <th class="px-4 py-3 text-right">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100/50">
                                        @forelse ($proses->take(4) as $item)
                                            <tr class="hover:bg-white/40 transition-colors">
                                                <td class="px-4 py-3">
                                                    <p class="font-bold text-slate-800 text-xs">{{ $item->pelanggan->namapel }}</p>
                                                    <p class="text-[9px] text-slate-400 font-medium">#{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</p>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <span class="px-2 py-0.5 bg-[#508D8D]/10 text-[#508D8D] rounded-md text-[10px] font-bold">{{ $item->produk->nama_layanan }}</span>
                                                </td>
                                                <td class="px-4 py-3 text-right">
                                                    <div class="flex items-center justify-end gap-1.5">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                                                        <span class="text-sky-600 text-[10px] font-bold uppercase">Proses</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="px-4 py-10 text-center" colspan="3">
                                                    <p class="text-xs font-bold text-slate-300 uppercase tracking-widest">Kosong</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Card: Arus Kas Terakhir -->
                        <div class="glass-card rounded-[28px] overflow-hidden flex flex-col shadow-sm">
                            <div class="p-5 border-b border-white/20 flex justify-between items-center">
                                <h3 class="text-sm font-bold text-slate-800">Arus Kas</h3>
                                <a href="/kas" class="text-[10px] font-bold text-[#508D8D] px-3 py-1.5 bg-[#508D8D]/10 rounded-lg hover:bg-[#508D8D]/20 transition-all uppercase tracking-wider">Semua</a>
                            </div>
                            <div class="p-3 space-y-2">
                                @forelse ($aruss->take(3) as $item)
                                    <div class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-white/40 transition-all border border-transparent hover:border-white/50">
                                        <div class="w-8 h-8 rounded-lg {{ $item->status == 'masuk' ? 'bg-emerald-100' : 'bg-rose-100' }} flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined {{ $item->status == 'masuk' ? 'text-emerald-600' : 'text-rose-600' }}" style="font-size: 16px;">
                                                {{ $item->status == 'masuk' ? 'arrow_downward' : 'arrow_upward' }}
                                            </span>
                                        </div>
                                        <div class="flex-grow overflow-hidden">
                                            <p class="text-xs font-bold text-slate-800 truncate">{{ $item->ket }}</p>
                                            <p class="text-[9px] text-slate-400 font-medium uppercase tracking-tighter">{{ $item->tgl->format('d M, H:i') }}</p>
                                        </div>
                                        <div class="text-right shrink-0">
                                            <p class="text-xs font-black {{ $item->status == 'masuk' ? 'text-emerald-600' : 'text-rose-600' }}">
                                                {{ $item->status == 'masuk' ? '+' : '-' }}{{ number_format($item->jumlah, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-xs text-slate-300 py-6 uppercase font-bold tracking-widest">Kosong</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Right Sub: Revenue Chart (40% on XL) -->
                    <div class="flex-[1] flex flex-col">
                        <div class="glass-card rounded-[28px] p-5 flex flex-col h-full shadow-sm relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none">
                                <span class="material-symbols-outlined text-6xl">monitoring</span>
                            </div>
                            <h3 class="text-sm font-bold text-slate-800">Revenue</h3>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5 mb-6">7 Hari Terakhir</p>
                            
                            <div class="flex-grow flex items-end justify-between gap-1.5 min-h-[160px] mb-6 px-2">
                                <div class="w-full bg-[#508D8D]/10 rounded-t-md relative group transition-all hover:bg-[#508D8D]/30" style="height: 45%"></div>
                                <div class="w-full bg-[#508D8D]/10 rounded-t-md relative group transition-all hover:bg-[#508D8D]/30" style="height: 70%"></div>
                                <div class="w-full bg-[#508D8D]/10 rounded-t-md relative group transition-all hover:bg-[#508D8D]/30" style="height: 60%"></div>
                                <div class="w-full bg-[#508D8D]/10 rounded-t-md relative group transition-all hover:bg-[#508D8D]/30" style="height: 90%"></div>
                                <div class="w-full bg-[#FFD95A] rounded-t-md relative group shadow-lg shadow-[#FFD95A]/20" style="height: 100%">
                                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[9px] font-bold px-1.5 py-0.5 rounded opacity-100 whitespace-nowrap">4.8jt</div>
                                </div>
                            </div>

                            <div class="space-y-2 mt-auto">
                                <div class="bg-white/40 p-3 rounded-xl border border-white/50 flex justify-between items-center">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total</p>
                                    <p class="text-xs font-black text-[#508D8D]">12.4jt</p>
                                </div>
                                <div class="bg-white/40 p-3 rounded-xl border border-white/50 flex justify-between items-center">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Avg</p>
                                    <p class="text-xs font-black text-[#508D8D]">1.8jt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column (Status Area) - Approx 35% on Laptop -->
            <div class="lg:flex-[1.5] flex flex-col gap-6">
                <!-- Card: Segera Selesai -->
                <div class="glass-card rounded-[28px] overflow-hidden shadow-sm">
                    <div class="p-5 bg-gradient-to-br from-[#508D8D] to-[#417e7e] text-white">
                        <div class="flex justify-between items-center mb-0.5">
                            <h3 class="text-sm font-bold">Segera Selesai</h3>
                            <span class="material-symbols-outlined text-lg opacity-50">schedule</span>
                        </div>
                        <p class="text-[10px] text-white/60 font-bold uppercase tracking-wider">Target Hari Ini</p>
                    </div>
                    <div class="p-4 space-y-3">
                        @forelse ($proses->take(2) as $item)
                            <div class="flex gap-3 p-3.5 rounded-2xl bg-white/40 border border-white/50 group hover:border-[#FFD95A]/50 transition-all">
                                <div class="w-10 h-10 rounded-lg bg-white flex flex-col items-center justify-center shrink-0 shadow-sm border border-slate-100">
                                    <span class="text-sm font-black text-[#508D8D]">{{ $item->estimasi_selesai->format('d') }}</span>
                                    <span class="text-[8px] font-black uppercase text-slate-400">{{ $item->estimasi_selesai->format('M') }}</span>
                                </div>
                                <div class="flex-grow overflow-hidden">
                                    <div class="flex justify-between items-start mb-0.5">
                                        <p class="text-xs font-bold text-slate-800 truncate">{{ $item->pelanggan->namapel }}</p>
                                        <span class="text-[9px] font-bold text-[#735d00] bg-[#FFD95A]/40 px-1.5 py-0.5 rounded-md uppercase">Drying</span>
                                    </div>
                                    <p class="text-[10px] text-slate-500 mb-2 truncate">{{ $item->produk->nama_layanan }}</p>
                                    <div class="w-full h-1 bg-[#508D8D]/10 rounded-full overflow-hidden">
                                        <div class="w-3/4 h-full bg-[#FFD95A] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-xs text-slate-300 py-6 font-bold uppercase tracking-widest">Tidak ada deadline</p>
                        @endforelse
                    </div>
                </div>

                <!-- Card: Selesai Hari Ini -->
                <div class="glass-card rounded-[28px] overflow-hidden flex flex-col shadow-sm">
                    <div class="p-5 border-b border-white/20 flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-bold text-slate-800">Selesai</h3>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">Siap Ambil</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center">
                            <span class="material-symbols-outlined" style="font-size: 18px;">check_circle</span>
                        </span>
                    </div>
                    <div class="p-3 space-y-2">
                        <!-- Selesai Hari Ini Item -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl bg-emerald-50/50 border border-emerald-100 group transition-all hover:bg-emerald-100/50">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white shrink-0 shadow-lg shadow-emerald-500/20 group-hover:rotate-[360deg] transition-transform duration-700">
                                <span class="material-symbols-outlined" style="font-size: 14px;">done_all</span>
                            </div>
                            <div class="flex-grow overflow-hidden">
                                <p class="text-xs font-bold text-slate-800 truncate">Siti Aminah</p>
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">Selesai 10:45</p>
                            </div>
                            <button class="shrink-0 text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-1.5 rounded-lg uppercase hover:bg-emerald-200 transition-all tracking-wider">Hubungi</button>
                        </div>

                        <div class="bg-slate-50/30 p-5 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-center mt-2">
                            <span class="material-symbols-outlined text-slate-200 text-3xl mb-2">auto_awesome</span>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-tight italic">Laporan harian otomatis akan terbit pukul 21:00</p>
                        </div>
                    </div>
                    <div class="p-4 mt-auto">
                        <a href="/order" class="w-full py-2.5 bg-[#508D8D] text-white rounded-xl font-bold text-[10px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-[#417e7e] transition-all shadow-md shadow-[#508D8D]/20">
                            Lihat Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating Action Button -->
    <a href="/order/create" class="fixed bottom-10 right-10 w-16 h-16 rounded-full bg-[#FFD95A] text-white shadow-2xl shadow-[#508D8D]/40 flex items-center justify-center group hover:scale-110 active:scale-95 transition-all duration-300 z-[60]">
        <span class="material-symbols-outlined text-3xl group-hover:rotate-90 transition-transform">add</span>
        <span class="absolute right-20 bg-slate-800 text-white text-[10px] font-bold px-4 py-2 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap shadow-xl">ORDER BARU</span>
    </a>
@endsection
