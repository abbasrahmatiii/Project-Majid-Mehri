<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'is_active',
    ];
    // protected $attributes = [
    //     'is_active' => false,
    // ];
}
