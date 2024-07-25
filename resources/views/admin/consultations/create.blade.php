@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>افزودن زمان مشاوره</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.consultations.store') }}" method="POST" id="consultationForm">
        @csrf
        <div class="form-group">
          <label for="consultant_id">مشاور</label>
          <select name="consultant_id" id="consultant_id" class="form-control">
            <option value="">مشاور را انتخاب کنید</option>
            @foreach($consultants as $consultant)
            <option value="{{ $consultant->id }}">{{ $consultant->first_name }} {{ $consultant->last_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="date">تاریخ</label>
          <input type="text" name="date" id="date" class="form-control" placeholder="تاریخ مشاوره را انتخاب کنید">
        </div>
        <div class="form-group">
          <label for="time_slot_id">بازه زمانی</label>
          <select name="time_slot_id" id="time_slot_id" class="form-control">
            <option value="">بازه زمانی را انتخاب کنید</option>
            @foreach($timeSlots as $timeSlot)
            <option value="{{ $timeSlot->id }}">{{ $timeSlot->start_time }} - {{ $timeSlot->end_time }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="price">قیمت</label>
          <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $consultation->price ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره</button>
      </form>
    </div>
  </div>
</div>

<!-- Include Verta.js and jQuery -->
<script src="{{ asset('path/to/jquery.min.js') }}"></script>
<script src="{{ asset('path/to/persian-date.min.js') }}"></script>
<script src="{{ asset('path/to/persian-datepicker.min.js') }}"></script>
<script src="{{ asset('path/to/verta.js') }}"></script>

<script>
  $(document).ready(function() {
    $("#date").persianDatepicker({
      format: 'YYYY/MM/DD',
      altField: '#altDate',
      observer: true,
      initialValue: false,
      onSelect: function(unix) {
        // Get the selected date and convert to Verta instance
        var selectedDate = new persianDate(unix).toLocale('en').format('YYYY/MM/DD');
        var vertaDate = Verta.parse(selectedDate);

        // Get the day name from the selected date
        var selectedDayName = vertaDate.format('dddd');

        // Compare with the selected day from the dropdown
        var selectedDayOption = $('#day_id option:selected');
        var selectedDayNameFromDropdown = selectedDayOption.data('day-name');

        if (selectedDayName !== selectedDayNameFromDropdown) {
          alert('روز انتخاب شده با تاریخ مطابقت ندارد. لطفا یک تاریخ صحیح انتخاب کنید.');
          $('#date').val(''); // Clear the date field
        }
      }
    });

    $('#consultationForm').on('submit', function(e) {
      // Custom validation can be added here if needed
    });
  });
</script>
@endsection