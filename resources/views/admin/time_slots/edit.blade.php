@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش بازه زمانی</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.time_slots.update', $timeSlot->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="start_time">زمان شروع</label>
          <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $timeSlot->start_time }}" required>
        </div>
        <div class="form-group">
          <label for="end_time">زمان پایان</label>
          <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $timeSlot->end_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
      </form>
    </div>
  </div>
</div>
@endsection