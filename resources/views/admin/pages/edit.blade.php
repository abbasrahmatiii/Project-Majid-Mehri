@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش صفحه</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" name="title" class="form-control" value="{{ $page->title }}">
          @if($errors->has('title'))
          <div class="text-danger">{{ $errors->first('title') }}</div>
          @endif
        </div>

        <div class="form-group">
          <label for="slug">اسلاگ</label>
          <input type="text" name="slug" class="form-control" value="{{ $page->slug }}">
          @if($errors->has('slug'))
          <div class="text-danger">{{ $errors->first('slug') }}</div>
          @endif
        </div>

        <div class="form-group">
          <label for="summary">خلاصه</label>
          <textarea id="summernote1" name="summary" class="form-control">{{ $page->summary }}</textarea>
          @if($errors->has('summary'))
          <div class="text-danger">{{ $errors->first('summary') }}</div>
          @endif
        </div>

        <div class="form-group">
          <label for="body">محتوا</label>
          <textarea id="summernote2" name="body" class="form-control">{{ $page->body }}</textarea>
          @if($errors->has('body'))
          <div class="text-danger">{{ $errors->first('body') }}</div>
          @endif
        </div>

        <div class="form-group">
          <label for="published">وضعیت</label>
          <select name="published" class="form-control">
            <option selected disabled>وضعیت انتشار</option>
            <option value="0" {{ $page->published == '0' ? 'selected' : '' }}>پیش‌نویس</option>
            <option value="1" {{ $page->published == '1' ? 'selected' : '' }}>منتشر شده</option>
          </select>
          @if($errors->has('published'))
          <div class="text-danger">{{ $errors->first('published') }}</div>
          @endif
        </div>

        <div class="form-group">
          <label for="image">تصویر</label>
          <input type="file" name="image" class="form-control">
          @if($errors->has('image'))
          <div class="text-danger">{{ $errors->first('image') }}</div>
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
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  });
</script>
@endsection