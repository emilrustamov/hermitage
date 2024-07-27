<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru', 'description_ru', 
        'title_en', 'description_en', 
        'title_tk', 'description_tk', 
        'image', 'is_active'
    ];
}
