<section class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn">
  <div class="container">
    <div class="row">
      <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
        <h2 class="font-weight-bold text-color-light text-6 pb-1">آخرین مقالات</h2>
      </div>
    </div>
    <div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
      @foreach($latestArticles as $article)
      <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
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
            <p>{!! Str::limit($article->summary, 120) !!}</p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-success btn-sm">خواندن مقاله</a>
              <span class="date text-muted">{{ \Verta::instance($article->created_at)->format('d F') }}</span>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section>

<style>
  .article-box {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
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
    /* تنظیم ارتفاع ثابت برای تصویر */
    overflow: hidden;
  }

  .article-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* تصویر به صورت فیت و بدون تغییر نسبت در باکس قرار می‌گیرد */
  }

  .article-content {
    background-color: #fff;
    padding: 15px;
    color: #000;
    flex: 1;
    /* محتوای مقاله فضای باقی‌مانده را پر می‌کند */
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
    /* متن خلاصه فضای باقی‌مانده را پر می‌کند */
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
</style>