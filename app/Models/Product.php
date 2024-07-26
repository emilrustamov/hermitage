<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru', 'title_en', 'title_tk', 'image', 'order', 'is_active', 'price', 'category_id', 'brand_id', 'is_new'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class);
    }

    public function usersWhoFavorited()
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id');
    }
}
