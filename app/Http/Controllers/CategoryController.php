<?php



// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug)
        ]);

        return redirect()->route('categories.index')->with('success', 'دسته‌بندی با موفقیت ایجاد شد.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug)
        ]);

        return redirect()->route('categories.index')->with('success', 'دسته‌بندی با موفقیت ویرایش شد.');
    }

    public function destroy(Category $category)
    {
        // بررسی اینکه آیا دسته‌بندی به پستی اختصاص داده شده است یا خیر
        if ($category->posts()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'این دسته‌بندی به پست‌هایی اختصاص داده شده است و نمی‌توان آن را حذف کرد.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'دسته‌بندی با موفقیت حذف شد.');
    }
}
