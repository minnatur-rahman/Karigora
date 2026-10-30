<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'মোটর রিওয়াইন্ডিং',
                'slug' => 'motor-rewinding',
                'description' => 'মোটর ও পানির পাম্প মেরামত এবং রিওয়াইন্ডিং।',
                'icon' => '⚙️',
                'is_active' => true,
            ],
            [
                'name' => 'এসি টেকনিশিয়ান',
                'slug' => 'ac-technician',
                'description' => 'এসি সার্ভিসিং, ইনস্টলেশন ও মেরামত।',
                'icon' => '❄️',
                'is_active' => true,
            ],
            [
                'name' => 'প্লাম্বার',
                'slug' => 'plumber',
                'description' => 'পানির পাইপ, কল ও লিকেজ মেরামত।',
                'icon' => '🔧',
                'is_active' => true,
            ],
            [
                'name' => 'ইলেকট্রিশিয়ান',
                'slug' => 'electrician',
                'description' => 'বৈদ্যুতিক লাইন ও যন্ত্রপাতি মেরামত।',
                'icon' => '⚡',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
