@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>For Process</h1>
@stop

@section('content')
    <div>
        <div>
            <form action="{{ route('admin.warehouse.transfer.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Movement</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <label>
                            Entities
                        </label>
                    </div>
                    <div class="row">
                        <input type="text" placeholder="From" class="mb-2 form-control col-sm-3 ml-2" name="from">
                        <input type="text" placeholder="To" class="mb-2 form-control col-sm-3 ml-2"
                            name="to[{{ $order->id }}]">
                    </div>
                    <table class="table table-striped table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th class="text-center">SUPPLIES_NAME</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Balance</th>
                                <th class="text-center">Provider</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplyorder as $supply)
                                <tr>
                                    <td class="col-sm-4" width="10px" class="text-left">
                                        {{ $supply->supplies->supply_name }}
                                    </td>
                                    <td width="15%">
                                        <div class="input-group-btn">
                                            <input class="col-md-12 form-control"
                                                name="quantity[{{ $supply->supplies->id }}]">
                                        </div>
                                    </td>
                                    <td class="col-sm-2" width="10px" class="text-left">
                                        @foreach ($price as $balance)
                                            @if (key($balance) == $supply->id_supplies)
                                                {{$balance[key($balance)]}}
                                            @else
                                                0
                                            @endif
                                        @endforeach
                                    </td>
                                    @if (isset($order->provider->name))
                                        <td>
                                            {{ $order->provider->name }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@stop
