<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_category',
        'category_name',
        'active',
        'is_deleted',
    ];

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_category');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category');
    }
}
