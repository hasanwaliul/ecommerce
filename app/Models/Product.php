<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoryfuncProd(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function subcategoryfuncProd(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }

    public function subsubcategoryfuncProd(){
        return $this->belongsTo(SubsubCategory::class, 'subsubcategory_id', 'subsubcategory_id');
    }

    public function brandfuncProd(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }


}
