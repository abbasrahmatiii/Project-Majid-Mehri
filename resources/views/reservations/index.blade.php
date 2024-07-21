@extends('layouts.master')
@section('content')
<div role="main" class="main">

  <div class="container py-2">

    <div class="row">
      @include('user.aside_profile')
      <div class="col-lg-9">

        <div class="container mt-4">
          <h3>درخواست مشاوره {{ $type ? 'حضوری' : 'غیر حضوری' }} </h3>
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>تاریخ</th>
                  <th>روز</th>
                  <th>ساعت شروع</th>
                  <th>ساعت پایان</th>
                  <th>مشاور</th>
                  <th>عملیات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($consultations as $consultation)
                @php
                $vertaDate = \Verta::instance($consultation->date);
                $start_time = $consultation->timeSlot->start_time;
                $end_time = $consultation->timeSlot->end_time;
                @endphp
                <tr>
                  <td>{{ $vertaDate->format('Y/m/d') }}</td> <!-- نمایش تاریخ به فرمت شمسی -->
                  <td>{{ $vertaDate->formatWord('l') }}</td> <!-- نمایش روز معادل تاریخ -->
                  <td>{{ $start_time }} {{ (int)explode(':', $start_time)[0] < 12 ? 'صبح' : 'عصر' }}</td>
                  <td>{{ $end_time }} {{ (int)explode(':', $end_time)[0] < 12 ? 'صبح' : 'عصر' }}</td>
                  <td>{{ $consultation->consultant->first_name }} {{ $consultation->consultant->last_name }}</td>
                  <td>
                    @if(!$consultation->reservation)
                    <form action="{{ route('reservations.store') }}" method="POST">
                      @csrf
                      <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
                      <input type="hidden" name="type" value="{{ $type }}"> <!-- فیلد پنهان برای ارسال نوع -->

                      <button type="submit" class="btn btn-primary btn-sm">رزرو</button>
                    </form>
                    @else
                    <span class="badge badge-secondary">رزرو شده</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>
@endsection