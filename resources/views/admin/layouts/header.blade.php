<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
  <!--begin::Container-->
  <div class="container-fluid d-flex align-items-stretch justify-content-end">
    <!--begin::User-->
    <div class="d-flex align-items-center">
      <div class="topbar-item">
        <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
          <img src="/storage/{{ Auth::user()->profile->profile_picture ?? '/path/to/default/profile_picture.jpg' }}" alt="User Image" class="rounded-circle ml-2" width="30" height="30">
          <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1 ml-2">سلام</span>
          <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name }}</span>
          <span class="symbol symbol-lg-35 symbol-25 symbol-light-success"></span>
        </div>
      </div>
    </div>
    <!--end::User-->

    <!--begin::Topbar-->
    <div class="topbar d-flex align-items-center">
      <!-- Other topbar items can go here -->
    </div>
    <!--end::Topbar-->
  </div>
  <!--end::Container-->
</div>
<!--end::Header-->