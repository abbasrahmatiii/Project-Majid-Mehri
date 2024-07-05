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

  <div class="card">
    <div class="card-header">
      <h3>لیست کل نظرات</h3>
      <a href="{{ route('admin.comments.pending') }}" class="btn btn-warning float-right">نظرات در انتظار تایید</a>
    </div>
    <div class="card-body">
      @if($comments->isEmpty())
      <div class="alert alert-warning">هیچ نظری وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>نام کاربر</th>
              <th>تاریخ ارسال</th>
              <th>وضعیت</th>
              <th>تاریخ تایید</th>
              <th>تایید کننده</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $comment)
            <tr>
              <td>{{ $comment->user ? $comment->user->first_name.' '.$comment->user->last_name : 'کاربر حذف شده' }}</td>
              <td>{{ \Verta::instance($comment->created_at)->format('d F Y - H:i') }}</td>
              <td>{{ $comment->approved ? 'تایید شده' : 'در انتظار تایید' }}</td>
              <td>{{ $comment->approved_at ? \Verta::instance($comment->approved_at)->format('d F Y - H:i') : '-' }}</td>
              <td>{{ $comment->approver ? $comment->approver->first_name.' '.$comment->approver->last_name : '-' }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#commentModal-{{ $comment->id }}" title="مشاهده">
                  <i class="fas fa-eye"></i>
                </button>
                @if($comment->approved)
                <form action="{{ route('admin.comments.disapprove', $comment->id) }}" method="POST" style="display:inline;" class="ajax-action-form">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-sm btn-danger" title="لغو تایید">
                    <i class="fas fa-times-circle"></i>
                  </button>
                </form>
                @else
                <form action="{{ route('admin.comments.approve', $comment->id) }}" method="POST" style="display:inline;" class="ajax-action-form">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-sm btn-success" title="تایید">
                    <i class="fas fa-check-circle"></i>
                  </button>
                </form>
                @endif
                <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST" style="display:inline;" class="ajax-action-form">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" title="حذف" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این نظر را حذف کنید؟')">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="commentModal-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel-{{ $comment->id }}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel-{{ $comment->id }}">جزئیات نظر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    @if($comment->parent)
                    <div class="alert alert-secondary">
                      <strong>در پاسخ به:</strong>
                      <p>{{ $comment->parent->content }}</p>
                      <p class="small text-muted">{{ \Verta::instance($comment->parent->created_at)->format('d F Y - H:i') }}</p>
                    </div>
                    @endif
                    <p><strong>نام کاربر:</strong> {{ $comment->user ? $comment->user->first_name.' '.$comment->user->last_name : 'کاربر حذف شده' }}</p>
                    <p><strong>نظر:</strong> {{ $comment->content }}</p>
                    <p><strong>پست مرتبط:</strong> <a href="{{ route('posts.show', $comment->post->slug) }}" target="_blank">{{ $comment->post->title }}</a></p>
                    <p><strong>تاریخ ارسال:</strong> {{ \Verta::instance($comment->created_at)->format('d F Y - H:i') }}</p>
                    <p><strong>تاریخ تایید:</strong> {{ $comment->approved_at ? \Verta::instance($comment->approved_at)->format('d F Y - H:i') : '-' }}</p>
                    <p><strong>تایید کننده:</strong> {{ $comment->approver ? $comment->approver->first_name.' '.$comment->approver->last_name : '-' }}</p>
                    <hr>
                    <h5>پاسخ‌ها:</h5>
                    @include('admin.posts.comments.partials.comments', ['comments' => $comment->replies])
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        {{ $comments->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </div>
</div>
<!-- 
<script>
  document.querySelectorAll('.ajax-action-form').forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      fetch(this.action, {
          method: this.method,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // نمایش پیام موفقیت
            showToast(data.message);
          } else {
            // نمایش پیام خطا
            showToast(data.message, 'error');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  });

  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => {
      toast.remove();
    }, 3000);
  }
</script>

<style>
  .toast {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border-radius: 5px;
    z-index: 9999;
    opacity: 0.9;
  }

  .toast.error {
    background-color: #dc3545;
  }
</style> -->
@endsection