<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve(Review $review)
    {
        $review->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Отзыв опубликован');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'Отзыв удален');
    }
}