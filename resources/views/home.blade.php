@extends('layouts.app')

@section('title', 'Baker Street — пекарня')

@section('content')
    <header class="fixed inset-x-0 top-0 z-50 border-b border-brown-200/60 bg-cream/90 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="/" class="font-display text-2xl font-semibold tracking-tight text-brown-900">
                Baker <span class="text-amber-700">Street</span>
            </a>
            <nav class="hidden items-center gap-8 text-sm font-medium text-brown-700 md:flex">
                <a href="#about" class="transition hover:text-amber-800">О нас</a>
                <a href="#menu" class="transition hover:text-amber-800">Меню</a>
                <a href="#map" class="transition hover:text-amber-800">Как нас найти</a>
                <a href="/reviews" class="transition hover:text-amber-800">Отзывы</a>
                <a href="/admin/orders" target="_blank" class="transition text-amber-700 hover:text-amber-900 border border-amber-300 px-3 py-1 rounded-full text-xs">⚙️</a>
            </nav>
            <a href="{{ route('order.create') }}" class="rounded-full bg-amber-800 px-5 py-2.5 text-sm font-semibold text-cream shadow-sm transition hover:bg-amber-900">
                Сделать заказ
            </a>
        </div>
    </header>

    <main>
        {{-- Hero --}}
        <section class="relative overflow-hidden pt-28 pb-20 md:pt-36 md:pb-28">
            <div class="absolute -top-24 right-0 h-96 w-96 rounded-full bg-amber-200/40 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-brown-200/50 blur-3xl"></div>

            <div class="relative mx-auto grid max-w-6xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-16">
                <div>
                    <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-amber-300/60 bg-amber-50 px-4 py-1.5 text-sm font-medium text-amber-900">
                        <span class="h-2 w-2 rounded-full bg-amber-600"></span>
                        Свежая выпечка каждый день
                    </p>
                    <h1 class="font-display text-4xl leading-tight font-semibold text-brown-900 md:text-5xl lg:text-6xl">
                        Хлеб с душой<br>
                        <span class="text-amber-800">на Baker Street</span>
                    </h1>
                    <p class="mt-6 max-w-lg text-lg leading-relaxed text-brown-600">
                        Домашняя пекарня в центре города: натуральные ингредиенты,
                        ремесленная выпечка и аромат свежего хлеба с раннего утра.
                    </p>
                    <div class="mt-10 flex flex-wrap gap-4">
                        <a href="#menu" class="rounded-full bg-amber-800 px-8 py-3.5 font-semibold text-cream shadow-md transition hover:bg-amber-900 hover:shadow-lg">
                            Смотреть меню
                        </a>
                        <a href="#map" class="rounded-full border border-brown-300 bg-white/60 px-8 py-3.5 font-semibold text-brown-800 transition hover:border-amber-400 hover:bg-white">
                            Как нас найти
                        </a>
                    </div>
                    <dl class="mt-12 grid grid-cols-3 gap-6 border-t border-brown-200/80 pt-10">
                        <div>
                            <dt class="font-display text-3xl font-semibold text-amber-800">12+</dt>
                            <dd class="mt-1 text-sm text-brown-600">лет опыта</dd>
                        </div>
                        <div>
                            <dt class="font-display text-3xl font-semibold text-amber-800">40+</dt>
                            <dd class="mt-1 text-sm text-brown-600">видов выпечки</dd>
                        </div>
                        <div>
                            <dt class="font-display text-3xl font-semibold text-amber-800">6:00</dt>
                            <dd class="mt-1 text-sm text-brown-600">открываемся</dd>
                        </div>
                    </dl>
                </div>

                <div class="relative">
                    <div class="aspect-square overflow-hidden rounded-3xl border border-brown-200/80 bg-gradient-to-br from-amber-100 via-cream to-brown-100 shadow-2xl shadow-brown-900/10">
                        <div class="flex h-full flex-col items-center justify-center gap-4 p-8 text-center">
                            <span class="text-8xl md:text-9xl" role="img" aria-hidden="true">🥖</span>
                            <p class="font-display text-xl font-medium text-brown-800">Свежий хлеб из печи</p>
                            <p class="text-sm text-brown-600">Выпекаем несколько раз в день</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 rounded-2xl border border-brown-200 bg-white p-4 shadow-lg md:-left-8">
                        <p class="text-sm font-medium text-brown-800">⭐ 4.9 — отзывы гостей</p>
                        <p class="text-xs text-brown-500">более 2 000 оценок</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- About --}}
        <section id="about" class="border-y border-brown-200/60 bg-white/50 py-20 md:py-28">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="font-display text-3xl font-semibold text-brown-900 md:text-4xl">Наша история</h2>
                    <p class="mt-4 text-lg leading-relaxed text-brown-600">
                        Baker Street — это семейная пекарня, где каждая булочка печётся с заботой.
                        Мы используем закваску, отборную муку и никаких лишних добавок.
                    </p>
                </div>
                <div class="mt-16 grid gap-8 md:grid-cols-3">
                    @foreach ([
                        ['icon' => '🌾', 'title' => 'Натуральные продукты', 'text' => 'Работаем с местными фермерами и проверенными поставщиками.'],
                        ['icon' => '🔥', 'title' => 'Печь каждый час', 'text' => 'Хлеб и булочки не залёживаются — всегда свежие.'],
                        ['icon' => '❤️', 'title' => 'С любовью к делу', 'text' => 'Рецепты передаются из поколения в поколение.'],
                    ] as $feature)
                        <article class="rounded-2xl border border-brown-200/80 bg-cream p-8 text-center transition hover:border-amber-300 hover:shadow-md">
                            <span class="text-4xl" role="img" aria-hidden="true">{{ $feature['icon'] }}</span>
                            <h3 class="mt-4 font-display text-xl font-semibold text-brown-900">{{ $feature['title'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-brown-600">{{ $feature['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Menu --}}
        <section id="menu" class="py-20 md:py-28">
            <div class="mx-auto max-w-6xl px-6">
                <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
                    <div>
                        <h2 class="font-display text-3xl font-semibold text-brown-900 md:text-4xl">Популярное меню</h2>
                        <p class="mt-2 text-brown-600">Выбор гостей — обновляем ассортимент по сезону</p>
                    </div>
                    <p class="rounded-full bg-amber-100 px-4 py-2 text-sm font-medium text-amber-900">
                        Все цены ориентировочные
                    </p>
                </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <article class="group flex flex-col rounded-2xl border border-brown-200/80 bg-white p-6 shadow-sm transition hover:border-amber-300 hover:shadow-lg">
                            <span class="text-5xl transition group-hover:scale-110" role="img" aria-hidden="true">{{ $product['emoji'] }}</span>
                            <h3 class="mt-4 font-display text-xl font-semibold text-brown-900">{{ $product['name'] }}</h3>
                            <p class="mt-2 flex-1 text-sm leading-relaxed text-brown-600">{{ $product['description'] }}</p>
                            <p class="mt-4 font-semibold text-amber-800">{{ $product['price'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="mx-6 mb-20 md:mx-auto md:max-w-6xl">
            <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-amber-800 to-amber-950 px-8 py-16 text-center text-cream md:px-16">
                <h2 class="font-display text-3xl font-semibold md:text-4xl">Закажите к празднику</h2>
                <p class="mx-auto mt-4 max-w-xl text-amber-100">
                    Торты, пироги и наборы выпечки на заказ — примем заявку за 48 часов.
                </p>
                <a href="{{ route('order.create') }}" class="mt-8 inline-block rounded-full bg-cream px-8 py-3.5 font-semibold text-amber-900 transition hover:bg-white">
                    Сделать заказ
                </a>
            </div>
        </section>

        {{-- Map section --}}
        <section id="map" class="scroll-mt-20 pb-20 md:pb-28">
            <div class="mx-auto max-w-6xl px-6">
                <div class="text-center mb-10">
                    <h2 class="font-display text-3xl font-semibold text-brown-900 md:text-4xl">Как нас найти</h2>
                    <p class="mt-3 text-brown-600">Ждём вас ежедневно с 6:00 до 21:00</p>
                </div>
                <div class="rounded-3xl overflow-hidden border border-brown-200/80 shadow-lg">
                    <iframe 
                        src="https://yandex.ru/map-widget/v1/?ll=53.211649,56.861393&z=17&pt=53.211649,56.861393&l=map"
                        width="100%" 
                        height="450" 
                        frameborder="0"
                        allowfullscreen="true"
                        loading="lazy"
                        class="pointer-events-auto">
                    </iframe>
                </div>
                <div class="mt-6 text-center">
                    <p class="text-brown-700 font-medium">📍 г. Ижевск, ул. Пекарская, 12</p>
                    <p class="text-brown-500 text-sm mt-1">Остановка "Центральная", вход с ул. Хлебной</p>
                </div>
            </div>
        </section>
    </main>

    {{-- Footer / Contact --}}
    <footer id="contact" class="border-t border-brown-200/80 bg-brown-900 text-brown-200">
        <div class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <p class="font-display text-2xl font-semibold text-cream">
                        Baker <span class="text-amber-400">Street</span>
                    </p>
                    <p class="mt-3 max-w-sm text-sm leading-relaxed text-brown-300">
                        Пекарня на углу Baker Street — заходите за кофе и тёплой булочкой.
                    </p>
                </div>
                <div>
                    <h3 class="font-semibold text-cream">Контакты</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li>ул. Пекарская, 12</li>
                        <li><a href="tel:+74951234567" class="transition hover:text-amber-400">+7 (495) 123-45-67</a></li>
                        <li><a href="mailto:hello@bakerstreet.ru" class="transition hover:text-amber-400">hello@bakerstreet.ru</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-cream">Часы работы</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li>Пн–Пт: 6:00 – 21:00</li>
                        <li>Сб–Вс: 7:00 – 20:00</li>
                    </ul>
                </div>
            </div>
            <p class="mt-12 border-t border-brown-700 pt-8 text-center text-xs text-brown-400">
                © {{ date('Y') }} Baker Street. Все права защищены.
            </p>
        </div>
    </footer>
@endsection