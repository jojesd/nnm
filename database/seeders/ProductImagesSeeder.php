<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        // Crie as imagens dos produtos aqui
        // Por exemplo:
        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            ProductImage::factory()->count(5)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
