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
<div class="card card-custom gutter-b mt-0 mx-4">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        لیست نقش‌ها
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">ایجاد نقش جدید</a>
    </div>
  </div>
  <div class="card-body">
    @if($roles->isEmpty())
    <div class="alert alert-warning">هیچ نقشی وجود ندارد.</div>
    @else
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>نام نقش</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
          <tr>
            <td>{{ $role->name }}</td>
            <td>
              @if (!in_array($role->name, ['مدیر کل', 'کاربر عادی']))

              <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="ویرایش">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('admin.roles.delete', $role->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف" onclick="return confirm('آیا مطمئن هستید؟')">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
      {{ $roles->links('pagination::bootstrap-4') }}
    </div>
    @endif
  </div>
</div>
@endsection
