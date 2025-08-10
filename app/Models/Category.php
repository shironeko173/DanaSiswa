<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
     //menghubungkan ke post
     public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeSearching($query){
        if(request('search')){
            return $query->where('name','LIKE','%' . request('search') . '%') ;
        }
    }
}
 