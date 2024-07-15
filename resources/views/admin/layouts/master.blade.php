<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->

<head>
  <base href="">
  <meta charset="utf-8" />
  <title>داشبرد مدیریت سایت</title>
  <meta name="description" content="Updates and statistics" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="\css\all.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--begin::Fonts-->
  <!-- <link rel="stylesheet" href="dddds://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> end::Fonts -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
  <!--begin::Page Vendors Styles(used by this page)-->
  <link href="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <!--end::Page Vendors Styles-->
  <!-- persian-datepicker CSS -->
  <link rel="stylesheet" href="\css\persian-datepicker.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- اضافه کردن فایل CSS -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!--begin::Global تم Styles(used by all pages)-->
  <link href="/admin/assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/style.bundle.rtl.css?v=7.0.6" rel="stylesheet" rel="preload" type="text/css" />
  <!--end::Global تم Styles-->

  <!--begin::چیدمان تم ها(used by all pages)-->

  <link href="/admin/assets/css/themes/layout/header/base/light.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/themes/layout/header/menu/light.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/themes/layout/brand/dark.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
  <link href="/admin/assets/css/themes/layout/aside/dark.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" /> <!--end::چیدمان تم ها-->

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
              <li class="menu-section ">
                <h4 class="menu-text">تنظیمات سایت</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
              </li>
              <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/layout/layout-4-blocks.svg-->
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
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
                        <span class="menu-text">مدیریت نقش ها</span>
                      </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                      <a href="{{ route('admin.user.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">اختصاص نقش به کاربر</span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>

              <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Communication/Add-user.svg-->
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M17,14 C19.7614237,14 22,16.2385763 22,19 L22,20 C22,20.5522847 21.5522847,21 21,21 C20.4477153,21 20,20.5522847 20,20 L20,19 C20,17.3431458 18.6568542,16 17,16 C15.3431458,16 14,17.3431458 14,19 L14,20 C14,20.5522847 13.5522847,21 13,21 C12.4477153,21 12,20.5522847 12,20 L12,19 C12,16.2385763 14.2385763,14 17,14 Z M6,14 L6,14 L6,14 Z" fill="#000000" fill-rule="nonzero" />
                        <path d="M11,9.5 C11,11.9852814 8.98528137,14 6.5,14 C4.01471863,14 2,11.9852814 2,9.5 C2,7.01471863 4.01471863,5 6.5,5 C8.98528137,5 11,7.01471863 11,9.5 Z M9,9.5 C9,8.11928813 7.88071187,7 6.5,7 C5.11928813,7 4,8.11928813 4,9.5 C4,10.8807119 5.11928813,12 6.5,12 C7.88071187,12 9,10.8807119 9,9.5 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M17,7 C19.7614237,7 22,9.23857625 22,12 C22,12.5128358 21.6128358,12.9 21.1,12.9 C20.5871642,12.9 20.2,12.5128358 20.2,12 C20.2,10.2326881 18.7673119,8.8 17,8.8 C15.2326881,8.8 13.8,10.2326881 13.8,12 C13.8,12.5128358 13.4128358,12.9 12.9,12.9 C12.3871642,12.9 12,12.5128358 12,12 C12,9.23857625 14.2385763,7 17,7 Z" fill="#000000" fill-rule="nonzero" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
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

              <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Design/Image.svg-->
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M4,6 L5.5,6 C5.77614237,6 6,5.77614237 6,5.5 C6,5.22385763 5.77614237,5 5.5,5 L4,5 C3.44771525,5 3,5.44771525 3,6 L3,18 C3,18.5522847 3.44771525,19 4,19 L20,19 C20.5522847,19 21,18.5522847 21,18 L21,6 C21,5.44771525 20.5522847,5 20,5 L18.5,5 C18.2238576,5 18,5.22385763 18,5.5 C18,5.77614237 18.2238576,6 18.5,6 L20,6 L20,18 L4,18 L4,6 Z" fill="#000000" fill-rule="nonzero" />
                        <path d="M6.455,16 L6.455,16 C6.00671667,16 5.74776148,15.5303284 5.98221986,15.1381905 L9.48221986,9.13819051 C9.66870756,8.82224557 10.1570943,8.81724691 10.3493969,9.12819427 L13.266,14.128 L14.555,12.037 C14.731408,11.7712626 15.1223791,11.7708076 15.2992316,12.0360115 L18.474766,16.7780462 C18.7295456,17.1713961 18.4633663,17.7 17.974766,17.7 L6.455,17.7 Z" fill="#000000" opacity="0.3" />
                        <path d="M13,8.5 C13,9.32842712 12.3284271,10 11.5,10 C10.6715729,10 10,9.32842712 10,8.5 C10,7.67157288 10.6715729,7 11.5,7 C12.3284271,7 13,7.67157288 13,8.5 Z" fill="#000000" opacity="0.3" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
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
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Communication/Clipboard-list.svg-->
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M9,3 L15,3 C16.6568542,3 18,4.34314575 18,6 L18,7 L18,7 C19.1045695,7 20,7.8954305 20,9 L20,17 C20,18.1045695 19.1045695,19 18,19 L6,19 C4.8954305,19 4,18.1045695 4,17 L4,9 C4,7.8954305 4.8954305,7 6,7 L6,7 L6,6 C6,4.34314575 7.34314575,3 9,3 Z M9,5 C8.44771525,5 8,5.44771525 8,6 L8,7 L16,7 L16,6 C16,5.44771525 15.5522847,5 15,5 L9,5 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M7,15 C6.44771525,15 6,15.4477153 6,16 C6,16.5522847 6.44771525,17 7,17 L17,17 C17.5522847,17 18,16.5522847 18,16 C18,15.4477153 17.5522847,15 17,15 L7,15 Z" fill="#000000" fill-rule="nonzero" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
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
                    <!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Communication/Group-chat.svg-->
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M16,11 C18.209139,11 20,12.790861 20,15 C20,17.209139 18.209139,19 16,19 L12,19 L12,19 L12,19 C9.790861,19 8,17.209139 8,15 C8,12.790861 9.790861,11 12,11 L16,11 Z M16,13 L12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 L16,17 C17.1045695,17 18,16.1045695 18,15 C18,13.8954305 17.1045695,13 16,13 Z" fill="#000000" />
                        <path d="M5,12 C6.65685425,12 8,13.3431458 8,15 C8,16.6568542 6.65685425,18 5,18 L4,18 L4,18 L4,18 C2.34314575,18 1,16.6568542 1,15 C1,13.3431458 2.34314575,12 4,12 L5,12 Z M5,14 L4,14 C3.44771525,14 3,14.4477153 3,15 C3,15.5522847 3.44771525,16 4,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 Z" fill="#000000" opacity="0.3" />
                        <path d="M19,7 C20.6568542,7 22,8.34314575 22,10 C22,11.6568542 20.6568542,13 19,13 L18,13 L18,13 L18,13 C16.3431458,13 15,11.6568542 15,10 C15,8.34314575 16.3431458,7 18,7 L19,7 Z M19,9 L18,9 C17.4477153,9 17,9.44771525 17,10 C17,10.5522847 17.4477153,11 18,11 L19,11 C19.5522847,11 20,10.5522847 20,10 C20,9.44771525 19.5522847,9 19,9 Z" fill="#000000" opacity="0.3" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
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
                        <span class="menu-text">لیست پست ها</span>
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
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/categories/create" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">افزودن دسته بندی </span>
                      </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                      <a href="/admin/categories/index" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">لیست دسته بندی ها </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>





              <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M17,14 C19.7614237,14 22,16.2385763 22,19 L22,20 C22,20.5522847 21.5522847,21 21,21 C20.4477153,21 20,20.5522847 20,20 L20,19 C20,17.3431458 18.6568542,16 17,16 C15.3431458,16 14,17.3431458 14,19 L14,20 C14,20.5522847 13.5522847,21 13,21 C12.4477153,21 12,20.5522847 12,20 L12,19 C12,16.2385763 14.2385763,14 17,14 Z M6,14 L6,14 L6,14 Z" fill="#000000" fill-rule="nonzero" />
                        <path d="M11,9.5 C11,11.9852814 8.98528137,14 6.5,14 C4.01471863,14 2,11.9852814 2,9.5 C2,7.01471863 4.01471863,5 6.5,5 C8.98528137,5 11,7.01471863 11,9.5 Z M9,9.5 C9,8.11928813 7.88071187,7 6.5,7 C5.11928813,7 4,8.11928813 4,9.5 C4,10.8807119 5.11928813,12 6.5,12 C7.88071187,12 9,10.8807119 9,9.5 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M17,7 C19.7614237,7 22,9.23857625 22,12 C22,12.5128358 21.6128358,12.9 21.1,12.9 C20.5871642,12.9 20.2,12.5128358 20.2,12 C20.2,10.2326881 18.7673119,8.8 17,8.8 C15.2326881,8.8 13.8,10.2326881 13.8,12 C13.8,12.5128358 13.4128358,12.9 12.9,12.9 C12.3871642,12.9 12,12.5128358 12,12 C12,9.23857625 14.2385763,7 17,7 Z" fill="#000000" fill-rule="nonzero" />
                      </g>
                    </svg>
                  </span>
                  <span class="menu-text">مدیریت مشاوره</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <!-- <li class="menu-item" aria-haspopup="true">
                      <a href="/admin/days/index" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">مدیریت روزها</span>
                      </a>
                    </li> -->
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
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
              <!--begin::اطلاعات-->
              <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                  <!--begin::Page Title-->
                  <h5 class="text-dark font-weight-bold my-1 mr-5">
                    فرم های چند ستونی </h5>
                  <!--end::Page Title-->

                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                      <a href="" class="text-muted">
                        کراد </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="" class="text-muted">
                        فرم ها و کنترل ها </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="" class="text-muted">
                        چیدمان فرم ها </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="" class="text-muted">
                        فرم های چند ستونی </a>
                    </li>
                  </ul>
                  <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
              </div>
              <!--end::اطلاعات-->

              <!--begin::Toolbar-->
              <div class="d-flex align-items-center">
                <!--begin::اقدامات-->
                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">
                  اقدامات
                </a>
                <!--end::اقدامات-->

                <!--begin::دراپ دان-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="اقدامات سریع">
                  <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:assets/media/svg/icons/پرونده ها/فایل-plus.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <polygon points="0 0 24 0 24 24 0 24"></polygon>
                          <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                          <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
                        </g>
                      </svg><!--end::Svg Icon--></span> </a>
                  <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                    <!--begin::Navigation-->
                    <ul class="navi navi-hover">
                      <li class="navi-header font-weight-bold py-4">
                        <span class="font-size-lg">انتخاب کنید:</span>
                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="برای اطلاعات بیشتر کلیک کنید..."></i>
                      </li>
                      <li class="navi-separator mb-3 opacity-70"></li>
                      <li class="navi-item">
                        <a href="#" class="navi-link">
                          <span class="navi-text">
                            <span class="label label-xl label-inline label-light-success">مشتری</span>
                          </span>
                        </a>
                      </li>
                      <li class="navi-item">
                        <a href="#" class="navi-link">
                          <span class="navi-text">
                            <span class="label label-xl label-inline label-light-danger">شریک</span>
                          </span>
                        </a>
                      </li>
                      <li class="navi-item">
                        <a href="#" class="navi-link">
                          <span class="navi-text">
                            <span class="label label-xl label-inline label-light-warning">برتر</span>
                          </span>
                        </a>
                      </li>
                      <li class="navi-item">
                        <a href="#" class="navi-link">
                          <span class="navi-text">
                            <span class="label label-xl label-inline label-light-primary">عضو</span>
                          </span>
                        </a>
                      </li>
                      <li class="navi-item">
                        <a href="#" class="navi-link">
                          <span class="navi-text">
                            <span class="label label-xl label-inline label-light-dark">کارمندان</span>
                          </span>
                        </a>
                      </li>
                      <li class="navi-separator mt-3 opacity-70"></li>
                      <li class="navi-footer py-4">
                        <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                          <i class="ki ki-plus icon-sm"></i>
                          جدید اضافه کن
                        </a>
                      </li>
                    </ul>
                    <!--end::Navigation-->
                  </div>
                </div>
                <!--end::دراپ دان-->
              </div>
              <!--end::Toolbar-->
            </div>
          </div>
          @yield('content')
        </div>
        <!--end::Content-->

        <!--begin::Footer-->
        <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
          <!--begin::Container-->
          <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::کپی رایت-->
            <div class="text-dark order-2 order-md-1">
              <span class="text-muted font-weight-bold mr-2">2020&copy;</span>
              <a href="dddd://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::کپی رایت-->

            <!--begin::Nav-->
            <div class="nav nav-dark">
              <a href="dddd://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">درباره ما</a>
              <a href="dddd://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">تیم</a>
              <a href="dddd://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">مخاطب</a>
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
          <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
            محسن برومند
          </a>
          <div class="text-muted mt-1">
            توسعه اپلیکیشن
          </div>
          <div class="navi mt-2">
            <a href="#" class="navi-item">
              <span class="navi-link p-0 pb-2">
                <span class="navi-icon mr-1">
                  <span class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/Mail-notification.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                      </g>
                    </svg><!--end::Svg Icon--></span> </span>
                <span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>
              </span>
            </a>

            <a href="#" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">خروج</a>
          </div>
        </div>
      </div>
      <!--end::Header-->

      <!--begin::Separator-->
      <div class="separator separator-dashed mt-8 mb-5"></div>
      <!--end::Separator-->

      <!--begin::Nav-->
      <div class="navi navi-spacer-x-0 p-0">
        <!--begin::Item-->
        <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-success"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/general/اطلاع2.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                      <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                    </g>
                  </svg><!--end::Svg Icon--></span>
              </div>
            </div>
            <div class="navi-text">
              <div class="font-weight-bold">
                پروفایل من
              </div>
              <div class="text-muted">
                تنظیمات اکانت
                <span class="label label-light-danger label-inline font-weight-bold">بروزرسانی</span>
              </div>
            </div>
          </div>
        </a>
        <!--end:Item-->

        <!--begin::Item-->
        <a href="custom/apps/user/profile-3.html" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-warning"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
                      <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
                      <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
                      <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
                    </g>
                  </svg><!--end::Svg Icon--></span>
              </div>
            </div>
            <div class="navi-text">
              <div class="font-weight-bold">
                پیام های من
              </div>
              <div class="text-muted">
                صندوق پیام ها و کارها
              </div>
            </div>
          </div>
        </a>
        <!--end:Item-->

        <!--begin::Item-->
        <a href="custom/apps/user/profile-2.html" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-danger"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/پرونده ها/ انتخاب شده -file.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <polygon points="0 0 24 0 24 24 0 24" />
                      <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                      <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" />
                    </g>
                  </svg><!--end::Svg Icon--></span>
              </div>
            </div>
            <div class="navi-text">
              <div class="font-weight-bold">
                فعالیت های من
              </div>
              <div class="text-muted">
                لاگ ها و اعلان ها
              </div>
            </div>
          </div>
        </a>
        <!--end:Item-->

        <!--begin::Item-->
        <a href="custom/apps/userprofile-1/overview.html" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-primary"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/Mail-opened.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                      <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                    </g>
                  </svg><!--end::Svg Icon--></span>
              </div>
            </div>
            <div class="navi-text">
              <div class="font-weight-bold">
                کارهای من
              </div>
              <div class="text-muted">
                اخرین کارها و پروژه ها
              </div>
            </div>
          </div>
        </a>
        <!--end:Item-->
      </div>
      <!--end::Nav-->

      <!--begin::Separator-->
      <div class="separator separator-dashed my-7"></div>
      <!--end::Separator-->

      <!--begin::اعلان ها-->
      <div>
        <!--begin:Heading-->
        <h5 class="mb-5">
          آخرین اعلان ها
        </h5>
        <!--end:Heading-->

        <!--begin::Item-->
        <div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">
          <span class="svg-icon svg-icon-warning mr-5">
            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/home/کتابخانه.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                  <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                </g>
              </svg><!--end::Svg Icon--></span> </span>

          <div class="d-flex flex-column flex-grow-1 mr-2">
            <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">اهداف دیگر</a>
            <span class="text-muted font-size-sm">موعد 2 روز</span>
          </div>

          <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
        </div>
        <!--end::Item-->

        <!--begin::Item-->
        <div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">
          <span class="svg-icon svg-icon-success mr-5">
            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/Write.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />
                  <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                </g>
              </svg><!--end::Svg Icon--></span> </span>
          <div class="d-flex flex-column flex-grow-1 mr-2">
            <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">برای مردم خواهد بود</a>
            <span class="text-muted font-size-sm">موعد 2 روز</span>
          </div>

          <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
        </div>
        <!--end::Item-->

        <!--begin::Item-->
        <div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">
          <span class="svg-icon svg-icon-danger mr-5">
            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/group-chat.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                  <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                </g>
              </svg><!--end::Svg Icon--></span> </span>
          <div class="d-flex flex-column flex-grow-1 mr-2">
            <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">هدف این خواهد بود که ترغیب شود</a>
            <span class="text-muted font-size-sm">موعد 2 روز</span>
          </div>

          <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
        </div>
        <!--end::Item-->

        <!--begin::Item-->
        <div class="d-flex align-items-center bg-light-info rounded p-5">
          <span class="svg-icon svg-icon-info mr-5">
            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/عمومی/Attachment2.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) " />
                  <path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) " />
                  <path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) " />
                  <path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) " />
                </g>
              </svg><!--end::Svg Icon--></span> </span>

          <div class="d-flex flex-column flex-grow-1 mr-2">
            <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">بهترین محصول</a>
            <span class="text-muted font-size-sm">موعد 2 روز</span>
          </div>

          <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
        </div>
        <!--end::Item-->
      </div>
      <!--end::اعلان ها-->
    </div>
    <!--end::Content-->
  </div>
  <!-- end::User Panel-->


  <!--begin::Quick Cart-->
  <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
      <h4 class="font-weight-bold m-0">
        سبد خرید
      </h4>
      <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
        <i class="ki ki-close icon-xs text-muted"></i>
      </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content">
      <!--begin::Wrapper-->
      <div class="offcanvas-wrapper mb-5 scroll-pull">
        <!--begin::Item-->
        <div class="d-flex align-items-center justify-content-between py-8">
          <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
              iBlender
            </a>
            <span class="text-muted">
              بهترین وسایل آشپزخانه در سال 2020
            </span>
            <div class="d-flex align-items-center mt-2">
              <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">دلار 350</span>
              <span class="text-muted mr-1"> </span>
              <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
              <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
              <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
          </div>
          <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="/admin/assets/media/stock-600x400/img-1.jpg" title="" alt="" />
          </a>
        </div>
        <!--end::Item-->

        <!--begin::Separator-->
        <div class="separator separator-solid"></div>
        <!--end::Separator-->

        <!--begin::Item-->
        <div class="d-flex align-items-center justify-content-between py-8">
          <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
              پاک کننده هوشمند
            </a>
            <span class="text-muted">
              ابزار هوشمند برای پخت و پز
            </span>
            <div class="d-flex align-items-center mt-2">
              <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">650دلار</span>
              <span class="text-muted mr-1"> </span>
              <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
              <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
              <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
          </div>
          <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="/admin/assets/media/stock-600x400/img-2.jpg" title="" alt="" />
          </a>
        </div>
        <!--end::Item-->

        <!--begin::Separator-->
        <div class="separator separator-solid"></div>
        <!--end::Separator-->

        <!--begin::Item-->
        <div class="d-flex align-items-center justify-content-between py-8">
          <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
              دوربین
            </a>
            <span class="text-muted">
              دوربین حرفه ای
              برای عکس
            </span>
            <div class="d-flex align-items-center mt-2">
              <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">150دلار</span>
              <span class="text-muted mr-1"> </span>
              <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
              <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
              <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
          </div>
          <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="/admin/assets/media/stock-600x400/img-3.jpg" title="" alt="" />
          </a>
        </div>
        <!--end::Item-->

        <!--begin::Separator-->
        <div class="separator separator-solid"></div>
        <!--end::Separator-->

        <!--begin::Item-->
        <div class="d-flex align-items-center justify-content-between py-8">
          <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark text-hover-primary">
              چاپگر 4D
            </a>
            <span class="text-muted">
              ساخت اشیاء منحصر به فرد
            </span>
            <div class="d-flex align-items-center mt-2">
              <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">دلار 1450</span>
              <span class="text-muted mr-1"> </span>
              <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
              <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
              <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
          </div>
          <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="/admin/assets/media/stock-600x400/img-4.jpg" title="" alt="" />
          </a>
        </div>
        <!--end::Item-->

        <!--begin::Separator-->
        <div class="separator separator-solid"></div>
        <!--end::Separator-->

        <!--begin::Item-->
        <div class="d-flex align-items-center justify-content-between py-8">
          <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark text-hover-primary">
              موشن
            </a>
            <span class="text-muted">
              ابزار انیمیشن ایده آل
            </span>
            <div class="d-flex align-items-center mt-2">
              <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">650دلار</span>
              <span class="text-muted mr-1"> </span>
              <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
              <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
              <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
          </div>
          <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="/admin/assets/media/stock-600x400/img-8.jpg" title="" alt="" />
          </a>
        </div>
        <!--end::Item-->
      </div>
      <!--end::Wrapper-->

      <!--begin::خرید-->
      <div class="offcanvas-footer">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <span class="font-weight-bold text-muted font-size-sm mr-2">جمع</span>
          <span class="font-weight-bolder text-dark-50 text-right">1840.00دلار</span>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-7">
          <span class="font-weight-bold text-muted font-size-sm mr-2">زیر کل</span>
          <span class="font-weight-bolder text-primary text-right">5640.00دلار</span>
        </div>
        <div class="text-right">
          <button type="button" class="btn btn-primary text-weight-bold">ترتیب سفارش</button>
        </div>
      </div>
      <!--end::خرید-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Quick Cart-->

  <!--begin::پنل سریع-->
  <div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
    <!--begin::Header-->
    <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
      <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">حسابرسی لاگ ها</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">اعلان ها</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">تنظیمات</a>
        </li>
      </ul>
      <div class="offcanvas-close mt-n1 pr-5">
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
          <i class="ki ki-close icon-xs text-muted"></i>
        </a>
      </div>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content px-10">
      <div class="tab-content">
        <!--begin::Tabpane-->
        <div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
          <!--begin::Section-->
          <div class="mb-15">
            <h5 class="font-weight-bold mb-5">پیام های سیستم</h5>
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-wrap mb-5">
              <div class="symbol symbol-50 symbol-light mr-5">
                <span class="symbol-label">
                  <img src="/admin/assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
                </span>
              </div>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">نویسندگان برتر</a>
                <span class="text-muted font-weight-bold">موفق ترین ها</span>
              </div>
              <span class="btn btn-sm btn-light font-weight-bolder py-1 my-lg-0 my-2 text-dark-50">+82دلار</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-wrap mb-5">
              <div class="symbol symbol-50 symbol-light mr-5">
                <span class="symbol-label">
                  <img src="/admin/assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
                </span>
              </div>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">نویسندگان محبوب</a>
                <span class="text-muted font-weight-bold">موفق ترین ها</span>
              </div>
              <span class="btn btn-sm btn-light font-weight-bolder  my-lg-0 my-2 py-1 text-dark-50">+280دلار</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-wrap mb-5">
              <div class="symbol symbol-50 symbol-light mr-5">
                <span class="symbol-label">
                  <img src="/admin/assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
                </span>
              </div>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">کاربران جدید</a>
                <span class="text-muted font-weight-bold">موفق ترین ها</span>
              </div>
              <span class="btn btn-sm btn-light font-weight-bolder  my-lg-0 my-2 py-1 text-dark-50">+4500دلار</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-wrap mb-5">
              <div class="symbol symbol-50 symbol-light mr-5">
                <span class="symbol-label">
                  <img src="/admin/assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
                </span>
              </div>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">فعال مشتریان</a>
                <span class="text-muted font-weight-bold">موفق ترین ها</span>
              </div>
              <span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500دلار</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-wrap">
              <div class="symbol symbol-50 symbol-light mr-5">
                <span class="symbol-label">
                  <img src="/admin/assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
                </span>
              </div>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">تم پرفروش</a>
                <span class="text-muted font-weight-bold">موفق ترین ها</span>
              </div>
              <span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500دلار</span>
            </div>
            <!--end: Item-->
          </div>
          <!--end::Section-->

          <!--begin::Section-->
          <div class="mb-5">
            <h5 class="font-weight-bold mb-5">اعلان ها</h5>

            <!--begin: Item-->
            <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-5">
              <span class="svg-icon svg-icon-warning mr-5">
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/home/کتابخانه.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                      <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                    </g>
                  </svg><!--end::Svg Icon--></span> </span>

              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">اهداف دیگر</a>
                <span class="text-muted font-size-sm">موعد 2 روز</span>
              </div>

              <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-5">
              <span class="svg-icon svg-icon-success mr-5">
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/Write.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />
                      <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    </g>
                  </svg><!--end::Svg Icon--></span> </span>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">برای مردم خواهد بود</a>
                <span class="text-muted font-size-sm">موعد 2 روز</span>
              </div>

              <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-5">
              <span class="svg-icon svg-icon-danger mr-5">
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/group-chat.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                      <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                    </g>
                  </svg><!--end::Svg Icon--></span> </span>
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">هدف این خواهد بود که ترغیب شود</a>
                <span class="text-muted font-size-sm">موعد 2 روز</span>
              </div>

              <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center bg-light-info rounded p-5">
              <span class="svg-icon svg-icon-info mr-5">
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/عمومی/Attachment2.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) " />
                      <path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) " />
                      <path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) " />
                      <path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) " />
                    </g>
                  </svg><!--end::Svg Icon--></span> </span>

              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">بهترین محصول</a>
                <span class="text-muted font-size-sm">موعد 2 روز</span>
              </div>

              <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
            </div>
            <!--end: Item-->
          </div>

          <!--end::Section-->
        </div>
        <!--end::Tabpane-->

        <!--begin::Tabpane-->
        <div class="tab-pane fade pt-2 pr-5 mr-n5" id="kt_quick_panel_notifications" role="tabpanel">
          <!--begin::Nav-->
          <div class="navi navi-icon-circle navi-spacer-x-0">
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-bell text-success icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold font-size-lg">
                    5 گزارش تولید شده توسط کاربر جدید
                  </div>
                  <div class="text-muted">
                    گزارش ها بر اساس فروش
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon2-box text-danger icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    2 موارد جدید ارسال شد
                  </div>
                  <div class="text-muted">
                    توسط محمد رضایی
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-psd text-primary icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    فایل های ایجاد شده
                  </div>
                  <div class="text-muted">
                    گزارش ها بر اساس فروش
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon2-supermarket text-warning icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    دلار2900 ارزش محصولات فروخته شده
                  </div>
                  <div class="text-muted">
                    جمع آوری 234 مورد
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    میانگین زمان پاسخگویی 4.5 ساعت
                  </div>
                  <div class="text-muted">
                    فاستوست باری است
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-safe-shield-protection text-danger icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    3 هشدارهای دفاعی
                  </div>
                  <div class="text-muted">
                    هفته گذشته 40٪ هشدار کمتری دارد
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-notepad text-primary icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    میانگین 4 پست وبلاگ برای هر نویسنده
                  </div>
                  <div class="text-muted">
                    12 بار ارسال شده است
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-users-1 text-warning icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    هفته گذشته 16 نویسنده پیوستند
                  </div>
                  <div class="text-muted">
                    طراح
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon2-box text-info icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    2 مورد جدید ارسال شده است
                  </div>
                  <div class="text-muted">
                    توسط محمد رضایی
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon2-download text-success icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    حجم دانلودها 2 گیگ
                  </div>
                  <div class="text-muted">
                    مفاهیم بنیادی
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon2-supermarket text-danger icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    دلار2900 ارزش محصولات فروخته شده
                  </div>
                  <div class="text-muted">
                    جمع آوری 234 مورد
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-bell text-primary icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    7 گزارش تولید شده توسط کاربر جدید
                  </div>
                  <div class="text-muted">
                    گزارش ها بر اساس فروش
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item">
              <div class="navi-link rounded">
                <div class="symbol symbol-50 mr-3">
                  <div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold  font-size-lg">
                    میانگین زمان پاسخگویی 4.5 ساعت
                  </div>
                  <div class="text-muted">
                    فاستوست باری است
                  </div>
                </div>
              </div>
            </a>
            <!--end::Item-->
          </div>
          <!--end::Nav-->
        </div>
        <!--end::Tabpane-->

        <!--begin::Tabpane-->
        <div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_settings" role="tabpanel">
          <form class="form">
            <!--begin::Section-->
            <div>
              <h5 class="font-weight-bold mb-3">مراقبت از مشتری</h5>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">فعال کردن اعلان ها:</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-success switch-sm">
                    <label>
                      <input type="checkbox" checked="checked" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">فعال کردن ردیابی:</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-success switch-sm">
                    <label>
                      <input type="checkbox" name="quick_panel_notifications_2" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">پرتال پشتیبانی</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-success switch-sm">
                    <label>
                      <input type="checkbox" checked="checked" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
            </div>
            <!--end::Section-->

            <div class="separator separator-dashed my-6"></div>

            <!--begin::Section-->
            <div class="pt-2">
              <h5 class="font-weight-bold mb-3">گزارشات</h5>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">گزارش عمومیات:</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-sm switch-danger">
                    <label>
                      <input type="checkbox" checked="checked" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">فعال سازی خروچی گزارش</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-sm switch-danger">
                    <label>
                      <input type="checkbox" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">اجازه جمع آوری داده ها:</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-sm switch-danger">
                    <label>
                      <input type="checkbox" checked="checked" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
            </div>
            <!--end::Section-->

            <div class="separator separator-dashed my-6"></div>

            <!--begin::Section-->
            <div class="pt-2">
              <h5 class="font-weight-bold mb-3">اعضا</h5>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">فعال سازی عضویت اعضا</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-sm switch-primary">
                    <label>
                      <input type="checkbox" checked="checked" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">اجازه نظر دهی</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-sm switch-primary">
                    <label>
                      <input type="checkbox" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group mb-0 row align-items-center">
                <label class="col-8 col-form-label">فعال کردن پرتال مشتری</label>
                <div class="col-4 d-flex justify-content-end">
                  <span class="switch switch-sm switch-primary">
                    <label>
                      <input type="checkbox" checked="checked" name="select" />
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>
            </div>
            <!--end::Section-->
          </form>
        </div>
        <!--end::Tabpane-->
      </div>
    </div>
    <!--end::Content-->
  </div>
  <!--end::پنل سریع-->

  <!--begin::چت Panel-->
  <div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!--begin::Card-->
        <div class="card card-custom">
          <!--begin::Header-->
          <div class="card-header align-items-center px-4 py-3">
            <div class="text-left flex-grow-1">
              <!--begin::دراپ دان Menu-->
              <div class="dropdown dropdown-inline">
                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/ارتباطات/Add-user.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                      </g>
                    </svg><!--end::Svg Icon--></span> </button>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                  <!--begin::Navigation-->
                  <ul class="navi navi-hover py-5">
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                        <span class="navi-text">گروه جدید</span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-list-3"></i></span>
                        <span class="navi-text">مخاطب</span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                        <span class="navi-text">گروه ها</span>
                        <span class="navi-link-badge">
                          <span class="label label-light-primary label-inline font-weight-bold">جدید</span>
                        </span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                        <span class="navi-text">تماس ها</span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-gear"></i></span>
                        <span class="navi-text">تنظیمات</span>
                      </a>
                    </li>

                    <li class="navi-separator my-3"></li>

                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
                        <span class="navi-text">راهنما</span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                        <span class="navi-text">حریم خصوصی</span>
                        <span class="navi-link-badge">
                          <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                        </span>
                      </a>
                    </li>
                  </ul>
                  <!--end::Navigation-->
                </div>
              </div>
              <!--end::دراپ دان Menu-->
            </div>
            <div class="text-center flex-grow-1">
              <div class="text-dark-75 font-weight-bold font-size-h5">محسن برومند</div>
              <div>
                <span class="label label-dot label-success"></span>
                <span class="font-weight-bold text-muted font-size-sm">فعال</span>
              </div>
            </div>
            <div class="text-right flex-grow-1">
              <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                <i class="ki ki-close icon-1x"></i>
              </button>
            </div>
          </div>
          <!--end::Header-->

          <!--begin::Body-->
          <div class="card-body">
            <!--begin::Scroll-->
            <div class="scroll scroll-pull" data-height="375" data-mobile-height="300">
              <!--begin::پیامs-->
              <div class="messages">
                <!--begin::پیام In-->
                <div class="d-flex flex-column mb-5 align-items-start">
                  <div class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-40 mr-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_12.jpg" />
                    </div>
                    <div>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">محسن برومند</a>
                      <span class="text-muted font-size-sm">2 ساعت</span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                    چقدر احتمال دارید که شرکت ما را توصیه کنید
                    به دوستان و خانواده خود؟
                  </div>
                </div>
                <!--end::پیام In-->

                <!--begin::پیام Out-->
                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">
                    <div>
                      <span class="text-muted font-size-sm">3 دقیقه</span>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">شما</a>
                    </div>
                    <div class="symbol symbol-circle symbol-40 ml-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_21.jpg" />
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    سلام در آنجا ، ما فقط می نویسیم تا به شما اطلاع دهیم
                    که در مخزن گیت هاب مشترک شده اید.
                  </div>
                </div>
                <!--end::پیام Out-->

                <!--begin::پیام In-->
                <div class="d-flex flex-column mb-5 align-items-start">
                  <div class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-40 mr-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_21.jpg" />
                    </div>
                    <div>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">محسن برومند</a>
                      <span class="text-muted font-size-sm">40 ثانیه</span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                    باشه ، فهمیدم
                  </div>
                </div>
                <!--end::پیام In-->

                <!--begin::پیام Out-->
                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">
                    <div>
                      <span class="text-muted font-size-sm">همین الان</span>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">شما</a>
                    </div>
                    <div class="symbol symbol-circle symbol-40 ml-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_21.jpg" />
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    برای همه مشکلات اعلان دریافت خواهید کرد ، درخواستها را بکشید!
                  </div>
                </div>
                <!--end::پیام Out-->

                <!--begin::پیام In-->
                <div class="d-flex flex-column mb-5 align-items-start">
                  <div class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-40 mr-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_12.jpg" />
                    </div>
                    <div>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">محسن برومند</a>
                      <span class="text-muted font-size-sm">40 ثانیه</span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                    شما می توانید با کلیک بر روی این مخزن بلافاصله از حالت انتخاب خارج شوید:<a href="#">dddds://github.com</a>
                  </div>
                </div>
                <!--end::پیام In-->

                <!--begin::پیام Out-->
                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">
                    <div>
                      <span class="text-muted font-size-sm">همین الان</span>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">شما</a>
                    </div>
                    <div class="symbol symbol-circle symbol-40 ml-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_21.jpg" />
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    آموزش رو دیدم.
                  </div>
                </div>
                <!--end::پیام Out-->

                <!--begin::پیام In-->
                <div class="d-flex flex-column mb-5 align-items-start">
                  <div class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-40 mr-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_12.jpg" />
                    </div>
                    <div>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">محسن برومند</a>
                      <span class="text-muted font-size-sm">40 ثانیه</span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                    بیشترین دوره های تجاری خریداری شده در این فروش!
                  </div>
                </div>
                <!--end::پیام In-->

                <!--begin::پیام Out-->
                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">
                    <div>
                      <span class="text-muted font-size-sm">همین الان</span>
                      <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">شما</a>
                    </div>
                    <div class="symbol symbol-circle symbol-40 ml-3">
                      <img alt="Pic" src="/admin/assets/media/users/300_21.jpg" />
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    شرکت BBQ برای جشن گرفتن دستاوردها و اهداف سه ماهه آخر. غذا و نوشیدنی تهیه شده
                  </div>
                </div>
                <!--end::پیام Out-->
              </div>
              <!--end::پیامs-->
            </div>
            <!--end::Scroll-->
          </div>
          <!--end::Body-->

          <!--begin::Footer-->
          <div class="card-footer align-items-center">
            <!--begin::Compose-->
            <textarea class="form-control border-0 p-0" rows="2" placeholder="تایپ یک پیام"></textarea>
            <div class="d-flex align-items-center justify-content-between mt-5">
              <div class="mr-3">
                <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>
                <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>
              </div>
              <div>
                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">ارسال</button>
              </div>
            </div>
            <!--begin::Compose-->
          </div>
          <!--end::Footer-->
        </div>
        <!--end::Card-->
      </div>
    </div>
  </div>
  <!--end::چت Panel-->

  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="dddd://dddd.w3.org/2000/svg" xmlns:xlink="dddd://dddd.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24" />
          <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
          <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
        </g>
      </svg><!--end::Svg Icon--></span>
  </div>
  <!--end::Scrolltop-->

  <!--begin::نسخه ی نمایشی Panel-->
  <div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
      <h4 class="font-weight-bold m-0">
        انتخاب نسخه ی نمایشی
      </h4>
      <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
        <i class="ki ki-close icon-xs text-muted"></i>
      </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content">
      <!--begin::Wrapper-->

      <!--end::Wrapper-->

      <!--begin::خرید-->
      <div class="offcanvas-footer">
        <a href="dddds://dddd.rtl-theme.com/metronic-admin-html-template/" target="_blank" class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">
          خرید از سایت راست چین
        </a>
      </div>
      <!--end::خرید-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::نسخه ی نمایشی Panel-->

  <script>
    var HOST_URL = "dddds://preview.keenthemes.com/metronic/theme/html/tools/preview";
  </script>
  <!--begin::Global Config(global config for global جی اس scripts)-->
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

  <!--begin::Global تم Bundle(used by all pages)-->
  <script src="/admin/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
  <script src="/admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
  <script src="/admin/assets/js/scripts.bundle.js?v=7.0.6"></script>
  <!--end::Global تم Bundle-->

  <!--begin::Page Vendors(used by this page)-->
  <script src="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
  <!--end::Page Vendors-->

  <!--begin::Page Scripts(used by this page)-->
  <script src="/admin/assets/js/pages/widgets.js?v=7.0.6"></script>
  <!--end::Page Scripts-->
  <!--begin::Page Scripts(used by this page)-->
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
  <script src="\js\jquery.min.js"></script>

  <!-- persian-date JS -->
  <script src="\js\persian-date.min.js"></script>

  <!-- persian-datepicker JS -->
  <script src="\js\persian-datepicker.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#date').persianDatepicker({
        format: 'YYYY/MM/DD',
        autoClose: true,
        initialValue: false,
      });
    });
  </script>
  </script>



  @include('admin.layouts.notifications')
  <!-- @yield('js') -->
</body>
<!--end::Body-->


</html>