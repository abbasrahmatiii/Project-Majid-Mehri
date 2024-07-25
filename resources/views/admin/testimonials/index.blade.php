@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>نظرات کاربران</h3>
      <a href="{{ route('testimonials.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> ایجاد نظر جدید</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>عکس</th>
            <th>نام کاربر</th>
            <th>تاریخ</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($testimonials as $testimonial)
          <tr>
            <td><img src="{{ asset('storage/' . $testimonial->user->profile->profile_picture) }}" alt="{{ $testimonial->user->first_name }}" class="img-fluid rounded-circle" width="30"></td>
            <td>{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</td>
            <td>{{ \Verta::instance($testimonial->created_at)->format('Y/m/d') }}</td>
            <td>
              <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-icon"><i class="fas fa-edit"></i></a>
              <button type="button" class="btn btn-icon btn-delete" data-toggle="modal" data-target="#deleteModal{{ $testimonial->id }}"><i class="fas fa-trash"></i></button>
              <button type="button" class="btn btn-icon" data-toggle="modal" data-target="#testimonialModal{{ $testimonial->id }}">
                <i class="fas fa-eye"></i>
              </button>
            </td>
          </tr>

          <!-- Modal for testimonial details -->
          <div class="modal fade" id="testimonialModal{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel{{ $testimonial->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="testimonialModalLabel{{ $testimonial->id }}">جزئیات نظر</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p><strong>نام کاربر:</strong> {{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</p>
                  <p><strong>تاریخ:</strong> {{ \Verta::instance($testimonial->created_at)->format('Y/m/d') }}</p>
                  <p><strong>محتوا:</strong></p>
                  <p>{!! $testimonial->content !!}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal for delete confirmation -->
          <div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $testimonial->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel{{ $testimonial->id }}">تایید حذف</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  آیا مطمئن هستید که می‌خواهید این نظر را حذف کنید؟
                </div>
                <div class="modal-footer">
                  <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<style>
  .btn-icon {
    background: none;
    border: none;
    color: inherit;
    padding: 0;
    cursor: pointer;
  }

  .btn-icon:hover {
    color: #007bff;
  }

  .btn-icon i {
    font-size: 1.2rem;
  }
</style>
@endsection