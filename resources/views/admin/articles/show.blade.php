@extends('layouts.master')

@section('content')
<div role="main" class="main">
  <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
      <div class="row">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
          <h1 class="text-dark font-weight-bold text-8">{{ $article->title }}</h1>
          <span class="sub-title text-dark">{!! $article->summary !!}</span>
        </div>
        <div class="col-md-12 align-self-center order-1">
          <ul class="breadcrumb d-block text-center">
            <li><a href="/">خانه</a></li>
            <li><a href="{{ route('articles.index') }}">بلاگ</a></li>
            <li class="active">{{ $article->title }}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-4">
    <div class="row">
      <div class="col">
        @if (session('message'))
        <div class="alert alert-info text-center">
          {{ session('message') }}
        </div>
        @endif

        <div class="blog-posts single-post">
          <article class="post post-large blog-single-post border-0 m-0 p-0">

            <div class="post-content ml-0 p-0 rounded bg-white shadow-sm mt-0">
              <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mx-auto d-block" alt="{{ $article->title }}">
            </div>
            <div class="post-content ml-0 p-4 rounded bg-white shadow-sm mt-4">
              <div class="post-date ml-0">
                <span class="day">{{ \Verta::instance($article->created_at)->format('d') }}</span>
                <span class="month">{{ \Verta::instance($article->created_at)->format('F') }}</span>
              </div>

              <div class="post-meta">
                <span><i class="far fa-user"></i> توسط <a href="#">{{ $article->user->first_name }} {{ $article->user->last_name }}</a> </span>
                <span><i class="far fa-folder"></i> <a href="#">{{ $article->category->name }}</a></span>

              </div>
              <p>{!! $article->body !!}</p>
              <div class="post-block mt-5 post-share">
                <h4 class="mb-3 secondary-font">به اشتراک گذاری این مطلب</h4>
                <div class="d-flex justify-content-start">
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-facebook mr-2">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" target="_blank" class="btn btn-sm btn-icon btn-twitter mr-2">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}&media={{ asset('storage/' . $article->image) }}&description={{ urlencode($article->title) }}" target="_blank" class="btn btn-sm btn-icon btn-pinterest mr-2">
                    <i class="fab fa-pinterest"></i>
                  </a>
                  <a href="mailto:?subject={{ urlencode($article->title) }}&body={{ urlencode(request()->fullUrl()) }}" class="btn btn-sm btn-icon btn-email mr-2">
                    <i class="fas fa-envelope"></i>
                  </a>
                  <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" target="_blank" class="btn btn-sm btn-icon btn-telegram mr-2">
                    <i class="fab fa-telegram-plane"></i>
                  </a>
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($article->title) }}" target="_blank" class="btn btn-sm btn-icon btn-linkedin mr-2">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-whatsapp mr-2">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                  <a href="https://www.instagram.com/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-instagram mr-2">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a href="https://www.aparat.com/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-aparat mr-2">
                    <i class="fa fa-video"></i>
                  </a>
                </div>
              </div>

              <div class="post-block mt-4 pt-2 post-author">
                <h4 class="mb-3 secondary-font pb-1">نویسنده</h4>
                <div class="img-thumbnail img-thumbnail-no-borders rounded-circle">
                  <a href="1">
                    <img src="{{ asset('img/avatars/avatar.jpg') }}" alt="{{ $article->user->name }}" class="img-fluid rounded-circle" style="border-radius: 100% !important;width: 100%; height: 100%; object-fit: cover;">
                  </a>
                </div>
                <p><strong class="name"><a href="#" class="text-4 pb-1 d-block">{{ $article->user->name }}</a></strong></p>
                <p>{{ $article->user->bio }}</p>
              </div>


            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function showReplyForm(commentId) {
    // Hide all reply forms
    document.querySelectorAll('.reply-form').forEach(form => form.style.display = 'none');
    // Show the reply form for the specific comment
    document.getElementById('reply-form-' + commentId).style.display = 'block';
  }
</script>
<style>
  .comment {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
    /* کاهش فاصله بین کامنت‌ها */
  }

  .img-thumbnail {
    flex-shrink: 0;
    width: 40px;
    /* کاهش اندازه آواتار */
    height: 40px;
    /* کاهش اندازه آواتار */
    border-radius: 50%;
  }

  .comment-block {
    flex-grow: 1;
    margin-left: 1px;
    /* کاهش فاصله بین آواتار و متن کامنت */
  }

  .comment-content-box {
    /* border: 1px solid #ccc; */
    border-radius: 8px;
    padding: 0px;
    /* کاهش padding داخل باکس کامنت */
    margin-bottom: 1px;
    /* کاهش فاصله بین باکس کامنت و سایر عناصر */
  }

  .comment-by {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .date {
    font-size: 0.85em;
    color: #888;
  }

  .reply-form {
    margin-top: 10px;
  }

  .comment-arrow {
    /* Adjust the arrow style or remove it */
  }

  .comment-content-box p {
    margin: 0;
  }

  .comment-content-box .date {
    margin-top: 10px;
    display: block;
  }

  .post-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .post-meta span {
    display: inline-block;
    margin-right: 5px;
  }

  .post-meta span i {
    margin-right: 5px;
  }

  .post-image {
    width: 100%;
  }

  .post-date {
    display: none;
  }

  h2.font-weight-bold {
    margin-top: 0;
  }
</style>
@endsection