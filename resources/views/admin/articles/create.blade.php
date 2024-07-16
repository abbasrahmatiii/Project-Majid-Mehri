@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ایجاد مقاله جدید</h3>
    </div>
    <div class="card-body">
      <form id="articleForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}">
          <div class="text-danger" id="titleError"></div>
        </div>

        <div class="form-group">
          <label for="slug">اسلاگ</label>
          <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
          <div class="text-danger" id="slugError"></div>
        </div>

        <div class="form-group">
          <label for="summary">خلاصه</label>
          <textarea id="summernote1" name="summary" class="form-control">{{ old('summary') }}</textarea>
          <div class="text-danger" id="summaryError"></div>
        </div>

        <div class="form-group">
          <label for="body">محتوا</label>
          <textarea id="summernote2" name="body" class="form-control">{{ old('body') }}</textarea>
          <div class="text-danger" id="bodyError"></div>
        </div>

        <div class="form-group">
          <label for="category_id">دسته‌بندی</label>
          <select name="category_id" class="form-control">
            <option selected disabled>دسته‌بندی</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
          <div class="text-danger" id="categoryError"></div>
        </div>

        <div class="form-group">
          <label for="published">وضعیت</label>
          <select name="published" class="form-control">
            <option selected disabled>وضعیت انتشار</option>
            <option value="0" {{ old('published') == '0' ? 'selected' : '' }}>پیش‌نویس</option>
            <option value="1" {{ old('published') == '1' ? 'selected' : '' }}>منتشر شده</option>
          </select>
          <div class="text-danger" id="publishedError"></div>
        </div>

        <div class="form-group">
          <label for="image">تصویر</label>
          <input type="file" name="image" class="form-control">
          <div class="text-danger" id="imageError"></div>
        </div>

        <button type="submit" class="btn btn-success">ذخیره</button>
      </form>
    </div>
  </div>
</div>

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
<!-- Laravel File Manager JS -->
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

<script>
  $(document).ready(function() {
    var route_prefix = "/laravel-filemanager";

    function lfm(type, options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      var target_input = $('#' + options.target);
      var target_preview = $('#' + options.preview);

      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');

      window.SetUrl = function(items) {
        var file_path = items.map(function(item) {
          return item.url;
        }).join(',');

        // set the value of the desired input to image url
        cb(file_path);

        // trigger change event
        target_input.trigger('change');
        target_preview.trigger('change');
      };
    }

    $('#summernote1, #summernote2').summernote({
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
      buttons: {
        lfm: function(context) {
          var ui = $.summernote.ui;
          var button = ui.button({
            contents: '<span>مرکز آپلود</span>',
            tooltip: 'Insert image with file manager',
            click: function() {
              lfm('image', {
                prefix: route_prefix
              }, function(url) {
                context.invoke('editor.insertImage', url);
              });
            }
          });
          return button.render();
        }
      }
    });

    $('#articleForm').on('submit', function(event) {
      event.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        url: "{{ route('articles.store') }}",
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          toastr.success(response.message);
          setTimeout(function() {
            window.location.href = "{{ route('articles.index') }}";
          }, 100);
        },
        error: function(xhr) {
          var errors = xhr.responseJSON.errors;
          $('#titleError').text(errors.title ? errors.title[0] : '');
          $('#slugError').text(errors.slug ? errors.slug[0] : '');
          $('#summaryError').text(errors.summary ? errors.summary[0] : '');
          $('#bodyError').text(errors.body ? errors.body[0] : '');
          $('#categoryError').text(errors.category_id ? errors.category_id[0] : '');
          $('#publishedError').text(errors.published ? errors.published[0] : '');
          $('#imageError').text(errors.image ? errors.image[0] : '');
        }
      });
    });
  });
</script>
@endsection