<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    use HasFactory;
    protected $table = 'penarikan';
    protected $guarded = ['id'];
 
    protected $hidden = [];

    public function user()
    //berarti ketika lagi memakai table database tabungan($penarikan) trus mau nampilin isi di table databse users pakai
    //  $penarikan->user->username, untuk menghubungkannya
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
