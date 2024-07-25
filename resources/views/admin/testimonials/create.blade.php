@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ایجاد نظر جدید</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="user_id">انتخاب کاربر</label>
          <select name="user_id" id="user_id" class="form-control">
            <option value="">انتخاب کنید</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" data-image="{{ asset('storage/' . $user->profile->image_path) }}" data-name="{{ $user->profile->name }}">
              {{ $user->first_name }} {{ $user->last_name }}
            </option>
            @endforeach
          </select>
          @if($errors->has('user_id'))
          <div class="text-danger">{{ $errors->first('user_id') }}</div>
          @endif
        </div>

        <div class="form-group">
          <label for="content">محتوا</label>
          <textarea id="summernote1" name="content" class="form-control">{{ old('content') }}</textarea>
          @if($errors->has('content'))
          <div class="text-danger">{{ $errors->first('content') }}</div>
          @endif
        </div>

        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>

<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
<!-- Laravel File Manager JS -->
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

<script>
  $(document).ready(function() {
    var route_prefix = "/laravel-filemanager";
    $('#summernote1').summernote({
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
        ['mybutton', ['lfm']]
      ],

    });

    // Laravel File Manager stand-alone button
    $('#lfm').filemanager('image', {
      prefix: route_prefix
    });
  });
</script>
@endsection