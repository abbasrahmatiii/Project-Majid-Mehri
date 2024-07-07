@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <h3>ایجاد مشاوره</h3>
  <form action="{{ route('consultations.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="day_id">روز:</label>
      <select name="day_id" id="day_id" class="form-control" required>
        @foreach($days as $day)
        <option value="{{ $day->id }}">{{ $day->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="time_slot_id">بازه زمانی:</label>
      <select name="time_slot_id" id="time_slot_id" class="form-control" required>
        @foreach($timeSlots as $timeSlot)
        <option value="{{ $timeSlot->id }}">{{ $timeSlot->start_time }} - {{ $timeSlot->end_time }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">ایجاد مشاوره</button>
  </form>
</div>
@endsection