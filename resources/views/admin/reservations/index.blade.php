<!-- resources/views/admin/reservations/index.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>لیست وقت‌های رزرو شده</h3>
    </div>
    <div class="card-body">
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
              <th>کاربر</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reservations as $reservation)
            <tr>
              <td>{{ $reservation->consultation->day->name }}</td>
              <td>{{ $reservation->consultation->timeSlot->start_time }}</td>
              <td>{{ $reservation->consultation->timeSlot->end_time }}</td>
              <td>{{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</td>
              <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
              <td>
                <a href="" class="btn btn-sm btn-primary">ویرایش</a>
                <form action="" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این وقت رزرو را حذف کنید؟')">حذف</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection