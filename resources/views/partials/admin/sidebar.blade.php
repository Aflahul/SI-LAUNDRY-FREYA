<aside id="logo-sidebar"
    style="position: fixed; left: 24px; top: 24px; bottom: 24px; width: 256px; z-index: 50; display: flex; flex-direction: column; padding: 24px; border-radius: 32px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);"
    class="glass-sidebar transition-transform -translate-x-full sm:translate-x-0 overflow-hidden"
    aria-label="Sidebar">
    
    <div class="flex items-center justify-center mb-8 border-b border-white/10 pb-6 shrink-0">
        <div class="h-12 rounded overflow-hidden">
            <img src="{{ asset('asset/img/default-logo.jpg') }}" alt="Freya Logo" class="h-full w-auto rounded object-contain">
        </div>
    </div>

    <nav class="flex flex-col gap-2 flex-grow overflow-y-auto hide-scrollbar">
        <!-- Dashboard -->
        <a href="/dashboard" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Dashboard' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Dashboard' ? '1' : '0' }};">dashboard</span>
            <span class="text-sm font-semibold tracking-wide">Dashboard</span>
        </a>

        <!-- Pelanggan -->
        <a href="/pelanggan" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Pelanggan' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Pelanggan' ? '1' : '0' }};">group</span>
            <span class="text-sm font-semibold tracking-wide">Pelanggan</span>
        </a>

        <!-- Order -->
        <a href="/order" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Order' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Order' ? '1' : '0' }};">shopping_cart</span>
            <span class="text-sm font-semibold tracking-wide">Order</span>
        </a>

        <!-- Pengeluaran -->
        <a href="/pengeluaran" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Pengeluaran' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Pengeluaran' ? '1' : '0' }};">payments</span>
            <span class="text-sm font-semibold tracking-wide">Pengeluaran</span>
        </a>

        <div class="mt-4 mb-2 px-4">
            <p class="text-[10px] uppercase tracking-[0.2em] text-white/30 font-bold">Laporan</p>
        </div>

        <!-- Transaksi -->
        <a href="/laporan" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Transaksi' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Transaksi' ? '1' : '0' }};">assessment</span>
            <span class="text-sm font-semibold tracking-wide">Data Transaksi</span>
        </a>

        <!-- Arus Kas -->
        <a href="/kas" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Arus Kas' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Arus Kas' ? '1' : '0' }};">account_balance_wallet</span>
            <span class="text-sm font-semibold tracking-wide">Arus Kas</span>
        </a>

        <div class="mt-4 mb-2 px-4">
            <p class="text-[10px] uppercase tracking-[0.2em] text-white/30 font-bold">Pengaturan</p>
        </div>

        <!-- Profil -->
        <a href="/profil" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Profil Laundry' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Profil Laundry' ? '1' : '0' }};">settings</span>
            <span class="text-sm font-semibold tracking-wide">Profil Laundry</span>
        </a>

        <!-- Produk -->
        <a href="/produk" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Produk & Layanan' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'FILL' {{ $title == 'Produk & Layanan' ? '1' : '0' }};">inventory_2</span>
            <span class="text-sm font-semibold tracking-wide">Produk & Layanan</span>
        </a>
    </nav>

</aside>
