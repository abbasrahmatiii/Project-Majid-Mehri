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
<div class="card gutter-b mt-0 mx-4">
  <div class="card-header">
    <h3 class="card-title">ایجاد تبلیغ جدید</h3>
  </div>
  <!--begin::Form-->
  <form class="form" method="POST" action="{{ route('admin.centerads.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="title">عنوان</label>
          <input type="text" class="form-control" id="title" name="title" required>
          <small class="form-text text-muted">عنوان تبلیغ باید یک رشته معتبر با حداکثر ۲۵۵ کاراکتر باشد. عنوان باید شامل کلمات کلیدی مرتبط باشد تا در نتایج موتورهای جستجو بهتر دیده شود.</small>
          @error('title')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label for="description">توضیحات</label>
          <textarea class="form-control" id="description" name="description" required></textarea>
          <small class="form-text text-muted">توضیحات باید به طور کامل و به صورت یک رشته معتبر وارد شود. این توضیحات باید مختصر و مفید باشد و شامل کلمات کلیدی مرتبط با تبلیغ باشد.</small>
          @error('description')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label for="image">تصویر</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
          <small class="form-text text-muted">تصویر باید یکی از فرمت‌های jpeg, png, jpg, gif و حداکثر ۲ مگابایت باشد. استفاده از تصاویر با کیفیت و کم‌حجم به بهبود سئو و تجربه کاربری کمک می‌کند.</small>
          @error('image')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label for="is_active">فعال</label>
          <input type="hidden" name="is_active" value="0">
          <input type="checkbox" id="is_active" name="is_active" value="1" checked>
          <small class="form-text text-muted">فعال بودن یا نبودن تبلیغ را تعیین کنید. تبلیغات فعال در سایت نمایش داده می‌شوند.</small>
          @error('is_active')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          <button type="submit" class="btn btn-primary mr-2">ایجاد</button>
          <button type="reset" class="btn btn-secondary">لغو</button>
        </div>
      </div>
    </div>
  </form>
  <!--end::Form-->
</div>
@endsection