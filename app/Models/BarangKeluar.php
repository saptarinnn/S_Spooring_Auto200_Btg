<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barangklr';
    protected $fillable = [
        'barang_id', 'pengguna_id', 'jmlhbarangklr', 'tglbarangklr'
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
