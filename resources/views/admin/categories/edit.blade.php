<!-- resources/views/admin/categories/edit.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش دسته‌بندی</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name">نام</label>
          <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
          <label for="slug">اسلاگ</label>
          <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" required>
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection