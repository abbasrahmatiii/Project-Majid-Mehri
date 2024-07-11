<!-- resources/views/reservations/index.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container mt-4">
  <h3>درخواست مشاوره</h3>
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>روز</th>
          <th>ساعت شروع</th>
          <th>ساعت پایان</th>
          <th>مشاور</th>
          <th>عملیات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($consultations as $consultation)
        <tr>
          <td>{{ $consultation->day->name }}</td>
          <td>{{ $consultation->timeSlot->start_time }}</td>
          <td>{{ $consultation->timeSlot->end_time }}</td>
          <td>{{ $consultation->consultant->first_name }} {{ $consultation->consultant->last_name }}</td> <!-- اضافه کردن نام مشاور -->
          <td>
            @if(!$consultation->reservation)
            <form action="{{ route('reservations.store') }}" method="POST">
              @csrf
              <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
              <button type="submit" class="btn btn-primary btn-sm">رزرو</button>
            </form>
            @else
            <span class="badge badge-secondary">رزرو شده</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection