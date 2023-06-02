<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->randomNumber(4),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
