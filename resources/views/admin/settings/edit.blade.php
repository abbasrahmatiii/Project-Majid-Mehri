@extends('admin.layouts.master')
@section('content')
<div class="mx-4 mt-4">
</div>
<div class="card gutter-b mt-0 mx-4">
  <div class="card-header">
    <h3 class="card-title">تنظیمات سئو</h3>
  </div>
  <!--begin::Form-->
  <form class="form" method="POST" action="/admin/settings/update">
    @csrf
    @method('PATCH')
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-6">
          <label>عنوان سایت:</label>
          <input type="text" class="form-control" name="site_title" placeholder="عنوان سایت را وارد کنید" value="{{ old('site_title', $settings->site_title ?? '') }}">
          <span class="form-text text-muted">عنوان سایت نباید بیش از 70 کاراکتر باشد.</span>
          @error('site_title')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>توضیحات متا:</label>
          <input type="text" class="form-control" name="meta_description" placeholder="توضیحات متا را وارد کنید" value="{{ old('meta_description', $settings->meta_description ?? '') }}">
          <span class="form-text text-muted">توضیحات متا باید بین 150 تا 160 کاراکتر باشد و به توصیف محتوای صفحه بپردازد.</span>
          @error('meta_description')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>کلیدواژه‌های متا:</label>
          <input type="text" class="form-control" name="meta_keywords" placeholder="کلیدواژه‌های متا را وارد کنید" value="{{ old('meta_keywords', $settings->meta_keywords ?? '') }}">
          <span class="form-text text-muted">کلیدواژه‌های متا را با کاما (,) از هم جدا کنید و سعی کنید مرتبط با محتوای صفحه باشند.</span>
          @error('meta_keywords')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>ایمیل تماس:</label>
          <input type="email" class="form-control" name="contact_email" placeholder="ایمیل تماس را وارد کنید" value="{{ old('contact_email', $settings->contact_email ?? '') }}">
          <span class="form-text text-muted">ایمیل تماس باید یک آدرس ایمیل معتبر باشد که کاربران بتوانند با شما در تماس باشند.</span>
          @error('contact_email')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-12">
          <label>آدرس:</label>
          <input type="text" class="form-control" name="address" placeholder="آدرس را وارد کنید" value="{{ old('address', $settings->address ?? '') }}">
          <span class="form-text text-muted">آدرس شرکت یا دفتر خود را به طور کامل وارد کنید.</span>
          @error('address')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>تگ‌های هدر اضافی:</label>
          <textarea class="form-control" name="additional_header_tags" rows="3" placeholder="تگ‌های اضافی هدر را وارد کنید">{{ old('additional_header_tags', $settings->additional_header_tags ?? '') }}</textarea>
          <span class="form-text text-muted">تگ‌های اضافی هدر (مثل کدهای CSS یا JS) را وارد کنید. این تگ‌ها در بخش هدر صفحات شما قرار می‌گیرند.</span>
          @error('additional_header_tags')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>تگ‌های فوتر اضافی:</label>
          <textarea class="form-control" name="additional_footer_tags" rows="3" placeholder="تگ‌های اضافی فوتر را وارد کنید">{{ old('additional_footer_tags', $settings->additional_footer_tags ?? '') }}</textarea>
          <span class="form-text text-muted">تگ‌های اضافی فوتر (مثل کدهای JS) را وارد کنید. این تگ‌ها در بخش فوتر صفحات شما قرار می‌گیرند.</span>
          @error('additional_footer_tags')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>نام سایت برای سئو:</label>
          <input type="text" class="form-control" name="seo_site_name" placeholder="نام سایت برای سئو را وارد کنید" value="{{ old('seo_site_name', $settings->seo_site_name ?? '') }}">
          <span class="form-text text-muted">نام سایت برای استفاده در سئو، مانند نام برند یا نام تجاری سایت شما.</span>
          @error('seo_site_name')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>کلمه کلیدی پیش‌فرض:</label>
          <input type="text" class="form-control" name="default_keyword" placeholder="کلمه کلیدی پیش‌فرض را وارد کنید" value="{{ old('default_keyword', $settings->default_keyword ?? '') }}">
          <span class="form-text text-muted">کلمه کلیدی پیش‌فرض که در تمام صفحات سایت استفاده می‌شود.</span>
          @error('default_keyword')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>ربات‌های متا:</label>
          <input type="text" class="form-control" name="meta_robots" placeholder="ربات‌های متا را وارد کنید" value="{{ old('meta_robots', $settings->meta_robots ?? '') }}">
          <span class="form-text text-muted">مقدار پیش‌فرض برای تگ ربات‌های متا. مقادیر معمول: index, follow یا noindex, nofollow.</span>
          @error('meta_robots')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>گوگل آنالیتیکس:</label>
          <input type="text" class="form-control" name="google_analytics" placeholder="شناسه گوگل آنالیتیکس را وارد کنید" value="{{ old('google_analytics', $settings->google_analytics ?? '') }}">
          <span class="form-text text-muted">شناسه گوگل آنالیتیکس (UA-XXXXXXXXX-X) برای ردیابی ترافیک سایت.</span>
          @error('google_analytics')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          <button type="submit" class="btn btn-primary mr-2">ذخیره</button>
          <button type="reset" class="btn btn-secondary">لغو</button>
        </div>
      </div>
    </div>
  </form>
  <!--end::Form-->
</div>
@endsection