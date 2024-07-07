@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>افزودن روز جدید</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.days.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">نام روز</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection