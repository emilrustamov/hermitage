<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'title',
        'category_id',
        'ordering',
        'image',
        'is_active',
        'link'
    ];

    public function category()
    {
        return $this->belongsTo(PartnerCategory::class, 'category_id');
    }
}