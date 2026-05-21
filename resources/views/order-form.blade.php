@extends('layouts.app')

@section('title', 'Оставить заявку — Baker Street')

@section('content')
<header class="fixed inset-x-0 top-0 z-50 border-b border-brown-200/60 bg-cream/90 backdrop-blur-md">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
        <a href="/" class="font-display text-2xl font-semibold tracking-tight text-brown-900">
            Baker <span class="text-amber-700">Street</span>
        </a>
        <nav class="hidden items-center gap-8 text-sm font-medium text-brown-700 md:flex">
            <a href="/#about" class="transition hover:text-amber-800">О нас</a>
            <a href="/#menu" class="transition hover:text-amber-800">Меню</a>
            <a href="/#contact" class="transition hover:text-amber-800">Контакты</a>
        </nav>
        <a href="{{ route('order.create') }}" class="rounded-full bg-amber-800 px-5 py-2.5 text-sm font-semibold text-cream shadow-sm transition hover:bg-amber-900">
            Оставить заявку
        </a>
    </div>
</header>

<main class="pt-32 pb-20">
    <div class="mx-auto max-w-2xl px-6">
        <div class="text-center mb-12">
            <h1 class="font-display text-4xl font-semibold text-brown-900 mb-4">Оставить заявку</h1>
            <p class="text-brown-600">Заполните форму, и мы свяжемся с вами для подтверждения заказа</p>
        </div>

        <div class="bg-white rounded-2xl border border-brown-200/80 p-8 shadow-sm">
            <form action="{{ route('order.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="full_name" class="block text-sm font-medium text-brown-800 mb-2">ФИО *</label>
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
                    <label for="phone" class="block text-sm font-medium text-brown-800 mb-2">Номер телефона *</label>
                    <input type="tel" 
                           name="phone" 
                           id="phone" 
                           value="{{ old('phone') }}"
                           placeholder="+7 (___) ___-__-__"
                           class="w-full px-4 py-3 border border-brown-300 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition bg-cream/50"
                           required>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-brown-800 mb-2">Описание заказа</label>
                    <textarea name="description" 
                              id="description" 
                              rows="5"
                              class="w-full px-4 py-3 border border-brown-300 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition bg-cream/50"
                              placeholder="Напишите, что хотите заказать: хлеб, пирожные, торт на заказ и т.д.">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 bg-amber-800 text-cream font-semibold py-3 rounded-xl hover:bg-amber-900 transition shadow-md">
                        Отправить заявку
                    </button>
                    <a href="/" 
                       class="flex-1 text-center border border-brown-300 text-brown-700 font-semibold py-3 rounded-xl hover:bg-brown-50 transition">
                        Вернуться назад
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<footer class="border-t border-brown-200/80 bg-brown-900 text-brown-200 mt-20">
    <div class="mx-auto max-w-6xl px-6 py-12 text-center">
        <p class="text-sm">© {{ date('Y') }} Baker Street. Все права защищены.</p>
    </div>
</footer>
@endsection