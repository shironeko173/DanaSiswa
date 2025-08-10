<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeSearching($query){
        if(request('search')){
            return $query->where('question','LIKE','%' . request('search') . '%')
                        ->orWhere('answer','LIKE','%'.request('search').'%');
        }
    }
}
