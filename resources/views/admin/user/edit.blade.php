@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش کاربر</h3>
    </div>
    <div class="card-body">
      <form id="editUserForm" method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="first_name">نام</label>
              <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
              <span class="form-text text-danger" id="error_first_name"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="last_name">نام خانوادگی</label>
              <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
              <span class="form-text text-danger" id="error_last_name"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">ایمیل</label>
              <input type="email" name="email" class="form-control" value="{{ $user->email }}">
              <span class="form-text text-danger" id="error_email"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mobile">شماره موبایل</label>
              <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
              <span class="form-text text-danger" id="error_mobile"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">رمز عبور (در صورت نیاز به تغییر)</label>
              <input type="password" name="password" class="form-control">
              <span class="form-text text-danger" id="error_password"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation">تکرار رمز عبور</label>
              <input type="password" name="password_confirmation" class="form-control">
              <span class="form-text text-danger" id="error_password_confirmation"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="roles">نقش‌ها</label>
          <select name="roles[]" class="form-control" id="roles">
            <option selected disabled>انتخاب نقش</option>
            @foreach($roles as $role)
            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
              {{ $role->name }}
            </option>
            @endforeach
          </select>
          <span class="form-text text-danger" id="error_roles"></span>
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('editUserForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);
    let userId = "{{ $user->id }}";

    fetch('{{ route("admin.users.update", $user->id) }}', {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'X-HTTP-Method-Override': 'PATCH'
        }
      })
      .then(response => response.json())
      .then(data => {
        document.querySelectorAll('.form-text.text-danger').forEach(span => span.innerText = '');

        if (data.errors) {
          for (let key in data.errors) {
            document.getElementById('error_' + key).innerText = data.errors[key][0];
          }
        } else {
          toastr.success(data.success);
          setTimeout(function() {
            window.location.href = '{{ route("admin.user.index") }}';
          }, 2000);
        }
      })
      .catch(error => {
        toastr.error('خطایی رخ داده است. لطفا دوباره تلاش کنید.');
        console.error('Error:', error);
      });
  });
</script>
@endsection