<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'category_id',
        'brand_id',
        'model',
        'stock',
        'price',
        'sale_price',
        'new_arrival',
        'added_by',
        'active',
        'is_deleted',
    ];

    /**
     * The category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The brand that the product belongs to.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * The user who added the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    /**
     * The images associated with the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Scope a query to search the category name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchCategory($query, $search)
    {
        return $query->orWhereHas('category', function ($categoryQuery) use ($search) {
            $categoryQuery->where('category_name', 'like', "%{$search}%");
        });
    }
}
