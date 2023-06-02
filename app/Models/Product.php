<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function images()
{
    return $this->hasMany(ProductImage::class);
}

    protected $fillable = [
        'name', 'code', 'image', 'price',
    ];
}
