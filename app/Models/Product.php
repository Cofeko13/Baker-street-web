<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'emoji',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Scope для активных товаров
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope для сортировки
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}