<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
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
        }
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user,
            ],
            'ziggy' => function () use ($request, $user) {
                return array_merge((new \Tighten\Ziggy\Ziggy)->toArray(), [
                    'location' => $request->url(),
                    'ip_address' => $request->ip(),
                    'cart' => Cart::where('user_id', $user->id)->get() ?? [],
                ]);
            },
        ];
    }
}
