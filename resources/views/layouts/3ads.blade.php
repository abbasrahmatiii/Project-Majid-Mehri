@if($centerAds->isNotEmpty())
<section class="section bg-color-light border-0 m-0">
  <div class="container">
    <div class="row text-center text-md-left mt-4">
      @foreach($centerAds as $ad)
      <div class="col-md-4 mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
        <div class="row justify-content-center justify-content-md-start">
          <div class="col-4">
            <img class="img-fluid mb-4" src="{{ asset( $ad->image) }}" alt="{{ $ad->title }}">
          </div>
          <div class="col-lg-8">
            <h2 class="font-weight-bold text-5 line-height-8 mb-1">{{ $ad->title }}</h2>
            <p class="mb-0">{{ $ad->description }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif