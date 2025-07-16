<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

// Admin::create([
//     'username' => 'admin',
//     'password' => Hash::make('admin123'), // ✅ Aman karena sudah bcrypt
//     'nama_admin' => 'Administrator',
// ]);

class Admin extends Model
{
    protected $table = 'admin'; // karena nama tabel kamu adalah 'admin', bukan 'admins'
    protected $primaryKey = 'id_admin';
    public $timestamps = false;
    protected $fillable = [
        'nama_admin',
        'username',
        'password',
        
    ];
}
