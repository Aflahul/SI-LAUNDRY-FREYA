<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'tb_pengeluaran';
    protected $fillable = ['kd_pengeluaran', 'pengeluaran', 'desk', 'jumlah', 'operator', 'waktu'];
    protected $primaryKey = 'id_pengeluaran';
    public $incrementing = true;
    protected $keyType = 'int';
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator', 'id_user');
    }
}
