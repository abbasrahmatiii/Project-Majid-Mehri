@foreach($comments as $comment)
<li>
  <div class="comment">
    <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
      <img style="border-radius: 100% !important;" class="avatar comment-avatar" alt="{{ $comment->user->first_name }}" src="{{ asset('img/avatars/avatar-2.jpg') }}">
    </div>
    <div class="comment-block">
      <div class="comment-arrow"></div>
      <span class="comment-by" style="font-size: 12px;">
        <strong>{{ $comment->user->first_name }}</strong>
        @if($comment->parent)
        در جواب <strong>{{ $comment->parent->user->first_name }}</strong> گفته:
        @else
        در مورد پست گفته:
        @endif
        @if(!request()->is('admin/*')) <!-- لینک پاسخ فقط در بخش غیر از ادمین نمایش داده می‌شود -->
        <span class="float-right">
          <span> <a href="javascript:void(0);" onclick="showReplyForm('{{ $comment->id }}');"><i class="fas fa-reply"></i> پاسخ</a></span>
        </span>
        @endif
      </span>
      <p>{{ $comment->content }}</p>
      <span class="date float-right">{{ \Verta::instance($comment->created_at)->format('d F Y - H:i') }}</span>
    </div>
  </div>
  @if($comment->replies->isNotEmpty())
  <ul class="comments">
    @include('admin.posts.comments.partials.comments', ['comments' => $comment->replies->where('approved', 1), 'post' => $post])
  </ul>
  @endif
  <div id="reply-form-{{ $comment->id }}" class="reply-form" style="display: none;">
    <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="p-3 bg-light rounded">
      @csrf
      <input type="hidden" name="parent_id" value="{{ $comment->id }}">
      <input type="hidden" name="post_id" value="{{ $post->id }}">
      <div class="form-group">
        <label for="reply-content" class="small font-weight-bold">پاسخ شما</label>
        <textarea name="content" class="form-control form-control-sm" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">ارسال پاسخ</button>
    </form>
  </div>
</li>
@endforeach