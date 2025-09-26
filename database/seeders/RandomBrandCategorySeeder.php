<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;

class RandomBrandCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();

        Brand::all()->each(function ($brand) use ($categoryIds) {
            $brand->category_id = $categoryIds[array_rand($categoryIds)];
            $brand->save();
        });
    }
}
