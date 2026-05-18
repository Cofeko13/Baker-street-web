<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => [
                [
                    'name' => 'Багет',
                    'description' => 'Хрустящая корочка, воздушный мякиш — по французскому рецепту.',
                    'price' => '120 ₽',
                    'emoji' => '🥖',
                ],
                [
                    'name' => 'Круассан',
                    'description' => 'Слоёное тесто с маслом, выпекаем каждое утро.',
                    'price' => '95 ₽',
                    'emoji' => '🥐',
                ],
                [
                    'name' => 'Сметанник',
                    'description' => 'Нежный бисквит, сметана и ягодный топпинг.',
                    'price' => '280 ₽',
                    'emoji' => '🍰',
                ],
                [
                    'name' => 'Булочка с корицей',
                    'description' => 'Тёплая, ароматная — идеальна к кофе.',
                    'price' => '85 ₽',
                    'emoji' => '🧁',
                ],
                [
                    'name' => 'Хлеб на закваске',
                    'description' => 'Долгая ферментация, насыщенный вкус.',
                    'price' => '350 ₽',
                    'emoji' => '🍞',
                ],
                [
                    'name' => 'Пирожок с яблоком',
                    'description' => 'Домашнее тесто и свежие яблоки из печи.',
                    'price' => '70 ₽',
                    'emoji' => '🥧',
                ],
            ],
        ]);
    }
}
