@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>لیست وقت‌های رزرو شده</h3>
    </div>
    <div class="card-body">


      <div class="table-responsive">
        @if($reservations->isEmpty())
        <div class="alert alert-warning">هیچ رزروی وجود ندارد.</div>
        @else
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>ساعت شروع</th>
              <th>ساعت پایان</th>
              <th>مشاور</th>
              <th>کاربر</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reservations as $reservation)
            @php
            $vertaDate = \Verta::instance($reservation->consultation->date);
            $start_time = $reservation->consultation->timeSlot->start_time;
            $end_time = $reservation->consultation->timeSlot->end_time;
            @endphp
            <tr>
              <td>{{ $vertaDate->format('Y/m/d') }}</td>
              <td>{{ $start_time }} {{ (int)explode(':', $start_time)[0] < 12 ? 'صبح' : 'عصر' }}</td>
              <td>{{ $end_time }} {{ (int)explode(':', $end_time)[0] < 12 ? 'صبح' : 'عصر' }}</td>
              <td>{{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</td>
              <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $reservation->id }}">حذف</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">تأیید حذف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        آیا مطمئن هستید که می‌خواهید این وقت رزرو را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        @if(isset($reservation))
        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" id="deleteForm" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">حذف</button>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@if(isset($reservation))
<script>
  $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var action = "{{ route('admin.reservations.destroy', ':id') }}".replace(':id', id);
    var modal = $(this)
    modal.find('#deleteForm').attr('action', action)
  })
</script>
@endif
@endsection