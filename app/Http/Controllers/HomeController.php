<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Берём только активные товары, отсортированные по sort_order
        $products = Product::active()->sorted()->get();
        
        // Если в базе нет товаров, показываем демо-товары (для старта)
        if ($products->isEmpty()) {
            $products = collect([
                (object) [
                    'name' => 'Багет',
                    'description' => 'Хрустящая корочка, воздушный мякиш — по французскому рецепту.',
                    'price' => '120 ₽',
                    'emoji' => '🥖',
                ],
                (object) [
                    'name' => 'Круассан',
                    'description' => 'Слоёное тесто с маслом, выпекаем каждое утро.',
                    'price' => '95 ₽',
                    'emoji' => '🥐',
                ],
                (object) [
                    'name' => 'Сметанник',
                    'description' => 'Нежный бисквит, сметана и ягодный топпинг.',
                    'price' => '280 ₽',
                    'emoji' => '🍰',
                ],
            ]);
        }

        return view('home', compact('products'));
    }
}