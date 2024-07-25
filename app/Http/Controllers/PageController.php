<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Redis;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
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
            'image.image' => 'تصویر باید یک فایل تصویری باشد.',
            'image.mimes' => 'تصویر باید یکی از انواع jpeg, png, jpg, gif, svg باشد.',
            'image.max' => 'تصویر نباید بیشتر از 2048 کیلوبایت باشد.',
            'image.required' => 'تصویر الزامی است.',
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'summary' => 'required|string',
            'body' => 'required|string',
            'published' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->summary = $request->summary;
        $page->body = $request->body;
        $page->user_id = auth()->id();
        $page->published = $request->published;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pages', 'public');
            $page->image = $imagePath;
        }

        $page->save();

        return redirect('admin/pages')->with('success', 'صفحه با موفقیت ایجاد شد.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
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
            'published.in' => 'وضعیت انتشار معتبر نیست.',
            'image.image' => 'تصویر باید یک فایل تصویری باشد.',
            'image.max' => 'تصویر نباید بیشتر از 2048 کیلوبایت باشد.',
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'summary' => 'required|string',
            'body' => 'required|string',
            'published' => 'required|in:0,1',
            'image' => 'nullable|image|max:2048',
        ], $messages);

        $data = $request->only(['title', 'slug', 'summary', 'body', 'published']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $page->update($data);

        return redirect('admin/pages')->with('success', 'صفحه با موفقیت به روز شد.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('admin/pages')->with('success', 'صفحه با موفقیت حذف شد.');
    }

    public function show($slug)
    {
        $page = Page::where('published', '1')->where('slug', $slug)->firstOrFail();

        SEOMeta::setTitle($page->title);
        SEOMeta::setDescription($page->summary);
        SEOMeta::addKeyword(['کلیدواژه اول', 'کلیدواژه دوم']);

        OpenGraph::setTitle($page->title);
        OpenGraph::setDescription($page->summary);
        OpenGraph::setUrl(route('pages.show', $page->slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage(asset('storage/' . $page->image));

        TwitterCard::setTitle($page->title);
        TwitterCard::setDescription($page->summary);
        TwitterCard::setUrl(route('pages.show', $page->slug));
        TwitterCard::setImage(asset('storage/' . $page->image));

        JsonLd::setTitle($page->title);
        JsonLd::setDescription($page->summary);
        JsonLd::setType('Article');
        JsonLd::addImage(asset('storage/' . $page->image));

        return view('admin.pages.show', compact('page'));
    }
}
