@extends('layouts.master')

@section('content')
<div role="main" class="main">
  <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
      <div class="row">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid thumbnail-image" alt="{{ $article->title }}">
            <h1 class="text-dark font-weight-bold text-5 ml-3">{{ $article->title }}</h1>
          </div>
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
            <div class="post-content ml-0 p-4 rounded bg-white shadow-sm mt-4">
              <div class="post-meta">
                <span><i class="far fa-user"></i> توسط <a href="#">{{ $article->user->first_name }} {{ $article->user->last_name }}</a></span>
                <span><i class="far fa-folder"></i> <a href="#">{{ $article->category->name }}</a></span>
                <span><i class="far fa-calendar-alt"></i> {{ \Verta::instance($article->created_at)->format('d F Y') }}</span>
              </div>
              <div class="post-body">
                {!! $article->body !!}
              </div>
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
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .thumbnail-image {
    width: 70px;
    height: 70px;
    border-radius: 10px;
  }

  .page-header-md .container {
    padding-bottom: 0;
    /* حذف فاصله پایین */
  }

  .page-header-md .row {
    margin-bottom: 0;
    /* حذف فاصله پایین */
  }

  .page-header-md .col-md-12 {
    margin-bottom: 0;
    /* حذف فاصله پایین */
  }

  .blog-single-post .post-content {
    margin-top: 20px;
    /* کاهش فاصله بین عنوان و تصویر */
  }

  .post-body img {
    margin: 10px !important;
    /* ایجاد فاصله بین تصاویر و متون */
    max-width: 100%;
    /* اطمینان از اینکه تصاویر از عرض صفحه تجاوز نمی‌کنند */
    border-radius: 10px;
    /* خمیده کردن گوشه‌ها */
  }

  .post-body p {
    margin-top: 20px;
    /* فاصله بین پاراگراف‌ها */
  }

  .post-meta span {
    display: inline-block;
    margin-right: 10px;
  }

  .post-meta span i {
    margin-right: 5px;
  }
</style>
@endsection