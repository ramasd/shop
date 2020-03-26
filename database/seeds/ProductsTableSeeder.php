<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name' => 'Product 1',
            'description' => 'Product 1 Description',
            'price' => 11.11,
            'photo' => '',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Product 2',
            'description' => 'Product 2 Description',
            'price' => 22.22,
            'photo' => '',
            'category_id' => 2,
        ]);

        \App\Product::create([
            'name' => 'Product 3',
            'description' => 'Product 3 Description',
            'price' => 33.33,
            'photo' => '',
            'category_id' => 3,
        ]);

        \App\Product::create([
            'name' => 'Product 4',
            'description' => 'Product 4 Description',
            'price' => 44.44,
            'photo' => '',
            'category_id' => null,
        ]);

        \App\Product::create([
            'name' => 'Product 5',
            'description' => 'Product 5 Description',
            'price' => 55.55,
            'photo' => '',
            'category_id' => 1,
        ]);
    }
}
