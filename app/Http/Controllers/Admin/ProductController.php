<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('id')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string|max:50',
            'emoji' => 'nullable|string|max:10',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Товар успешно добавлен');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string|max:50',
            'emoji' => 'nullable|string|max:10',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Товар успешно обновлен');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Товар удален');
    }

    public function toggleActive(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        return redirect()->route('admin.products.index')->with('success', 'Статус товара изменен');
    }
}