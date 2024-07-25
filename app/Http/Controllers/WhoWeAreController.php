<?php

namespace App\Http\Controllers;

use App\Models\WhoWeAre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhoWeAreController extends Controller
{
    public function edit()
    {
        $whoWeAre = WhoWeAre::first();
        return view('admin.who_we_are.edit', compact('whoWeAre'));
    }

    public function update(Request $request)
    {
        $whoWeAre = WhoWeAre::first();

        if (!$whoWeAre) {
            $whoWeAre = new WhoWeAre();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'lead' => 'required',
            'content' => 'required',
            'button_text' => 'required',
            'button_link' => 'required|url',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'عنوان الزامی است',
            'lead.required' => 'خلاصه الزامی است',
            'content.required' => 'محتوا الزامی است',
            'button_text.required' => 'متن دکمه الزامی است',
            'button_link.required' => 'لینک دکمه الزامی است',
            'button_link.url' => 'لینک دکمه باید یک URL معتبر باشد',
            'image1.image' => 'تصویر ۱ باید یک فایل تصویری باشد',
            'image1.mimes' => 'فرمت‌های مجاز تصویر ۱: jpeg,png,jpg,gif,svg',
            'image1.max' => 'حداکثر حجم تصویر ۱: 2048 کیلوبایت',
            'image2.image' => 'تصویر ۲ باید یک فایل تصویری باشد',
            'image2.mimes' => 'فرمت‌های مجاز تصویر ۲: jpeg,png,jpg,gif,svg',
            'image2.max' => 'حداکثر حجم تصویر ۲: 2048 کیلوبایت',
            'image3.image' => 'تصویر ۳ باید یک فایل تصویری باشد',
            'image3.mimes' => 'فرمت‌های مجاز تصویر ۳: jpeg,png,jpg,gif,svg',
            'image3.max' => 'حداکثر حجم تصویر ۳: 2048 کیلوبایت',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/images');
            $whoWeAre->image1 = basename($image1);
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2')->store('public/images');
            $whoWeAre->image2 = basename($image2);
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3')->store('public/images');
            $whoWeAre->image3 = basename($image3);
        }

        $whoWeAre->title = $request->input('title');
        $whoWeAre->lead = $request->input('lead');
        $whoWeAre->content = $request->input('content');
        $whoWeAre->button_text = $request->input('button_text');
        $whoWeAre->button_link = $request->input('button_link');

        $whoWeAre->save();

        return response()->json(['message' => 'محتوا با موفقیت بروزرسانی شد!'], 200);
    }
}
