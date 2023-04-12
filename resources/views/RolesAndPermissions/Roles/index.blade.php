@extends('adminlte::page')

@section('content')
<button class="btn btn-outline-success float-right">
    <a href="{{ route('RolesAndPermissions.Roles.create') }}">Create</a>
</button>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
        </tr>
    </thead>
    <tbody>
        @foreach($role as $roles)
        <tr>
            <td>{{ $roles->id }}</td>
            <td>{{ $roles->name }}</td>
            <td width="10px">
                <form action="{{ route('RolesAndPermissions.Roles.destroy', $roles) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                </form>
                <form action="{{ route('RolesAndPermissions.Roles.edit', $roles) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-warning">Edit</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection