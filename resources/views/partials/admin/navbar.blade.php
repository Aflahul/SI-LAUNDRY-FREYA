<header 
    style="position: fixed; top: 24px; left: 304px; right: 24px; height: 64px; z-index: 40; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; border-radius: 16px; background-color: #FFD95A; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);"
    class="border border-[#508D8D]/10">
    
    <div class="flex items-center gap-4 flex-grow max-w-xl">
        <div class="relative w-full group">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-[#508D8D]/60 group-focus-within:text-[#508D8D] transition-colors" style="font-size: 18px;">search</span>
            <input type="text" placeholder="Cari transaksi, pelanggan..." class="w-full bg-white/40 border-none rounded-xl py-2.5 pl-12 pr-4 text-xs text-[#508D8D] placeholder:text-[#508D8D]/50 focus:ring-2 focus:ring-[#508D8D]/20 focus:bg-white/60 transition-all">
        </div>
    </div>

    <div class="flex items-center gap-4">
        <!-- System Status -->
        <div class="hidden xl:flex items-center gap-2 px-3 py-2 bg-white/20 rounded-xl border border-white/30">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <p class="text-[9px] font-bold text-[#508D8D] uppercase tracking-widest">Online</p>
        </div>

        <!-- Divider -->
        <div class="h-8 w-px bg-[#508D8D]/10 mx-1"></div>

        <!-- User Profile Info -->
        <div class="flex items-center gap-3 pl-2">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-[#508D8D] leading-none mb-1">{{ ucfirst(auth()->user()->username) }}</p>
                <p class="text-[10px] font-bold text-[#508D8D]/60 uppercase tracking-widest leading-none">{{ auth()->user()->level }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-white/40 border border-white/50 flex items-center justify-center shadow-sm text-[#508D8D]">
                <span class="material-symbols-outlined" style="font-size: 24px; font-variation-settings: 'FILL' 1;">account_circle</span>
            </div>
        </div>

        <!-- Logout Button -->
        <form action="/logout" method="POST" class="flex">
            @csrf
            <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-xl bg-[#508D8D] text-white hover:bg-[#417e7e] transition-all shadow-md shadow-[#508D8D]/20">
                <span class="material-symbols-outlined" style="font-size: 18px;">logout</span>
            </button>
        </form>
    </div>
</header>
