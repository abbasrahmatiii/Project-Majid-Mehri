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
    <h3 class="card-title">ایجاد اسلاید جدید</h3>
  </div>
  <form class="form" action="{{ route('admin.slide.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label class="col-lg-2 col-form-label text-right">عنوان:</label>
        <div class="col-lg-3">
          <input type="text" name="title" class="form-control" placeholder="عنوان را وارد کنید" value="{{ old('title') }}" />
          @error('title')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <span class="form-text text-muted">عنوان اسلاید باید توصیفی باشد و شامل کلمات کلیدی مرتبط باشد. حداکثر 20 کاراکتر.</span>
        </div>
        <label class="col-lg-2 col-form-label text-right">تصویر:</label>
        <div class="col-lg-3">
          <input type="file" name="image" class="form-control-file" />
          @error('image')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <span class="form-text text-muted">تصویر باید با فرمت‌های JPEG، PNG، JPG، GIF یا SVG باشد. حجم تصویر نباید بیش از 5 مگابایت و ابعاد آن نباید کمتر از 700x500 پیکسل باشد. همچنین از نام‌گذاری مناسب فایل استفاده کنید که شامل کلمات کلیدی مرتبط باشد.بهتر است تناسب طول به ارتفاع 2.3 باشد.</span>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-2 col-form-label text-right">توضیحات:</label>
        <div class="col-lg-3">
          <textarea name="description" class="form-control" placeholder="توضیحات را وارد کنید">{{ old('description') }}</textarea>
          @error('description')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <span class="form-text text-muted">توضیحات باید حداکثر 80 کاراکتر باشد و شامل اطلاعات مفید و مرتبط با اسلاید باشد. استفاده از کلمات کلیدی مرتبط به بهبود سئو کمک می‌کند.</span>
        </div>
        <label class="col-lg-2 col-form-label text-right">متن دکمه:</label>
        <div class="col-lg-3">
          <input type="text" name="button_text" class="form-control" placeholder="متن دکمه را وارد کنید" value="{{ old('button_text') }}" />
          @error('button_text')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <span class="form-text text-muted">متن دکمه باید مختصر و مرتبط با عملکرد آن باشد. مثلاً "بیشتر بخوانید" یا "خرید کنید".</span>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-2 col-form-label text-right">آدرس URL دکمه:</label>
        <div class="col-lg-3">
          <input type="url" name="button_url" class="form-control" placeholder="آدرس URL دکمه را وارد کنید" value="{{ old('button_url') }}" />
          @error('button_url')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <span class="form-text text-muted">آدرس URL دکمه باید مرتبط با محتوا باشد و به صفحه مناسبی لینک شود. از URL های کوتاه و توصیفی استفاده کنید که شامل کلمات کلیدی مرتبط باشد.</span>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
          <button type="submit" class="btn btn-success mr-2">ارسال</button>
          <button type="reset" class="btn btn-secondary">لغو</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection