<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::Create([
            'name' => 'html',
            'slug' => 'html',
            'images' => 'defult.png',
        ]);
        Category::Create([
            'name' => 'css',
            'slug' => 'css', 'images' => 'defult.png',
        ]);
        Category::Create([
            'name' => 'javascript',
            'slug' => 'javascript', 'images' => 'defult.png',
        ]);
        Category::Create([
            'name' => 'bootstrap',
            'slug' => 'bootstrap', 'images' => 'defult.png',
        ]);
        Category::Create([
            'name' => 'php',
            'slug' => 'php', 'images' => 'defult.png',
        ]);
        Category::Create([
            'name' => 'laravel',
            'slug' => 'laravel', 'images' => 'defult.png',
        ]);
        Category::Create([
            'name' => 'django',
            'slug' => 'django', 'images' => 'defult.png',
        ]);
    }
}
