<div id="kt_header" class="header header-fixed">
  <!--begin::Container-->
  <div class="container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::Left Side - Sidebar Items-->
    <div class="d-flex align-items-center">
      <!-- Settings Dropdown -->
      <div class="dropdown">
        <button class="btn btn-clean dropdown-toggle d-flex align-items-center" type="button" id="settingsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="svg-icon menu-icon mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
              <path d="M12 0c-3.313 0-6 2.687-6 6 0 2.961 2.164 5.436 5 5.92v.08c-2.836.484-5 2.959-5 5.92 0 3.313 2.687 6 6 6s6-2.687 6-6c0-2.961-2.164-5.436-5-5.92v-.08c2.836-.484 5-2.959 5-5.92 0-3.313-2.687-6-6-6zm0 20c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4zm0-10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z" />
            </svg>
          </span>
          تنظیمات سراسری
        </button>
        <div class="dropdown-menu" aria-labelledby="settingsDropdown">
          <a class="dropdown-item" href="/admin/settings/edit">تنظیمات سئو</a>
          <a class="dropdown-item" href="/admin/contact/index">تنظیمات عمومی</a>
          <a class="dropdown-item" href="/admin/roles/index">مدیریت نقش‌ها</a>
          <a class="dropdown-item" href="{{ route('admin.user.index') }}">اختصاص نقش به کاربر</a>
          <a class="dropdown-item" href="who-we-are/edit">ما چه کسی هستیم</a>
        </div>
      </div>

      <!-- Pages Management Dropdown -->
      <div class="dropdown ml-3">
        <button class="btn btn-clean dropdown-toggle d-flex align-items-center" type="button" id="pagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="svg-icon menu-icon mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
              <path d="M19 3h-14c-1.104 0-2 .896-2 2v14c0 1.104.896 2 2 2h14c1.104 0 2-.896 2-2v-14c0-1.104-.896-2-2-2zm-14 2h14v14h-14v-14zm3 2h2v2h-2v-2zm6 0h2v2h-2v-2zm-6 4h2v2h-2v-2zm6 0h2v2h-2v-2zm-6 4h2v2h-2v-2zm6 0h2v2h-2v-2z" />
            </svg>
          </span>
          مدیریت صفحات
        </button>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{ route('pages.index') }}">لیست صفحات</a>
          <a class="dropdown-item" href="{{ route('pages.create') }}">ایجاد صفحه جدید</a>
        </div>
      </div>

      <!-- Users Dropdown -->
      <div class="dropdown ml-3">
        <button class="btn btn-clean dropdown-toggle d-flex align-items-center" type="button" id="usersDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="svg-icon menu-icon mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
              <path d="M12 12c2.28 0 4.14-1.86 4.14-4.14S14.28 3.72 12 3.72 7.86 5.58 7.86 7.86 9.72 12 12 12zm0 1.62c-3.42 0-10.14 1.72-10.14 5.16V21h20.28v-2.22c0-3.44-6.72-5.16-10.14-5.16z" />
            </svg>
          </span>
          کاربران
        </button>
        <div class="dropdown-menu" aria-labelledby="usersDropdown">
          <a class="dropdown-item" href="/admin/users/create">افزودن کاربر جدید</a>
          <a class="dropdown-item" href="/admin/users/index">لیست کاربران</a>
        </div>
      </div>
    </div>
    <!--end::Left Side-->

    <!--begin::Right Side - User Info-->
    <div class="topbar-item d-flex align-items-center">
      <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">سلام</span>
        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name }}</span>
      </div>
    </div>
    <!--end::Right Side-->
  </div>
  <!--end::Container-->
</div>
<!--end::Header-->