<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель — Заказы Baker Street</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet">
    <style>
        body { font-family: 'DM Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex gap-8">
                        <h1 class="text-xl font-semibold text-gray-800">Админ-панель</h1>
                        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-amber-600">📦 Товары</a>
                        <a href="{{ route('admin.orders.index') }}" class="text-amber-600 font-medium">📋 Заказы</a>
                    </div>
                    <a href="/" class="text-amber-600 hover:text-amber-700">На сайт →</a>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Управление заказами</h2>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($orders->count() > 0)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ФИО</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Телефон</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Описание</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $order->full_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $order->phone }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-md">
                                    {{ $order->description ?: '—' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status == 'preparing') bg-blue-100 text-blue-800
                                        @elseif($order->status == 'shipped') bg-green-100 text-green-800
                                        @elseif($order->status == 'declined') bg-red-100 text-red-800
                                        @endif">
                                        {{ $order->status_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if(in_array($order->status, ['pending', 'preparing']))
                                    <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="inline-flex gap-2">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="text-sm border-gray-300 rounded-md px-2 py-1">
                                            <option value="">Изменить статус</option>
                                            <option value="preparing">Готовится</option>
                                            <option value="shipped">Отправлен</option>
                                            <option value="declined">Отклонен</option>
                                        </select>
                                    </form>
                                    @else
                                    <span class="text-gray-400 text-sm">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4 border-t">
                        {{ $orders->links() }}
                    </div>
                </div>
            @else
                <div class="bg-white shadow-md rounded-lg p-8 text-center">
                    <p class="text-gray-500 text-lg">Пока нет ни одного заказа</p>
                    <p class="text-gray-400 mt-2">Заказы появятся здесь после того, как пользователи заполнят форму на сайте</p>
                </div>
            @endif
        </main>
    </div>
</body>
</html>