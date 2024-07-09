@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش مشاوره</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.consultations.update', $consultation->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="consultant">انتخاب مشاور</label>
          <select name="consultant_id" id="consultant" class="form-control" required>
            <option value="">انتخاب مشاور</option>
            @foreach($consultants as $consultant)
            <option value="{{ $consultant->id }}" {{ $consultant->id == $consultation->consultant_id ? 'selected' : '' }}>
              {{ $consultant->first_name }} {{ $consultant->last_name }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="day">انتخاب روز</label>
          <select name="day_id" id="day" class="form-control" required>
            <option value="">انتخاب روز</option>
            @foreach($days as $day)
            <option value="{{ $day->id }}" {{ $day->id == $consultation->day_id ? 'selected' : '' }}>
              {{ $day->name }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="time_slot">انتخاب بازه زمانی</label>
          <select name="time_slot_id" id="time_slot" class="form-control" required>
            <option value="">انتخاب بازه زمانی</option>
            @foreach($timeSlots as $timeSlot)
            <option value="{{ $timeSlot->id }}" {{ $timeSlot->id == $consultation->time_slot_id ? 'selected' : '' }}>
              {{ $timeSlot->start_time }} - {{ $timeSlot->end_time }}
            </option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection
<!-- @section('js')
@include('admin.layouts.notifications')
@endsection -->