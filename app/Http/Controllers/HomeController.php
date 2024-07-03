<?php

namespace App\Http\Controllers;

use App\Models\CenterAd;
use App\Models\Contacts;
use App\Models\Setting;
use App\Models\Slide;
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
        $centerAds = CenterAd::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $settings = Setting::first();
        $slides = Slide::where('is_active', true)->get();
        $contact = Contacts::first();
        return view('home', compact('settings', 'slides', 'contact', 'centerAds'));
    }
}
