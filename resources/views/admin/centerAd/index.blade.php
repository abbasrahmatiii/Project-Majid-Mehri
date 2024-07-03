<!-- resources/views/admin/centerad/index.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="mx-4 mt-4">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
</div>
<div class="card card-custom gutter-b mt-0 mx-4">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        لیست تبلیغات میانی
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ route('admin.centerads.create') }}" class="btn btn-primary">ایجاد تبلیغ جدید</a>
    </div>
  </div>
  <div class="card-body">
    @if($centerAds->isEmpty())
    <div class="alert alert-warning">هیچ تبلیغی وجود ندارد.</div>
    @else
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>عنوان</th>
            <th>تصویر</th>
            <th>توضیحات</th>
            <th>وضعیت</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($centerAds as $ad)
          <tr>
            <td>{{ $ad->title }}</td>
            <td><img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->title }}" style="width: 50px; height: auto;"></td>
            <td>{{ $ad->description }}</td>
            <td>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input toggle-active" id="toggle-{{ $ad->id }}" data-id="{{ $ad->id }}" {{ $ad->is_active ? 'checked' : '' }}>
                <label class="custom-control-label" for="toggle-{{ $ad->id }}"></label>
              </div>
            </td>
            <td>
              <a href="{{ route('admin.centerads.edit', $ad->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="ویرایش">
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
              <button type="button" class="btn btn-sm btn-clean btn-icon" title="حذف" data-toggle="modal" data-target="#deleteModal" data-ad-id="{{ $ad->id }}">
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
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
      {{ $centerAds->links('pagination::bootstrap-4') }}
    </div>
    @endif
  </div>
</div>

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
        آیا مطمئن هستید که می‌خواهید این تبلیغ را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        <form id="deleteForm" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">حذف</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var adId = button.data('ad-id')
    var modal = $(this)
    var form = modal.find('#deleteForm')
    form.attr('action', '/admin/centerads/delete/' + adId)
  })

  $('.toggle-active').change(function() {
    var adId = $(this).data('id');
    var isActive = $(this).is(':checked') ? 1 : 0;
    $.ajax({
      url: '/admin/centerads/toggleActive/' + adId,
      method: 'PATCH',
      data: {
        _token: '{{ csrf_token() }}',
        is_active: isActive
      },
      success: function(response) {
        location.reload();
      },
      error: function(response) {
        alert('خطایی رخ داده است، لطفاً دوباره امتحان کنید.');
      }
    });
  });
</script>
@endsection