@extends('admin.layouts.master')
@section('content')
<div class=" container ">
  <div class="row">
    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
      <!--begin::لیست Widget 1-->
      <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">جلسات مشاوره</span>
          </h3>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body pt-8">
          <!--begin::Item-->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">نام کاربر</th>
                <th scope="col">نوع جلسه</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reservations as $reservation)
              <tr>
                <td>
                  <a href="#" class="text-dark text-hover-primary" data-toggle="modal" data-target="#reservationModal{{ $reservation->id }}">
                    {{ $reservation->user->first_name }} {{ $reservation->user->last_name }}
                  </a>
                </td>
                <td>{{ $reservation->type ? 'حضوری' : 'غیر حضوری' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

          @foreach($reservations as $reservation)
          <div class="modal fade" id="reservationModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel{{ $reservation->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reservationModalLabel{{ $reservation->id }}">جزئیات جلسه</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="d-flex align-items-center mb-3">
                    <!--begin::عکس کاربر-->
                    <div class="symbol symbol-60 mr-3">
                      <img src="/storage/{{ $reservation->user->profile->profile_picture ?? 'path/to/default/profile_picture.jpg' }}" alt="User Avatar" class="symbol-label rounded-circle" />
                    </div>
                    <!--end::عکس کاربر-->
                    <div class="d-flex flex-column font-weight-bold">
                      <h6 class="text-dark mb-1">{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</h6>
                      <div class="text-muted">نوع جلسه: <span class="badge badge-pill badge-info">{{ $reservation->type ? 'حضوری' : 'غیر حضوری' }}</span></div>
                      <div class="text-muted">تاریخ: {{ \Verta::instance($reservation->date)->format('Y/m/d') }}</div>
                      <div class="text-muted">مشاور: {{ $reservation->consultation->consultant->first_name }} {{ $reservation->consultation->consultant->last_name }}</div>
                      <div class="text-muted">قیمت: {{ number_format($reservation->consultation->price) }} ریال</div>
                      @php
                      $start_time = $reservation->consultation->timeSlot->start_time;
                      $end_time = $reservation->consultation->timeSlot->end_time;
                      @endphp
                      <div class="text-muted">زمان: {{ $start_time }} {{ (int)explode(':', $start_time)[0] < 12 ? 'صبح' : 'عصر' }}
                        الی {{ $end_time }} {{ (int)explode(':', $end_time)[0] < 12 ? 'صبح' : 'عصر' }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <!--end::Body-->
      </div>
      <!--end::لیست Widget 1-->
    </div>



    <div class="col-xxl-8 order-2 order-xxl-1">
      <div class="card card-custom card-stretch gutter-b">
        <div class="card-header border-0 pt-5 text-center">
          <h3 class="card-title align-items-center flex-column">
            <span class="card-label font-weight-bolder text-dark">جدیدترین کاربران سایت</span>
          </h3>
        </div>
        <div class="card-body pt-3 pb-0">
          <div class="table-responsive custom-scroll">
            <table class="table table-borderless table-vertical-center">
              <thead class="text-center">
                <tr>
                  <th class="p-0" style="width: 50px">#</th>
                  <th class="p-0" style="min-width: 200px">نام</th>
                  <th class="p-0" style="min-width: 100px">ایمیل</th>
                  <th class="p-0" style="min-width: 100px">موبایل</th>
                  <th class="p-0" style="min-width: 125px">نقش</th>
                  <th class="p-0" style="min-width: 125px">عملیات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td class="pl-0 py-4 text-center">{{ $loop->iteration }}</td>
                  <td class="pl-0">
                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-sm">{{ $user->first_name }} {{ $user->last_name }}</a>
                  </td>
                  <td class="text-right font-size-sm">{{ $user->email }}</td>
                  <td class="text-right font-size-sm">{{ $user->mobile }}</td>
                  <td class="text-right">
                    @foreach($user->roles as $role)
                    <span class="label label-lg label-light-primary label-inline font-size-sm">{{ $role->name }}</span>
                    @endforeach
                  </td>
                  <td class="text-right pr-0">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                      <span class="svg-icon svg-icon-md svg-icon-primary">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/عمومی/تنظیمات-1.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                          </g>
                        </svg>
                        <!--end::Svg Icon-->
                      </span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $users->links() }} <!-- Pagination Links -->
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<style>
  .custom-scroll {
    max-height: 400px;
    overflow-y: auto;
  }

  .custom-scroll::-webkit-scrollbar {
    width: 8px;
  }

  .custom-scroll::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  .custom-scroll::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
  }

  .custom-scroll::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .table td,
  .table th,
  .table a {
    font-size: 0.85rem;
  }

  .table-hover tbody tr:hover {
    background-color: #f1f1f1;
  }

  .modal-header {
    background-color: #f7f7f7;
    border-bottom: 1px solid #e2e2e2;
    text-align: center;
  }

  .modal-footer {
    background-color: #f7f7f7;
    border-top: 1px solid #e2e2e2;
  }

  .symbol-label {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
  }

  .badge-info {
    background-color: #17a2b8;
    color: #fff;
    padding: 0.5em 0.75em;
    font-size: 0.75rem;
  }
</style>

@endsection