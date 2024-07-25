@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش مشاوره</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.consultations.update', $consultation->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="consultant">انتخاب مشاور</label>
          <select name="consultant_id" id="consultant" class="form-control" required>
            <option value="">انتخاب مشاور</option>
            @foreach($consultants as $consultant)
            <option value="{{ $consultant->id }}" {{ $consultant->id == $consultation->consultant_id ? 'selected' : '' }}>
              {{ $consultant->first_name }} {{ $consultant->last_name }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="date">انتخاب تاریخ</label>
          <input type="text" name="date" id="date" class="form-control" value="{{ \Verta::instance($consultation->date)->format('Y/m/d') }}" required>
        </div>
        <div class="form-group">
          <label for="time_slot">انتخاب بازه زمانی</label>
          <select name="time_slot_id" id="time_slot" class="form-control" required>
            <option value="">انتخاب بازه زمانی</option>
            @foreach($timeSlots as $timeSlot)
            <option value="{{ $timeSlot->id }}" {{ $timeSlot->id == $consultation->time_slot_id ? 'selected' : '' }}>
              {{ $timeSlot->start_time }} - {{ $timeSlot->end_time }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="price">قیمت</label>
          <input type="number" name="price" id="price" class="form-control" value="{{ $consultation->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#date').persianDatepicker({
      format: 'YYYY/MM/DD',
      initialValue: false
    }).val('{{ \Verta::instance($consultation->date)->format('
      Y / m / d ') }}');
  });
</script>
@endsection