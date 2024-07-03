@extends('layouts.master')
@section('content')
<div class="col-lg-7 order-1 order-lg-2 mt-4">
  <div class="row justify-content-md-center">
    <div class="col-md-9">
      <div class="featured-box featured-box-primary text-left mt-0">
        <div class="box-content">
          <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">ورود کاربر</h4>

          <form action="/user/login" id="frmSignIn" method="post" class="needs-validation" novalidate="novalidate">
            @csrf
            <div class="form-row">
              <div class="form-group col">
                <label class="font-weight-bold text-dark text-2">ایمیل</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-sm text-left" dir="ltr" required>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <a class="float-right" href="">(فراموشی رمز عبور؟)</a>
                <label class="font-weight-bold text-dark text-2">رمز عبور</label>
                <input type="password" name="password" class="form-control form-control-sm text-left" dir="ltr" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-6">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" id="rememberme">
                  <label class="custom-control-label text-2" for="rememberme">به خاطر سپاری</label>
                </div>
              </div>
              <div class="form-group col-lg-6">
                <input type="submit" value="ورود" class="btn btn-primary btn-modern float-right" data-loading-text="در حال بارگذاری ...">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection