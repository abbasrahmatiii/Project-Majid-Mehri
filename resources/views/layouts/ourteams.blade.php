<div class="container">
  <div class="row py-5 my-5">
    <div class="col-md-6 order-2 order-md-1 text-center text-md-left appear-animation mt-4 mt-md-2" data-appear-animation="fadeInRightShorter">
      <div class="owl-carousel owl-theme nav-style-1 mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 3000}">
        @foreach($teamMembers as $member)
        <div class="team-member">
          <img class="img-fluid rounded-0 mb-2 team-member-img" src="{{ asset('storage/' . $member->profile_picture) }}" alt="{{ $member->user->first_name }} {{ $member->user->last_name }}">
          <h3 class="font-weight-bold text-color-dark text-3 mb-0 primary-font">{{ $member->user->first_name }} {{ $member->user->last_name }}</h3>
          <p class="text-2 mb-0">{{ $member->user->roles->pluck('name')->first() }}</p>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
      <h2 class="text-color-dark font-weight-normal text-5 mb-2"><strong class="font-weight-extra-bold">{{ $clientSection->title ?? 'تیم ما' }}</strong></h2>
      <p class="lead text-3">{!! $clientSection->description ?? 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.' !!}</p>
      <p class="mb-4 text-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p>
      <a href="{{ $clientSection->button_url ?? '#' }}" class="btn btn-dark font-weight-semibold rounded-0 px-4 btn-py-1 text-2 p-relative bottom-3">{{ $clientSection->button_text ?? 'آشنایی بیشتر' }}</a>
    </div>
  </div>
</div>

<style>
  .team-member-img {
    height: 200px;
    width: 200px;
  }

  .team-member h3 {
    font-size: 1.25rem;
    /* اندازه متن کوچکتر */
  }

  .team-member p {
    font-size: 0.875rem;
    /* اندازه متن کوچکتر */
  }

  .text-2 {
    font-size: 0.875rem;
    /* اندازه متن کوچکتر */
  }

  .text-3 {
    font-size: 1rem;
    /* اندازه متن کوچکتر */
  }

  .text-5 {
    font-size: 1.5rem;
    /* اندازه متن کوچکتر */
  }

  p img {
    margin: 10px;
    border-radius: 10px;
  }
</style>