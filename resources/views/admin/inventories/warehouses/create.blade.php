@extends('adminlte::page')

@section('title', 'Details')

@section('content_header')
    <h1>Order Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="container col-md-10">
            <form action="{{ route('admin.inventories.warehouses.store') }}" method="POST">
                <div class="card-heard">
                    <div class="input-group mb-3 mt-3">
                        <input wire:model="search" class="form-control mt-2 ml-4 mr-4 "
                            placeholder="Type what you want to search for">
                        <div class="input-group-btn">
                            <button name="order" value="{{ $order->id }}"
                                class="btn btn-outline-info btn-med mr-2 mt-2" type="submit"
                                href="{{ route('admin.inventories.supplies.store') }}">Send
                            </button>
                        </div>
                    </div>
                </div>
                <div class="cont_select_center row">
                    <div style="margin: 3% 3% 3% 3%">
                        <select name="groupFrom"
                            class="block py-2.5 px-0 w-full text-md text-gray-500 bg-transparent border-0
                                border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none 
                                focus:ring-0 focus:border-gray-200 peer">
                            <option value="">Group From</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin: 3% 3% 3% 3%">
                        <select name="groupTo"
                            class="block py-2.5 px-0 w-full text-md text-gray-500 bg-transparent border-0
                                border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none 
                                focus:ring-0 focus:border-gray-200 peer"
                            style="margin: 3% 0% 3% 0%">
                            <option value="">Group To</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <table class="table table-striped table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th class="text-center">SUPPLIES_NAME</th>
                                <th class="text-center">Balance</th>
                                <th class="text-center">Asked</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach ($suppliesorder as $supplyorder)
                                <tr>
                                    <td class="col-sm-6" style="text-align: center">
                                        {{ $supplyorder->supplies->supply_name }}</td>
                                    <td class="text-left">
                                        @if (isset($movements->where('supplies', $supplyorder->supplies->id)->first()->balance) and
                                                $movements->where('supplies', $supplyorder->id)->first()->balance != null)
                                            {{ $movements->where('supplies', $supplyorder->id)->first()->balance }}
                                        @else
                                            <p style="text-align: center">0</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $supplyorder->quantity }}
                                    </td>
                                    <td width="15%">
                                        <div class="input-group-btn">
                                            <input class="col-md-12" name="quantity[{{ $supplyorder->supplies->id }}]"
                                                type="number">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
@stop
