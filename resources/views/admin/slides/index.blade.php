@extends('admin.layouts.master')

@section('content')
<!-- <div class="mx-4 mt-4">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
</div> -->
<div class="card card-custom gutter-b mt-0 mx-4">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        لیست اسلایدها
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ route('admin.slide.create') }}" class="btn btn-primary">ایجاد اسلاید جدید</a>
    </div>
  </div>
  <div class="card-body">
    @if($slides->isEmpty())
    <div class="alert alert-warning">هیچ اسلایدی وجود ندارد.</div>
    @else
    <!--begin: جدول داده ها-->
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>عنوان</th>
            <th>تصویر</th>
            <th>توضیحات</th>
            <th>متن دکمه</th>
            <th>آدرس URL دکمه</th>
            <th>وضعیت</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($slides as $slide)
          <tr>
            <td>{{ $slide->title }}</td>
            <td><img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}" width="100"></td>
            <td>{{ $slide->description }}</td>
            <td>{{ $slide->button_text }}</td>
            <td>{{ $slide->button_url }}</td>
            <td>
              @if($slide->is_active)
              <span class="badge badge-success">فعال</span>
              @else
              <span class="badge badge-danger">غیرفعال</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="ویرایش">
                <span class="svg-icon svg-icon-md">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                      <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                    </g>
                  </svg>
                </span>
              </a>
              <button type="button" class="btn btn-sm btn-clean btn-icon" title="حذف" data-toggle="modal" data-target="#deleteModal" data-slide-id="{{ $slide->id }}">
                <span class="svg-icon svg-icon-md">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                      <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                  </svg>
                </span>
              </button>
              <form action="{{ route('admin.slide.toggleActive', $slide->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="تغییر وضعیت">
                  @if($slide->is_active)
                  <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M5,12 L19,12 L19,14 L5,14 L5,12 Z" fill="#000000" />
                      </g>
                    </svg>
                  </span>
                  @else
                  <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M11,5 L13,5 L13,19 L11,19 L11,5 Z" fill="#000000" />
                      </g>
                    </svg>
                  </span>
                  @endif
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- اضافه کردن پیجینیشن -->
    <div class="d-flex justify-content-center">
      {{ $slides->links('pagination::bootstrap-4') }}
    </div>
    @endif
    <!--end: جدول داده ها-->
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">تأیید حذف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        آیا مطمئن هستید که می‌خواهید این اسلاید را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        @if(isset($slide))
        <form id="deleteForm" action="{{ route('admin.slide.destroy', $slide->id) }}" method="POST" style="display:inline;">
          @else
          <form id="deleteForm" method="POST" style="display:inline;">
            @endif
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">حذف</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var slideId = button.data('slide-id')
    var modal = $(this)
    var form = modal.find('#deleteForm')
    form.attr('action', '/admin/slide/' + slideId)
  })
</script>


@endsection