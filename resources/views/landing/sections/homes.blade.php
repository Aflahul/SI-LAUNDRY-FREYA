<section id="home" class="gradient-bg min-h-[90vh] flex items-center pt-20">
    <div class="container max-w-screen-xl mx-auto px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Left Side: Text Content -->
            <div class="w-full lg:w-1/2 space-y-8 animate-fade-in-up">
                <div class="inline-block px-4 py-1.5 bg-kuning/20 rounded-full border border-kuning/30">
                    <span class="text-xs font-bold text-garis uppercase tracking-widest">Premium Laundry Service</span>
                </div>
                <h1 class="text-5xl lg:text-7xl font-black text-garis tracking-tight leading-tight">
                    {{ $profil->nama_laundry }}
                </h1>
                <div class="text-lg text-gray-600 leading-relaxed max-w-lg">
                    {!! html_entity_decode($profil->desk) !!}
                </div>
                <div class="flex flex-wrap gap-4">
                    <a href="https://wa.me/{{ $profil->kontak }}?text=Assalamualaikum%20Freya%20Laundry!%0ASaya%20ingin%20menggunakan%20jasa%20anda%2C%20apakah%20bisa%20jemput%20sekarang%3F"
                       class="btn-modern bg-belum text-white px-8 py-4 shadow-xl shadow-belum/20 hover:scale-105 flex items-center gap-2">
                        <i class="fab fa-whatsapp text-xl"></i>
                        Pesan Sekarang
                    </a>
                    <a href="#paket" class="btn-modern bg-white text-garis px-8 py-4 border border-gray-100 shadow-sm hover:bg-gray-50 flex items-center gap-2">
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <!-- Right Side: Image Grid -->
            <div class="w-full lg:w-1/2 relative h-[500px]">
                <div class="absolute top-0 right-0 w-64 h-64 bg-kuning rounded-full blur-3xl opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-sudah rounded-full blur-3xl opacity-20"></div>
                
                <div class="grid grid-cols-2 gap-4 relative z-10 p-4">
                    <div class="space-y-4">
                        <img class="w-full h-64 object-cover rounded-3xl shadow-2xl transform transition-all duration-500 hover:scale-[1.02]" src="asset/img/freya/2.jpeg" alt="Laundry 1">
                        <img class="w-full h-40 object-cover rounded-3xl shadow-2xl transform transition-all duration-500 hover:scale-[1.02]" src="asset/img/freya/3.jpeg" alt="Laundry 2">
                    </div>
                    <div class="space-y-4 pt-12">
                        <img class="w-full h-40 object-cover rounded-3xl shadow-2xl transform transition-all duration-500 hover:scale-[1.02]" src="asset/img/freya/6.jpeg" alt="Laundry 3">
                        <img class="w-full h-64 object-cover rounded-3xl shadow-2xl transform transition-all duration-500 hover:scale-[1.02]" src="asset/img/freya/5.jpeg" alt="Laundry 4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
