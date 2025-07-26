<?php

namespace Database\Seeders;
use App\Models\Faq;
use App\Models\FaqCategory;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
{
    $categories = [
        'General',
        'Account',
        'Payments',
        'Technical',
        'Policies'
    ];

    foreach ($categories as $catName) {
        $cat = FaqCategory::create(['name' => $catName]);

        for ($i = 1; $i <= 10; $i++) {
            Faq::create([
                'faq_category_id' => $cat->id,
                'question' => "Sample Question {$i} in {$catName}?",
                'answer'   => "This is the answer to Sample Question {$i} in {$catName} category."
            ]);
        }
    }
}

}
