<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillable=['product_id','category_id'];

    function productId()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    function categoryId()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }

    function productIds()
    {
        return $this->belongsToMany(Product::class,'product_id','id');
    }

    function categoryIds()
    {
        return $this->belongsToMany(category::class,'category_id','id');
    }
}