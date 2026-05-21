<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить товар — Админка</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen py-8">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Добавить товар</h1>
                    <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-800">← Назад</a>
                </div>

                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Название *</label>
                        <input type="text" name="name" required value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Описание *</label>
                        <textarea name="description" required rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Цена *</label>
                        <input type="text" name="price" required value="{{ old('price') }}" placeholder="120 ₽" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Эмодзи</label>
                        <input type="text" name="emoji" value="{{ old('emoji') }}" placeholder="🥖" maxlength="10" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <p class="text-xs text-gray-500 mt-1">Например: 🥖 🥐 🍰 🧁 🍞 🥧</p>
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                            <span class="ml-2 text-sm text-gray-700">Активен (показывать на главной)</span>
                        </label>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Порядок сортировки</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <p class="text-xs text-gray-500 mt-1">Меньше число = выше в списке</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-lg transition">Сохранить</button>
                        <a href="{{ route('admin.products.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition">Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>