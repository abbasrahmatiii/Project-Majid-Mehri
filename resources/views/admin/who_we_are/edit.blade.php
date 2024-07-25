@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h3>ویرایش "ما چه کسی هستیم"</h3>
    </div>
    <div class="card-body">
      <form id="whoWeAreEditForm" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" name="title" id="title" class="form-control" value="{{ $whoWeAre->title ?? '' }}">
          <div class="text-danger" id="titleError"></div>
        </div>

        <div class="form-group">
          <label for="lead">خلاصه</label>
          <textarea id="summernote1" name="lead" class="form-control">{{ $whoWeAre->lead ?? '' }}</textarea>
          <div class="text-danger" id="leadError"></div>
        </div>

        <div class="form-group">
          <label for="content">محتوا</label>
          <textarea id="summernote2" name="content" class="form-control">{{ $whoWeAre->content ?? '' }}</textarea>
          <div class="text-danger" id="contentError"></div>
        </div>

        <div class="form-group">
          <label for="button_text">متن دکمه</label>
          <input type="text" name="button_text" id="button_text" class="form-control" value="{{ $whoWeAre->button_text ?? '' }}">
          <div class="text-danger" id="buttonTextError"></div>
        </div>

        <div class="form-group">
          <label for="button_link">لینک دکمه</label>
          <input type="url" name="button_link" id="button_link" class="form-control" value="{{ $whoWeAre->button_link ?? '' }}">
          <div class="text-danger" id="buttonLinkError"></div>
        </div>

        <div class="form-group">
          <label for="image1">تصویر ۱</label>
          @if(isset($whoWeAre->image1))
          <div class="mb-2">
            <img src="{{ asset('storage/images/' . $whoWeAre->image1) }}" alt="تصویر ۱" class="img-thumbnail" width="200">
          </div>
          @endif
          <input type="file" name="image1" class="form-control">
          <div class="text-danger" id="image1Error"></div>
        </div>

        <div class="form-group">
          <label for="image2">تصویر ۲</label>
          @if(isset($whoWeAre->image2))
          <div class="mb-2">
            <img src="{{ asset('storage/images/' . $whoWeAre->image2) }}" alt="تصویر ۲" class="img-thumbnail" width="200">
          </div>
          @endif
          <input type="file" name="image2" class="form-control">
          <div class="text-danger" id="image2Error"></div>
        </div>

        <div class="form-group">
          <label for="image3">تصویر ۳</label>
          @if(isset($whoWeAre->image3))
          <div class="mb-2">
            <img src="{{ asset('storage/images/' . $whoWeAre->image3) }}" alt="تصویر ۳" class="img-thumbnail" width="200">
          </div>
          @endif
          <input type="file" name="image3" class="form-control">
          <div class="text-danger" id="image3Error"></div>
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

        cb(file_path);

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
            contents: '<i class="note-icon-picture"></i> ',
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

    $('#whoWeAreEditForm').on('submit', function(event) {
      event.preventDefault();
      $('.text-danger').text(''); // Clear previous error messages

      var formData = new FormData(this);

      $.ajax({
        url: "{{ route('who-we-are.update') }}",
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          toastr.success(response.message);
          setTimeout(function() {
            window.location.reload();
          }, 1000);
        },
        error: function(xhr) {
          var errors = xhr.responseJSON.errors;
          if (errors) {
            if (errors.title) {
              $('#titleError').text(errors.title[0]);
            }
            if (errors.lead) {
              $('#leadError').text(errors.lead[0]);
            }
            if (errors.content) {
              $('#contentError').text(errors.content[0]);
            }
            if (errors.button_text) {
              $('#buttonTextError').text(errors.button_text[0]);
            }
            if (errors.button_link) {
              $('#buttonLinkError').text(errors.button_link[0]);
            }
            if (errors.image1) {
              $('#image1Error').text(errors.image1[0]);
            }
            if (errors.image2) {
              $('#image2Error').text(errors.image2[0]);
            }
            if (errors.image3) {
              $('#image3Error').text(errors.image3[0]);
            }
          } else {
            toastr.error('An unknown error occurred.');
          }
        }
      });
    });
  });
</script>

@endsection