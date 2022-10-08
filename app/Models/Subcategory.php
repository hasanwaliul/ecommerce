<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Old technique

    // public function category(){
    //     return $this->belongsTo('App\Models\Category', 'category_id');
    // }

    public function categoryfunc(){
        return $this->belongsTo(Category::class,'category_id', 'category_id');
    }

}
