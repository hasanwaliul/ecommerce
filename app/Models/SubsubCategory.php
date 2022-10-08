<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoryfuncSubsub(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function subcategoryfuncSubsub(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }
}
