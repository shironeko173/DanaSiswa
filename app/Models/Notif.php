<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;
    protected $table = 'notif';

    protected $guarded = ['id'];
 
    protected $hidden = [];

    public function user()
    //berarti ketika lagi memakai table database tabungan($deposit) trus mau nampilin isi di table databse users pakai
    //  $penarikan->user->username, untuk menghubungkannya
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
