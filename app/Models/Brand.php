<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_name', 'brand_logo', 'active', 'is_deleted'];

    public function subCategories()
    {
        return $this->belongsToMany(Category::class, 'brand_sub_category', 'brand_id', 'sub_category_id');
    }
}
