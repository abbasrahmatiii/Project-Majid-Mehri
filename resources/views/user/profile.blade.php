@extends('layouts.master')
@section('content')
<div role="main" class="main">

  <div class="container py-2">

    <div class="row">
      @include('user.aside_profile')
      <div class="col-lg-9">

        <div class="overflow-hidden mb-1">
          <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">پروفایل</strong> من</h2>
        </div>
        <div class="overflow-hidden mb-4 pb-3">
          <p class="mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
        </div>

        <form role="form" class="needs-validation" novalidate="novalidate">
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">نام</label>
            <div class="col-lg-9">
              <input class="form-control" required="" type="text" value="جان">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">نام خانوادگی</label>
            <div class="col-lg-9">
              <input class="form-control" required="" type="text" value="اسنو">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">ایمیل</label>
            <div class="col-lg-9">
              <input class="form-control text-left" required="" type="email" value="email@gmail.com" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">شرکت</label>
            <div class="col-lg-9">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">وب‌سایت</label>
            <div class="col-lg-9">
              <input class="form-control text-left" type="url" value="" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">آدرس</label>
            <div class="col-lg-9">
              <input class="form-control" type="text" value="" placeholder="خیابان">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" value="" placeholder="شهر">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" value="" placeholder="استان">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">منطقه زمانی</label>
            <div class="col-lg-9">
              <select id="user_time_zone" class="form-control" size="0">
                <option value="Hawaii">(GMT-10:00) هاوایی</option>
                <option value="Alaska">(GMT-09:00) آلاسکا</option>
                <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) آمریکا و کانادا</option>
                <option value="Arizona">(GMT-07:00) آریزونا</option>
                <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) اقیانوسیه</option>
                <option value="Central Time (US &amp; Canada)" selected="">(GMT-06:00) استرالیا</option>
                <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) اروپا</option>
                <option value="Indiana (East)">(GMT-05:00) خاورمیانه</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">نام کاربری</label>
            <div class="col-lg-9">
              <input class="form-control text-left" required="" type="text" value="" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">رمز عبور</label>
            <div class="col-lg-9">
              <input class="form-control text-left" required="" type="password" value="" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">تایید رمز عبور</label>
            <div class="col-lg-9">
              <input class="form-control text-left" required="" type="password" value="" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <div class="form-group col-lg-9">

            </div>
            <div class="form-group col-lg-3">
              <input type="submit" value="ذخیره" class="btn btn-primary btn-modern float-right" data-loading-text="در حال بارگذاری ...">
            </div>
          </div>
        </form>

      </div>
    </div>

  </div>

</div>
@endsection