<div class="fixed top-4 left-[18rem] right-4 z-40">
    <nav class="glass rounded-2xl shadow-sm border border-white/30 pr-8">
        <div class="max-w-screen-xl flex flex-wrap justify-between py-3 items-center px-6">
            <h1 class="text-xl font-bold text-tulisan tracking-tight">{{ $title }}</h1>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 py-1 px-3 bg-white/50 rounded-xl border border-white/50">
                    <i class="fas fa-user-circle text-sudah text-xl"></i>
                    <span class="font-bold text-tulisan text-xs">{{ ucfirst(auth()->user()->username) }}</span>
                </div>
                <div class="font-bold text-tulisan bg-kuning/20 px-3 py-1 rounded-xl text-xs">{{ $jam }}</div>
                <div class="border-l border-gray-200 pl-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-belum hover:text-red-700 transition-colors" onclick="return confirm('Yakin ingin logout?')">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
