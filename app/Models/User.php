<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // WAJIB: Tentukan nama tabel dan primary key kustom Anda
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'role',
        'status_aktif',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}