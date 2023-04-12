@extends('adminlte::page')

@section('content')

<div class="container">
    {!! Form::open(['route' => 'RolesAndPermissions.Permissions.store', 'autocomplete' => 'off']) !!}
    <div class="form-row ml-4 mt-4">
        <div class="col">
            {!! Form::label('Name', '') !!}
            {!! Form::text('name', null, [
            'class' => 'form-control',
            'placeholder' => 'Enter Name Of Permission',
            ]) !!}
        </div>
        <div class="col align-self-end">
            {!! form::submit('Permission Create', ['class' => 'btn btn-outline-success mb-4 mr-4 align-self-end float-right']) !!}
            {!! form::close() !!}
        </div>
    </div>
    <div class="form-row ml-4 mt-4">
        <div>
            <label>write module name folowed by (.) then permission name</label>
        </div>

    </div>
</div>


@endsection