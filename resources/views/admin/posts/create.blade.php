@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ایجاد پست جدید</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}">
          @if($errors->has('title'))
          <div class="text-danger">{{ $errors->first('title') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="slug">اسلاگ</label>
          <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
          @if($errors->has('slug'))
          <div class="text-danger">{{ $errors->first('slug') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="summary">خلاصه</label>
          <textarea name="summary" class="form-control">{{ old('summary') }}</textarea>
          @if($errors->has('summary'))
          <div class="text-danger">{{ $errors->first('summary') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="body">محتوا</label>
          <textarea name="body" class="form-control">{{ old('body') }}</textarea>
          @if($errors->has('body'))
          <div class="text-danger">{{ $errors->first('body') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="category_id">دسته‌بندی</label>
          <select name="category_id" class="form-control">
            <option selected disabled>دسته‌بندی</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @if($errors->has('category_id'))
          <div class="text-danger">{{ $errors->first('category_id') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="published">وضعیت</label>
          <select name="published" class="form-control">
            <option selected disabled>وضعیت انتشار</option>
            <option name="published" value="0">پیش‌نویس</option>
            <option name="published" value="1">منتشر شده</option>
          </select>
          @if($errors->has('published'))
          <div class="text-danger">{{ $errors->first('published') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="image">تصویر</label>
          <input type="file" name="image" class="form-control">
          @if($errors->has('image'))
          <div class="text-danger">{{ $errors->first('image') }}</div>
          @endif
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection