@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش نقش</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name">نام نقش</label>
          <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <div class="form-group">
          <label for="permissions">مجوزها</label>
          <div class="row">
            @foreach($permissions as $permission)
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}" {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
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