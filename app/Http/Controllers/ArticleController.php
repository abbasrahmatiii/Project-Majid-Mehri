<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles',
            'summary' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published' => 'required|boolean',
            'image' => 'required|image|max:2048'
        ], [
            'title.required' => 'عنوان مقاله الزامی است.',
            'title.string' => 'عنوان مقاله باید به صورت رشته باشد.',
            'title.max' => 'عنوان مقاله نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'slug.required' => 'اسلاگ مقاله الزامی است.',
            'slug.string' => 'اسلاگ مقاله باید به صورت رشته باشد.',
            'slug.max' => 'اسلاگ مقاله نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'slug.unique' => 'اسلاگ مقاله باید یکتا باشد.',
            'summary.required' => 'خلاصه مقاله الزامی است.',
            'summary.string' => 'خلاصه مقاله باید به صورت رشته باشد.',
            'body.required' => 'محتوای مقاله الزامی است.',
            'body.string' => 'محتوای مقاله باید به صورت رشته باشد.',
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'published.required' => 'وضعیت انتشار مقاله الزامی است.',
            'published.boolean' => 'وضعیت انتشار مقاله باید به صورت صحیح یا غلط باشد.',
            'image.required' => 'انتخاب تصویر الزامی است.',
            'image.image' => 'فایل انتخابی باید تصویر باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Article::create($data);

        return response()->json([
            'message' => 'مقاله با موفقیت ایجاد شد'
        ], 201);
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $article->id,
            'summary' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published' => 'required|boolean',
            'image' => 'nullable|image|max:2048'
        ], [
            'title.required' => 'عنوان مقاله الزامی است.',
            'title.string' => 'عنوان مقاله باید به صورت رشته باشد.',
            'title.max' => 'عنوان مقاله نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'slug.required' => 'اسلاگ مقاله الزامی است.',
            'slug.string' => 'اسلاگ مقاله باید به صورت رشته باشد.',
            'slug.max' => 'اسلاگ مقاله نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'slug.unique' => 'اسلاگ مقاله باید یکتا باشد.',
            'summary.required' => 'خلاصه مقاله الزامی است.',
            'summary.string' => 'خلاصه مقاله باید به صورت رشته باشد.',
            'body.required' => 'محتوای مقاله الزامی است.',
            'body.string' => 'محتوای مقاله باید به صورت رشته باشد.',
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'published.required' => 'وضعیت انتشار مقاله الزامی است.',
            'published.boolean' => 'وضعیت انتشار مقاله باید به صورت صحیح یا غلط باشد.',
            'image.image' => 'فایل انتخابی باید تصویر باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $article->update($data);

        return response()->json([
            'message' => 'مقاله با موفقیت ویرایش شد'
        ], 200);
    }


    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'مقاله با موفقیت حذف شد');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('admin.articles.show', compact('article'));
    }
}
