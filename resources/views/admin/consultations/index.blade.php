@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">لیست زمان‌های مشاوره</h3>
      <a href="{{ route('admin.consultations.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> افزودن زمان مشاوره
      </a>
    </div>
    <div class="card-body">


      @if($consultations->isEmpty())
      <div class="alert alert-warning">هیچ زمان مشاوره‌ای وجود ندارد.</div>
      @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead class="bg-dark text-white">
            <tr>
              <th>مشاور</th>
              <th>تاریخ</th>
              <th>بازه زمانی</th>
              <th>قیمت</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($consultations as $consultation)
            <tr>
              <td>{{ $consultation->consultant->first_name }} {{ $consultation->consultant->last_name }}</td>
              <td>{{ \Hekmatinasser\Verta\Verta::instance($consultation->date)->format('Y/m/d') }}</td>
              <td>{{ $consultation->timeSlot->start_time }} الی {{ $consultation->timeSlot->end_time }}</td>
              <td>{{ number_format($consultation->price) }} ریال</td>
              <td class="text-center">
                <a href="{{ route('admin.consultations.edit', $consultation->id) }}" class="text-warning mx-1 action-icon">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-link text-danger p-0 mx-1 action-icon" data-toggle="modal" data-target="#deleteModal{{ $consultation->id }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                  <!-- مودال تایید حذف -->
                  <div class="modal fade" id="deleteModal{{ $consultation->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $consultation->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel{{ $consultation->id }}">تایید حذف</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          آیا مطمئن هستید که می‌خواهید این زمان مشاوره را حذف کنید؟
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
      <div class="d-flex justify-content-center">
        {{ $consultations->links('pagination::bootstrap-4') }}
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