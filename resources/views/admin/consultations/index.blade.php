@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>زمان‌های مشاوره من</h3>
      <a href="{{ route('consultations.create') }}" class="btn btn-primary float-right">افزودن زمان مشاوره</a>
    </div>
    <div class="card-body">
      @if($consultations->isEmpty())
      <div class="alert alert-warning">هیچ زمان مشاوره‌ای وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>روز</th>
              <th>زمان</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($consultations as $consultation)
            <tr>
              <td>{{ $consultation->day->name }}</td>
              <td>{{ $consultation->timeSlot->start_time }} - {{ $consultation->timeSlot->end_time }}</td>
              <td>
                <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
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