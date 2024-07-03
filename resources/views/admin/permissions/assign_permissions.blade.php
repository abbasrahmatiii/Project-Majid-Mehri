<!-- resources/views/admin/roles/assign_permissions.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>اختصاص مجوزها به نقش: {{ $role->name }}</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.roles.assignPermissions', $role->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="permissions">مجوزها</label>
          <select name="permissions[]" multiple class="form-control">
            @foreach($permissions as $permission)
            <option value="{{ $permission->name }}" {{ in_array($permission->name, $rolePermissions) ? 'selected' : '' }}>{{ $permission->name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection