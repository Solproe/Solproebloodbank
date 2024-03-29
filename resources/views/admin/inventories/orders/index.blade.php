@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Orders List</h1>
@stop

@section('content')

    <div class="container">

        <div class="card">

            <div class="card-heard">
                <div class="input-group mb-3 mt-3">
                    <input wire:model="search" class="form-control mt-2 ml-4 mr-4 "
                        placeholder="Type what you want to search for">
                    <div class="input-group-btn">
                        <a class="btn btn-outline-info btn-med mr-2 mt-2"
                            href="{{ route('admin.inventories.suppliesorder.create') }}">Create</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered table-sm ">
                    <thead>
                        <tr>
                            <th class="text-center">N° Order</th>
                            <th class="text-center">Applicant</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" colspan="2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="text-right">{{ $order->id }}</td>
                                <td class="col-sm-2" width="10px" class="text-left">{{ $order->users->name }}</td>
                                <td class="text-left">{{ $order->statuses->status_name }}</td>
                                <td>
                                    <div>
                                        <form action="{{ route('admin.inventories.suppliesorder.show', $order->id) }}">
                                            <button class="btn btn-outline-success">
                                                Details
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form action="{{ route('admin.inventories.suppliesorder.destroy', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
