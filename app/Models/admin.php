<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin'; // karena nama tabel kamu adalah 'admin', bukan 'admins'
    protected $primaryKey = 'id_admin';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'nama_admin',
    ];
}
