<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Cria 10 produtos
        $products = factory(Product::class, 10)->create();

        // Para cada produto criado, crie 5 imagens relacionadas
        foreach ($products as $product) {
            factory(ProductImage::class, 5)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
