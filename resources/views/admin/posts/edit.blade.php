@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش پست</h3>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>
        <div class="form-group">
          <label for="slug">اسلاگ</label>
          <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>
        </div>
        <div class="form-group">
          <label for="summary">خلاصه</label>
          <textarea name="summary" class="form-control" required id="editor2">{{ old('summary', $post->summary) }}</textarea>
        </div>
        <div class="form-group">
          <label for="body">محتوا</label>
          <textarea name="body" class="form-control" required id="editor1">{{ old('body', $post->body) }}</textarea>
        </div>
        <div class="form-group">
          <label for="category_id">دسته‌بندی</label>
          <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="status">وضعیت</label>
          <select name="published" class="form-control" required>
            <option value="0" {{ old('published', $post->status) == '0' ? 'selected' : '' }}>پیش‌نویس</option>
            <option value="1" {{ old('published', $post->status) == '1' ? 'selected' : '' }}>منتشر شده</option>
          </select>
        </div>
        <div class="form-group">
          <label for="image">تصویر</label>
          <input type="file" name="image" class="form-control">
          @if($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="mt-2" width="100">
          @endif
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection