<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('order-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string|max:1000',
        ]);

        Order::create($validated);

        return redirect()->route('order.success')->with('success', 'Заявка успешно отправлена!');
    }

    public function success()
    {
        return view('order-success');
    }
}