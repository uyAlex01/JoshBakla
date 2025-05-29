<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;  // Add this import
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Concerts', 'slug' => 'concerts', 'icon' => 'bi-music-note-beamed'],
            ['name' => 'Festivals', 'slug' => 'festivals', 'icon' => 'bi-people-fill'],
            ['name' => 'Parties', 'slug' => 'parties', 'icon' => 'bi-balloon-fill'],
            ['name' => 'Sports', 'slug' => 'sports', 'icon' => 'bi-trophy-fill'],
            ['name' => 'Theater', 'slug' => 'theater', 'icon' => 'bi-mask'],
        ];
        
        // Using insert() for better performance on multiple records
        DB::table('categories')->insert($categories);
    }
}
