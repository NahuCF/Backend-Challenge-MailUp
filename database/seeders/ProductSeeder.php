<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 1000) as $index) {
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->paragraph(),
                'image' => $faker->imageUrl(),
                'brand' => $faker->word(),
                'price' => $faker->randomNumber(1),
                'price_sale' => $faker->randomNumber(1),
                'category' => $faker->word(),
                'stock' => $faker->randomNumber(),
            ]);
        }
    }
}
