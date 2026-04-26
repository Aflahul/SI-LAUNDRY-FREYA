<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Profil;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Fungsi lain di sini ...

    public function markAsSelesai($id_order)
    {
        // Cari order berdasarkan ID
        $order = Order::find($id_order);

        if (!$order) {
            // Handle jika order tidak ditemukan
            // Contoh: Redirect dengan pesan error
            return redirect('/order')->with('error', 'Order tidak ditemukan');
        }

        // Pastikan status sedang cuci
        if ($order->status === 'Sedang Cuci') {
            $order->status = 'Selesai Dicuci';
            $order->save();

            return redirect('/order')->with('success', 'Pesanan berhasil ditandai sebagai Selesai Dicuci');
        }

        return redirect('/order')->with('error', 'Status pesanan tidak dapat diubah (mungkin sudah selesai)');
    }


   


    public function markAsSudahDibayar($id_order)
    {
        // Cari order berdasarkan ID
        $order = Order::find($id_order);

        if (!$order) {
            // Handle jika order tidak ditemukan
            return redirect('/order')->with('error', 'Order tidak ditemukan');
        }
        // Pastikan status pembayaran belum dibayar
        if ($order->status_pembayaran === 'Belum Dibayar') {
            // Ubah status pembayaran menjadi sudah bayar
            $order->status_pembayaran = 'Sudah Bayar';
            $order->save();

            // Redirect dengan pesan sukses
            return redirect('/order')->with('success', 'Status pembayaran berhasil diubah');
        }

        // Redirect jika status pembayaran sudah bayar atau jika status bukan "Sudah Dicuci"
        return redirect('/order')->with('error', 'Status pembayaran sudah bayar atau status bukan "Sudah Dicuci"');
    }

    public function index()

    {
        $datapel = Pelanggan::all();
        $data_layanan = Produk::all();

        // Ambil data order dari database dan urutkan berdasarkan tanggal pembuatan (created_at) terbaru
        $order = Order::with(['pelanggan', 'produk'])
            ->where(function ($query) {
                $query->where('status', '!=', 'Selesai Dicuci')
                    ->orWhere('status_pembayaran', '!=', 'Sudah Bayar');
            })
            // ->orderBy('created_at', 'desc') // Tambahkan baris ini untuk mengurutkan berdasarkan tanggal pembuatan terbaru
            ->get();
        // dd($order);

        $tanggal = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y');
        $jam = Carbon::now()->locale('id')->isoFormat('HH:mm');
        $profil = Profil::first();

        // dd($order);
        return view('admin.order.order', [
            'title' => 'Order',
            'data' => $order,
            'datapel' => $datapel,
            'profil' => $profil,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'data_layanan' => $data_layanan
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data    
        $request->validate([
            'id_pelanggan' => 'required',
            'id_layanan' => 'required',
            'qty' => 'required|numeric|min:0.1', // Mengizinkan angka desimal dengan nilai minimal 0.1
        ]);

        //Generate kode order
        $lastCode = Order::max('kd_order');
        $nextCode = 'INV0001'; // Kode awal
        if ($lastCode) {
            $numericPart = (int) substr($lastCode, 3); // Ambil bagian angka dari kode terakhir
            $nextNumericPart = $numericPart + 1;
            $nextCode = 'INV' . str_pad($nextNumericPart, 4, '0', STR_PAD_LEFT); // Format ulang kode dengan tambahan angka
        }

        // Cari data layanan
        $layanan = Produk::find($request->id_layanan);

        // Pastikan layanan ditemukan
        if ($layanan) {
            // Menghitung total harga
            $harga = $layanan->harga;
            $durasi = $layanan->durasi;
            $qty = (float) $request->qty; // Ubah nilai qty menjadi float
            $total = $harga * $qty;

            // Periksa status pembayaran
            $statusPembayaran = $request->has('status_pembayaran') ? 'Sudah Bayar' : 'Belum Dibayar';

            // Membuat order baru
            $order = new Order;
            $order->kd_order = $nextCode;
            $order->durasi = $durasi;
            $order->id_pelanggan = $request->id_pelanggan;
            $order->id_layanan = $request->id_layanan;
            $order->qty = $qty;
            $order->total = $total;
            $order->status = 'Sedang Cuci';
            $order->status_pembayaran = $statusPembayaran;
            $order->save();

            return redirect('/order')->with('success', 'Data order berhasil ditambahkan.');
        } else {
            // Lakukan tindakan jika produk tidak ditemukan
            return redirect()->back()->withErrors(['id_layanan' => 'Produk tidak ditemukan.']);
        }
    }


    public function selesai($id_order)
    {

        // SAAT NI TIDAK DIGUNAKAN
        $pelanggan = Order::where('id_order', $id_order)->first();
        // dd($pelanggan);
        $pelanggan->status = 'Selesai';
        $pelanggan->save();
        return redirect('/order');
    }

    public function edit($id_order)
    {
        $datapel = Pelanggan::all();
        $data_layanan = Produk::all();
        // $order = Order::with(['pelanggan', 'produk'])
        //         ->find($id_order);
        $order = Order::with(['pelanggan', 'produk'])->findOrFail($id_order);
        // dd($datapel);
        $profil = Profil::first();
        $tanggal = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y');
        $jam = Carbon::now()->locale('id')->isoFormat('HH:mm');
      
        $orders = Order::with(['pelanggan', 'produk'])
            ->where(function ($query) {
                $query->where('status', '!=', 'Selesai Dicuci')
                    ->orWhere('status_pembayaran', '!=', 'Sudah Bayar');
            })
            // ->orderBy('created_at', 'desc')
            ->get();
        if (!$order) {
            return redirect('/order')->with('error', 'Data pengeluaran tidak ditemukan.');
        }

        return view('admin.order.edit', [
            'title' => 'Order',
            'orders' => $orders,
            'data' => $order,
            'profil' => $profil,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'datapel' => $datapel,
            'data_layanan' => $data_layanan,
        ]);
    }

    public function update(Request $request, $id_order)
    {
        // Validasi data
        $request->validate([
            'id_pelanggan' => 'required',
            'id_layanan' => 'required',
            'qty' => 'required|numeric|min:0.1', // Gunakan rule 'numeric' dan tambahkan minimal nilai 0.1
        ]);

        // Ambil data order berdasarkan id_order
        $order = Order::find($id_order);

        if (!$order) {
            // Handle jika data tidak ditemukan, misalnya redirect atau tampilkan pesan error.
            return redirect('/order')->with('error', 'Data order tidak ditemukan.');
        }

        // Mengubah nilai qty menjadi float sebelum disimpan ke dalam database
        $qty = (float) $request->qty;

        // Update data order
        $order->id_pelanggan = $request->id_pelanggan;
        $order->id_layanan = $request->id_layanan;
        $order->qty = $qty; // Simpan nilai qty yang sudah diubah menjadi float
        $order->save();

        return redirect('/order')->with('success', 'Data order berhasil diperbarui.');
    }
    public function destroy($id_order)
    {
        $order=Order::find($id_order);
        $order->delete();
        return redirect('/order');
    }
    public function cetak($id_order)
    {
        $tanggal = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y');
        $jam = Carbon::now()->locale('id')->isoFormat('HH:mm');
        $profil = Profil::first();
        // Jika Anda ingin memuat data pelanggan dan produk dalam satu query, gunakan with()
        $transaksi = Order::with('pelanggan', 'produk')->findOrFail($id_order);

        // Hitung estimasi tanggal selesai berdasarkan created_at dan durasi produk
        $estimasiSelesai = Carbon::parse($transaksi->created_at)
            ->addDays($transaksi->produk->durasi);

        // Tambahkan estimasi tanggal selesai ke dalam variabel $transaksi
        $transaksi->estimasi_selesai = $estimasiSelesai;

        return view('admin.order.cetak', [
            'transaksi' => $transaksi,
            'profil' => $profil,
            'tanggal' => $tanggal,
            'jam' => $jam,
        ]);
    }
}
