@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش کاربر</h3>
    </div>
    <div class="card-body">
      <form id="editUserForm" method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
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

        <!-- New fields for user profile -->
        @php
        $profile = $user->profile ?: new \App\Models\UserProfile();
        @endphp
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="address">آدرس</label>
              <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address) }}">
              <span class="form-text text-danger" id="error_address"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="state">استان</label>
              <input type="text" name="state" class="form-control" value="{{ old('state', $profile->state) }}">
              <span class="form-text text-danger" id="error_state"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="city">شهر</label>
              <input type="text" name="city" class="form-control" value="{{ old('city', $profile->city) }}">
              <span class="form-text text-danger" id="error_city"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone">تلفن ثابت</label>
              <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
              <span class="form-text text-danger" id="error_phone"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="profile_picture">عکس پروفایل</label>
              <input type="file" name="profile_picture" class="form-control">
              <span class="form-text text-danger" id="error_profile_picture"></span>
              @if ($profile->profile_picture)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profile Picture" class="rounded-circle" width="100">
              </div>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="biography">بیوگرافی</label>
              <textarea name="biography" class="form-control">{{ old('biography', $profile->biography) }}</textarea>
              <span class="form-text text-danger" id="error_biography"></span>
            </div>
          </div>
        </div>
        <!-- End of new fields -->

        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('editUserForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

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