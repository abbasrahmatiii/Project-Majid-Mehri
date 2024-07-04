<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Models\Post;

class CountPostViews
{
    // protected $redis;
    // public function __construct()
    // {
    //     $this->redis = new Redis([
    //         'scheme' => 'tcp',
    //         'host'   => env('REDIS_HOST', '127.0.0.1'),
    //         'port'   => env('REDIS_PORT', 6379),
    //     ]);
    // }
    // public function handle(Request $request, Closure $next)
    // {
    //     $response = $next($request);

    //     if ($request->route('post')) {
    //         $postId = $request->route('post')->id;
    //         Redis::incr("post:{$postId}:views");
    //     }

    //     return $response;
    // }

    // protected function incrementPostViews($slug)
    // {
    //     $cacheKey = "post:{$slug}:views";
    //     Redis::incr($cacheKey);
    // }

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->isMethod('get') && $request->route()->hasParameter('post')) {
            $postId = $request->route('post')->id;
            Redis::incr("post:{$postId}:views");
        }

        return $response;
    }
}
