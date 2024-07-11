<!-- resources/views/admin/reservations/index.blade.php -->

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

        <form action="" id="deleteForm" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">حذف</button>
        </form>
      </div>
    </div>
  </div>
</div>
@if(isset($reservation))<script>
  $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var action = "{{ route('admin.reservations.destroy', $reservation->id) }}"
    var modal = $(this)
    modal.find('#deleteForm').attr('action', action)
  })
</script>
@endif
@endsection