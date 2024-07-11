@extends('layouts.master')

@section('content')
<div class="container mt-4">
  <h3>جلسات مشاور رزرو شده</h3>
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if($reservations->isEmpty())
  <div class="alert alert-warning">شما هیچ رزرو مشاوره‌ای ندارید. برای رزرو مشاوره، <a href="{{ route('reservations.index') }}">اینجا کلیک کنید</a>.</div>
  @else
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
        @foreach($reservations as $reservation)
        <tr>
          <td>{{ $reservation->consultation->day->name }}</td>
          <td>{{ $reservation->consultation->timeSlot->start_time }}</td>
          <td>{{ $reservation->consultation->timeSlot->end_time }}</td>
          <td>{{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</td>
          <td>
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancelModal" data-id="{{ $reservation->id }}">لغو</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>

<!-- Cancel Confirmation Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cancelModalLabel">تأیید لغو</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        آیا مطمئن هستید که می‌خواهید این رزرو را لغو کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        <form id="cancelForm" action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">تایید</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#cancelModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var action = "{{ url('reservations') }}/" + id
    var modal = $(this)
    modal.find('#cancelForm').attr('action', action)
  })
</script>
@endsection