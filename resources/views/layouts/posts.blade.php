@extends('layouts.master')

@section('content')
<section class="section section-height-3 bg-light border-0 m-0 appear-animation" data-appear-animation="fadeIn">
  <div class="container iransans-font">
    <div class="row">
      <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
        <h2 class="font-weight-bold text-color-dark text-6 pb-1">لیست پست‌ها</h2>
      </div>
    </div>
    <div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
      @foreach($posts as $post)
      <div class="col-md-6 col-lg-3 col-sm-6 mb-4 mb-lg-5"> <!-- اضافه کردن col-sm-6 برای اندازه‌های کوچک‌تر -->
        <article class="article-box">
          <div class="article-img">
            <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none">
              <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid hover-effect-2 mb-3" alt="{{ $post->title }}">
            </a>
          </div>
          <div class="article-content">
            <h4 class="line-height-8 text-4 primary-font mt-n1">
              <a href="{{ route('posts.show', $post->slug) }}" class="text-dark">{!! Str::limit($post->title, 80) !!}</a>
            </h4>
            <p class="summary" style="font-size: 10px;">{!! Str::limit($post->summary, 150) !!}</p> <!-- اضافه کردن خلاصه پست -->
            <p>{!! Str::limit($post->content, 120) !!}</p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-success btn-sm">ادامه مطلب</a>
              <span class="date text-muted">{{ \Verta::instance($post->created_at)->format('d F') }}</span>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
      {{ $posts->links('pagination::bootstrap-4') }}
    </div>
  </div>
</section>

<style>
  .article-box {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
    background-color: #f9f9f9;
    transition: box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .article-box:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .article-img {
    height: 150px;
    overflow: hidden;
  }

  .article-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .article-content {
    background-color: #fff;
    padding: 15px;
    color: #000;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .article-content h4 {
    font-size: 13px !important;
    margin-bottom: 10px;
  }

  .article-content p {
    font-size: 10px !important;
    margin-bottom: 10px;
    flex: 1;
  }

  .article-content a {
    text-decoration: none;
  }

  .article-content .btn {
    padding: 3px 8px;
    font-size: 0.75rem;
    border-radius: 15px;
  }

  .date {
    font-size: 0.75rem;
    color: #888;
  }

  .pagination .page-item.active .page-link {
    background-color: #28a745;
    border-color: #28a745;
  }

  .pagination .page-link {
    color: #28a745;
  }

  .pagination .page-link:hover {
    color: #218838;
  }

  /* مدیا کوئری برای اندازه‌های کوچک‌تر */
  @media (max-width: 767px) {
    .col-sm-6 {
      width: 100%;
      flex: 0 0 100%;
      max-width: 100%;
    }

    .article-box {
      margin-bottom: 20px;
    }
  }
</style>
@endsection