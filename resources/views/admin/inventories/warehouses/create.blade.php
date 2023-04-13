@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>For Process</h1>
@stop

@section('content')
    {{-- <link href="/css/app.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container">

        <div class="card">

            <div class="card-heard">
                <div class="input-group mb-3 mt-3">
                    <input wire:model="search" class="form-control mt-2 ml-4 mr-4 "
                        placeholder="Type what you want to search for">
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered table-sm ">
                    <thead>
                        <tr>
                            <th class="text-center">N° Order</th>
                            <th class="text-center">Applicant</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="text-right">{{ $order->id }}</td>
                                <td class="col-sm-2" width="10px" class="text-left">{{ $order->users->name }}</td>
                                <td class="text-left">{{ $order->status }}</td>
                                <td>
                                    <div>
                                        <a class="btn btn-outline-success" href="{{route('admin.warehouse.transfer.edit', $order->id)}}">Process</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
    @livewire('admin.warehouse.requestsuppliescreate', ['supplies' => $supplies, 'message' => $message])
@stop
