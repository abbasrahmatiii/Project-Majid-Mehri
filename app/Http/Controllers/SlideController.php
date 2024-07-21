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




    public function store(StoreSlideRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // ذخیره تصویر در دایرکتوری public/images
            $path = $image->move(public_path('images'), $filename);

            // ذخیره مسیر تصویر برای ذخیره در دیتابیس
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
        $imagePath = $slide->image; // نگه داشتن مسیر تصویر فعلی

        if ($request->hasFile('image')) {
            // حذف تصویر قبلی در صورت وجود
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // ذخیره تصویر در دایرکتوری public/images
            $image->move(public_path('images'), $filename);

            // ذخیره مسیر تصویر برای ذخیره در دیتابیس
            $imagePath = 'images/' . $filename;
        }

        // به‌روزرسانی اطلاعات اسلاید
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
