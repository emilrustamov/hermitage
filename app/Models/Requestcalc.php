<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestcalc extends Model
{
  
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'work_scope', 'area', 'location', 'name', 'phone', 'email', 'message'
    ];

    protected $casts = [
        'work_scope' => 'array'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
