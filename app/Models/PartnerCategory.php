<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected $table = 'partner_categories';

    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tk',
        'is_active'
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class, 'category_id');
    }
}