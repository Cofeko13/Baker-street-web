@extends('layouts.app')

@section('title', 'Заявка отправлена — Baker Street')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 bg-cream">
    <div class="text-center max-w-md">
        <div class="text-8xl mb-6">✅</div>
        <h1 class="font-display text-3xl font-semibold text-brown-900 mb-4">Заявка отправлена!</h1>
        <p class="text-brown-600 mb-8">Спасибо за ваш заказ. Мы свяжемся с вами в ближайшее время для подтверждения.</p>
        <a href="/" class="inline-block bg-amber-800 text-cream font-semibold px-8 py-3 rounded-xl hover:bg-amber-900 transition">
            Вернуться на главную
        </a>
    </div>
</div>
@endsection