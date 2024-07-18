<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $user = Auth::user() ?? User::where('ip_address', $request->ip())->first();
        $cartItems = $user->cartItems;

        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $cartItems->sum(function ($item) {
                return $item->quantity * $item->item->price;
            }),
            'status' => 'pending'
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $cartItem->item_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->item->price
            ]);
        }

        $user->cartItems()->delete();

        return response()->json(['message' => 'Order placed successfully', 'order' => $order]);
    }
}
