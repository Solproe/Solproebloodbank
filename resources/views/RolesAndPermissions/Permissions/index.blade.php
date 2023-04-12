@extends('adminlte::page')

@section('content')

<button class="btn btn-outline-success float-right">
    <a href="{{ route('RolesAndPermissions.Permissions.create') }}">Create</a>
</button>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permission as $permissions)
        <tr>
            <td>{{ $permissions->id }}</td>
            <td>{{ $permissions->name }}</td>


            <td width="10px">
                <form action="{{ route('RolesAndPermissions.Permissions.destroy', $permissions) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection