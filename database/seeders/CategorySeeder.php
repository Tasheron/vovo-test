<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Смартфоны',
            'Ноутбуки',
            'Телевизоры',
            'Планшеты',
            'Умные часы',
            'Наушники',
            'Фотоаппараты',
            'Игровые консоли',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}