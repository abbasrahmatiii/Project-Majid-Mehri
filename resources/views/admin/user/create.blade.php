@extends('admin.layouts.master')

@section('content')
<!-- <div class="mx-4 mt-4">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif -->
</div>
<div class="card gutter-b mt-0 mx-4">
  <div class="card-header">
    <h3 class="card-title">ایجاد کاربر جدید</h3>
  </div>
  <!--begin::Form-->
  <form class="form" method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="first_name">نام</label>
          <input type="text" class="form-control" id="first_name" name="first_name" required>
          @error('first_name')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label for="last_name">نام خانوادگی</label>
          <input type="text" class="form-control" id="last_name" name="last_name" required>
          @error('last_name')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="email">ایمیل</label>
          <input type="email" class="form-control" id="email" name="email" required>
          @error('email')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label for="mobile">موبایل</label>
          <input type="text" class="form-control" id="mobile" name="mobile" required>
          @error('mobile')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="password">رمز عبور</label>
          <input type="password" class="form-control" id="password" name="password" required>
          @error('password')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label for="password_confirmation">تایید رمز عبور</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          @error('password_confirmation')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="role">نقش</label>
          <select class="form-control" id="role" name="role" required>
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
          @error('role')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-2">ایجاد</button>
      <button type="reset" class="btn btn-secondary">لغو</button>
    </div>
  </form>
  <!--end::Form-->
</div>
@endsection