@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>افزودن بازه زمانی جدید</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.time_slots.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="start_time">زمان شروع</label>
          <input type="time" name="start_time" id="start_time" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="end_time">زمان پایان</label>
          <input type="time" name="end_time" id="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection