<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductImage;
use Faker\Generator as Faker;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition()
    {
        return [
            'product_id' => factory(Product::class),
            'image' => $this->faker->imageUrl(200, 200, 'products', true),
        ];
    }
}
