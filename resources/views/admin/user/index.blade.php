@extends('admin.layouts.master')

@section('content')

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
        <tbody id="user-list">
          @foreach($users as $user)
          <tr id="user-{{ $user->id }}">
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
            <td>
              <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="ویرایش">
                <i class="fas fa-edit"></i>
              </a>

              <button class="btn btn-sm btn-clean btn-icon delete-button" data-id="{{ $user->id }}" title="حذف" data-toggle="modal" data-target="#deleteModal">
                <i class="fas fa-trash-alt"></i>
              </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">تایید حذف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        آیا مطمئن هستید که می‌خواهید این کاربر را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">حذف</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    let userId;

    $('.delete-button').on('click', function() {
      userId = $(this).data('id');
    });

    $('#confirmDelete').on('click', function() {
      $.ajax({
        url: '/admin/users/delete/' + userId,
        type: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#user-' + userId).remove();

            document.getElementById('deleteModal').style.display = 'none';
            var backdrops = document.getElementsByClassName('modal-backdrop');
            for (var i = 0; i < backdrops.length; i++) {
              backdrops[i].parentNode.removeChild(backdrops[i]);
            }

            Swal.fire({
              icon: 'success',
              title: 'حذف شد!',
              text: response.message,
              showConfirmButton: false,
              timer: 1500
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'خطا',
              text: response.message,
            });
          }
        },
        error: function(xhr) {
          Swal.fire({
            icon: 'error',
            title: 'خطا',
            text: 'خطایی رخ داده است. لطفا دوباره تلاش کنید.',
          });
        }
      });
    });
  });
</script>

@endsection