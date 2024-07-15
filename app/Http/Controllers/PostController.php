<?php
// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    protected $redis;
    public function __construct()
    {
        $this->redis = new Redis([
            'scheme' => 'tcp',
            'host'   => env('REDIS_HOST', '127.0.0.1'),
            'port'   => env('REDIS_PORT', 6379),
        ]);
    }


    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(10);
        // دریافت تعداد بازدیدها از Redis
        foreach ($posts as $post) {
            $post->views = Redis::get("post:{$post->id}:views") ?? 0;
        }

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'عنوان الزامی است.',
            'title.string' => 'عنوان باید یک رشته باشد.',
            'title.max' => 'عنوان نباید بیشتر از 255 کاراکتر باشد.',
            'slug.required' => 'اسلاگ الزامی است.',
            'slug.string' => 'اسلاگ باید یک رشته باشد.',
            'slug.max' => 'اسلاگ نباید بیشتر از 255 کاراکتر باشد.',
            'slug.unique' => 'اسلاگ قبلا انتخاب شده است.',
            'summary.required' => 'خلاصه الزامی است.',
            'summary.string' => 'خلاصه باید یک رشته باشد.',
            'body.required' => 'محتوا الزامی است.',
            'body.string' => 'محتوا باید یک رشته باشد.',
            'published.required' => 'وضعیت انتشار الزامی است.',
            'category_id.required' => 'دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'image.image' => 'تصویر باید یک فایل تصویری باشد.',
            'image.mimes' => 'تصویر باید یکی از انواع jpeg, png, jpg, gif, svg باشد.',
            'image.max' => 'تصویر نباید بیشتر از 2048 کیلوبایت باشد.',
            'image.required' => 'تصویر الزامی است.',
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'summary' => 'required|string',
            'body' => 'required|string',
            'published' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->summary = $request->summary;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->category_id = $request->category_id;
        $post->views = 0;
        $post->published = $request->published;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect('admin/posts/index')->with('success', 'پست با موفقیت ایجاد شد.');
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        $messages = [
            'title.required' => 'عنوان الزامی است.',
            'title.string' => 'عنوان باید یک رشته باشد.',
            'title.max' => 'عنوان نباید بیشتر از 255 کاراکتر باشد.',
            'slug.required' => 'اسلاگ الزامی است.',
            'slug.string' => 'اسلاگ باید یک رشته باشد.',
            'slug.max' => 'اسلاگ نباید بیشتر از 255 کاراکتر باشد.',
            'slug.unique' => 'اسلاگ قبلا انتخاب شده است.',
            'summary.required' => 'خلاصه الزامی است.',
            'summary.string' => 'خلاصه باید یک رشته باشد.',
            'body.required' => 'محتوا الزامی است.',
            'body.string' => 'محتوا باید یک رشته باشد.',
            'category_id.required' => 'دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'published.required' => 'وضعیت انتشار الزامی است.',
            'published.in' => 'وضعیت انتشار معتبر نیست.',
            'image.image' => 'تصویر باید یک فایل تصویری باشد.',
            'image.max' => 'تصویر نباید بیشتر از 2048 کیلوبایت باشد.',
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'summary' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published' => 'required|in:0,1',
            'image' => 'nullable|image|max:2048',
        ], $messages);

        $data = $request->only(['title', 'slug', 'summary', 'body', 'category_id', 'published']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $post->update($data);

        return redirect('admin/posts/index')->with('success', 'پست با موفقیت به روز شد.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('admin/posts/index')->with('success', 'پست با موفقیت حذف شد.');
    }




    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // افزایش مقدار بازدید در Redis
        Redis::incr("post:{$post->id}:views");


        // $postId = $post->id;
        // $userKey = 'viewed_post_' . $postId;

        // if (!session()->has($userKey)) {
        //     $post->increment('views');
        //     session()->put($userKey, true);
        //     session()->put('last_viewed_post_' . $postId, now());
        // } else {
        //     $lastViewed = session()->get('last_viewed_post_' . $postId);
        //     if (now()->diffInMinutes($lastViewed) >= 1) { // 1440 دقیقه معادل 24 ساعت
        //         Redis::incr("post:{$post->id}:views");
        //         session()->put('last_viewed_post_' . $postId, now());
        //     }
        // }


        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->summary);
        SEOMeta::addKeyword(['کلیدواژه اول', 'کلیدواژه دوم']);

        OpenGraph::setTitle($post->title);
        OpenGraph::setDescription($post->summary);
        OpenGraph::setUrl(route('posts.show', $post->slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage(asset('storage/' . $post->image));

        TwitterCard::setTitle($post->title);
        TwitterCard::setDescription($post->summary);
        TwitterCard::setUrl(route('posts.show', $post->slug));
        TwitterCard::setImage(asset('storage/' . $post->image));

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->summary);
        JsonLd::setType('Article');
        JsonLd::addImage(asset('storage/' . $post->image));

        return view('admin.posts.show', compact('post'));
    }
}
