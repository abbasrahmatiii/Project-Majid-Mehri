<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CenterAd;
use App\Models\ClientSection;
use App\Models\Contacts;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\Testimonial;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $testimonials = Testimonial::all();
        $latestArticles = Article::where('published', 1)->orderBy('created_at', 'desc')->take(4)->get();


        $centerAds = CenterAd::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $settings = Setting::first();
        $contact = Contacts::first();

        $slides = Slide::where('is_active', true)->get();

        $latestPosts = Post::where('published', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $clientSection = ClientSection::first(); // فرض می‌کنیم فقط یک رکورد در این جدول دارید.
        // دریافت کاربران به همراه پروفایل‌ها و نقش‌ها
        $teamMembers = UserProfile::whereHas('user.roles', function ($query) {
            $query->where('name', '!=', 'کاربر عادی');
        })->with(['user.roles' => function ($query) {
            $query->where('name', '!=', 'کاربر عادی');
        }])->get();

        // فرض می‌کنیم فقط یک رکورد در جدول ClientSection دارید
        $clientSection = ClientSection::first();
        return view('home', compact('settings', 'slides', 'contact', 'centerAds', 'latestPosts', 'latestArticles', 'clientSection', 'teamMembers', 'testimonials'));
    }

    public function list_posts()
    {
        $posts = Post::latest()->paginate(12);
        return view('layouts/posts', compact('posts'));
    }

    public function list_articles()
    {
        $latestArticles  = Article::latest()->paginate(12);
        return view('layouts/frontArticles', compact('latestArticles'));
    }

    public function profile()
    {

        return view('user.profile');
    }
}
