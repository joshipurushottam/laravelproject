<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];
    
    function allproduct()
    {
        return $this->hasMany(CategoryProduct::class,'category_id','id');
    }

    function product()
    {
        return $this->hasOne(CategoryProduct::class,'category_id','id');
    }
}
