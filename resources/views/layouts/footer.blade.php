<footer id="footer" class="mt-0">
  <div class="container my-4">
    <div class="row pt-5 py-lg-5">
      <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
        <h5 class="text-6 font-weight-light text-color-light mb-4">مکان</h5>
        <p class="text-4 mb-0">{{ $settings->address ?? 'فلکه دانشگاه' }}</p>
      </div>
      <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
        <h5 class="text-6 font-weight-light text-color-light mb-4">ساعات کاری</h5>
        <p class="text-4 mb-0">{{ $contact->working_hours ?? 'شنبه - چهارشنبه: 8:30 صبح تا 5 عصر، پنجشنبه: 9:30 صبح تا 1 عصر، جمعه: تعطیل' }}</p>
      </div>
      <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
        <h5 class="text-6 font-weight-light text-color-light mb-4">روزهای کاری</h5>
        <p class="text-4 mb-0">{{ $contact->working_days ?? 'شنبه - چهارشنبه: 8:30 صبح تا 5 عصر، پنجشنبه: 9:30 صبح تا 1 عصر، جمعه: تعطیل' }}</p>
      </div>
      <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
        <h5 class="text-6 font-weight-light text-color-light mb-3">اکنون تماس بگیرید</h5>
        <p class="text-7 text-color-light font-weight-light mb-2"><span class="ltr-text">{{ $contact->phone_number ?? '' }}</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <h5 class="text-6 font-weight-light text-color-light mb-4 pb-1">شبکه های اجتماعی</h5>
        <ul class="footer-social-icons social-icons m-0 justify-content-center">
          @if(!empty($contact->facebook_url))
          <li class="social-icons-facebook">
            <a href="{{ $contact->facebook_url }}" target="_blank" title="Facebook">
              @if(isset($contact->facebook_icon))
              <img src="{{ asset('/storage/icons/'. $contact->facebook_icon) }}" alt="Facebook" width="20">
              @else
              <i class="fab fa-facebook-f"></i>
              @endif
            </a>
          </li>
          @endif
          @if(!empty($contact->twitter_url))
          <li class="social-icons-twitter">
            <a href="{{ $contact->twitter_url }}" target="_blank" title="Twitter">
              @if(isset($contact->twitter_icon))
              <img src="{{ asset('/storage/icons/'. $contact->twitter_icon) }}" alt="Twitter" width="20">
              @else
              <i class="fab fa-twitter"></i>
              @endif
            </a>
          </li>
          @endif
          @if(!empty($contact->linkedin_url))
          <li class="social-icons-linkedin">
            <a href="{{ $contact->linkedin_url }}" target="_blank" title="Linkedin">
              @if(isset($contact->linkedin_icon))
              <img src="{{ asset('/storage/icons/'. $contact->linkedin_icon) }}" alt="Linkedin" width="20">
              @else
              <i class="fab fa-linkedin-in"></i>
              @endif
            </a>
          </li>
          @endif
          @if(!empty($contact->instagram_url))
          <li class="social-icons-instagram">
            <a href="{{ $contact->instagram_url }}" target="_blank" title="Instagram">
              @if(isset($contact->instagram_icon))
              <img src="{{ asset('/storage/icons/'. $contact->instagram_icon) }}" alt="Instagram" width="20">
              @else
              <i class="fab fa-instagram"></i>
              @endif
            </a>
          </li>
          @endif
          @if(!empty($contact->telegram_url))
          <li class="social-icons-telegram">
            <a href="{{ $contact->telegram_url }}" target="_blank" title="Telegram">
              @if(isset($contact->telegram_icon))
              <img src="{{ asset('/storage/icons/'. $contact->telegram_icon) }}" alt="Telegram" width="20">
              @else
              <i class="fab fa-telegram"></i>
              @endif
            </a>
          </li>
          @endif
          @if(!empty($contact->whatsapp_url))
          <li class="social-icons-whatsapp">
            <a href="{{ $contact->whatsapp_url }}" target="_blank" title="WhatsApp">
              @if(isset($contact->whatsapp_icon))
              <img src="{{ asset('/storage/icons/'. $contact->whatsapp_icon) }}" alt="WhatsApp" width="20">
              @else
              <i class="fab fa-whatsapp"></i>
              @endif
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer-copyright footer-copyright-style-2">
      <div class="py-2">
        <div class="row py-4">
          <div class="col d-flex align-items-center justify-content-center">
            <p>{{ $contact->copyright_text ?? 'ارائه شده توسط عباس رحمتی' }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>