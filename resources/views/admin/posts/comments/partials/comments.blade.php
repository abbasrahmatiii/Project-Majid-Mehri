@foreach($comments as $comment)
<li>
  <div class="comment">
    <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
      <img class="avatar" alt="" src="{{ asset('img/avatars/avatar-2.jpg') }}">
    </div>
    <div class="comment-block">
      <div class="comment-arrow"></div>
      <span class="comment-by">
        <strong>{{ $comment->user->first_name }}</strong>
        <span class="float-right">
          <span> <a href="javascript:void(0);" onclick="showReplyForm({{ $comment->id }});"><i class="fas fa-reply"></i> پاسخ</a></span>
        </span>
      </span>
      <p>{{ $comment->content }}</p>
      <span class="date float-right">{{ \Verta::instance($comment->created_at)->format('d F Y - H:i') }}</span>
    </div>
  </div>
  @if($comment->replies->count())
  <ul class="comments reply">
    @include('admin.posts.comments.partials.comments', ['comments' => $comment->replies])
  </ul>
  @endif
  <div id="reply-form-{{ $comment->id }}" class="reply-form" style="display: none;">
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
      @csrf
      <input type="hidden" name="parent_id" value="{{ $comment->id }}">
      <input type="hidden" name="post_id" value="{{ $post->id }}">
      <div class="form-group">
        <label for="reply-content">پاسخ شما</label>
        <textarea name="content" class="form-control" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">ارسال پاسخ</button>
    </form>
  </div>
</li>
@endforeach