@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ایجاد نقش جدید</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">نام نقش</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="permissions">مجوزها</label>
          <div class="row">
            @foreach($permissions as $permission)
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                <label class="form-check-label" for="perm_{{ $permission->id }}">
                  {{ $permission->display_name }}
                </label>
              </div>
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