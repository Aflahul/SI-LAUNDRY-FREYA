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
        <div class="px-4 flex gap-5 mt-6">
            <div class="w-2/3 space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
                <div class="glass overflow-hidden rounded-2xl shadow-sm border border-white/20">
                    <div class="bg-sudah/10 px-6 py-4 border-b border-white/10">
                        <h3 class="font-bold text-sudah flex items-center gap-2">
                            <i class="fa-solid fa-spinner animate-spin-slow"></i>
                            Sedang Proses
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs uppercase bg-white/50 text-gray-500">
                                <tr>
                                    <th class="px-6 py-3 font-semibold">Pelanggan</th>
                                    <th class="px-6 py-3 font-semibold text-center">Jenis Laundry</th>
                                    <th class="px-6 py-3 font-semibold text-center">Masuk</th>
                                    <th class="px-6 py-3 font-semibold text-right">Estimasi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @foreach ($proses as $item)
                                    <tr class="hover:bg-white/30 transition-colors">
                                        <td class="px-6 py-4 font-medium">{{ $item->pelanggan->namapel }}</td>
                                        <td class="px-6 py-4 text-center">{{ $item->produk->nama_layanan }}</td>
                                        <td class="px-6 py-4 text-center text-gray-500">{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 text-right font-semibold text-sudah">{{ $item->estimasi_selesai->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 bg-white/30 text-center border-t border-white/10">
                        <a href="/laporan" class="text-sudah font-bold hover:underline text-xs">Lihat Semua</a>
                    </div>
                </div>
                <div class="glass overflow-hidden rounded-2xl shadow-sm border border-white/20">
                    <div class="bg-navbar1/10 px-6 py-4 border-b border-white/10">
                        <h3 class="font-bold text-navbar1 flex items-center gap-2">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                            Arus Kas Terakhir
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs uppercase bg-white/50 text-gray-500">
                                <tr>
                                    <th class="px-6 py-3 font-semibold">Kode</th>
                                    <th class="px-6 py-3 font-semibold text-center">Sumber Arus</th>
                                    <th class="px-6 py-3 font-semibold text-center">Aktivitas</th>
                                    <th class="px-6 py-3 font-semibold text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @foreach ($aruss as $item)
                                    <tr class="hover:bg-white/30 transition-colors">
                                        <td class="px-6 py-4">
                                            <span class="text-xs font-bold uppercase text-sudah bg-sudah/10 px-2 py-1 rounded">
                                                {{ $item->kode }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center font-medium">{{ $item->nama }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="{{ $item->arus == 'Masuk' ? 'text-sudah' : 'text-belum' }} font-bold">
                                                {{ $item->arus }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center font-bold">
                                            Rp. {{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 bg-white/30 text-center border-t border-white/10">
                        @if (Auth::user()->level === 'admin')
                            <a href="/laporan" class="text-navbar1 font-bold hover:underline text-xs">Lihat Semua</a>
                        @else
                            <span class="text-xs text-gray-400 italic">Akses Terbatas</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-1/3 space-y-8">
                <!-- Info Card Baru -->
                <div class="glass rounded-2xl shadow-sm border border-white/20 overflow-hidden bg-gradient-to-br from-sudah/10 to-transparent">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-tulisan">Business Insights</h3>
                            <span class="px-2 py-1 bg-kuning/20 text-garis text-[10px] font-bold rounded-lg">LIVE</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white/50 rounded-xl flex items-center justify-center text-sudah shadow-sm">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Target Harian</p>
                                    <p class="text-sm font-bold text-tulisan">85% Tercapai</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white/50 rounded-xl flex items-center justify-center text-belum shadow-sm">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Beban Kerja</p>
                                    <p class="text-sm font-bold text-tulisan">Normal ({{ count($proses) }} Antrian)</p>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="w-full bg-white/30 rounded-full h-1.5">
                                    <div class="bg-sudah h-1.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-2xl shadow-sm border border-white/20 overflow-hidden">
                    <div class="p-6 border-b border-white/10 flex justify-between items-center bg-white/40">
                        <h3 class="font-bold text-tulisan">Pelanggan Baru</h3>
                        <a href="/pelanggan" class="text-xs bg-kuning/80 hover:bg-kuning text-garis px-3 py-1 rounded-lg font-bold transition-all shadow-sm">
                            Semua
                        </a>
                    </div>
                    <div class="divide-y divide-white/10">
                        @foreach ($pelanggan->sortByDesc('created_at')->take(8) as $pel)
                            <div class="p-4 flex items-center gap-4 hover:bg-white/30 transition-all">
                                <div class="relative">
                                    <div class="w-12 h-12 bg-sudah/10 rounded-full flex items-center justify-center border border-sudah/20">
                                        <i class="fas fa-user text-sudah text-xl"></i>
                                    </div>
                                    @if($pel->total_order > 5)
                                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-kuning rounded-full border-2 border-white flex items-center justify-center">
                                            <i class="fas fa-star text-[8px] text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-tulisan truncate">{{ $pel->namapel }}</p>
                                    <p class="text-xs text-gray-500">{{ $pel->kontak }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-[10px] bg-white/50 px-2 py-1 rounded-full border border-white/20 font-bold text-sudah">
                                        {{ $pel->total_order }} Trx
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    @endsection
