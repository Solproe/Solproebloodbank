@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
<h1>Supplies Edit</h1>
@stop

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <h6>Please correct the following errors</h6>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card container-fluid border border-info rounded mt-3  mb-3">

    <div class="card_body">

        <form action="{{route('admin.inventories.supplies.update', $supply->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row ml-4 mt-4">
                <div class="form-group col-md-4">
                    <label>Code</label>
                    <input type="text" class="form-control" placeholder={{$supply->supply_cod}} name="code">
                </div>
                <div class="form-group col-md-4">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder={{$supply->supply_name}} name="name">
                </div>
            </div>


            <div class="mb-2 mr-4 ml-4">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" placeholder={{$supply->supply_description}} name="description" id="Description" rows="3"></textarea>
            </div>


            <div class="form-row ml-4 mt-4">

                <div class=" col form-group ml-5 ">
                    <label>Status</label>
                    <select class=" from-control" name="statuses">
                        @foreach ($status as $statuses)
                        <option value={{ $statuses }}>{{ $statuses->status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col align-self-end">
                    
                    <button type="submit" class="btn btn-outline-success mb-4 mr-4 align-self-end float-right">Update Supplies</button>
                </div>
            </div>
        </form>

    </div>
</div>
@stop