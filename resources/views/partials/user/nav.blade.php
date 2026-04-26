<div class="fixed top-4 left-0 right-0 z-50 flex justify-center px-4">
    <nav class="glass max-w-screen-xl w-full rounded-2xl shadow-lg border border-white/30 overflow-hidden">
        <div class="flex flex-wrap items-center justify-between mx-auto px-6 py-3">
            <div class="flex items-center gap-4">
                <a href="/" class="flex items-center group">
                    @if ($profil->logo)
                        <img class="h-10 w-auto rounded-lg shadow-md transition-transform group-hover:scale-110" src="{{ 'data:image/jpeg;base64,' . base64_encode($profil->logo) }}" alt="logo">
                    @else
                        <img class="h-10 w-auto rounded-lg" src="{{ asset('assets/img/default-logo.jpg') }}" alt="default logo">
                    @endif
                </a>
                <div class="hidden sm:block">
                    <p class="text-xs font-black text-garis uppercase tracking-widest opacity-60">Freya Laundry</p>
                    <div class="text-[10px] font-medium text-gray-500 italic">
                        {!! html_entity_decode($profil->tagline) !!}
                    </div>
                </div>
            </div>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-xl md:hidden hover:bg-white/20 transition-all">
                <i class="fas fa-bars"></i>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col md:flex-row gap-1 mt-4 md:mt-0">
                    @php
                        $menus = [
                            ['href' => '#home', 'label' => 'Home'],
                            ['href' => '#paket', 'label' => 'Layanan'],
                            ['href' => '#laundrycare', 'label' => 'Care'],
                            ['href' => '#tracking', 'label' => 'Tracking'],
                            ['href' => '#lokasi', 'label' => 'Lokasi'],
                            ['href' => '#about', 'label' => 'Tentang'],
                        ];
                    @endphp
                    @foreach($menus as $menu)
                        <li>
                            <a href="{{ $menu['href'] }}"
                                class="px-4 py-2 text-sm font-bold text-garis hover:text-sudah transition-colors rounded-xl hover:bg-white/30 block">
                                {{ $menu['label'] }}
                            </a>
                        </li>
                    @endforeach
                    <li class="ml-4 pl-4 border-l border-gray-200">
                        <a href="/login" class="px-5 py-2 text-sm font-bold bg-garis text-white rounded-xl hover:bg-opacity-90 transition-all shadow-lg shadow-garis/20 block">
                            Login Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
