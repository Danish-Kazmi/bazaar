<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user() ?? User::where('ip_address', $request->ip())->first();
        if (!$user) {
            // If no user found by IP, create a new user
            $user = User::create([
                'name' => 'Guest '.time(),
                'email' => 'guest_' . $request->ip(),
                'password' => bcrypt('guest_password'),
                'ip_address' => $request->ip()
            ]);
            $user->assignRole('register_user');
        }
        $carts = Cart::with(['product' => function ($query) {
            $query->with(['images' => function ($query) {
                $query->take(1); // Limit to the first image
            }]);
        }])->where('user_id', $user->id)->get();
        $carts->each(function ($cart) {
            if ($cart->product->images->isNotEmpty()) {
                $cart->product->image = $cart->product->images->first()->image_path 
                    ? Storage::url($cart->product->images->first()->image_path) 
                    : Storage::url('product_images/demo.jpeg');
            } else {
                $cart->product->image = Storage::url('product_images/demo.jpeg');
            }
            unset($cart->product->images); // Remove the images collection to keep the response clean
        });
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user,
            ],
            'ziggy' => function () use ($request, $carts) {
                return array_merge((new \Tighten\Ziggy\Ziggy)->toArray(), [
                    'location' => $request->url(),
                    'ip_address' => $request->ip(),
                    'cart' => $carts,
                ]);
            },
        ];
    }
}
