@extends('layouts.master')
@section('content')
@php
$profile = Auth::user()->profile ?: new \App\Models\UserProfile();
@endphp
<div role="main" class="main">
  <div class="container py-2">
    <div class="row">
      @include('user.aside_profile')

      <div class="col-lg-9">
        <div class="overflow-hidden mb-1">
          <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">پروفایل</strong> من</h2>
        </div>
        <div class="overflow-hidden mb-4 pb-3">
        </div>

        <!-- Display Success Message -->
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

        <!-- Display Validation Errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form id="profile-form" role="form" class="needs-validation" novalidate="novalidate" method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">نام</label>
            <div class="col-lg-9">
              <input class="form-control" name="first_name" required type="text" value="{{ old('first_name', Auth::user()->first_name) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">نام خانوادگی</label>
            <div class="col-lg-9">
              <input class="form-control" name="last_name" required type="text" value="{{ old('last_name', Auth::user()->last_name) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">ایمیل</label>
            <div class="col-lg-9">
              <input class="form-control text-left" name="email" required type="email" value="{{ old('email', Auth::user()->email) }}" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">شماره موبایل</label>
            <div class="col-lg-9">
              <input class="form-control text-left" name="mobile" required type="text" value="{{ old('mobile', Auth::user()->mobile) }}" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">رمز عبور</label>
            <div class="col-lg-9">
              <input class="form-control text-left" name="password" type="password" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">تایید رمز عبور</label>
            <div class="col-lg-9">
              <input class="form-control text-left" name="password_confirmation" type="password" dir="ltr">
            </div>
          </div>

          <!-- New fields for user profile -->

          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">آدرس</label>
            <div class="col-lg-9">
              <input class="form-control" name="address" type="text" value="{{ old('address', $profile->address) }}" placeholder="خیابان">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
            <div class="col-lg-6">
              <input class="form-control" name="city" type="text" value="{{ old('city', $profile->city) }}" placeholder="شهر">
            </div>
            <div class="col-lg-3">
              <input class="form-control" name="state" type="text" value="{{ old('state', $profile->state) }}" placeholder="استان">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">تلفن ثابت</label>
            <div class="col-lg-9">
              <input class="form-control text-left" name="phone" type="text" value="{{ old('phone', $profile->phone) }}" dir="ltr">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">بیوگرافی</label>
            <div class="col-lg-9">
              <textarea class="form-control" name="biography">{{ old('biography', $profile->biography) }}</textarea>
            </div>
          </div>
          <!-- End of new fields -->

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