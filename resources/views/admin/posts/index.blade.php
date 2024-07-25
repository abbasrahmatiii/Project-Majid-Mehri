@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
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
                <button class="btn btn-sm btn-clean btn-icon delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="{{ $post->id }}" title="حذف">
                  <i class="fas fa-trash-alt"></i>
                </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">تایید حذف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        آیا مطمئن هستید که می‌خواهید این پست را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        <form id="deleteForm" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">حذف</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#deleteModal').on('show.bs.modal', function(event) {

      var button = $(event.relatedTarget);
      var postId = button.data('id');
      var action = "{{ url('admin/posts') }}/" + postId;
      var modal = $(this);
      modal.find('#deleteForm').attr('action', action);
    });

    $('#deleteForm').on('submit', function() {

      $('#deleteModal').modal('hide');
    });
  });
</script>
@endsection