<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function category()
    {
        return $this->belongsTo(Category::class);
    }
    function productImages()
    {
        return $this->hasMany(ProductGallery::class);
    }
    function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
    function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
