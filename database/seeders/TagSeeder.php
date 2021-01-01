<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::Create([
            'name' => 'html',
            'slug' => 'html',
        ]);
        Tag::Create([
            'name' => 'css',
            'slug' => 'css',
        ]);
        Tag::Create([
            'name' => 'javascript',
            'slug' => 'javascript',
        ]);
        Tag::Create([
            'name' => 'bootstrap',
            'slug' => 'bootstrap',
        ]);
        Tag::Create([
            'name' => 'php',
            'slug' => 'php',
        ]);
        Tag::Create([
            'name' => 'laravel',
            'slug' => 'laravel',
        ]);
        Tag::Create([
            'name' => 'django',
            'slug' => 'django',
        ]);
    }
}
