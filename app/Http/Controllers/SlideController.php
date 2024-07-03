<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;

use App\Http\Requests\StoreSlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::paginate(10);
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }




    // نمونه‌ای از استفاده در یک متد کنترلر
    public function store(StoreSlideRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);

            // استفاده از Intervention Image برای تغییر سایز یا ویرایش تصویر
            Image::make($image)->save($path);

            // مسیر ذخیره شده را در دیتابیس ذخیره کنید
            $imagePath = 'images/' . $filename;
        }

        Slide::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
        ]);

        return redirect('/admin/slide/index')->with('success', 'اسلاید با موفقیت ایجاد شد.');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }


    public function update(StoreSlideRequest $request, Slide $slide)
    {
        $imagePath = $slide->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);

            // استفاده از Intervention Image برای تغییر سایز یا ویرایش تصویر
            Image::make($image)->save($path);

            // مسیر ذخیره شده را در دیتابیس ذخیره کنید
            $imagePath = 'images/' . $filename;
        }

        $slide->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
        ]);

        return redirect()->route('admin.slide.index')->with('success', 'اسلاید با موفقیت ویرایش شد.');
    }


    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            unlink(public_path($slide->image));
        }

        $slide->delete();
        return redirect()->back()->with('success', 'اسلاید با موفقیت حذف شد.');
    }

    public function toggleActive(Slide $slide)
    {
        $slide->is_active = !$slide->is_active;
        $slide->save();

        return redirect()->route('admin.slide.index')->with('success', 'وضعیت اسلاید با موفقیت تغییر کرد.');
    }
}
