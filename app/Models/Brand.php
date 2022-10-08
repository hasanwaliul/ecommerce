<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoryfuncB(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function subcategoryfuncB(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }
}
