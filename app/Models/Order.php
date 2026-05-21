<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_PREPARING = 'preparing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DECLINED = 'declined';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'Новый',
            self::STATUS_PREPARING => 'Готовится',
            self::STATUS_SHIPPED => 'Отправлен',
            self::STATUS_DECLINED => 'Отклонен',
        ];
    }

    public function getStatusLabelAttribute()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }
}