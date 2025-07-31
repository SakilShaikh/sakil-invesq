<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{

public function addProduct(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    return Product::create($data);
}

public function placeOrder(Request $request)
{
    $data = $request->validate([
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    $total = 0;
    $items = [];
    foreach ($data['items'] as $item) {
        $product = Product::findOrFail($item['product_id']);

        if ($product->stock < $item['quantity']) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }

        $total += $product->price * $item['quantity'];

        $items[] = [
            'product_id' => $product->id,
            'quantity' => $item['quantity'],
            'price' => $product->price,
        ];
        $product->decrement('stock', $item['quantity']);
    }

    $order = Order::create(['total_price' => $total]);
    $order->items()->createMany($items);

    return $order->load(relations: 'items.product');
}

public function listOrders()
{
    return Order::with('items.product')->get();
}

}
