<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'username',
        'password',
        'email',
        'fullname',
        'lastlogin',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'lastlogin' => 'datetime',
        'password' => 'hashed',
    ];

    public function spooring()
    {
        return $this->hasOne(Spooring::class);
    }
}
