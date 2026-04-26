<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arus extends Model
{
    use HasFactory;

    protected $table = 'tb_arus';
    protected $primaryKey = 'id_arus';
    protected $dates = ['tgl'];


    // Jika ada kolom created_at dan updated_at dalam tabel
    // public $timestamps = false;

    protected $fillable = ['kode', 'nama', 'arus','tgl', 'total','saldo'];
}
