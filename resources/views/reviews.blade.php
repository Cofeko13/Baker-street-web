@extends('layouts.app')

@section('title', 'Отзывы — Baker Street')

@section('content')
<header class="fixed inset-x-0 top-0 z-50 border-b border-brown-200/60 bg-cream/90 backdrop-blur-md">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
        <a href="/" class="font-display text-2xl font-semibold tracking-tight text-brown-900">
            Baker <span class="text-amber-700">Street</span>
        </a>
        <nav class="hidden items-center gap-8 text-sm font-medium text-brown-700 md:flex">
            <a href="/#about" class="transition hover:text-amber-800">О нас</a>
            <a href="/#menu" class="transition hover:text-amber-800">Меню</a>
            <a href="/#map" class="transition hover:text-amber-800">Как нас найти</a>
            <a href="/reviews" class="transition text-amber-800 font-semibold">Отзывы</a>
            <a href="/admin/orders" target="_blank" class="transition text-amber-700 hover:text-amber-900 border border-amber-300 px-3 py-1 rounded-full text-xs">⚙️</a>
        </nav>
        <a href="{{ route('order.create') }}" class="rounded-full bg-amber-800 px-5 py-2.5 text-sm font-semibold text-cream shadow-sm transition hover:bg-amber-900">
            Сделать заказ
        </a>
    </div>
</header>

<main class="pt-32 pb-20">
    <div class="mx-auto max-w-6xl px-6">
        <!-- Заголовок -->
        <div class="text-center mb-12">
            <h1 class="font-display text-4xl font-semibold text-brown-900 mb-4">Отзывы наших гостей</h1>
            <p class="text-brown-600 max-w-2xl mx-auto">
                Более 2000 довольных клиентов. Поделитесь своим впечатлением о нашей выпечке!
            </p>
        </div>

        <!-- Топ-4 лучших отзыва -->
        <div class="mb-20">
            <div class="flex items-center justify-between mb-8">
                <h2 class="font-display text-2xl font-semibold text-brown-900">⭐ Лучшие отзывы</h2>
                <div class="flex gap-1">
                    <span class="text-yellow-400 text-xl">★★★★★</span>
                    <span class="text-brown-600 ml-2">4.9 средний рейтинг</span>
                </div>
            </div>

            @if($topReviews->count() > 0)
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @foreach($topReviews as $review)
                        <div class="bg-white rounded-2xl border border-brown-200/80 p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-2xl">👤</span>
                                <div>
                                    <p class="font-semibold text-brown-900">{{ $review->full_name }}</p>
                                    <p class="text-xs text-brown-500">{{ $review->created_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                            <div class="flex text-yellow-400 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <span>★</span>
                                    @else
                                        <span class="text-gray-300">★</span>
                                    @endif
                                @endfor
                            </div>
                            @if($review->product_ordered)
                                <p class="text-xs text-amber-600 mb-2">🍽️ Заказал: {{ $review->product_ordered }}</p>
                            @endif
                            <p class="text-brown-600 text-sm leading-relaxed line-clamp-4">{{ $review->review }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl border border-brown-200/80">
                    <p class="text-brown-500">Пока нет отзывов. Будьте первым!</p>
                </div>
            @endif
        </div>

        <!-- Форма добавления отзыва -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl border border-brown-200/80 p-8 shadow-sm">
                <h2 class="font-display text-2xl font-semibold text-brown-900 text-center mb-6">
                    ✍️ Оставить отзыв
                </h2>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="full_name" class="block text-sm font-medium text-brown-800 mb-2">Ваше имя *</label>
                        <input type="text" 
                               name="full_name" 
                               id="full_name" 
                               value="{{ old('full_name') }}"
                               class="w-full px-4 py-3 border border-brown-300 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition bg-cream/50"
                               required>
                        @error('full_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="rating" class="block text-sm font-medium text-brown-800 mb-2">Оценка *</label>
                        <div class="flex gap-2 flex-wrap">
                            @for($i = 1; $i <= 5; $i++)
                                <label class="flex flex-col items-center cursor-pointer">
                                    <input type="radio" 
                                           name="rating" 
                                           value="{{ $i }}" 
                                           {{ old('rating') == $i ? 'checked' : '' }}
                                           class="hidden peer"
                                           required>
                                    <div class="w-12 h-12 flex items-center justify-center text-2xl border border-brown-300 rounded-xl hover:border-amber-400 peer-checked:bg-amber-100 peer-checked:border-amber-500 transition">
                                        @if($i == 1) 😞
                                        @elseif($i == 2) 😐
                                        @elseif($i == 3) 🙂
                                        @elseif($i == 4) 😊
                                        @elseif($i == 5) 😍
                                        @endif
                                    </div>
                                    <span class="text-xs mt-1 text-brown-600">{{ $i }}</span>
                                </label>
                            @endfor
                        </div>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="product_ordered" class="block text-sm font-medium text-brown-800 mb-2">Что заказали? (необязательно)</label>
                        <input type="text" 
                               name="product_ordered" 
                               id="product_ordered" 
                               value="{{ old('product_ordered') }}"
                               placeholder="Например: Багет, Круассан, Сметанник..."
                               class="w-full px-4 py-3 border border-brown-300 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition bg-cream/50">
                        @error('product_ordered')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="review" class="block text-sm font-medium text-brown-800 mb-2">Ваш отзыв *</label>
                        <textarea name="review" 
                                  id="review" 
                                  rows="5"
                                  class="w-full px-4 py-3 border border-brown-300 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition bg-cream/50"
                                  placeholder="Поделитесь впечатлениями о нашей выпечке, обслуживании или атмосфере..."
                                  required>{{ old('review') }}</textarea>
                        @error('review')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                            class="w-full bg-amber-800 text-cream font-semibold py-3 rounded-xl hover:bg-amber-900 transition shadow-md">
                        Отправить отзыв
                    </button>
                    <p class="text-xs text-center text-brown-400 mt-4">
                        Все отзывы проходят модерацию перед публикацией
                    </p>
                </form>
            </div>
        </div>
    </div>
</main>

<footer class="border-t border-brown-200/80 bg-brown-900 text-brown-200 mt-20">
    <div class="mx-auto max-w-6xl px-6 py-12 text-center">
        <p class="text-sm">© {{ date('Y') }} Baker Street. Все права защищены.</p>
    </div>
</footer>

<style>
    .line-clamp-4 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection