@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>مدیریت بازه‌های زمانی</h3>
      <a href="{{ route('admin.time_slots.create') }}" class="btn btn-primary float-right">افزودن بازه زمانی جدید</a>
    </div>
    <div class="card-body">
      @if($timeSlots->isEmpty())
      <div class="alert alert-warning">هیچ بازه زمانی وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>زمان شروع</th>
              <th>زمان پایان</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($timeSlots as $timeSlot)
            <tr>
              <td>{{ $timeSlot->start_time }}</td>
              <td>{{ $timeSlot->end_time }}</td>
              <td>
                <a href="{{ route('admin.time_slots.edit', $timeSlot->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                <form action="{{ route('admin.time_slots.destroy', $timeSlot->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection