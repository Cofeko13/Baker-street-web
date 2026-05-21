<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Багет', 'description' => 'Хрустящая корочка, воздушный мякиш — по французскому рецепту.', 'price' => '120 ₽', 'emoji' => '🥖', 'sort_order' => 1],
            ['name' => 'Круассан', 'description' => 'Слоёное тесто с маслом, выпекаем каждое утро.', 'price' => '95 ₽', 'emoji' => '🥐', 'sort_order' => 2],
            ['name' => 'Сметанник', 'description' => 'Нежный бисквит, сметана и ягодный топпинг.', 'price' => '280 ₽', 'emoji' => '🍰', 'sort_order' => 3],
            ['name' => 'Булочка с корицей', 'description' => 'Тёплая, ароматная — идеальна к кофе.', 'price' => '85 ₽', 'emoji' => '🧁', 'sort_order' => 4],
            ['name' => 'Хлеб на закваске', 'description' => 'Долгая ферментация, насыщенный вкус.', 'price' => '350 ₽', 'emoji' => '🍞', 'sort_order' => 5],
            ['name' => 'Пирожок с яблоком', 'description' => 'Домашнее тесто и свежие яблоки из печи.', 'price' => '70 ₽', 'emoji' => '🥧', 'sort_order' => 6],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}