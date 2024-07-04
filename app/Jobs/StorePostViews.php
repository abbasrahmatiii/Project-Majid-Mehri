<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use App\Models\Post;

class StorePostViews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $cacheKey = "post:{$post->slug}:views";
            $views = Redis::get($cacheKey);

            if ($views) {
                $post->views += $views;
                $post->save();
                Redis::del($cacheKey);
            }
        }
    }
}
