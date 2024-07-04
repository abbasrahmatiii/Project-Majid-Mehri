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
    <h3 class="card-title">تنظیمات عمومی سایت</h3>
  </div>
  <!--begin::Form-->
  <form class="form" method="POST" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-6">
          <label>ایمیل تماس:</label>
          <input type="email" class="form-control" name="contact_email" placeholder="ایمیل تماس را وارد کنید" value="{{ old('contact_email', $contact->contact_email ?? '') }}">
          <small class="form-text text-muted">ایمیل تماس باید یک آدرس ایمیل معتبر باشد که کاربران بتوانند با شما در تماس باشند. استفاده از یک ایمیل معتبر به افزایش اعتماد کاربران کمک می‌کند.</small>
          @error('contact_email')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>شماره موبایل:</label>
          <input type="text" class="form-control" name="mobile_number" placeholder="شماره موبایل را وارد کنید" value="{{ old('mobile_number', $contact->mobile_number ?? '') }}">
          <small class="form-text text-muted">شماره موبایل باید معتبر باشد و می‌تواند برای ارسال پیام‌های ضروری به کاربران استفاده شود. شماره موبایل می‌تواند اعتماد و اطمینان بیشتری به کاربران بدهد.</small>
          @error('mobile_number')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>شماره تلفن ثابت:</label>
          <input type="text" class="form-control" name="phone_number" placeholder="شماره تلفن ثابت را وارد کنید" value="{{ old('phone_number', $contact->phone_number ?? '') }}">
          <small class="form-text text-muted">شماره تلفن ثابت باید معتبر باشد و می‌تواند برای تماس‌های رسمی و اداری استفاده شود. وجود شماره تلفن ثابت به افزایش اعتماد کاربران کمک می‌کند.</small>
          @error('phone_number')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>ساعت کاری:</label>
          <input type="text" class="form-control" name="working_hours" placeholder="ساعت کاری را وارد کنید" value="{{ old('working_hours', $contact->working_hours ?? '') }}">
          <small class="form-text text-muted">ساعت کاری را به صورت معتبر وارد کنید. به عنوان مثال: "شنبه - چهارشنبه: 9 صبح تا 5 عصر". این اطلاعات به کاربران کمک می‌کند بدانند در چه ساعاتی می‌توانند با شما تماس بگیرند.</small>
          @error('working_hours')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>روزهای کاری:</label>
          <input type="text" class="form-control" name="working_days" placeholder="روزهای کاری را وارد کنید" value="{{ old('working_days', $contact->working_days ?? '') }}">
          <small class="form-text text-muted">روزهای کاری را به صورت معتبر وارد کنید. به عنوان مثال: "شنبه تا چهارشنبه". این اطلاعات به کاربران کمک می‌کند بدانند در چه روزهایی می‌توانند با شما تماس بگیرند.</small>
          @error('working_days')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>متن کپی رایت:</label>
          <input type="text" class="form-control" name="copyright_text" placeholder="متن کپی رایت را وارد کنید" value="{{ old('copyright_text', $contact->copyright_text ?? '') }}">
          <small class="form-text text-muted">متن کپی رایت را وارد کنید. این متن در پایین صفحات سایت نمایش داده می‌شود و می‌تواند شامل نام شرکت و تاریخ باشد.</small>
          @error('copyright_text')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>لوگو:</label>
          <input type="file" class="form-control" name="logo" accept="image/png">
          <small class="form-text text-muted">لوگو باید به صورت png باشد تا از کیفیت بالاتری برخوردار باشد و به سرعت بارگذاری صفحات کمک کند.</small>
          @if(isset($contact->logo))
          <img src="{{ asset('/storage/logos/'. $contact->logo) }}" alt="لوگو" class="img-thumbnail mt-2" width="100">
          @endif
          @error('logo')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>آدرس فیس بوک:</label>
          <input type="text" class="form-control" name="facebook_url" placeholder="آدرس فیس بوک را وارد کنید" value="{{ old('facebook_url', $contact->facebook_url ?? '') }}">
          <small class="form-text text-muted">آدرس فیس بوک معتبر وارد کنید. حضور در شبکه‌های اجتماعی می‌تواند به بهبود سئو و جذب کاربران بیشتر کمک کند.</small>
          @error('facebook_url')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>آیکون فیس بوک (PNG):</label>
          <input type="file" class="form-control" name="facebook_icon" accept="image/png">
          @if(isset($contact->facebook_icon))
          <img src="{{ asset('/storage/icons/'. $contact->facebook_icon) }}" alt="آیکون فیس بوک" class="img-thumbnail mt-2" width="50">
          @endif
          @error('facebook_icon')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>آدرس تلگرام:</label>
          <input type="text" class="form-control" name="telegram_url" placeholder="آدرس تلگرام را وارد کنید" value="{{ old('telegram_url', $contact->telegram_url ?? '') }}">
          <small class="form-text text-muted">آدرس تلگرام معتبر وارد کنید. حضور در شبکه‌های اجتماعی می‌تواند به بهبود سئو و جذب کاربران بیشتر کمک کند.</small>
          @error('telegram_url')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>آیکون تلگرام (PNG):</label>
          <input type="file" class="form-control" name="telegram_icon" accept="image/png">
          @if(isset($contact->telegram_icon))
          <img src="{{ asset('/storage/icons/'. $contact->telegram_icon) }}" alt="آیکون تلگرام" class="img-thumbnail mt-2" width="50">
          @endif
          @error('telegram_icon')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>آدرس واتس اپ:</label>
          <input type="text" class="form-control" name="whatsapp_url" placeholder="آدرس واتس اپ را وارد کنید" value="{{ old('whatsapp_url', $contact->whatsapp_url ?? '') }}">
          <small class="form-text text-muted">آدرس واتس اپ معتبر وارد کنید. حضور در شبکه‌های اجتماعی می‌تواند به بهبود سئو و جذب کاربران بیشتر کمک کند.</small>
          @error('whatsapp_url')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>آیکون واتس اپ (PNG):</label>
          <input type="file" class="form-control" name="whatsapp_icon" accept="image/png">
          @if(isset($contact->whatsapp_icon))
          <img src="{{ asset('/storage/icons/'. $contact->whatsapp_icon) }}" alt="آیکون واتس اپ" class="img-thumbnail mt-2" width="50">
          @endif
          @error('whatsapp_icon')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label>آدرس لینکداین:</label>
          <input type="text" class="form-control" name="linkedin_url" placeholder="آدرس لینکداین را وارد کنید" value="{{ old('linkedin_url', $contact->linkedin_url ?? '') }}">
          <small class="form-text text-muted">آدرس لینکداین معتبر وارد کنید. حضور در شبکه‌های اجتماعی می‌تواند به بهبود سئو و جذب کاربران بیشتر کمک کند.</small>
          @error('linkedin_url')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-lg-6">
          <label>آیکون لینکداین (PNG):</label>
          <input type="file" class="form-control" name="linkedin_icon" accept="image/png">
          @if(isset($contact->linkedin_icon))
          <img src="{{ asset('/storage/icons/'. $contact->linkedin_icon) }}" alt="آیکون لینکداین" class="img-thumbnail mt-2" width="50">
          @endif
          @error('linkedin_icon')
          <span class="form-text text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <!-- سایر فیلدهای موجود -->
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