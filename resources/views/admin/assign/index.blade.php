<!-- resources/views/admin/roles/index.blade.php -->

@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>لیست نقش‌ها</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">ایجاد نقش جدید</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>نام نقش</th>
                        <th>مجوزها</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-primary">ویرایش</a>
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
