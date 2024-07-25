<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'slug', 'summary', 'body', 'user_id', 'published', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
