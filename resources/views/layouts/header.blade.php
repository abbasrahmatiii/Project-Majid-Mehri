<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 148, 'stickySetTop': '-148px', 'stickyChangeLogo': true}">
  <div class="header-body border-color-primary border-top-0 box-shadow-none">
    <div class="header-container container z-index-2">
      <div class="header-row py-2">
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo header-logo-sticky-change">
              <a href="/">
                @if(isset($contact->logo))
                <img style="position: absolute; top: -20px; right: 0;" class="header-logo-sticky opacity-0" alt="Logo" width="100" height="88" data-sticky-width="89" data-sticky-height="43" data-sticky-top="88" src="{{ asset('/storage/logos/'.$contact->logo) }}">
                <img class="header-logo-non-sticky opacity-0" alt="Logo" width="100" height="88" src="{{ asset('/storage/logos/'. $contact->logo) }}">
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