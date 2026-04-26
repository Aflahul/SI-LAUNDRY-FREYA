<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profil;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Artikel;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('admin'),
                'confir_password' => Hash::make('admin'),
                'level' => 'admin',
            ]
        );

        // 2. Seed Profil Laundry
        Profil::updateOrCreate(
            ['id_laundry' => 1],
            [
                'nama_laundry' => 'Freya Laundry',
                'tagline' => 'Cuci Bersih, Hati Tenang',
                'desk' => 'Layanan laundry premium dengan teknologi terkini dan ramah lingkungan.',
                'alamat' => 'Jl. Mawar No. 123, Jakarta',
                'kontak' => '081234567890',
                'latitude' => '-6.200000',
                'longitude' => '106.816666',
            ]
        );

        // 3. Seed Layanan (Produk)
        $layanan = [
            [
                'nama_layanan' => 'Cuci Kering Reguler',
                'durasi' => '2 Hari',
                'desk' => 'Cuci kering lipat rapi.',
                'desk2' => 'Estimasi 48 jam.',
                'desk3' => '-',
                'satuan' => 'Kg',
                'harga' => 6000,
            ],
            [
                'nama_layanan' => 'Cuci Setrika Express',
                'durasi' => '1 Hari',
                'desk' => 'Cuci bersih dan setrika licin.',
                'desk2' => 'Estimasi 24 jam.',
                'desk3' => '-',
                'satuan' => 'Kg',
                'harga' => 10000,
            ],
            [
                'nama_layanan' => 'Dry Clean Jas',
                'durasi' => '3 Hari',
                'desk' => 'Perawatan khusus untuk jas dan gaun.',
                'desk2' => 'Menggunakan chemical premium.',
                'desk3' => '-',
                'satuan' => 'Pcs',
                'harga' => 25000,
            ],
        ];

        foreach ($layanan as $l) {
            Produk::updateOrCreate(['nama_layanan' => $l['nama_layanan']], $l);
        }

        // 4. Seed Pelanggan
        $pelanggan = [
            [
                'namapel' => 'Budi Santoso',
                'kontak' => '081122334455',
                'alamat' => 'Perumahan Indah Blok A1',
                'sedang_cuci' => 'Tidak',
            ],
            [
                'namapel' => 'Siti Aminah',
                'kontak' => '085566778899',
                'alamat' => 'Apartemen Gading Lantai 5',
                'sedang_cuci' => 'Tidak',
            ],
        ];

        foreach ($pelanggan as $p) {
            Pelanggan::updateOrCreate(['kontak' => $p['kontak']], $p);
        }

        // 5. Seed Artikel
        Artikel::updateOrCreate(
            ['judul' => 'Tips Merawat Pakaian Agar Awet'],
            [
                'Isi' => 'Merawat pakaian membutuhkan perhatian khusus, mulai dari cara mencuci hingga menjemur...',
                'waktu' => now(),
                'status' => 'Publish',
            ]
        );
    }
}
