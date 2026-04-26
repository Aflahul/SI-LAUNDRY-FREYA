<section id="paket" class="w-screen py-24 bg-gelap relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-sudah/20 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-belum/20 rounded-full blur-[100px]"></div>
    
    <div class="container max-w-screen-xl mx-auto px-6 lg:px-12 relative z-10">
        <div class="flex flex-col lg:flex-row items-end justify-between mb-12 gap-6">
            <div class="max-w-2xl space-y-4">
                <h2 class="text-4xl lg:text-5xl font-black text-white tracking-tight">Produk & Layanan</h2>
                <p class="text-white/60 text-lg">Kami menawarkan berbagai pilihan paket laundry yang dapat disesuaikan dengan kebutuhan Anda.</p>
            </div>
            <div class="flex gap-4">
                <button id="arrowkiri" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white/10 transition-all">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button id="arrowkanan" class="w-12 h-12 rounded-full bg-kuning flex items-center justify-center text-garis hover:scale-110 transition-all shadow-lg shadow-kuning/20">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div id="kartunya" class="flex gap-8 overflow-x-auto pb-12 hide-scrollbar snap-x">
            @foreach ($produk as $cards)
                <div class="snap-center">
                    <div class="glass-dark min-w-[22rem] p-8 rounded-[2.5rem] border border-white/10 group hover:border-kuning/50 transition-all duration-500 hover:-translate-y-2">
                        <div class="flex justify-between items-start mb-8">
                            <h5 class="text-white/40 text-xs font-black uppercase tracking-widest">{{ $cards->satuan }} Rate</h5>
                            <div class="w-10 h-10 bg-kuning/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-bolt text-kuning"></i>
                            </div>
                        </div>
                        
                        <h4 class="text-2xl font-bold text-white mb-6">{{ $cards->nama_layanan }}</h4>
                        
                        <div class="flex items-baseline gap-1 mb-8">
                            <span class="text-white/40 text-lg font-medium">Rp</span>
                            <span class="text-5xl font-black text-white tracking-tighter">{{ number_format($cards->harga, 0, ',', '.') }}</span>
                            <span class="text-white/40 text-sm">/{{ $cards->satuan }}</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center gap-3 text-white/70 text-sm">
                                <div class="w-5 h-5 bg-sudah/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-[10px] text-sudah"></i>
                                </div>
                                {{ $cards->desk }}
                            </li>
                            <li class="flex items-center gap-3 text-white/70 text-sm">
                                <div class="w-5 h-5 bg-sudah/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-[10px] text-sudah"></i>
                                </div>
                                {{ $cards->desk2 }}
                            </li>
                            <li class="flex items-center gap-3 text-white/70 text-sm">
                                <div class="w-5 h-5 bg-kuning/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-[10px] text-kuning"></i>
                                </div>
                                Estimasi {{ $cards->durasi }} Hari
                            </li>
                        </ul>

                        <a href="https://wa.me/{{ $profil->kontak }}" class="block w-full py-4 text-center bg-white/5 hover:bg-kuning hover:text-garis text-white font-bold rounded-2xl transition-all border border-white/10 hover:border-kuning uppercase tracking-widest text-xs">
                            Pesan Layanan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        // Fungsi untuk scroll ke kiri
        $("#arrowkiri").click(function() {
            $("#kartunya").animate({
                scrollLeft: "-=200"
            }, "");
        });

        // Fungsi untuk scroll ke kanan
        $("#arrowkanan").click(function() {
            $("#kartunya").animate({
                scrollLeft: "+=200"
            }, "");
        });
        $("#arrowkiri").click(function() {
            console.log("Ikon 'left' diklik.");
            $("#kartunya").animate({
                scrollLeft: "-=200"
            }, "");
        });

    });
</script>
