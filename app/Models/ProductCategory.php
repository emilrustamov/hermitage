<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru', 'title_en', 'title_tk', 'is_active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
