<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        if ($categories->count() === 0) {
            $this->command->info('No categories found. Please run CategorySeeder first.');
            return;
        }

        foreach (range(1, 20) as $i) {
            Post::create([
                'category_id' => $categories->random()->id,
                'title'       => 'Sample Post Title ' . $i,
                'content'     => 'This is a dummy blog content for post number ' . $i . '. ' . Str::random(100),
                'image'       => "https://via.placeholder.com/600x400?text=Post+$i",
            ]);
        }
    }
}

