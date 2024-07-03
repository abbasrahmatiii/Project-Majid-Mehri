@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>ویرایش اجازه</h2>
    <form action="/admin/permissions/update/{{$permission->id}} " method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">نام اجازه:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $permission->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
</div>
@endsection

