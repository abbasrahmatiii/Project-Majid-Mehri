@php
$whoWeAre = App\Models\WhoWeAre::first();
@endphp

@if($whoWeAre && $whoWeAre->title)
<section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-6 pb-4 pb-lg-0 pr-lg-5 mb-sm-5 mb-lg-0">
        <h2 class="text-color-dark font-weight-normal text-4 mb-2">{{ $whoWeAre->title }}</h2>
        <p class="lead text-small">{!! $whoWeAre->lead !!}</p>
        <p class="pr-5 mr-5 text-small">{!! $whoWeAre->content !!}</p>
        <a href="{{ $whoWeAre->button_link }}" class="btn btn-dark font-weight-semibold btn-px-4 btn-py-2 text-2">{{ $whoWeAre->button_text }}</a>
      </div>
      <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 mt-sm-5" style="top: 1.7rem;">
        <img src="{{ asset('storage/images/'.$whoWeAre->image1) }}" class="img-fluid position-absolute d-none d-sm-block appear-animation image-size" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; right: -50%;" alt="">
        <img src="{{ asset('storage/images/'.$whoWeAre->image2) }}" class="img-fluid position-absolute d-none d-sm-block appear-animation image-size" data-appear-animation="expandIn" style="top: -33%; right: -29%;" alt="">
        <img src="{{ asset('storage/images/'.$whoWeAre->image3) }}" class="img-fluid position-relative appear-animation image-size mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="">
      </div>
    </div>
  </div>
</section>

<style>
  .text-small {
    font-size: 0.875rem;
    /* اندازه فونت کوچک برای متن‌ها */
  }

  .image-size {
    width: auto;
    height: 150px;
    /* تنظیم اندازه تصاویر به 150 پیکسل */
  }

  h2.text-4 {
    font-size: 1.5rem;
    /* تنظیم اندازه فونت عنوان */
  }
</style>
@endif