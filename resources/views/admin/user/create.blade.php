@extends('admin.layouts.master')

@section('content')
<div class="mx-4 mt-4"></div>
<div class="card gutter-b mt-0 mx-4">
  <div class="card-header">
    <h3 class="card-title">ایجاد کاربر جدید</h3>
  </div>
  <!--begin::Form-->
  <form id="userForm" class="form">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="first_name">نام</label>
          <input type="text" class="form-control" id="first_name" name="first_name" required value="{{ old('first_name') }}">
          <span class="form-text text-danger" id="error_first_name"></span>
        </div>
        <div class="col-lg-6">
          <label for="last_name">نام خانوادگی</label>
          <input type="text" class="form-control" id="last_name" name="last_name" required value="{{ old('last_name') }}">
          <span class="form-text text-danger" id="error_last_name"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="email">ایمیل</label>
          <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
          <span class="form-text text-danger" id="error_email"></span>
        </div>
        <div class="col-lg-6">
          <label for="mobile">موبایل</label>
          <input type="text" class="form-control" id="mobile" name="mobile" required value="{{ old('mobile') }}">
          <span class="form-text text-danger" id="error_mobile"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="password">رمز عبور</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <span class="form-text text-danger" id="error_password"></span>
        </div>
        <div class="col-lg-6">
          <label for="password_confirmation">تایید رمز عبور</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          <span class="form-text text-danger" id="error_password_confirmation"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="role">نقش</label>
          <select class="form-control" id="role" name="role" required>
            <option value="">انتخاب نقش</option>
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
          <span class="form-text text-danger" id="error_role"></span>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('{{ route("admin.users.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(response => response.json())
      .then(data => {
        // پاک کردن پیام‌های خطا
        document.querySelectorAll('.form-text.text-danger').forEach(span => span.innerText = '');

        if (data.errors) {
          for (let key in data.errors) {
            document.getElementById('error_' + key).innerText = data.errors[key][0];
          }
        } else {
          Swal.fire({
            icon: 'success',
            title: 'موفقیت',
            text: data.success,
            showConfirmButton: false,
            timer: 1500
          }).then(() => {
            document.getElementById('userForm').reset(); // ریست کردن فیلدها
            window.location.href = '{{ route("admin.user.index") }}';
          });
        }
      })
      .catch(error => {
        Swal.fire({
          icon: 'error',
          title: 'خطا',
          text: 'خطایی رخ داده است. لطفا دوباره تلاش کنید.'
        });
        console.error('Error:', error);
      });
  });
</script>
@endsection