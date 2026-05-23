<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        // 4 последних отзыва с 4-5 звездами
        $topReviews = Review::approved()
            ->topRated()
            ->latest()
            ->take(4)
            ->get();

        return view('reviews', compact('topReviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'product_ordered' => 'nullable|string|max:255',
            'review' => 'required|string|min:10|max:2000',
        ]);

        // Сохраняем отзыв (требует модерации)
        Review::create($validated);

        return redirect()->route('reviews')->with('success', 'Спасибо за отзыв! Он будет опубликован после проверки.');
    }
}