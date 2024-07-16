@extends('layouts.master')

@section('content')
<div class="container mt-4 text-center">
  <h1 class="display-1">404</h1>
  <p class="lead">متاسفیم، صفحه‌ای که به دنبال آن بودید پیدا نشد.</p>
  <a href="{{ url('/') }}" class="btn btn-primary">بازگشت به صفحه اصلی</a>
</div>
@endsection