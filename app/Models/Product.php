<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['product_name','product_price', 'photo','discount','mfd','quantity'];
    function allcategory(){
        return $this->hasMany(CategoryProduct::class,'product_id','id');
    }
    function category(){
        return $this->hasOne(CategoryProduct::class,'product_id','id');
    }
}
