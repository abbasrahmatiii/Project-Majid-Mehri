@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش مشاوره</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="day_id">روز</label>
          <select name="day_id" id="day_id" class="form-control">
            @foreach($days as $day)
            <option value="{{ $day->id }}" {{ $day->id == $consultation->day_id ? 'selected' : '' }}>{{ $day->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="time_slots">بازه‌های زمانی</label>
          <select name="time_slots[]" id="time_slots" class="form-control" multiple>
            @foreach($timeSlots as $timeSlot)
            <option value="{{ $timeSlot->id }}" {{ in_array($timeSlot->id, $consultation->timeSlots->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $timeSlot->start_time }} - {{ $timeSlot->end_time }}</option>
            @endforeach