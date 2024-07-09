@extends('admin.layouts.master')

@section('content')
<!-- <div class="container mt-4">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif -->

<div class="card">
  <div class="card-header">
    <h3>نظرات در انتظار تایید</h3>
    <a href="{{ route('admin.comments.index') }}" class="btn btn-primary float-right">لیست کل نظرات</a>
  </div>
  <div class="card-body">
    @if($comments->isEmpty())
    <div class="alert alert-warning">هیچ نظری در انتظار تایید وجود ندارد.</div>
    @else
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>نام کاربر</th>
            <th>تاریخ ارسال</th>
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
            <td>{{ $comment->approved_at ? \Verta::instance($comment->approved_at)->format('d F Y - H:i') : '-' }}</td>
            <td>{{ $comment->approver ? $comment->approver->first_name.' '.$comment->approver->last_name : '-' }}</td>
            <td>
              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#commentModal{{ $comment->id }}">
                <i class="fas fa-eye"></i>
              </button>
              <form action="{{ route('admin.comments.approve', $comment->id) }}" method="POST" style="display:inline;" class="ajax-action-form">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-success">
                  <i class="fas fa-check"></i>
                </button>
              </form>
              <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST" style="display:inline;" class="ajax-action-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این نظر را حذف کنید؟')">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="commentModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel{{ $comment->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="commentModalLabel{{ $comment->id }}">جزئیات نظر</h5>
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
                  <ul class="list-unstyled">
                    @foreach($comment->replies as $reply)
                    <li class="mb-2">
                      <strong>{{ $reply->user ? $reply->user->first_name.' '.$reply->user->last_name : 'کاربر حذف شده' }}</strong>
                      <p>{{ $reply->content }}</p>
                      <p class="small text-muted">{{ \Verta::instance($reply->created_at)->format('d F Y - H:i') }}</p>
                      <div>
                        <!-- @if($reply->approved)
                          <form action="{{ route('admin.comments.disapprove', $reply->id) }}" method="POST" class="d-inline-block ajax-action-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-times"></i> لغو تایید
                            </button>
                          </form>
                          @else
                          <form action="{{ route('admin.comments.approve', $reply->id) }}" method="POST" class="d-inline-block ajax-action-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">
                              <i class="fas fa-check"></i> تایید
                            </button>
                          </form>
                          @endif
                          <form action="{{ route('admin.comments.delete', $reply->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این پاسخ را حذف کنید؟')">
                              <i class="fas fa-trash"></i> حذف
                            </button>
                          </form> -->
                      </div>
                      @if($reply->replies->count())
                      <ul class="list-unstyled ml-4">
                        @foreach($reply->replies as $subReply)
                        <li class="mb-2">
                          <strong>{{ $subReply->user ? $subReply->user->first_name.' '.$subReply->user->last_name : 'کاربر حذف شده' }}</strong>
                          <p>{{ $subReply->content }}</p>
                          <p class="small text-muted">{{ \Verta::instance($subReply->created_at)->format('d F Y - H:i') }}</p>
                          <!-- <div>
                              @if($subReply->approved)
                              <form action="{{ route('admin.comments.disapprove', $subReply->id) }}" method="POST" class="d-inline-block ajax-action-form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fas fa-times"></i> لغو تایید
                                </button>
                              </form>
                              @else
                              <form action="{{ route('admin.comments.approve', $subReply->id) }}" method="POST" class="d-inline-block ajax-action-form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">
                                  <i class="fas fa-check"></i> تایید
                                </button>
                              </form>
                              @endif
                              <form action="{{ route('admin.comments.delete', $subReply->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این پاسخ را حذف کنید؟')">
                                  <i class="fas fa-trash"></i> حذف
                                </button>
                              </form>
                            </div> -->
                        </li>
                        @endforeach
                      </ul>
                      @endif
                    </li>
                    @endforeach
                  </ul>
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