@extends('layouts.master')

@section('content')
<div class="col-lg-7 order-1 order-lg-2 mt-4">
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <div class="featured-box featured-box-primary text-left mt-0">
                <div class="box-content">
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">ارسال لینک ریست رمز عبور</h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" id="frmSendResetLink" class="needs-validation" novalidate="novalidate">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">ایمیل</label>
                                <input id="email" type="email" class="form-control form-control-sm text-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" dir="ltr" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-0">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary btn-modern float-right" data-loading-text="در حال بارگذاری ...">
                                    ارسال لینک ریست رمز عبور
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