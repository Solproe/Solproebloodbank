@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>Orders List</h1>
@stop

@section('content')
    <div class="card">
        <div class="container col-md-10">
            <form action="{{ route('admin.inventories.suppliesorder.store') }}" method="POST">
                <div class="card-heard">
                    <div class="input-group mb-3 mt-3">
                        <input wire:model="search" class="form-control mt-2 ml-4 mr-4 "
                            placeholder="Type what you want to search for">
                        <div class="input-group-btn">
                            <button class="btn btn-outline-info btn-med mr-2 mt-2" type="submit"
                                href="{{ route('admin.inventories.supplies.store') }}">Create
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <select name="provider" class="form-controller">
                            @foreach ($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select name="ordertype" class="form-controller">
                            <option value="SO">Shopping Order</option>
                            <option value="T">Transfer</option>
                        </select>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-sm ">
                    <thead>
                        <tr>
                            <th class="text-center">SUPPLIES_NAME</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price / Unity</th>
                        </tr>
                    </thead>
                    <tbody>

                        @csrf
                        @foreach ($supplies as $supply)
                            <tr>
                                <td class="col-sm-6" width="10px" class="text-left">{{ $supply->supply_name }}</td>
                                <td class="text-left">
                                    @foreach ($data as $array)
                                        @foreach ($array as $name => $balance)
                                            @if (key($array) == $supply->supply_name)
                                                {{ $balance }}
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td width="15%">
                                    <div class="input-group-btn">
                                        <input class="col-md-12" name="quantity[{{ $supply->id }}]">
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="input-group-btn">
                                        <input class="col-md-12" name="price[{{ $supply->id }}]">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop