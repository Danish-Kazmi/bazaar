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
            ['user_id' => $user->id, 'product_id' => $request->product_id],
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
        $cartItem = Cart::where('user_id', $user->id)->where('id', $id)->first();
    
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item removed from cart']);
        } else {
            return response()->json(['message' => 'Item not found in cart'], 404);
        }
    }
    
    public function updateCart(Request $request)
    {
        $user = Auth::user() ?? User::where('ip_address', request()->ip())->first();
    
        // Validate request
        $request->validate([
            'id' => 'required|integer|exists:carts,id',
        ]);
    
        // Find the cart item
        $cartItem = $user->cartItems()->where('id', $request->id)->first();
    
        if ($cartItem) {
            // Update the quantity
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
    
            return response()->json(['message' => 'Cart updated successfully']);
        }
    
        return response()->json(['message' => 'Cart item not found'], 404);
    }
    
}
