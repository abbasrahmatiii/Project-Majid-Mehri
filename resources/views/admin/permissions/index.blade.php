@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Permissions</h1>
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Create Permission</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.permissions.delete', $permission->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
s