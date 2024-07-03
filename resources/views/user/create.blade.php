@extends('layouts.master')

@section('content')
<div class="container py-2 mt-4">
  <div class="row">
    <div class="col-lg">
      <div class="row justify-content-md-center">
        <div class="col-md-9">
          <div class="featured-box featured-box-primary text-left mt-0">
            <div class="box-content">
              <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">ثبت نام کاربر</h4>
              <form action="{{ route('register') }}" id="frmSignUp" method="post" class="needs-validation" novalidate="novalidate">
                @csrf
                <div class="form-row">
                  <div class="form-group col">
                    <label for="first_name" class="font-weight-bold text-dark text-2">نام</label>
                    <input type="text" id="first_name" name="first_name" class="form-control text-left" placeholder="نام خود را وارد کنید" dir="ltr" value="{{ old('first_name') }}" required>
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="last_name" class="font-weight-bold text-dark text-2">نام خانوادگی</label>
                    <input type="text" id="last_name" name="last_name" class="form-control text-left" placeholder="نام خانوادگی خود را وارد کنید" dir="ltr" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="mobile" class="font-weight-bold text-dark text-2">موبایل</label>
                    <input type="text" id="mobile" name="mobile" class="form-control text-left" placeholder="شماره موبایل خود را وارد کنید" dir="ltr" value="{{ old('mobile') }}" required>
                    @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="email" class="font-weight-bold text-dark text-2">ایمیل</label>
                    <input type="email" id="email" name="email" class="form-control text-left" placeholder="ایمیل خود را وارد کنید" dir="ltr" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="password" class="font-weight-bold text-dark text-2">رمز عبور</label>
                    <input type="password" id="password" name="password" class="form-control text-left" placeholder="رمز عبور خود را وارد کنید" dir="ltr" required>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="password_confirmation" class="font-weight-bold text-dark text-2">تکرار رمز عبور</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control text-left" placeholder="رمز عبور خود را تکرار کنید" dir="ltr" required>
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-3">
                    <input type="submit" value="ثبت نام" class="btn btn-primary" data-loading-text="در حال بارگذاری">
                  </div>
                  @guest
                  <div class="form-group col-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-primary">وارد شوید</a>
                  </div>
                  @endguest
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection