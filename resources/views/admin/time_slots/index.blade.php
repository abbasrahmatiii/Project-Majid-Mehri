@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">مدیریت بازه‌های زمانی</h3>
      <a href="{{ route('admin.time_slots.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> افزودن بازه زمانی جدید
      </a>
    </div>
    <div class="card-body">


      @if($timeSlots->isEmpty())
      <div class="alert alert-warning">هیچ بازه زمانی وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead class="bg-dark text-white">
            <tr>
              <th>زمان شروع</th>
              <th>زمان پایان</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($timeSlots as $timeSlot)
            <tr>
              <td>{{ $timeSlot->start_time }}</td>
              <td>{{ $timeSlot->end_time }}</td>
              <td class="text-center">
                <a href="{{ route('admin.time_slots.edit', $timeSlot->id) }}" class="text-info mx-1 action-icon">
                  <i class="fas fa-edit"></i>
                </a>
                <!-- فرم حذف -->
                <form action="{{ route('admin.time_slots.destroy', $timeSlot->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-link text-danger p-0 mx-1 action-icon" data-toggle="modal" data-target="#deleteModal{{ $timeSlot->id }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                  <!-- مودال تایید حذف -->
                  <div class="modal fade" id="deleteModal{{ $timeSlot->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $timeSlot->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel{{ $timeSlot->id }}">تایید حذف</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          آیا مطمئن هستید که می‌خواهید این بازه زمانی را حذف کنید؟
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                          <button type="submit" class="btn btn-danger">حذف</button>
                        </div>
                      </div>
                    </div>
                  </div>
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

<style>
  .table td,
  .table th {
    padding: 0.5rem;
    /* کاهش فاصله داخلی سلول‌ها */
    font-size: 0.875rem;
    /* کاهش اندازه فونت */
  }

  .action-icon:hover i {
    color: #0056b3;
    /* تغییر رنگ به آبی تیره هنگام حرکت موس */
  }

  .action-icon.text-danger:hover i {
    color: #dc3545;
    /* تغییر رنگ به قرمز هنگام حرکت موس */
  }

  .bg-dark {
    background-color: #343a40 !important;
    /* تغییر رنگ هدر جدول به تیره‌تر */
  }
</style>
@endsection