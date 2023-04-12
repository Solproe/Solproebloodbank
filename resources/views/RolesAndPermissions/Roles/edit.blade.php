@extends('adminlte::page')

@section('content')
    <div>
        <h2>
            Role: {{ $role->name }}
        </h2>
    </div>

    <button class="btn btn-outline-success float-right">
        <a href="{{ route('RolesAndPermissions.Permissions.create', $role->id) }}" method='POST'>Create</a>
    </button>
    <form action="{{ route('admin.permissionsAdd')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-success float-right mr-2" name="permissions[]" value={{$role->id}}>
            Add Permissions
        </button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($role->permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>


                    <td width="10px">
                        <form action="{{ route('admin.deletePermissions')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" name="permission[{{ $role->id }}]"
                                value="{{ $permission->id }}">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
