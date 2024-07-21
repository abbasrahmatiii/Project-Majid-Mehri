@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header bg-primary text-white">
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
          @php
          $groupedPermissions = [
          'داشبرد' => ['dashboard'],
          'مدیریت کاربران' => ['manage users', 'manage users add', 'manage users list', 'manage users edit', 'manage users delete', 'manage assign roles'],
          'مدیریت مقالات' => ['manage articles', 'manage articles add', 'manage articles list', 'manage articles edit', 'manage articles delete'],
          'مدیریت بخش ما چه کسی هستیم' => ['manage who-we-are', 'manage who-we-are edit'],

          'مدیریت تنظیمات' => ['manage settings SEO', 'manage settings general'],
          'مدیریت نقش‌ها' => ['manage roles', 'manage roles list', 'manage roles add', 'manage roles edit', 'manage roles delete'],
          'مدیریت دسترسی‌ها' => ['manage permissions', 'manage permissions list', 'manage permissions add', 'manage permissions edit', 'manage permissions delete'],
          'مدیریت اسلایدشوها' => ['manage slideshows', 'manage slideshows add', 'manage slideshows list', 'manage slideshows edit', 'manage slideshows delete'],
          'مدیریت تبلیغات مرکزی' => ['manage centerads', 'manage centerads add', 'manage centerads list', 'manage centerads edit', 'manage centerads delete'],
          'مدیریت پست‌ها' => ['manage posts', 'manage posts add', 'manage posts list', 'manage posts edit', 'manage posts delete'],
          'مدیریت دسته‌بندی‌ها' => ['manage categories', 'manage categories add', 'manage categories list', 'manage categories edit', 'manage categories delete'],
          'مدیریت صفحات' => ['manage pages', 'manage pages add', 'manage pages list', 'manage pages edit', 'manage pages delete'],
          'مدیریت مشاوره‌ها' => ['manage consultations', 'manage consultations add', 'manage consultations list', 'manage consultations edit', 'manage consultations delete'],
          'مدیریت رزروها' => ['manage reservations', 'manage reservations add', 'manage reservations list', 'manage reservations edit', 'manage reservations delete'],
          'مدیریت کامنت کاربران' => ['manage comments', 'manage comments delete'],
          'مدیریت بازه‌های زمانی' => ['manage time slots', 'manage time slots add', 'manage time slots list', 'manage time slots edit', 'manage time slots delete'],
          'مدیریت نظرات کاربران' => ['manage testimonials', 'manage testimonials add', 'manage testimonials list', 'manage testimonials edit', 'manage testimonials delete'],
          'مدیریت تنظیمات راهنما' => ['manage help settings'],
          'مدیریت بخش مشتریان' => ['manage client section'],
          ];
          @endphp
          @foreach($groupedPermissions as $groupName => $permissions)
          <div class="mb-4 p-3 border rounded" style="background-color: #f9f9f9;">
            <h5 class="text-primary">{{ $groupName }}</h5>
            <div class="row">
              @foreach($permissions as $permission)
              @php
              $perm = $permissionsCollection->firstWhere('name', $permission);
              @endphp
              <div class="col-md-4">
                <div class="form-check mb-2 d-flex align-items-center">
                  <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="perm_{{ $perm->id }}" {{ in_array($perm->name, $rolePermissions) ? 'checked' : '' }}>
                  <label class="form-check-label ml-5" for="perm_{{ $perm->id }}">
                    {{ $perm->display_name }}
                  </label>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection