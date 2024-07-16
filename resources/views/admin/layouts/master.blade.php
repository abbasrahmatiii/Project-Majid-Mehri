<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->

<head>
  <base href="">
  <meta charset="utf-8" />
  <title>داشبرد مدیریت سایت</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- Summernote CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">


  <meta name="description" content="Updates and statistics" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="/css/all.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--begin::Fonts-->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> end::Fonts -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
  <!--begin::Page Vendors Styles(used by this page)-->
  <link href="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <!--end::Page Vendors Styles-->
  <!-- persian-datepicker CSS -->
  <link rel="stylesheet" href="/css/persian-datepicker.min.css">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- اضافه کردن فایل CSS -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="/admin/assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/style.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles-->

  <!--begin::Layout Themes(used by all pages)-->
  <link href="/admin/assets/css/themes/layout/header/base/light.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/themes/layout/header/menu/light.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/themes/layout/brand/dark.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/themes/layout/aside/dark.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <!--end::Layout Themes-->

  <link rel="shortcut icon" href="/admin/assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->


<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

  <!--begin::Main-->
  <!--begin::Header Mobile-->
  <div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
    <!--begin::Logo-->
    <a href="/">
      رفتن به وبسایت
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <!--begin::Aside Mobile Toggle-->
      <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
        <span></span>
      </button>
      <!--end::Aside Mobile Toggle-->

      <!--begin::Header Menu Mobile Toggle-->
      <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
        <span></span>
      </button>
      <!--end::Header Menu Mobile Toggle-->

      <!--begin::Topbar Mobile Toggle-->
      <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
        <span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/عمومی/User.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <polygon points="0 0 24 0 24 24 0 24" />
              <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
              <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
            </g>
          </svg><!--end::Svg Icon--></span> </button>
      <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
  </div>
  <!--end::Header Mobile-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

      <!--begin::Aside-->
      <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
        <!--begin::Brand-->
        <div class="brand flex-column-auto " id="kt_brand">
          <!--begin::Logo-->
          <a href="/" class="brand-logo">
            رفتن به وبسایت
          </a>
          <!--end::Logo-->

          <!--begin::Toggle-->
          <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                  <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                </g>
              </svg><!--end::Svg Icon--></span> </button>
          <!--end::Toolbar-->
        </div>
        <!--end::Brand-->

        <!--begin::Aside Menu-->
        <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

          <!--begin::Menu Container-->
          <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <!--begin::Menu Nav-->
            <ul class="menu-nav ">
              <li class="menu-item  menu-item-active" aria-haspopup="true">
                <a href="/admin/dashboard" class="menu-link ">
                  <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/desgin/Layers.svg-->
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
                  </span>
                  <span class="menu-text">داشبورد</span>
                </a>
              </li>

              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M12 0c-3.313 0-6 2.687-6 6 0 2.961 2.164 5.436 5 5.92v.08c-2.836.484-5 2.959-5 5.92 0 3.313 2.687 6 6 6s6-2.687 6-6c0-2.961-2.164-5.436-5-5.92v-.08c2.836-.484 5-2.959 5-5.92 0-3.313-2.687-6-6-6zm0 20c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4zm0-10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z" />
                    </svg>
                  </span>
                  <span class="menu-text">تنظیمات سراسری</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/settings/edit" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">تنظیمات سئو</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/contact/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">تنظیمات عمومی</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/roles/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">مدیریت نقش‌ها</span>
                      </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                      <a href="{{ route('admin.user.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">اختصاص نقش به کاربر</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="who-we-are/edit" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">ما چه کسی هستیم</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>



              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M19 3h-14c-1.104 0-2 .896-2 2v14c0 1.104.896 2 2 2h14c1.104 0 2-.896 2-2v-14c0-1.104-.896-2-2-2zm-14 2h14v14h-14v-14zm3 2h2v2h-2v-2zm6 0h2v2h-2v-2zm-6 4h2v2h-2v-2zm6 0h2v2h-2v-2zm-6 4h2v2h-2v-2zm6 0h2v2h-2v-2z" />
                    </svg>
                  </span>
                  <span class="menu-text">مدیریت صفحات</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item" aria-haspopup="true">
                      <a href="{{ route('pages.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست صفحات</span>
                      </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                      <a href="{{ route('pages.create') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">ایجاد صفحه جدید</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>




              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M6 4h10v2h-10v-2zm0 4h10v2h-10v-2zm0 4h7v2h-7v-2zm12-8h3v3h-3v-3zm0 8h3v3h-3v-3zm0 8h3v3h-3v-3zm-8-1h-10v-18h18v10h-8v8z" />
                    </svg>
                  </span>
                  <span class="menu-text">مقالات</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/articles/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">ایجاد مقاله</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/articles/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست مقالات</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>








              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M12 12c2.28 0 4.14-1.86 4.14-4.14S14.28 3.72 12 3.72 7.86 5.58 7.86 7.86 9.72 12 12 12zm0 1.62c-3.42 0-10.14 1.72-10.14 5.16V21h20.28v-2.22c0-3.44-6.72-5.16-10.14-5.16z" />
                    </svg>
                  </span>
                  <span class="menu-text">کاربران</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/users/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">افزودن کاربر جدید</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/users/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست کاربران</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>



              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 14H3V5h18v12zm-3-9l-4 5-3-3.86L6 15h12z" />
                    </svg>
                  </span>
                  <span class="menu-text">اسلایدشو</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/slide/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">افزودن اسلاید</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/slide/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست اسلایدها</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>



              <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M9 3h15v18h-22v-18h7c0-1.104.896-2 2-2h2c1.104 0 2 .896 2 2zm-4 12h-2v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm0-4h-2v2h2v-2zm0-4h-2v2h2v-2zm-4 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm0 4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2z" />
                    </svg>
                  </span>
                  <span class="menu-text">تبلیغ بخش میانی</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/centerads/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">افزودن تبلیغ میانی</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/centerads/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست تبلیغ بخش میانی</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>


              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M21.926,10.348c0.027-0.216,0.074-0.428,0.074-0.648C22,6.222,17.97,4,12,4S2,6.222,2,9.7c0,0.22,0.047,0.432,0.074,0.648C1.601,11.357,1,12.51,1,13.8c0,3.478,4.03,5.7,10,5.7c0.551,0,1.092-0.021,1.621-0.061C13.263,20.528,13,21.419,13,22.5c0,0.315,0.029,0.624,0.068,0.927C9.4,23.795,5,22.264,5,19.5c0-1.425,1.187-2.671,3.09-3.51C5.743,14.709,4,13.123,4,11.15c0-0.315,0.047-0.622,0.106-0.928C4.044,10.084,4,9.894,4,9.7c0-2.341,3.104-4.2,8-4.2s8,1.859,8,4.2c0,0.194-0.044,0.384-0.106,0.572C19.953,10.528,20,10.835,20,11.15c0,1.973-1.743,3.559-4.09,4.34c1.903,0.839,3.09,2.084,3.09,3.51c0,1.477-2.075,2.722-5,3.232c0.039-0.303,0.068-0.612,0.068-0.927c0-1.081-0.263-1.972-0.621-2.561C17.908,19.439,22,17.055,22,13.8C22,12.51,21.399,11.357,21.926,10.348z M8.009,14.966C6.713,15.592,6,16.447,6,17.25c0,1.292,2.925,2.25,6,2.25c0.174,0,0.338-0.019,0.506-0.024C12.18,19.096,11.691,18,10,18c-2.206,0-4-1.794-4-4c0-0.063,0.017-0.123,0.019-0.186C6.595,14.005,7.323,14.514,8.009,14.966z" />
                    </svg>
                  </span>
                  <span class="menu-text">مدیریت بلاگ</span>
                  @if($pendingCommentsCount != 0)
                  <span class="badge badge-danger">{{ $pendingCommentsCount }}</span>
                  @endif
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/posts/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">افزودن پست جدید</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/posts/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست پست‌ها</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/posts/comments" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">نظرات</span>
                        @if($pendingCommentsCount != 0)
                        <span class="badge-danger1">{{ $pendingCommentsCount }}</span>
                        @endif
                      </a>
                    </li>
                  </ul>
                </div>
              </li>








              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M4 6h2v12h-2v-12zm4 4h2v8h-2v-8zm4-6h2v14h-2v-14zm4 8h2v6h-2v-6zm4 2h2v4h-2v-4z" />
                    </svg>
                  </span>
                  <span class="menu-text">دسته‌بندی موضوعی</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/categories/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">افزودن دسته‌بندی</span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/categories/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست دسته‌بندی‌ها</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>










              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                      <path d="M2 3h20v18h-20v-18zm12 9h6v2h-6v-2zm-2 4h-6v-2h6v2zm-2-8h-6v-2h6v2zm0 4h-6v-2h6v2zm12 8h-8v-2h8v2zm0-12h-8v-2h8v2z" />
                    </svg>
                  </span>
                  <span class="menu-text">مدیریت مشاوره</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item" aria-haspopup="true">
                      <a href="/admin/time_slots/index" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">مدیریت بازه‌های زمانی</span>
                      </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                      <a href="/admin/consultations/index" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">زمان‌های مشاوره</span>
                      </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                      <a href="{{ route('admin.reservations.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">وقت‌های رزرو شده</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>








            </ul>
            <!--end::Menu Nav-->

            <!--end::Menu Nav-->
          </div>
          <!--end::Menu Container-->
        </div>
        <!--end::Aside Menu-->
      </div>
      <!--end::Aside-->

      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        @include('admin.layouts.header')

        <!--begin::Content-->

        <!-- @if(session('error'))
        <div class="content mr-3 ml-3">

          <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        @else
        @endif -->

        <div class="content  d-flex flex-column flex-column-fluid " id="kt_content">

          <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">

          </div>
          @yield('content')
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <!-- Summernote JS -->
          <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        </div>
        <!--end::Content-->

        <!--begin::Footer-->
        <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
          <!--begin::Container-->
          <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::کپی رایت-->
            <div class="text-dark order-2 order-md-1">
              <span class="text-muted font-weight-bold mr-2">2024&copy;</span>
            </div>
            <!--end::کپی رایت-->

            <!--begin::Nav-->
            <div class="nav nav-dark">

            </div>
            <!--end::Nav-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Footer-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Main-->





  <!-- begin::User Panel-->
  <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
      <h3 class="font-weight-bold m-0">
        پروفایل کاربر
        <small class="text-muted font-size-sm ml-2">12 پیام</small>
      </h3>
      <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
        <i class="ki ki-close icon-xs text-muted"></i>
      </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
      <!--begin::Header-->
      <div class="d-flex align-items-center mt-5">
        <div class="symbol symbol-100 mr-5">
          <div class="symbol-label" style="background-image:url('/admin/assets/media/users/300_21.jpg')"></div>
          <i class="symbol-badge bg-success"></i>
        </div>
        <div class="d-flex flex-column">
          @auth
          <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
          </a>
          @endauth

          <div class="navi mt-2">
            <a href="#" class="navi-item">
              <span class="navi-link p-0 pb-2">
                <span class="navi-icon mr-1">
                  <span class="svg-icon svg-icon-lg svg-icon-primary">
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/Mail-notification.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
                  </span>
                </span>
              </span>
            </a>

            <a href="{{ route('logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
      </div>
      <!--end::Header-->

      <!--begin::Separator-->
      <div class="separator separator-dashed mt-8 mb-5"></div>
      <!--end::Separator-->

      <!--begin::Nav-->

      <!--end::Nav-->




    </div>
    <!--end::Content-->
  </div>
  <!-- end::User Panel-->





  <!--begin::Global Config(global config for global JS scripts)-->
  <script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
  </script>
  <script>
    var KTAppSettings = {
      "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
      },
      "colors": {
        "theme": {
          "base": {
            "white": "#ffffff",
            "primary": "#3699FF",
            "secondary": "#E5EAEE",
            "success": "#17df3E",
            "info": "#8950FC",
            "warning": "#FFA800",
            "danger": "#F64E60",
            "light": "#E4E6EF",
            "dark": "#181C32"
          },
          "light": {
            "white": "#ffffff",
            "primary": "#E1F0FF",
            "secondary": "#EBEDF3",
            "success": "#C9F7F5",
            "info": "#EEE5FF",
            "warning": "#FFF4DE",
            "danger": "#FFE2E5",
            "light": "#F3F6F9",
            "dark": "#D6D6E0"
          },
          "inverse": {
            "white": "#ffffff",
            "primary": "#ffffff",
            "secondary": "#3F4254",
            "success": "#ffffff",
            "info": "#ffffff",
            "warning": "#ffffff",
            "danger": "#ffffff",
            "light": "#464E5F",
            "dark": "#ffffff"
          }
        },
        "gray": {
          "gray-100": "#F3F6F9",
          "gray-200": "#EBEDF3",
          "gray-300": "#E4E6EF",
          "gray-400": "#D1D3E0",
          "gray-500": "#B5B5C3",
          "gray-600": "#7E8299",
          "gray-700": "#5E6278",
          "gray-800": "#3F4254",
          "gray-900": "#181C32"
        }
      },
      "font-family": "Poppins"
    };
  </script>
  <!--end::Global Config-->

  <!--begin::Global Theme Bundle(used by all pages)-->
  <script src="/admin/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
  <script src="/admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
  <script src="/admin/assets/js/scripts.bundle.js?v=7.0.6"></script>
  <!--end::Global Theme Bundle-->

  <!--begin::Page Vendors(used by this page)-->
  <script src="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
  <!--end::Page Vendors-->

  <!--begin::Page Scripts(used by this page)-->
  <script src="/admin/assets/js/pages/widgets.js?v=7.0.6"></script>
  <script src="/admin/assets/js/pages/crud/ktdatatable/base/data-local.js?v=7.0.6"></script>
  <!--end::Page Scripts-->

  <script type="importmap">
    {
      "imports": {
        "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
        "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
      }
    }
  </script>
  <script type="module">
    import {
      ClassicEditor,
      Essentials,
      Bold,
      Italic,
      Font,
      Paragraph,
      Image,
    } from 'ckeditor5';

    const editorConfig = {
      plugins: [Essentials, Bold, Italic, Font, Paragraph],
      toolbar: {
        items: [
          'undo', 'redo', '|', 'bold', 'italic', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
        ]
      },
      language: 'fa',
      image: {
        toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
      },
    };

    ClassicEditor
      .create(document.querySelector('#editor1'), editorConfig)
      .then(editor => {
        console.log('Editor1 is ready', editor);
      })
      .catch(error => {
        console.error(error);
      });

    ClassicEditor
      .create(document.querySelector('#editor2'), editorConfig)
      .then(editor => {
        console.log('Editor2 is ready', editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- jQuery -->
  <script src="/js/jquery.min.js"></script>
  <!-- persian-date JS -->
  <script src="/js/persian-date.min.js"></script>
  <!-- persian-datepicker JS -->
  <script src="/js/persian-datepicker.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#date').persianDatepicker({
        format: 'YYYY/MM/DD',
        autoClose: true,
        initialValue: false,
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
  @include('admin.layouts.notifications')
  <!-- @yield('js') -->
</body>
<!--end::Body-->


</html>