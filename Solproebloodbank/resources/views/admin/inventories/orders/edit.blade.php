@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>Orders List</h1>
@stop

@section('content')

    <div class="card">
        <div class="container col-md-10">
            <div class="card-heard">
                <div class="input-group mb-3 mt-3">
                    <input wire:model="search" class="form-control mt-2 ml-4 mr-4 "
                        placeholder="Type what you want to search for">
                    <div class="input-group-btn">
                        <a class="btn btn-outline-info btn-med mr-2 mt-2"
                            href="{{ route('admin.inventories.supplies.create') }}">Request</a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        <th class="text-center">SUPPLIES_NAME</th>
                        <th class="text-center">Balance</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('admin.inventories.suppliesorder.update', $requestorder) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach ($requestsupplies as $ordersupply)
                            <tr>
                                <td class="col-sm-6" width="10px" class="text-left">
                                    {{ $ordersupply->supplies->supply_name }}</td>
                                <td class="col-sm-2" class="text-left"></td>
                                <td width="15%">
                                    <div class="input-group-btn">
                                        <input class="col-md-12" name="quantity[{{ $ordersupply->supplies->id }}]">
                                    </div>
                                </td>
                        @endforeach

                        <td width="15%">
                            @if (@Auth::user()->hasPermissionTo('order.supply.edit.storage'))
                                <div class="input-group-btn">
                                    <input class="col-md-12" name="status[{{ $requestorder->id }}]"
                                        placeholder={{ $requestorder->status }}>
                                </div>
                            @else
                                <div class="input-group-btn">
                                    <label>
                                        {{ $requestorder->status }}
                                    </label>
                                </div>
                            @endif

                        </td>
                        </tr>

                        <div class="col-md-2">
                            <button type="submit">
                                Send
                            </button>
                        </div>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
@endsection
