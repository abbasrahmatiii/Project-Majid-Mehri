@extends('layouts.master')

@section('content')


<div role="main" class="main">

  <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
      <div class="row">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
          <h1 class="text-dark font-weight-bold text-8">{{ $post->title }}</h1>
          <span class="sub-title text-dark">{{ $post->summary }}</span>
        </div>
        <div class="col-md-12 align-self-center order-1">
          <ul class="breadcrumb d-block text-center">
            <li><a href="/">خانه</a></li>
            <li><a href="{{ route('posts.index') }}">بلاگ</a></li>
            <li class="active">{{ $post->title }}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-4">
    <div class="row">
      <div class="col">
        <div class="blog-posts single-post">
          <article class="post post-large blog-single-post border-0 m-0 p-0">
            <div class="post-image ml-0">
              <a href="{{ route('posts.show', $post->slug) }}">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $post->title }}">
              </a>
            </div>
            <div class="post-date ml-0">
              <span class="day">{{ \Verta::instance($post->created_at)->format('d') }}</span>
              <span class="month">{{ \Verta::instance($post->created_at)->format('F') }}</span>
            </div>
            <div class="post-content ml-0">
              <h2 class="font-weight-bold mt-n3 mb-2 pb-1 pt-1 line-height-7 text-7"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
              <div class="post-meta">
                <span><i class="far fa-user"></i> توسط <a href="#"> {{$post->author->first_name}} {{ $post->author->last_name}}</a> </span>
                <span><i class="far fa-folder"></i> <a href="#">{{ $post->category->name }}</a></span>
                <span><i class="far fa-comments"></i> <a href="#">{{ $post->comments->count() }} دیدگاه</a></span>
              </div>
              <p>{!! nl2br(e($post->body)) !!}</p>
              <div class="post-block mt-5 post-share">
                <h4 class="mb-3 secondary-font">به اشتراک گذاری این مطلب</h4>
                <div class="addthis_toolbox addthis_default_style ">
                  <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                  <a class="addthis_button_tweet"></a>
                  <a class="addthis_button_pinterest_pinit"></a>
                  <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
              </div>
              <div class="post-block mt-4 pt-2 post-author">
                <h4 class="mb-3 secondary-font pb-1">نویسنده</h4>
                <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                  <a href="#">
                    <img src="{{ asset('img/avatars/avatar.jpg') }}" alt="{{ $post->author->name }}">
                  </a>
                </div>
                <p><strong class="name"><a href="#" class="text-4 pb-1 d-block">{{ $post->author->name }}</a></strong></p>
                <p>{{ $post->author->bio }}</p>
              </div>
              <div id="comments" class="post-block mt-5 post-comments">
                <h4 class="mb-3 secondary-font">دیدگاه ها ({{ $post->comments->count() }})</h4>
                <ul class="comments">
                  @foreach($post->comments as $comment)
                  <li>
                    <div class="comment">
                      <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                        <img class="avatar" alt="{{ $comment->user->name }}" src="{{ asset('img/avatars/avatar-2.jpg') }}">
                      </div>
                      <div class="comment-block">
                        <div class="comment-arrow"></div>
                        <span class="comment-by">
                          <strong>{{ $comment->user->name }}</strong>
                          <span class="float-right">
                            <span> <a href="#"><i class="fas fa-reply"></i> پاسخ</a></span>
                          </span>
                        </span>
                        <p>{{ $comment->content }}</p>
                        <span class="date float-right">{{ $comment->created_at->format('d M Y - H:i') }}</span>
                      </div>
                    </div>
                    @if($comment->replies->count())
                    <ul class="comments reply">
                      @foreach($comment->replies as $reply)
                      <li>
                        <div class="comment">
                          <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                            <img class="avatar" alt="{{ $reply->user->name }}" src="{{ asset('img/avatars/avatar-3.jpg') }}">
                          </div>
                          <div class="comment-block">
                            <div class="comment-arrow"></div>
                            <span class="comment-by">
                              <strong>{{ $reply->user->name }}</strong>
                              <span class="float-right">
                                <span> <a href="#"><i class="fas fa-reply"></i> پاسخ</a></span>
                              </span>
                            </span>
                            <p>{{ $reply->content }}</p>
                            <span class="date float-right">{{ $reply->created_at->format('d M Y - H:i') }}</span>
                          </div>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="post-block mt-5 post-leave-comment">
                <h4 class="mb-3 secondary-font pb-1">دیدگاه خود را بیان کنید</h4>
                <form class="contact-form p-4 rounded bg-color-grey" action="" method="POST">
                  @csrf
                  <div class="p-2">
                    <div class="form-row">
                      <div class="form-group col-lg-6">
                        <label class="required font-weight-bold text-dark text-1-05em">نام کامل</label>
                        <input type="text" name="name" value="{{ old('name') }}" data-msg-required="لطفا نام خود را وارد کنید." maxlength="100" class="form-control" required="">
                      </div>
                      <div class="form-group col-lg-6">
                        <label class="required font-weight-bold text-dark text-1-05em">آدرس ایمیل</label>
                        <input type="email" name="email" value="{{ old('email') }}" data-msg-required="لطفا آدرس ایمیل خود را وارد کنید." data-msg-email="لطفا یک آدرس ایمیل معتبر وارد کنید." maxlength="100" class="form-control text-left" dir="ltr" required="">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col">
                        <label class="required font-weight-bold text-dark text-1-05em">دیدگاه</label>
                        <textarea name="content" maxlength="5000" data-msg-required="لطفا پیام خود را وارد کنید." rows="8" class="form-control" required="">{{ old('content') }}</textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col mb-0">
                        <input type="submit" value="ارسال دیدگاه" class="btn btn-primary btn-modern" data-loading-text="در حال بارگذاری ...">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection