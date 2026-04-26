<aside id="logo-sidebar"
    class="flex flex-col fixed top-4 left-4 bottom-4 z-50 w-64 glass-dark transition-transform -translate-x-full sidebar rounded-3xl in-active sm:translate-x-0 shadow-2xl"
    aria-label="Sidebar">
    <div class=" basis-5/6  ">
        <div class="pb-2 pl-2 pt-4 w-full flex flex-col items-center justify-center rounded-t-[5px]">
            @if ($profil->logo)
                <img class="w-32 rounded" src="{{ 'data:image/jpeg;base64,' . base64_encode($profil->logo) }}"
                    alt="logo">
            @else
                <img class="w-32 rounded" src="{{ asset('assets/img/default-logo.jpg') }}" alt="default logo">
            @endif
        </div>
        <div class="px-4">
            <ul class="mt-4 space-y-2 border-t border-white/10 pt-4 font-medium">
                <li class="list-none">
                    <a href="/dashboard"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Dashboard' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-house-chimney"></i>
                        </div>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/pelanggan"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Pelanggan' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-address-book"></i>
                        </div>
                        <span class="ml-3">Pelanggan</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/order"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Order' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-cart-plus"></i>
                        </div>
                        <span class="ml-3">Order</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/pengeluaran"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Pengeluaran' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <span class="ml-3">Pengeluaran</span>
                    </a>
                </li>
                <li class="pt-4 pb-2 px-2">
                    <span class="text-xs uppercase tracking-wider text-white/40 font-bold">Laporan</span>
                </li>
                <li class="list-none">
                    <a href="/laporan"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Transaksi' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-file-lines"></i>
                        </div>
                        <span class="ml-3">Data Transaksi</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/kas"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Arus Kas' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-file-lines"></i>
                        </div>
                        <span class="ml-3">Arus Kas</span>
                    </a>
                </li>

                <li class="pt-4 pb-2 px-2">
                    <span class="text-xs uppercase tracking-wider text-white/40 font-bold">Pengaturan</span>
                </li>
                <li class="list-none">
                    <a href="/profil"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Profil Laundry' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                           <i id="icon-menu" class="fa-solid fa-gear"></i>
                        </div>
                        <span class="ml-3">Profil Laundry</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/produk"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Produk & Layanan' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                           <i id="icon-menu" class="fa-solid fa-gear"></i>
                        </div>
                        <span class="ml-3">Produk & Layanan</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/artikel"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'Artikel' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                           <i id="icon-menu" class="fa-solid fa-gear"></i>
                        </div>
                        <span class="ml-3">Artikel</span>
                    </a>
                </li>
                <li class="list-none">
                    <a href="/user"
                        class="flex flex-row items-center rounded-xl p-2 transition-all duration-300 {{ $title == 'User' ? 'bg-kuning text-sidebar font-bold shadow-lg' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-8 flex justify-center">
                            <i id="icon-menu" class="fa-solid fa-gear"></i>
                        </div>
                        <span class="ml-3">User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex justify-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Yakin ingin logout?')"
                class="text-black bg-kuning rounded px-2 py-1 hover:text-black hover:-mt-1 hover:shadow-lg shadow text-center font-semibold">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>
