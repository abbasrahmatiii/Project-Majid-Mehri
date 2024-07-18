<!-- resources/views/testimonials.blade.php -->

<section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
  <div class="container pb-2">
    <div class="row">
      <div class="col-lg-6 text-center text-md-left mb-5 mb-lg-0">
        <h2 class="text-color-dark font-weight-normal text-6 mb-2">نظر <strong class="font-weight-extra-bold">مشتریان ما</strong></h2>
        <p class="lead">راهی به سوی آینده‌ای روشن، با مشاوره‌های تحصیلی هوشمند.</p>
      </div>
      <div class="col-lg-6">
        <div class="testimonial-carousel">
          @foreach($testimonials as $testimonial)
          <div class="testimonial-slide {{ $loop->first ? 'active' : '' }}">
            <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote pl-md-4 mb-0">
              <div class="testimonial-author">
                <img src="{{ $testimonial->image }}" class="img-fluid rounded-circle mb-0" alt="">
              </div>
              <blockquote>
                <p class="text-color-dark text-4 mb-0">{!! $testimonial->content !!}</p>
              </blockquote>
              <div class="testimonial-author">
                <p><strong class="font-weight-extra-bold text-2">{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</strong></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    function showNextSlide() {
      var $activeSlide = $('.testimonial-slide.active');
      var $nextSlide = $activeSlide.next('.testimonial-slide');
      if ($nextSlide.length === 0) {
        $nextSlide = $('.testimonial-slide').first();
      }
      $activeSlide.removeClass('active').fadeOut(1000, function() {
        $nextSlide.addClass('active').fadeIn(1000);
      });
    }

    // Set initial active slide
    $('.testimonial-slide').hide();
    $('.testimonial-slide.active').show();

    // Automatic slide change every 10 seconds
    setInterval(showNextSlide, 15000);
  });
</script>

<style>
  .testimonial-slide {
    display: none;
  }

  .testimonial-slide.active {
    display: block;
  }
</style>