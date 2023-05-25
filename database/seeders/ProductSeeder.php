<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

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

        foreach (range(1,30) as $index)
        {
            Product::create([
                'name' => $faker->name,
                'slug' => Str::slug($faker->name),
                'category_id' => $faker->randomNumber(),
                'brand_id' => $faker->randomNumber(),
                'price' => '200',
                'qty' =>'20',
                'short_description' => $faker->sentence,
                'long_description' => $faker->sentence,
                'image' => '1683350098.jpg',
                'gallery_image' => '["64592930587ff_1683564848.png","64592930598ce_1683564848.png","645929305a3e7_1683564848.png"]',
                'type' => 'top',
            ]);
        }

        foreach (range(1,30) as $index)
        {
            Product::create([
                'name' => $faker->name,
                'slug' => Str::slug($faker->name),
                'category_id' => $faker->randomNumber(),
                'brand_id' => $faker->randomNumber(),
                'price' => '200',
                'qty' =>'20',
                'short_description' => $faker->sentence,
                'long_description' => $faker->sentence,
                'image' => '1683350098.jpg',
                'gallery_image' => '["64592930587ff_1683564848.png","64592930598ce_1683564848.png","645929305a3e7_1683564848.png"]',
                'type' => 'new',
            ]);
        }

        foreach (range(1,30) as $index)
        {
            Product::create([
                'name' => $faker->name,
                'slug' => Str::slug($faker->name),
                'category_id' => $faker->randomNumber(),
                'brand_id' => $faker->randomNumber(),
                'price' => '200',
                'qty' =>'20',
                'short_description' => $faker->sentence,
                'long_description' => $faker->sentence,
                'image' => '1683350098.jpg',
                'gallery_image' => '["64592930587ff_1683564848.png","64592930598ce_1683564848.png","645929305a3e7_1683564848.png"]',
                'type' => 'discount',
            ]);
        }
    }
}
