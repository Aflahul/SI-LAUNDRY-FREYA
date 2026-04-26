<section id="about" class="bg-gelap w-screen">
    <div class="container py-5 max-w-screen-xl items-center justify-between mx-auto px-3 sm:px-7 h-fit">
        <p class=" font-semibold text-2xl  text-white ">Tentang Kami</p>
        <hr class="my-1 border-gray-200 sm:mx-auto dark:border-gray-700 " />
        <footer class=" bg-gelap text-white dark:bg-gray-800">
            <div class="mx-auto max-w-screen-xl">
                <div class="flex flex-col justify-between md:flex-row gap-5  ">
                    <div class="flex flex-col mb-1 md:mb-0 ">
                        <div>
                            <a href="#home" class="">
                                <img class="h-32 rounded-2xl shadow-lg" src="{{ asset('asset/img/default-logo.jpg') }}" alt="logo">
                            </a>
                        </div>
                        <div class="py-1 font-medium text-lg">{!! html_entity_decode($profil->tagline) !!}</div>

                    </div>
                    <div class="flex flex-col justify-end md:flex-row gap-5">
                        <div class="max-w-[14rem]">
                            <p class="font-bold text-lg ">Kontak
                            </p>
                            <ul class="font-light text-sm">
                                <li class="">
                                    <a href="https://wa.me/{{ $profil->kontak }}?text=Assalamualaikum%20Freya%20Laundry!%0ASaya%20ingin%20menggunakan%20jasa%20anda%2C%20apakah%20bisa%20jemput%20sekarang%3F"
                                        class="hover:underline">
                                        <i class="fa-brands fa-whatsapp"></i><span> +{{ $profil->kontak }}</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="https://www.google.com/maps/place/Hidroponik+Bikaru+Farm/@-3.3747353,120.3137375,19.58z/data=!4m14!1m7!3m6!1s0x2d96a57f8fa5b39d:0x822ba9f8d81fd3e9!2sHidroponik+Bikaru+Farm!8m2!3d-3.3746462!4d120.3139374!16s%2Fg%2F11rsfc11ps!3m5!1s0x2d96a57f8fa5b39d:0x822ba9f8d81fd3e9!8m2!3d-3.3746462!4d120.3139374!16s%2Fg%2F11rsfc11ps?entry=ttu"
                                        class="hover:underline ">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span class=" break-words">{{ $profil->alamat }}</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div>
                            <p class="font-bold text-lg ">Produk & Layanan
                            </p>
                            <ul class="font-light">
                                @foreach ($produk as $cards)
                                    <li class="">
                                        <a href="#paket" class="text-sm hover:underline">{{ $cards->nama_layanan }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- {{ $produk->links() }} --}}
                        </div>

                    </div>
                </div>

                <hr class="my-2 border-gray-200 sm:mx-auto dark:border-gray-700 " />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#"
                            class="hover:underline">Freya Laundry™</a>. All Rights Reserved.
                    </span>
                </div>
            </div>
        </footer>
    </div>
</section>