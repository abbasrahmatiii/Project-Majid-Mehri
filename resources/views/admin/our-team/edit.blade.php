<!-- resources/views/admin/client-section/edit.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش بخش مشتریان</h3>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      <form action="{{ route('admin.client-section.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $clientSection->title ?? '') }}">
        </div>

        <div class="form-group">
          <label for="description">توضیحات</label>
          <textarea id="summernote1" name="description" class="form-control">{{ old('description', $clientSection->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
          <label for="button_text">متن دکمه</label>
          <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $clientSection->button_text ?? '') }}">
        </div>

        <div class="form-group">
          <label for="button_url">آدرس دکمه</label>
          <input type="url" name="button_url" class="form-control" value="{{ old('button_url', $clientSection->button_url ?? '') }}">
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
      buttons: {
        lfm: function(context) {
          var ui = $.summernote.ui;
          var button = ui.button({
            contents: '<span>مرکز آپلود</span>',
            tooltip: 'مرکز آپلود',
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