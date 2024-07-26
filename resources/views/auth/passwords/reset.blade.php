@extends('layouts.master')

@section('content')
<div class="col-lg-7 order-1 order-lg-2 mt-4">
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <div class="featured-box featured-box-primary text-left mt-0">
                <div class="box-content">
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">ریست رمز عبور</h4>
                    <form method="POST" action="{{ route('password.update') }}" id="frmResetPassword" class="needs-validation" novalidate="novalidate">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">ایمیل</label>
                                <input id="email" type="email" class="form-control form-control-sm text-left @error('email')  is-invalid @enderror" name="email" readonly value="{{ $email ?? old('email') }}" dir="ltr" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">رمز عبور</label>
                                <input id="password" type="password" class="form-control form-control-sm text-left @error('password') is-invalid @enderror" name="password" dir="ltr" required autocomplete="new-password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">تکرار رمز عبور</label>
                                <input id="password-confirm" type="password" class="form-control form-control-sm text-left" name="password_confirmation" dir="ltr" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-row mb-0">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary btn-modern float-right" data-loading-text="در حال بارگذاری ...">
                                    ریست رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection