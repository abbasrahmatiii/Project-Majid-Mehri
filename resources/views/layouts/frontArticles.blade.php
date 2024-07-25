@extends('layouts.master')

@section('content')
<section class="section section-height-3 bg-light border-0 m-0 appear-animation" data-appear-animation="fadeIn">
  <div class="container">
    <div class="row">
      <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
        <h2 class="font-weight-bold text-color-dark text-6 pb-1">لیست مقالات</h2>
      </div>
    </div>
    <div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
      @foreach($latestArticles as $article)
      <div class="col-md-6 col-lg-3 mb-4 mb-lg-5">
        <article class="article-box">
          <div class="article-img">
            <a href="{{ route('articles.show', $article->slug) }}" class="text-decoration-none">
              <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid hover-effect-2 mb-3" alt="{{ $article->title }}">
            </a>
          </div>
          <div class="article-content">
            <h4 class="line-height-8 text-4 primary-font mt-n1">
              <a href="{{ route('articles.show', $article->slug) }}" class="text-dark">{!! Str::limit($article->title, 80) !!}</a>
            </h4>
            <p class="summary" style="font-size: 10px;">{!! Str::limit($article->summary, 150) !!}</p> <!-- اضافه کردن خلاصه مقاله -->
            <p>{!! Str::limit($article->content, 120) !!}</p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-success btn-sm read-more-btn">بخوانید</a>
              <div class="text-muted" style="font-size: 0.75rem;">
                <span style="font-size: 10px;">نویسنده : {{ $article->user->first_name }} {{ $article->user->last_name }}</span> | <span style="font-size: 10px;">{{ \Verta::instance($article->created_at)->format('d F') }}</span>
              </div>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
      {{ $latestArticles->links('pagination::bootstrap-4') }}
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

  .article-content .btn.read-more-btn {
    padding: 5px 10px;
    font-size: 0.6rem;
    border-radius: 10px !important;
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
</style>
@endsection