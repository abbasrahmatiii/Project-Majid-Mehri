@php
$profile = Auth::user()->profile ?: new \App\Models\UserProfile();
@endphp
<div class="col-lg-3 mt-4 mt-lg-0">
  <div class="d-flex justify-content-center mb-4">
    <div class="profile-image-outer-container">
      <div class="profile-image-inner-container bg-color-primary">
        <img src="{{ $profile->profile_picture ? asset('storage/' . $profile->profile_picture) : 'img/avatars/avatar.jpg' }}">
        <span class="profile-image-button bg-color-dark">
          <i class="fas fa-camera text-light"></i>
        </span>
      </div>
      <input type="file" id="file" class="profile-image-input" name="profile_picture" form="profile-form">
    </div>
  </div>

  <aside class="sidebar mt-2" id="sidebar">
    <ul class="nav nav-list flex-column mb-5">
      <li class="nav-item"><a class="nav-link text-dark active" href="profile">پروفایل من</a></li>
      <li class="nav-item"><a class="nav-link" href="#">صورتحساب</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('reservations.index') }}">درخواست مشاوره</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('user.reservations.reserved') }}">جلسات مشاور رزرو شده</a></li>
    </ul>
  </aside>
</div>