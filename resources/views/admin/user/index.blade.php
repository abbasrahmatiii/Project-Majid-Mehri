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
  @endif 
</div>-->
<div class="card card-custom gutter-b mt-0 mx-4">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        لیست کاربران
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary">ایجاد کاربر جدید</a>
    </div>
  </div>
  <div class="card-body">
    @if($users->isEmpty())
    <div class="alert alert-warning">هیچ کاربری وجود ندارد.</div>
    @else
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>نقش‌ها</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
            <td>
              <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="ویرایش">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ route('admin.users.showAssignRolesForm', $user->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="اختصاص نقش">
                <i class="fas fa-user-tag"></i>
              </a>
              <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
      {{ $users->links('pagination::bootstrap-4') }}
    </div>
    @endif
  </div>
</div>
@endsection