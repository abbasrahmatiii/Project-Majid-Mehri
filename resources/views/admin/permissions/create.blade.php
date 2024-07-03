@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>ایجاد اجازه جدید</h2>
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">نام اجازه:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary">ایجاد</button>
    </form>
</div>
@endsection
