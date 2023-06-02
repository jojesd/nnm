<?php


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // Criar usuários
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'),
        ]);

        // Criar produtos e imagens
        for ($i = 1; $i <= 10; $i++) {
            $product = Product::create([
                'name' => $faker->word,
                'code' => $faker->unique()->randomNumber(4),
                'price' => $faker->randomFloat(2, 10, 100),
            ]);

            for ($j = 1; $j <= 5; $j++) {
                $imagePath = $faker->image('public/images', 200, 200, 'products', false);
                $imageFileName = basename($imagePath);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imageFileName,
                ]);
            }
        }
        $this->call(DatabaseSeeder::class);

    }
}
