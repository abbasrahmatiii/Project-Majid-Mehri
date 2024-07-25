<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'summary', 'slug', 'image', 'category_id', 'user_id', 'published', 'views'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function getViewsAttribute()
    {
        return Redis::get("post:{$this->id}:views") ?? $this->attributes['views'];
    }
}
