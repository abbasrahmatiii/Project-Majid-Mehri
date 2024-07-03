@extends('admin.layouts.master')

@section('content')
<div class="mx-4 mt-4">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
</div>
<div class="card gutter-b mt-0 mx-4">
  <div class="card-header">
    <h3 class="card-title">اختصاص نقش به کاربر: {{ $user->first_name }} {{ $user->last_name }}</h3>
  </div>
  <!--begin::Form-->
  <form class="form" method="POST" action="{{ route('admin.users.assignRoles', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-12">
          <label>نقش‌ها</label>
          @foreach($roles as $role)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role-{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
            <label class="form-check-label" for="role-{{ $role->id }}">
              {{ $role->name }}
            </label>
          </div>
          @endforeach
          @error('roles')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          <button type="submit" class="btn btn-primary mr-2">ذخیره</button>
          <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">لغو</a>
        </div>
      </div>
    </div>
  </form>
  <!--end::Form-->
</div>
@endsection