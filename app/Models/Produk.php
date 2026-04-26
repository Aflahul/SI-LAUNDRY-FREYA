<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'tb_layanan';
    protected $primaryKey = 'id_layanan';
    protected $fillable = [ 'durasi', 'nama_layanan', 'desk', 'desk2', 'satuan', 'harga'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_layanan');
    }
}
