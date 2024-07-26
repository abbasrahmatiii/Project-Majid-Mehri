<!DOCTYPE html>
<html>

<head>
  <title>درخواست ریست رمز عبور</title>
  <style>
    body {
      font-family: Tahoma, Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
      direction: rtl;
      text-align: right;
      margin: 0;
    }

    .container {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      margin: auto;
      max-width: 600px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .header {
      background-color: #000;
      color: #fff;
      padding: 10px;
      border-radius: 8px 8px 0 0;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-content {
      background-color: #e0e0e0;
      border-radius: 8px;
      padding: 20px;
      margin: 20px 0;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      color: #000;
      /* تغییر رنگ متن دکمه به مشکی */
      background-color: #fff;
      /* رنگ پس‌زمینه دکمه سفید */
      text-decoration: none;
      border-radius: 5px;
      margin-top: 10px;
      border: 2px solid #007bff;
      /* رنگ حاشیه دکمه */
    }

    .btn:hover {
      background-color: #007bff;
      /* رنگ پس‌زمینه دکمه هنگام hover */
      color: #fff;
      /* رنگ متن دکمه هنگام hover */
    }

    .footer {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      border-radius: 0 0 8px 8px;
      text-align: center;
    }

    .footer p {
      margin: 0;
      font-size: 14px;
    }

    .footer a {
      color: #fff;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>درخواست ریست رمز عبور</h1>
    </div>
    <p>سلام</p>
    <p>شما این ایمیل را دریافت کرده‌اید زیرا درخواست ریست رمز عبور برای حساب کاربری شما ارسال شده است</p>

    <div class="form-content">
      <p><a href="{{ url('password/reset', $token) . '?email=' . urlencode($email) }}" class="btn">ریست رمز عبور</a></p>
      <p>لینک ریست رمز عبور در مدت 60 دقیقه منقضی خواهد شد</p>
      <p>اگر شما درخواست ریست رمز عبور نکردید، نیازی به اقدام دیگری نیست</p>
    </div>

    <p>با احترام،<br>تیم {{ config('app.name') }}</p>
    <p>اگر در کلیک بر روی دکمه "ریست رمز عبور" مشکل دارید، آدرس زیر را کپی کرده و در مرورگر وب خود قرار دهید:<br>{{ url('password/reset', $token) . '?email=' . urlencode($email) }}</p>
  </div>

  <div class="footer">
    <p>برای تماس با ما می‌توانید از روش‌های زیر استفاده کنید</p>
    <p>آدرس: {{ $settings->address ?? 'فلکه دانشگاه' }}</p>
    <p>تلفن: {{ $contact->phone_number ?? '123456789' }}</p>
    <p>ایمیل: {{ $contact->contact_email ?? 'mail@example.com' }} </p>
  </div>
</body>

</html>