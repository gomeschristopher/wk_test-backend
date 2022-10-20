<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\SaveOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['client', 'items.product'])->get());
    }

    public function store(Request $request, SaveOrderService $saveOrderService)
    {
        $order = new Order();
        $saveOrderService->saveOrder($order, $request->input());
        return response()->json([], 201);
    }

    public function update(Request $request, int $id, SaveOrderService $saveOrderService)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $saveOrderService->saveOrder($order, $request->input());
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();
        return response()->json([], 204);
    }
}
