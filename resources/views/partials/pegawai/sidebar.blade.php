<aside id="logo-sidebar"
    class="fixed left-6 top-6 bottom-6 w-64 rounded-[32px] glass-sidebar shadow-2xl shadow-[#508D8D]/20 flex flex-col p-6 z-50 overflow-hidden transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    
    <div class="flex items-center gap-4 mb-8 border-b border-white/10 pb-6">
        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center border border-white/30">
            <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">local_laundry_service</span>
        </div>
        <div>
            <h1 class="text-2xl font-extrabold text-white tracking-widest leading-none">Freya</h1>
            <p class="text-white/60 text-[10px] font-medium uppercase tracking-tighter leading-none mt-1">Premium Laundry</p>
        </div>
    </div>

    <nav class="flex flex-col gap-2 flex-grow overflow-y-auto hide-scrollbar">
        <!-- Dashboard -->
        <a href="/dashboard" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Dashboard' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $title == 'Dashboard' ? '1' : '0' }};">dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>

        <!-- Pelanggan -->
        <a href="/pelanggan" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Pelanggan' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $title == 'Pelanggan' ? '1' : '0' }};">group</span>
            <span class="text-sm">Pelanggan</span>
        </a>

        <!-- Order -->
        <a href="/order" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Order' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $title == 'Order' ? '1' : '0' }};">shopping_cart</span>
            <span class="text-sm">Order</span>
        </a>

        <!-- Pengeluaran -->
        <a href="/pengeluaran" 
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $title == 'Pengeluaran' ? 'bg-[#FFD95A] text-[#508D8D] font-bold shadow-md translate-x-1' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $title == 'Pengeluaran' ? '1' : '0' }};">payments</span>
            <span class="text-sm">Pengeluaran</span>
        </a>
    </nav>

    <div class="mt-auto pt-6 border-t border-white/10">
        <div class="bg-white/10 rounded-2xl p-4 flex items-center gap-3 border border-white/5">
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#FFD95A] to-white/40 overflow-hidden border border-white/20">
                <img alt="User Profile" class="w-full h-full object-cover" src="{{ asset('asset/img/default-logo.jpg') }}"/>
            </div>
            <div class="overflow-hidden">
                <p class="text-white font-bold text-xs truncate">{{ ucfirst(auth()->user()->username) }}</p>
                <p class="text-white/60 text-[10px] truncate uppercase tracking-tighter">{{ auth()->user()->level }}</p>
            </div>
            <form action="/logout" method="POST" class="ml-auto">
                @csrf
                <button type="submit" class="text-white/60 hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
