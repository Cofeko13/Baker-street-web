<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель — Управление товарами</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen">
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex gap-8">
                        <h1 class="text-xl font-semibold text-gray-800">Админ-панель</h1>
                        <a href="{{ route('admin.products.index') }}" class="text-amber-600 font-medium">📦 Товары</a>
                        <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-amber-600">📋 Заказы</a>
                        <a href="{{ route('admin.reviews.index') }}" class="text-gray-600 hover:text-amber-600">💬 Отзывы</a>
                    </div>
                    <a href="/" class="text-amber-600 hover:text-amber-700">На сайт →</a>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Управление товарами</h2>
                <a href="{{ route('admin.products.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition">
                    + Добавить товар
                </a>
            </div>

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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Эмодзи</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Название</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Цена</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Активен</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Порядок</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->id }}</td>
                            <td class="px-6 py-4 text-2xl">{{ $product->emoji ?: '🍞' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $product->price }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.products.toggle', $product) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-2xl hover:scale-110 transition">
                                        {{ $product->is_active ? '✅' : '❌' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $product->sort_order }}</td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">✏️</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Удалить товар?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">🗑️</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4 border-t">
                    {{ $products->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>