<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 148, 'stickySetTop': '-148px', 'stickyChangeLogo': true}">
  <div class="header-body border-color-primary border-top-0 box-shadow-none">

    <div class="header-top header-top-default border-bottom-0 border-top-0">
      <div class="container">
        <div class="header-row py-2">
          <div class="header-column justify-content-start">
            <div class="header-row">
              <nav class="header-nav-top">
                <ul class="nav nav-pills text-uppercase text-2">
                  <li class="nav-item nav-item-anim-icon">
                    <a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-left"></i> درباره ما</a>
                  </li>
                  <li class="nav-item nav-item-anim-icon">
                    <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-left"></i> تماس با ما</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="header-column justify-content-end">
            <div class="header-row">
              <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">
                <li class="social-icons-facebook">
                  <a href="{{ $contact->facebook_url ?? 'http://www.facebook.com/' }}" target="_blank" title="Facebook">
                    @if(isset($contact->facebook_icon))
                    <img src="{{ asset('storage/' . $contact->facebook_icon) }}" alt="Facebook" width="20">
                    @else
                    <i class="fab fa-facebook-f"></i>
                    @endif
                  </a>
                </li>
                <li class="social-icons-twitter">
                  <a href="{{ $contact->twitter_url ?? 'http://www.twitter.com/' }}" target="_blank" title="Twitter">
                    @if(isset($contact->twitter_icon))
                    <img src="{{ asset('storage/' . $contact->twitter_icon) }}" alt="Twitter" width="20">
                    @else
                    <i class="fab fa-twitter"></i>
                    @endif
                  </a>
                </li>
                <li class="social-icons-linkedin">
                  <a href="{{ $contact->linkedin_url ?? 'http://www.linkedin.com/' }}" target="_blank" title="Linkedin">
                    @if(isset($contact->linkedin_icon))
                    <img src="{{ asset('storage/' . $contact->linkedin_icon) }}" alt="Linkedin" width="20">
                    @else
                    <i class="fab fa-linkedin-in"></i>
                    @endif
                  </a>
                </li>
              </ul>
            </div>
            <div class="header-row">
              <nav class="header-nav-top">
                <ul class="nav nav-pills text-uppercase text-2">
                  @if(Auth::check())
                  <li class="nav-item nav-item-anim-icon">
                    <a class="nav-link pl-0" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i> خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                  <li class="nav-item nav-item-anim-icon">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i> {{ Auth::user()->first_name }}</a>
                  </li>
                  @else
                  <li class="nav-item nav-item-anim-icon">
                    <a class="nav-link pl-0" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> ورود</a>
                  </li>
                  <li class="nav-item nav-item-anim-icon">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> ثبت نام</a>
                  </li>
                  @endif
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-container container z-index-2">
      <div class="header-row py-2">
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo header-logo-sticky-change">
              <a href="/">
                @if(isset($contact->logo))
                <img class="header-logo-sticky opacity-0" alt="Logo" width="100" height="48" data-sticky-width="89" data-sticky-height="43" data-sticky-top="88" src="{{ asset('storage/' . $contact->logo) }}">
                <img class="header-logo-non-sticky opacity-0" alt="Logo" width="100" height="48" src="{{ asset('storage/' . $contact->logo) }}">
                @else
                <img class="header-logo-sticky opacity-0" alt="Logo" width="100" height="48" data-sticky-width="89" data-sticky-height="43" data-sticky-top="88" src="img/logo-dark.png">
                <img class="header-logo-non-sticky opacity-0" alt="Logo" width="100" height="48" src="img/logo-default.png">
                @endif
              </a>
            </div>
          </div>
        </div>
        <div class="header-column justify-content-end">
          <div class="header-row">
            <ul class="header-extra-info d-flex align-items-center">
              <li class="d-none d-sm-inline-flex">
                <div class="header-extra-info-text">
                  <label>برای ما یک ایمیل ارسال کنید</label>
                  <strong><a href="mailto:{{ $contact->contact_email ?? 'mail@example.com' }}">{{ $contact->contact_email ?? 'mail@example.com' }}</a></strong>
                </div>
              </li>
              <li>
                <div class="header-extra-info-text">
                  <label>هم اکنون تماس بگیرید</label>
                  <strong><a class="ltr-text" href="tel:{{ $contact->phone_number ?? '8001234567' }}">{{ $contact->phone_number ?? '800 123 4567' }}</a></strong>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.nav')
  </div>
</header>