<section id="tracking" class="py-24 bg-white relative">
    <div class="container max-w-screen-xl mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <h2 class="text-4xl font-black text-garis mb-4 tracking-tight">Tracking Status</h2>
            <p class="text-gray-500">Masukkan kode invoice Anda untuk melihat status pengerjaan laundry secara real-time.</p>
        </div>

        <div class="max-w-2xl mx-auto">
            <form action="{{ route('landing.search-invoice') }}" method="POST" class="mb-12">
                @csrf
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-gray-400 group-focus-within:text-sudah transition-colors">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="search" name="invoice_number" required
                        class="block w-full pl-14 pr-32 py-5 bg-latar border-0 rounded-[2rem] text-garis placeholder-gray-400 focus:ring-4 focus:ring-sudah/10 transition-all shadow-inner"
                        placeholder="Contoh: INV-2023001">
                    <button type="submit" 
                        class="absolute right-3 top-2.5 bottom-2.5 px-8 bg-sudah text-white font-bold rounded-[1.5rem] hover:bg-opacity-90 transition-all shadow-lg shadow-sudah/20 active:scale-95">
                        Lacak
                    </button>
                </div>
            </form>

            <div id="stepper" class="animate-fade-in-up">
                @if ($error)
                    <div class="p-6 bg-red-50 border border-red-100 rounded-3xl text-red-600 text-center animate-shake flex items-center justify-center gap-3">
                        <i class="fas fa-exclamation-circle text-xl"></i>
                        <span class="font-bold">{{ $error }}</span>
                    </div>
                @endif

                @if ($status)
                    <div class="glass p-8 lg:p-12 rounded-[3rem] border border-gray-100 shadow-xl">
                        <h3 class="text-center text-xl font-black text-garis mb-12">Detail Status Pesanan</h3>
                        
                        <div class="relative">
                            <!-- Progress Line Background -->
                            <div class="absolute top-6 left-0 w-full h-1 bg-gray-100 -z-10"></div>
                            
                            <div class="flex justify-between relative z-10">
                                <!-- Step 1: Input -->
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center shadow-lg shadow-green-200">
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                    <span class="text-xs font-black uppercase text-garis">Input</span>
                                </div>

                                <!-- Step 2: Proses -->
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-12 h-12 {{ $status['status'] === 'Selesai Dicuci' ? 'bg-green-500 shadow-green-200' : 'bg-sudah shadow-sudah/20' }} rounded-full flex items-center justify-center shadow-lg">
                                        <i class="fas {{ $status['status'] === 'Selesai Dicuci' ? 'fa-check' : 'fa-spinner fa-spin' }} text-white"></i>
                                    </div>
                                    <span class="text-xs font-black uppercase text-garis">
                                        {{ $status['status'] === 'Selesai Dicuci' ? 'Selesai' : 'Dicuci' }}
                                    </span>
                                </div>

                                <!-- Step 3: Pembayaran -->
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-12 h-12 {{ $status['status_pembayaran'] === 'Sudah Bayar' ? 'bg-green-500 shadow-green-200' : 'bg-gray-100' }} rounded-full flex items-center justify-center shadow-lg">
                                        <i class="fas {{ $status['status_pembayaran'] === 'Sudah Bayar' ? 'fa-check' : 'fa-wallet text-gray-300' }} text-white"></i>
                                    </div>
                                    <span class="text-xs font-black uppercase text-garis">Pembayaran</span>
                                </div>

                                <!-- Step 4: Selesai -->
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-12 h-12 {{ ($status['status'] === 'Selesai Dicuci' && $status['status_pembayaran'] === 'Sudah Bayar') ? 'bg-kuning shadow-kuning/20' : 'bg-gray-100' }} rounded-full flex items-center justify-center shadow-lg">
                                        <i class="fas {{ ($status['status'] === 'Selesai Dicuci' && $status['status_pembayaran'] === 'Sudah Bayar') ? 'fa-star text-garis' : 'fa-flag text-gray-300' }} text-white"></i>
                                    </div>
                                    <span class="text-xs font-black uppercase text-garis">Selesai</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-sudah/10 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-file-invoice text-sudah"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest">Status Invoice</p>
                                    <p class="font-bold text-garis">Terverifikasi</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest">Pembaruan Terakhir</p>
                                <p class="font-bold text-garis">{{ now()->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
