<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->integer('rating'); // 1-5 звезд
            $table->string('product_ordered')->nullable(); // что заказали
            $table->text('review');
            $table->boolean('is_approved')->default(false); // модерация
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};