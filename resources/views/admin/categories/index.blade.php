<!-- resources/views/admin/categories/index.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <!-- @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif -->



  <div class="card">
    <div class="card-header">
      <h3>لیست دسته‌بندی‌ها</h3>
      <a href="{{ route('categories.create') }}" class="btn btn-primary">ایجاد دسته‌بندی جدید</a>
    </div>
    <div class="card-body">
      @if($categories->isEmpty())
      <div class="alert alert-warning">هیچ دسته‌بندی‌ای وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>نام</th>
              <th>اسلاگ</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>{{ $category->slug }}</td>
              <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="ویرایش">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        {{ $categories->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection