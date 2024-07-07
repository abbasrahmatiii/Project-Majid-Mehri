@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>مدیریت روزهای مشاوره</h3>
      <a href="{{ route('admin.days.create') }}" class="btn btn-primary float-right">افزودن روز جدید</a>
    </div>
    <div class="card-body">
      @if($days->isEmpty())
      <div class="alert alert-warning">هیچ روزی وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>نام روز</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($days as $day)
            <tr>
              <td>{{ $day->name }}</td>
              <td>
                <a href="{{ route('admin.days.edit', $day->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                <form action="{{ route('admin.days.destroy', $day->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                </form>
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
@endsection