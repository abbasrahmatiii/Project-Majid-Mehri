<!-- resources/views/admin/posts/index.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <div class="card">
    <div class="card-header">
      <h3>لیست پست‌ها</h3>
      <a href="{{ route('posts.create') }}" class="btn btn-primary">ایجاد پست جدید</a>
    </div>
    <div class="card-body">
      @if($posts->isEmpty())
      <div class="alert alert-warning">هیچ پستی وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>عنوان</th>
              <th>دسته‌بندی</th>
              <th>تصویر</th>
              <th>بازدید</th>
              <th>وضعیت</th>
              <th>تاریخ ایجاد</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="50">
                @else
                <span>ندارد</span>
                @endif
              </td>
              <td>{{ $post->views }}</td>
              <td>{{ $post->published == '0' ? 'پیش نویس' : 'منتشر شده' }}</td>
              <td>{{ \Verta::instance($post->created_at)->format('Y/n/j H:i') }}</td>
              <td>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-clean btn-icon" title="ویرایش">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-clean btn-icon" title="مشاهده">
                  <i class="fas fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection