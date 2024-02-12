<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spooring extends Model
{
    use HasFactory;
    protected $table = 'spooring';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'booking_id', 'pengguna_id', 'spooringdate', 'spooringdesc', 'spooringfinish'
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class);
    }
}
