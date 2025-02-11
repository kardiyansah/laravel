<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_name = ['Web Programming', 'Web Design', 'Personal', 'Business'];

        for ($i = 0; $i < count($categories_name); $i++) {
            Category::create([
                'name' => $categories_name[$i],
                'slug' => Str::slug($categories_name[$i], '-')
            ]);
        }
    }
}
