@extends('layouts.master')

@section('content')
<div role="main" class="main">

  <div class="container py-2">

    <div class="row">
      @include('user.aside_profile')
      <div class="col-lg-9">

        <div class="container mt-4">
          <h3>جلسات مشاوره رزرو شده :</h3>
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
          @endif

          @if($reservations->isEmpty())
          <div class="alert alert-warning">شما هیچ رزرو مشاوره‌ای ندارید. برای رزرو مشاوره، <a href="{{ route('reservations.index') }}">اینجا کلیک کنید</a>.</div>
          @else
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>تاریخ</th>
                  <th>روز</th>
                  <th>ساعت شروع</th>
                  <th>ساعت پایان</th>
                  <th>مشاور</th>
                  <th>قیمت</th>
                  <th>نوع مشاوره</th>
                  <th>عملیات</th>
                  <th>لینک</th>
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
                  <td>{{ $vertaDate->format('Y/m/d') }}</td> <!-- نمایش تاریخ به فرمت شمسی -->
                  <td>{{ $vertaDate->formatWord('l') }}</td> <!-- نمایش روز معادل تاریخ -->
                  <td>{{ $start_time }} {{ (int)explode(':', $start_time)[0] < 12 ? 'صبح' : 'عصر' }}</td>
                  <td>{{ $end_time }} {{ (int)explode(':', $end_time)[0] < 12 ? 'صبح' : 'عصر' }}</td>
                  <td>{{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</td>
                  <td>{{ number_format($reservation->consultation->price) }} ریال</td>
                  <td>{{ $reservation->type ? 'حضوری' : 'غیر حضوری' }}</td>
                  <td>
                    @if(!$reservation->is_paid)
                    <a href="{{ route('reservations.pay', $reservation->id) }}" class="btn btn-primary btn-sm">پرداخت</a>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancelModal" data-id="{{ $reservation->id }}">لغو</button>
                    @else
                    <span class="badge badge-success">نهایی شده</span>
                    @endif
                  </td>
                  <td>
                    @if($reservation->session_link)
                    <a href="{{ $reservation->session_link }}" target="_blank" class="session-link">ورود</a>
                    @endif
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
  </div>
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
        <form id="cancelForm" action="{{ route('reservations.cancel', $reservation->id ?? '') }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">تایید</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if($reservations->isNotEmpty())
<script>
  $('#cancelModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var action = "{{ url('reservations') }}/" + id
    var modal = $(this)
    modal.find('#cancelForm').attr('action', action)
  })
</script>
@endif

<style>
  .table {
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0 10px;
  }

  .table th, .table td {
    vertical-align: middle;
    text-align: center;
  }

  .table thead th {
    background-color: #343a40;
    color: white;
  }

  .table tbody tr {
    background-color: #ffffff;
    transition: background-color 0.3s ease;
  }

  .table tbody tr:hover {
    background-color: #f2f2f2;
  }

  .session-link {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 2px 6px;
    font-size: 0.75rem;
    border-radius: 4px;
    text-decoration: none;
  }

  .session-link:hover {
    background-color: #0056b3;
    color: #fff;
    text-decoration: none;
  }
</style>
@endsection
