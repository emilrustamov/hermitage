<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru', 'description_ru',
        'title_en', 'description_en',
        'title_tk', 'description_tk',
        'image', 'plan_image', 'year', 'video',
        'location_ru', 'location_en', 'location_tk',
        'area', 'designer_ru', 'designer_en', 'designer_tk',
        'architect_ru', 'architect_en', 'architect_tk',
        'is_active', 'photos' // добавляем новое поле
    ];

    protected $casts = [
        'photos' => 'array', // указание на то, что photos это массив
    ];
}
