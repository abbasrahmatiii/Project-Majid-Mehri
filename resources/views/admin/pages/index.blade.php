@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>لیست صفحات</h3>
      <a href="{{ route('pages.create') }}" class="btn btn-success">ایجاد صفحه</a>
    </div>
    <div class="card-body">
      @if($pages->count() > 0)
      <table class="table">
        <thead>
          <tr>
            <th>عنوان</th>
            <th>اسلاگ</th>
            <th>وضعیت</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pages as $page)
          <tr>
            <td>{{ Str::limit($page->title, 100) }}</td>
            <td>{{ $page->slug }}</td>
            <td>{{ $page->published ? 'منتشر شده' : 'پیش‌نویس' }}</td>
            <td>
              <a href="{{ route('pages.show', $page->slug) }}" class="text-info mr-2" data-toggle="tooltip" title="نمایش"><i class="fas fa-eye"></i></a>
              <a href="{{ route('pages.edit', $page->id) }}" class="text-primary mr-2" data-toggle="tooltip" title="ویرایش"><i class="fas fa-edit"></i></a>
              <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="{{ $page->id }}" class="text-danger mr-2" data-toggle="tooltip" title="حذف"><i class="fas fa-trash"></i></a>
              <a href="#" class="text-success" onclick="copyToClipboard('{{ url('/pages/'.$page->slug) }}')" data-toggle="tooltip" title="کپی آدرس"><i class="fas fa-copy"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $pages->links() }}
      @else
      <div class="alert alert-info text-center">
        هیچ صفحه‌ای وجود ندارد.
      </div>
      @endif
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">تایید حذف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        آیا مطمئن هستید که می‌خواهید این صفحه را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        <form id="deleteForm" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">حذف</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Include jQuery, Font Awesome, Bootstrap JS, and SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/9hb7ie6O+tx6r4+6tX0OmD2Mx3O7u5lb7Kdo1G" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha384-OM6E4KPHYOcPiHzRuxw4AK5yZkBBKnGm4m5V2eZcK8qxDoK9FIzU6FVf0Q43tno7" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-oWxVOcWw4xhpvhI8xrPvIGCwLfQKs76mO5k3/6pzzk5B6th6l6pp1n8QDw8Mbs4Q" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#deleteModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var pageId = button.data('id');
      var action = "{{ url('admin/pages') }}/" + pageId;
      var modal = $(this);
      modal.find('#deleteForm').attr('action', action);
    });

    $('#deleteForm').on('submit', function() {
      $('#deleteModal').modal('hide');
    });
  });

  function copyToClipboard(text) {
    var tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    Swal.fire({
      icon: 'success',
      title: 'کپی شد!',
      text: 'آدرس صفحه با موفقیت کپی شد!',
      showConfirmButton: false,
      timer: 1500
    });
  }
</script>
@endsection