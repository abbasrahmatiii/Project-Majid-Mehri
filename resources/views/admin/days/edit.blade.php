@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش روز</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.days.update', $day->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">نام روز</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ $day->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
      </form>
    </div>
  </div>
</div>
@endsection

<!-- @section('js')
@include('admin.layouts.notifications')
@endsection -->