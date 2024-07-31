<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionsItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'poster_img',
        'partner_logo',
        'link',
        'images',
        'videos',
        'description_ru',
        'description_en',
        'description_tk',
        'is_active',
        'ordering',
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(DirectionsCategory::class, 'category_id');
    }
}
