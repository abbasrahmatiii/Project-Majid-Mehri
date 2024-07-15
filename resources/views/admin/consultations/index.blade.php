@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>لیست زمان‌های مشاوره</h3>
      <a href="{{ route('admin.consultations.create') }}" class="btn btn-primary float-right">افزودن زمان مشاوره</a>
    </div>
    <div class="card-body">
      @if($consultations->isEmpty())
      <div class="alert alert-warning">هیچ زمان مشاوره‌ای وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>مشاور</th>
              <!-- <th>روز</th> -->
              <th>تاریخ</th>
              <th>بازه زمانی</th>
              <th>قیمت</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($consultations as $consultation)
            <tr>
              <td>{{ $consultation->consultant->first_name }} {{ $consultation->consultant->last_name }}</td>

              <td>{{ \Hekmatinasser\Verta\Verta::instance($consultation->date)->format('Y/m/d') }}</td>
              <td>{{ $consultation->timeSlot->start_time }} الی {{ $consultation->timeSlot->end_time }}</td>
              <td>{{ number_format($consultation->price) }} ریال</td>

              <td>
                <a href="{{ route('admin.consultations.edit', $consultation->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                <form action="{{ route('admin.consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این زمان مشاوره را حذف کنید؟')">حذف</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        {{ $consultations->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection