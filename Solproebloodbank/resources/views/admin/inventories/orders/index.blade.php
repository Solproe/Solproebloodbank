@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>Orders List</h1>
@stop

@section('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                            <th class="text-center">Provider</th>
                            <th class="text-center" colspan="2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="text-right">{{ $order->id }}</td>
                                <td class="col-sm-2" width="10px" class="text-left">{{ $order->users->name }}</td>
                                <td class="text-left">{{ $order->status }}</td>
                                <td class="text-left">{{ $order->provider->name }}</td>
                                <td>
                                    <div>
                                        <form action="{{ route('admin.inventories.suppliesorder.edit', $order->id) }}">
                                            @csrf
                                            <x-order-details :order="$order" :suppliesorder="$suppliesorder"></x-order-details>
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
