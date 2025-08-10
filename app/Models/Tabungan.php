<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    protected $table = 'tabungan';
    protected $guarded = ['id'];
 
    protected $hidden = [];

    public function user() 
    //berarti ketika lagi memakai table database tabungan($tabungan) trus mau nampilin isi di table databse users pakai
    //  $tabungan->user->username, untuk menghubungkannya
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
