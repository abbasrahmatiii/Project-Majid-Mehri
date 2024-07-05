<!DOCTYPE html>
<html dir="rtl">

<head>
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! Twitter::generate() !!}
  {!! JsonLd::generate() !!}
  <title>{{ SEOMeta::getTitle() }}</title>
  <meta name="keywords" content="{{ $settings->meta_keywords ?? 'کلیدواژه‌ها' }}">
  <meta name="description" content="{{ $settings->meta_description ?? 'توضیحات سایت' }}">
  <meta name="author" content="author">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

  <!-- Additional Header Tags -->
  {!! $settings->additional_header_tags ?? '' !!}

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/vendor/animate/animate.min.css">
  <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.min.css">
  <link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="/vendor/magnific-popup/magnific-popup.min.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="/css/theme.css">
  <link rel="stylesheet" href="/css/theme-elements.css">
  <link rel="stylesheet" href="/css/theme-blog.css">
  <link rel="stylesheet" href="/css/theme-shop.css">

  <!-- Current Page CSS -->
  <link rel="stylesheet" href="/vendor/rs-plugin/css/settings.css">
  <link rel="stylesheet" href="/vendor/rs-plugin/css/layers.css">
  <link rel="stylesheet" href="/vendor/rs-plugin/css/navigation.css">
  <!-- سایر لینک‌های CSS -->
  <!-- Skin CSS -->
  <link rel="stylesheet" href="/css/skins/skin-corporate-3.css">

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="/css/custom.css">

  <!-- Head Libs -->
  <script src="/vendor/modernizr/modernizr.min.js"></script>
</head>

<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
  <div class="loading-overlay">
    <div class="bounce-loader">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
  <div class="body">
    @include('layouts.header')
    <div role="main" class="main">

      @yield('content')

    </div>
    @include('layouts.footer')
  </div>

  <!-- Vendor -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
  <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/vendor/jquery.cookie/jquery.cookie.min.js"></script>
  <script src="/vendor/popper/umd/popper.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/vendor/common/common.min.js"></script>
  <script src="/vendor/jquery.validation/jquery.validate.min.js"></script>
  <script src="/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
  <script src="/vendor/jquery.gmap/jquery.gmap.min.js"></script>
  <script src="/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
  <script src="/vendor/isotope/jquery.isotope.min.js"></script>
  <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="/vendor/vide/jquery.vide.min.js"></script>
  <script src="/vendor/vivus/vivus.min.js"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="/js/theme.js"></script>

  <!-- Current Page Vendor and Views -->
  <script src="/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script src="/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

  <!-- Current Page Vendor and Views -->
  <!-- <script src="/js/views/view.contact.js"></script> -->

  <!-- Theme Custom -->
  <script src="/js/custom.js"></script>

  <!-- Theme Initialization Files -->
  <script src="js/theme.init.js"></script>

  <!-- Google Analytics -->
  @if(!empty($settings->google_analytics))
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', '{{ $settings->google_analytics }}', 'auto');
    ga('send', 'pageview');
  </script>
  @endif
  <!-- Additional Footer Tags -->
  {!! $settings->additional_footer_tags ?? '' !!}
</body>

</html>