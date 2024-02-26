@extends('adminlte::page')

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'admin.addPermissions', 'autocomplete' => 'off', 'method' => 'POST']) !!}
        <div class="form-row ml-4 mt-4">
            <div class="col align-self-end">
                {!! form::submit('Add Permissions', ['class' => 'btn btn-outline-success mb-4 mr-4 align-self-end float-right']) !!}
            </div>
        </div>
        <div>
            <div class="form-group col-md-2">
                <label>Permissions</label>
                @foreach ($permission as $permissions)
                    <div class="custom-control custom-checkbox checkbox-xl">
                        <div class="form-check text-lg">
                            <br>
                            <input class="form-check-input" type="checkbox" name="permissions[{{ $role->id }}]"
                                value="{{ $permissions->id }}" id="flexCheckDefault" />
                            <label class="form-check-label text-lg" for="flexCheckDefault">{{ $permissions->name }}</label>
                        </div>
                    </div>
                @endforeach
                {!! form::close() !!}
            </div>
        </div>
    </div>
@endsection
