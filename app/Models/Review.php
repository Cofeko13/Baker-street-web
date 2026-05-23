<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'rating',
        'product_ordered',
        'review',
        'is_approved',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
    ];

    // Получить только одобренные отзывы
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // Получить топ-отзывы (4-5 звезд)
    public function scopeTopRated($query)
    {
        return $query->where('rating', '>=', 4);
    }

    // Последние отзывы
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}