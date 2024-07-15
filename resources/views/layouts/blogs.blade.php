<section class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn">
  <div class="container">
    <div class="row">
      <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
        <h2 class="font-weight-bold text-color-light text-6 pb-1">آخرین مطالب</h2>
      </div>
    </div>
    <div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
      @foreach($latestPosts as $post)
      <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
        <article>
          <div class="row">
            <div class="col">
              <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid hover-effect-2 mb-3" alt="{{ $post->title }}">
              </a>
            </div>
          </div>
          <div class="row my-1">
            <div class="col-auto pr-0">
              <div class="date">
                <span class="day bg-color-light text-color-dark font-weight-extra-bold">{{ \Verta::instance($post->created_at)->format('d') }}</span>
                <span class="month bg-color-light font-weight-semibold text-color-primary text-1 top-1">{{ \Verta::instance($post->created_at)->format('F') }}</span>
              </div>
            </div>
            <div class="col pl-1">
              <h4 class="line-height-8 text-4 primary-font mt-n1">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-light">{{ $post->title }}</a>
              </h4>
              <p class="text-color-light opacity-6 pr-4 mb-1">{!! Str::limit($post->summary, 100) !!}</p>
              <a href="{{ route('posts.show', $post->slug) }}" class="read-more text-color-light font-weight-semibold text-2 mt-1">بیشتر بخوانید <i class="fas fa-chevron-left text-1 ml-1"></i></a>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section>