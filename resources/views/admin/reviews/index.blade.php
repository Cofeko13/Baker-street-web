<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель — Отзывы</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex gap-8">
                        <h1 class="text-xl font-semibold text-gray-800">Админ-панель</h1>
                        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-amber-600">📦 Товары</a>
                        <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-amber-600">📋 Заказы</a>
                        <a href="{{ route('admin.reviews.index') }}" class="text-amber-600 font-medium">💬 Отзывы</a>
                    </div>
                    <a href="/" class="text-amber-600 hover:text-amber-700">На сайт →</a>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Управление отзывами</h2>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Имя</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Оценка</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Заказ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Отзыв</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Статус</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reviews as $review)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $review->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $review->full_name }}</td>
                            <td class="px-6 py-4">
                                <div class="flex text-yellow-400 text-sm">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <span>★</span>
                                        @else
                                            <span class="text-gray-300">★</span>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $review->product_ordered ?: '—' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600 max-w-md">{{ Str::limit($review->review, 80) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $review->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $review->is_approved ? 'Опубликован' : 'На модерации' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                @if(!$review->is_approved)
                                    <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-800">✅ Опубликовать</button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline" onsubmit="return confirm('Удалить отзыв?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4 border-t">
                    {{ $reviews->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>