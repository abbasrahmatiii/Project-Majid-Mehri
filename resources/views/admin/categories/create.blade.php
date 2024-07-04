<!-- resources/views/admin/categories/create.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ایجاد دسته‌بندی جدید</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">نام</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
          <label for="slug">اسلاگ</label>
          <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection