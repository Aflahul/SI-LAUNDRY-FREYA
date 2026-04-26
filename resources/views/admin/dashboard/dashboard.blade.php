@extends('layout.index')

@section('content')
    <div class="p-3 mt-1 sm:ml-[17rem] text-sm">
        <div class="px-4 mb-1 mt-10">
            <span class="py-1 rounded justify-end text-xs"><i>{{ $tanggal }}</i></span>
            <!-- Di dalam template Blade Laravel -->
            @if (session('success'))
                <div
                    class="border hover:bg-sudah hover:text-white   border-sudah p-1 w-fit my-1 text-sudah rounded px-5 py-2">
                    {{ session('success') }}
                </div>
            @endif
            <p class="pb-4  ">Hi! <b><i>{{ ucfirst(auth()->user()->username) }},</i></b> Selamat datang</p>
            <hr>
        </div>
        <div class="px-4 flex gap-3 mt-3 ">
            <div class="w-2/3">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5 mb-3">
                    <div class="overflow-x-auto bg-latar rounded-[8px] border-t drop-shadow-lg">
                        <div class="flex flex-col justify-between p-2 md:flex-row">
                            <div class="w-full p-3 md:w-auto bg-kuning md:rounded-[3px]">
                                <div class="w-11 py-3 flex justify-center text-garis mx-auto">
                                    <div>
                                        <i class="fa-solid fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center flex flex-col justify-between md:text-right">
                                <h5 class="text-xl font-bold tracking-tight pt-1">{{ count($pelanggan) }}</h5>
                                <p class="">Pelanggan</p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto bg-latar rounded-[8px] border-t drop-shadow-lg">
                        <div class="flex flex-col justify-between p-2 md:flex-row">
                            <div class="w-full p-3 md:w-auto bg-kuning md:rounded-[3px]">
                                <div class="w-11 py-3 flex justify-center text-garis mx-auto">
                                    <div>
                                        <i class="fa-solid fa-tags fa-2x "></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center flex flex-col justify-between md:text-right">
                                <h5 class="text-xl font-bold tracking-tight pt-1">{{ count($produk) }}</h5>
                                <p class="">Layanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto bg-latar rounded-[8px] border-t drop-shadow-lg ">
                        <div class="flex flex-col justify-between p-2 md:flex-row">
                            <div class="w-full p-3 md:w-auto bg-kuning md:rounded-[3px]">
                                <div class="w-11 py-3 flex justify-center text-garis mx-auto">
                                    <div>
                                        <img src="asset\icn\aa.png" class="min-h-[2rem] max-h-[2rem]" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center flex flex-col justify-between md:text-right">
                                <h5 class="text-xl font-bold tracking-tight pt-1">{{ count($proses) }}</h5>
                                <p class="">Proses</p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto bg-latar rounded-[8px] border-t drop-shadow-lg">
                        <div class="flex flex-col justify-between p-2 md:flex-row">
                            <div class="w-full p-3 md:w-auto bg-kuning md:rounded-[3px]">
                                <div class="w-11 py-3 flex justify-center text-garis mx-auto">
                                    <div>
                                        <i class="fa-solid fa-comments-dollar fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center flex flex-col justify-between md:text-right">
                                <h5 class="text-xl font-bold tracking-tight pt-1">
                                    {{ number_format(optional($arus)->saldo ?? 0, 0, ',', '.') }}
                                </h5>
                                <p class="">Profit</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="drop-shadow-lg overflow-x-auto mb-3">
                    <div class="bg-latar  rounded-[8px]">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <div
                                    class="px-4 pt-2 pb-1 shadow uppercase text-center items-center bg-latar border-t-4 border-sudah rounded-t-[8px]">
                                    <p class="font-bold text-center">Sedang Proses</p>
                                </div>
                                <tr class="pt-1 rounded-t-[8px]">
                                    <th scope="col" class="pt-2 px-2">Pelanggan</th>
                                    <th scope="col" class="pt-2 text-center px-2">Jenis Laundry</th>
                                    <th scope="col" class="pt-2 text-center px-2">Masuk</th>
                                    <th scope="col" class="pt-2 text-right px-2">Estimasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proses as $item)
                                    <tr class=" odd:bg-slate-200 even:bg-latar ">
                                        <td class="px-2 text-left ">
                                            <p class=" ">{{ $item->pelanggan->namapel }}</p>
                                        </td>
                                        <td class="px-2 text-center ">
                                            <p class="">{{ $item->produk->nama_layanan }}</p>
                                        </td>
                                        <td class="px-2 text-center ">
                                            <p class=" ">{{ $item->created_at->format('d/m/Y') }}</p>
                                        </td>
                                        <td class="px-2 text-right ">
                                            <p class="">{{ $item->estimasi_selesai->format('d/m/Y') }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"
                                        class="hover:bg-kuning text-center text-garis drop-shadow-lg font-medium rounded-b-[8px] text-sm px-2 py-1">
                                        <a href="/laporan" class="" type="button">Lihat Semua</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div class="drop-shadow-lg overflow-x-auto">
                    <div class="bg-latar  rounded-[8px]">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <div
                                    class="px-4 pt-2 pb-1 shadow uppercase text-center items-center bg-latar border-t-4 border-sudah rounded-t-[8px]">
                                    <p class="font-bold text-center">Arus Kas terakhir</p>
                                </div>
                                <tr class="pt-1 rounded-t-[8px]">
                                    <th scope="col" class="px-2 pt-2">
                                        Kode
                                    </th>
                                    <th scope="col" class="px-2 pt-2 text-center">
                                        Sumber Arus
                                    </th>
                                    <th scope="col" class="px-2 pt-2 text-center">
                                        Aktivitas
                                    </th>
                                    <th scope="col" class="px-2 pt-2 text-center">
                                        Total
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aruss as $item)
                                    <tr class=" odd:bg-slate-200 even:bg-latar ">
                                        <td class="px-2 w-40 text-md font-bold uppercase">
                                            <p class="text-sudah">{{ $item->kode }}</p>
                                        </td>
                                        <td class="px-2 text-center  ">
                                            <p class="">{{ $item->nama }}</p>
                                        </td>
                                        <td class="px-2 text-center  ">
                                            <p class="">{{ $item->arus }}</p>
                                        </td>
                                        <td class="px-2 text-center ">
                                            <p class="">Rp. {{ number_format($item->total, 0, ',', '.') }}</p>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"
                                        class="hover:bg-kuning text-center text-garis drop-shadow-lg font-medium rounded-b-[8px] text-sm px-2 py-1">
                                        @if (Auth::user()->level === 'admin')
                                            <a href="/laporan" class="" type="button">Lihat Semua</a>
                                        @else
                                            Level Akses hanya Admin
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-1/3">
                <div class=" drop-shadow-lg overflow-x-auto">
                    <div class="bg-latar border-t-4 border-sudah rounded-[8px]">
                        <table class="w-full text-sm text-left ">
                            <thead>
                                <div class="p-4 border-b-2 flex justify-between items-center ">
                                    <h1 class="font-bold">Data Pelanggan</h1>
                                    <a href="/pelanggan"
                                        class="bg-kuning hover:bg-kuning drop-shadow-lg hover:text-white font-medium text-garis rounded-xl text-sm px-5 py-2">Lihat
                                        Semua</a>
                                </div>
                            </thead>
                            <tbody>
                                @foreach ($pelanggan->sortByDesc('created_at')->take(10) as $pel)
                                    <tr class=" odd:bg-slate-200 even:bg-latar ">
                                        <td class="w-8 ">
                                            <div class="pl-4">
                                                <i class="fas fa-user-circle fa-3x text-sudah"></i>
                                            </div>
                                        </td>
                                        <td class="text-left px-2">
                                            <p class="font-bold text-sudah  ">{{ $pel->namapel }}</p>
                                            <p class="font-light text-xs">{{ $pel->kontak }}</p>
                                        </td>
                                        <td class="py-0.5 text-right pr-4">
                                            <p class="font-medium">Total Transaksi : {{ $pel->total_order }}</p>
                                            <p class="font-light text-xs ">{{ $pel->alamat }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endsection
