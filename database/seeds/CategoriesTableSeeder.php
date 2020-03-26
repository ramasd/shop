<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Category 1'
        ]);

        \App\Category::create([
            'name' => 'Category 2'
        ]);

        \App\Category::create([
            'name' => 'Category 3'
        ]);
    }
}
