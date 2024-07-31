@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">لیست وقت‌های رزرو شده</h3>
    </div>
    <div class="card-body">
      @if($reservations->isEmpty())
      <div class="alert alert-warning">هیچ رزروی وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead class="bg-dark text-white">
            <tr>
              <th>تاریخ</th>
              <th>ساعت شروع</th>
              <th>ساعت پایان</th>
              <th>مشاور</th>
              <th>کاربر</th>
              <th>پرداخت شده</th>
              <th>مبلغ</th>
              <th>نوع مشاوره</th>
              <th>لینک جلسه</th>
              <th>وضعیت</th>
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
              <td>{{ $start_time }}</td>
              <td>{{ $end_time }}</td>
              <td>{{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</td>
              <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
              <td>{{ $reservation->is_paid ? 'بله' : 'خیر' }}</td>
              <td>{{ number_format($reservation->consultation->price) }} ریال</td>
              <td>{{ $reservation->type ? 'حضوری' : 'غیر حضوری' }}</td>
              <td>
                @if($reservation->type == 0)
                <a href="#" data-toggle="modal" data-target="#linkModal{{ $reservation->id }}">
                  {{ $reservation->session_link ? 'ویرایش' : 'افزودن' }}
                </a>
                @endif
              </td>
              <td class="text-center">
                @if($reservation->status == 1)
                برگزار شده
                @else
                <a href="{{ route('admin.reservations.setStatus', $reservation->id) }}">برگزار نشد ؟</a>
                @endif
              </td>
              <td class="text-center">
                @if($reservation->status == 1)
                <button type="button" class="btn btn-link text-primary p-0 mx-1 action-icon" data-toggle="modal" data-target="#sessionModal{{ $reservation->id }}">
                  <i class="fas fa-pen"></i>
                </button>
                @endif
                <button type="button" class="btn btn-link text-danger p-0 mx-1 action-icon" data-toggle="modal" data-target="#deleteModal{{ $reservation->id }}">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @foreach($reservations as $reservation)
      <!-- Modal -->
      @if($reservation->status == 1)
      <div class="modal fade" id="sessionModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="sessionModalLabel{{ $reservation->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="sessionModalLabel{{ $reservation->id }}">جزئیات جلسه</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 text-center">
                  <img src="{{$reservation->user->profile->profile_picture ? '/storage/' . $reservation->user->profile->profile_picture : '/storage/profile_pictures/user.png'  }}" alt="عکس کاربر" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                  <h6 class="mt-2">{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</h6>
                </div>
                <div class="col-md-6 text-center">
                  <img src="/storage/{{ $reservation->consultation->consultant->profile->profile_picture }}" alt="عکس مشاور" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                  <h6 class="mt-2">{{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</h6>
                </div>
              </div>
              <hr>
              @php
              $date = \Verta::instance($reservation->consultation->date);
              @endphp
              <div>تاریخ: {{ $date->format('%d %B %Y') }} ({{ $date->formatWord('l') }})</div>
              <div>ساعت شروع: {{ $reservation->consultation->timeSlot->start_time }}</div>
              <div>ساعت پایان: {{ $reservation->consultation->timeSlot->end_time }}</div>
              <textarea id="summary{{ $reservation->id }}" name="summary" class="form-control mt-3" rows="5"></textarea>
              <a href="{{ route('admin.reservations.setStatus', $reservation->id) }}" class="btn btn-warning mt-3">تغییر وضعیت به برگزار نشده</a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
              <button type="button" class="btn btn-primary" onclick="saveSummary({{ $reservation->id }})">ذخیره خلاصه</button>
            </div>
          </div>
        </div>
      </div>
      @endif
      <!-- Link Modal -->
      <div class="modal fade" id="linkModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel{{ $reservation->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="linkModalLabel{{ $reservation->id }}">افزودن/ویرایش لینک جلسه</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.reservations.updateSessionLink', $reservation->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="session_link">لینک جلسه:</label>
                  <input type="text" name="session_link" id="session_link" class="form-control" value="{{ old('session_link', $reservation->session_link) }}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                  <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

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
      @endforeach
      <div class="d-flex justify-content-center">
        {{ $reservations->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </div>
</div>

<script>
  function saveSummary(id) {
    var summary = document.getElementById('summary' + id).value;

    $.ajax({
      type: 'POST',
      url: '/reservations/update-status/' + id,
      data: {
        _token: '{{ csrf_token() }}',
        status: 0,
        summary: summary,
      },
      success: function(response) {
        if (response.success) {
          alert('خلاصه با موفقیت ذخیره شد.');
        }
      },
    });
  }
</script>

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

  /* استایل برای اینپوت متن در مودال */
  .modal-body input[type="text"] {
    text-align: left;
    direction: ltr;
  }

  .modal-body {
    font-family: inherit;
  }

  .session_link {
    direction: ltr;
    text-align: left;
  }
</style>
@endsection

@section('js')
@include('admin.layouts.notifications')
@endsection