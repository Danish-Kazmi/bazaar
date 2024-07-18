<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $ipAddress = $request->ip();
        $user = Auth::user() ?? User::firstOrCreate(['ip_address' => $request->ip()], [
            'name' => 'Guest',
            'email' => 'guest_' . $request->ip(),
            'password' => bcrypt('guest_password')
        ]);

        $cartItem = Cart::updateOrCreate(
            ['user_id' => $user->id, 'item_id' => $request->item_id],
            ['quantity' => DB::raw('quantity + ' . $request->quantity)]
        );

        return response()->json(['message' => 'Item added to cart', 'cartItem' => $cartItem]);
    }

    public function getCart()
    {
        $user = Auth::user() ?? User::where('ip_address', request()->ip())->first();
        $cartItems = $user->cartItems;

        return response()->json(['cartItems' => $cartItems]);
    }

    public function removeFromCart($id)
    {
        $user = Auth::user() ?? User::where('ip_address', request()->ip())->first();
        $user->cartItems()->where('id', $id)->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }
}
