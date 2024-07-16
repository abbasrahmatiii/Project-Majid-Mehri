@extends('layouts.master')

@section('content')
<div role="main" class="main">
  <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
      <div class="row">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
          <h1 class="text-dark font-weight-bold text-8">{{ $page->title }}</h1>
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
              <div class="post-meta mb-3 d-flex justify-content-between align-items-center">
                <div>
                  <span><i class="far fa-user"></i> توسط <a href="#">{{ $page->user->first_name }} {{ $page->user->last_name }}</a></span>
                </div>
                <div class="post-date">
                  <span class="day">{{ \Verta::instance($page->created_at)->format('d') }}</span>
                  <span class="month">{{ \Verta::instance($page->created_at)->format('F') }}</span>
                  <span class="year">{{ \Verta::instance($page->created_at)->format('Y') }}</span>
                </div>
              </div>
              <div class="main-content p-3">
                <p>{!! $page->body !!}</p>
              </div>
              <div class="post-block mt-5 post-share">
                <h4 class="mb-3 secondary-font">به اشتراک گذاری این مطلب</h4>
                <div class="d-flex justify-content-start flex-wrap">
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-facebook mr-2 mb-2">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($page->title) }}" target="_blank" class="btn btn-sm btn-icon btn-twitter mr-2 mb-2">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}&media={{ asset('storage/' . $page->image) }}&description={{ urlencode($page->title) }}" target="_blank" class="btn btn-sm btn-icon btn-pinterest mr-2 mb-2">
                    <i class="fab fa-pinterest"></i>
                  </a>
                  <a href="mailto:?subject={{ urlencode($page->title) }}&body={{ urlencode(request()->fullUrl()) }}" class="btn btn-sm btn-icon btn-email mr-2 mb-2">
                    <i class="fas fa-envelope"></i>
                  </a>
                  <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($page->title) }}" target="_blank" class="btn btn-sm btn-icon btn-telegram mr-2 mb-2">
                    <i class="fab fa-telegram-plane"></i>
                  </a>
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($page->title) }}" target="_blank" class="btn btn-sm btn-icon btn-linkedin mr-2 mb-2">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-whatsapp mr-2 mb-2">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                  <a href="https://www.instagram.com/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-instagram mr-2 mb-2">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a href="https://www.aparat.com/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-icon btn-aparat mr-2 mb-2">
                    <i class="fa fa-video"></i>
                  </a>
                </div>
              </div>
              <div class="post-block mt-4 pt-2 post-author">
                <h4 class="mb-3 secondary-font pb-1">نویسنده</h4>
                <div class="img-thumbnail img-thumbnail-no-borders rounded-circle">
                  <a href="1">
                    <img src="{{ asset('img/avatars/avatar.jpg') }}" alt="{{ $page->user->first_name }}" class="img-fluid rounded-circle" style="border-radius: 100% !important;width: 100%; height: 100%; object-fit: cover;">
                  </a>
                </div>
                <p><strong class="name"><a href="#" class="text-4 pb-1 d-block">{{ $page->user->first_name }}</a></strong></p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .post-thumbnail img {
    max-width: 300px;
    margin: 0 auto;
    display: block;
    border-radius: 10px;
  }

  .post-date {
    font-size: 0.9em;
    color: #888;
  }

  .post-content {
    background-color: #fff;
    padding: 10px;
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

  .main-content p {
    padding: 0 15px;
    /* فاصله از دو طرف متن اصلی */
  }

  .main-content img {
    margin: 2px 15px;
    /* فاصله عکس از متن‌های کناری */
    display: block;
    max-width: 100%;
    height: auto;
  }

  h2.font-weight-bold {
    margin-top: 0;
  }

  .post-share .btn {
    margin-bottom: 5px;
  }

  @media (max-width: 768px) {

    .post-meta,
    .post-share .btn {
      display: block;
      text-align: center;
    }

    .post-share .btn {
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 10px;
    }
  }
</style>
@endsection