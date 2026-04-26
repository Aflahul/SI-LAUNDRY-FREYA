<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tb_order';
    protected $primaryKey = 'id_order';
    public $incrementing = true;
    protected $keyType = 'int';
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_layanan');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($order) {
            // Mengupdate kolom "total order" di tabel tb_pelanggan secara otomatis
            $pelanggan = $order->pelanggan;
            if ($pelanggan) {
                $pelanggan->total_order = $pelanggan->orders()->count();
                $pelanggan->save();
            }
        });

        static::updated(function ($order) {
            // Jika id_pelanggan berubah, update kedua pelanggan (lama dan baru)
            if ($order->isDirty('id_pelanggan')) {
                $oldPelangganId = $order->getOriginal('id_pelanggan');
                $newPelangganId = $order->id_pelanggan;

                $oldPelanggan = Pelanggan::find($oldPelangganId);
                if ($oldPelanggan) {
                    $oldPelanggan->total_order = $oldPelanggan->orders()->count();
                    $oldPelanggan->save();
                }

                $newPelanggan = Pelanggan::find($newPelangganId);
                if ($newPelanggan) {
                    $newPelanggan->total_order = $newPelanggan->orders()->count();
                    $newPelanggan->save();
                }
            }
        });

        static::deleted(function ($order) {
            // Mengupdate kolom "total order" saat data dihapus
            $pelanggan = $order->pelanggan;
            if ($pelanggan) {
                $pelanggan->total_order = $pelanggan->orders()->count();
                $pelanggan->save();
            }
        });
    }
}
