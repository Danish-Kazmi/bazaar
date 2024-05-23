<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class ShareCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $categories = Category::where('parent_category', 0)
            ->where('active', true)
            ->where('is_deleted', false)
            ->with(['subCategories' => function ($query) {
                $query->where('active', true)
                    ->where('is_deleted', false);
            }])
            ->get();

        Inertia::share('categories', $categories);
        return $next($request);
    }
}
