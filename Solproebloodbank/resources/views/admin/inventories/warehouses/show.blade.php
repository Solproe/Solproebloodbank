@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>For Process</h1>
@stop

@section('content')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.warehouse.transfer.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Movement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                            @foreach ($suppliesorder as $ordersupply)
                                @if ($ordersupply->id_order == $order->id)
                                    <tr>
                                        <td class="col-sm-6" width="10px" class="text-left">
                                            {{ $ordersupply->supplies->supply_name }}
                                        </td>
                                        <td width="15%">
                                            <div class="input-group-btn">
                                                <input class="col-md-12 form-control"
                                                    name="quantity[{{ $ordersupply->supplies->id }}]">
                                            </div>
                                        </td>
                                        {{ $order->id }}
                                        <?php $num = 1; ?>
                                        @foreach ($matriz as $array)
                                            @foreach ($array as $content => $balance)
                                                @if ($num < 2)
                                                    @if ($ordersupply->supplies->supply_name == $content)
                                                        <td class="col-sm-6" width="10px" class="text-left">
                                                            {{ $balance }}
                                                        </td>
                                                        <?php $num += 1; ?>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                        @if (isset($order->provider->name))
                                            <td>
                                                {{ $order->provider->name }}
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@stop
