<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionsCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tk',
        'description_ru',
        'description_en',
        'description_tk',
        'main_image',
        'is_active',
        'ordering',
    ];

    public function items()
    {
        return $this->hasMany(DirectionsItem::class, 'category_id');
    }
}
