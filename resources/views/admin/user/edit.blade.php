<!-- resources/views/admin/users/edit.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش کاربر</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="first_name">نام</label>
              <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="last_name">نام خانوادگی</label>
              <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">ایمیل</label>
              <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mobile">شماره موبایل</label>
              <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">رمز عبور (در صورت نیاز به تغییر)</label>
              <input type="password" name="password" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation">تکرار رمز عبور</label>
              <input type="password" name="password_confirmation" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="roles">نقش‌ها</label>
          <div class="row">
            @foreach($roles as $role)
              <div class="col-md-4">
                <label>
                  <input type="radio" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                  {{ $role->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection
