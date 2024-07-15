@extends('layouts.master')

@section('content')
<div class="container mt-4">
  <h2>لیست پست‌ها</h2>
  <div class="row">
    @foreach($posts as $post)
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
          <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">ادامه مطلب</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="d-flex justify-content-center">
    {{ $posts->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection