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
<<<<<<< HEAD
=======
              <th>پرداخت شده</th>
              <th>مبلغ</th>
              <th>نوع مشاوره</th>
>>>>>>> d088776b (add session link)
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
<<<<<<< HEAD
              <td>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $reservation->id }}">حذف</button>
=======
              <td>{{ $reservation->is_paid ? 'بله' : 'خیر' }}</td>
              <td>{{ number_format($reservation->consultation->price) }} ریال</td>
              <td>{{ $reservation->type ? 'حضوری' : 'غیر حضوری' }}</td>
              <td class="text-center">
                <button type="button" class="btn btn-link text-danger p-0 mx-1 action-icon" data-toggle="modal" data-target="#deleteModal{{ $reservation->id }}">
                  <i class="fas fa-trash-alt"></i>
                </button>
                
                <div class="modal fade" id="deleteModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $reservation->id }}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $reservation->id }}">تایید حذف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        آیا مطمئن هستید که می‌خواهید این وقت رزرو را حذف کنید؟
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                @if($reservation->type == 0 && $reservation->is_paid == 1)
                <button type="button" class="btn btn-link text-primary p-0 mx-1 action-icon" data-toggle="modal" data-target="#sessionLinkModal{{ $reservation->id }}">
                  <i class="fas fa-link"></i>
                </button>
                
                <div class="modal fade" id="sessionLinkModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="sessionLinkModalLabel{{ $reservation->id }}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="sessionLinkModalLabel{{ $reservation->id }}">بروزرسانی لینک جلسه</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('admin.reservations.updateSessionLink', $reservation->id) }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="session_link{{ $reservation->id }}">لینک جلسه</label>
                            <input style="direction: ltr; text-align: left;" type="url" class="form-control" id="session_link{{ $reservation->id }}" name="session_link" value="{{ $reservation->session_link ?? '' }}">
                          </div>
                          <button type="submit" class="btn btn-primary">ذخیره</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
>>>>>>> d088776b (add session link)
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

<<<<<<< HEAD
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
=======
<style>
  .table td,
  .table th {
    padding: 0.5rem;
    font-size: 0.875rem;
  }

  .action-icon:hover i {
    color: #0056b3;
  }

  .action-icon.text-danger:hover i {
    color: #dc3545;
  }

  .bg-dark {
    background-color: #343a40 !important;
  }
</style>
@endsection
@section('js')
@include('admin.layouts.notifications')
>>>>>>> d088776b (add session link)
@endsection