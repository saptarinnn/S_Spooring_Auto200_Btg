<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barangmsk';
    protected $fillable = [
        'barang_id', 'pengguna_id', 'jmlhbarangmsk', 'tglbarangmsk'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }
}
