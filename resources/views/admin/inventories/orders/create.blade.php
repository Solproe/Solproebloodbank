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
                            <button name="team" value="{{ Auth::user()->id_team }}"
                                class="btn btn-outline-info btn-med mr-2 mt-2" type="submit"
                                href="{{ route('admin.inventories.supplies.store') }}">Create
                            </button>
                        </div>
                    </div>
                </div>
                <div class="cont_select_center">
                    <div>
                        <select class="form-select form-select-lg mb-3" style="margin: 3% 4% 4% 2%">
                            <option value="">Select Group</option>
                            @foreach ($teams as $team)
                                @if (Auth::user()->id_team != $team->id)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="row">


                    </div>
                    <table class="table table-striped table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th class="text-center">SUPPLIES_NAME</th>
                                <th class="text-center">Balance</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach ($supplies as $supply)
                                <tr>
                                    <td class="col-sm-6" style="text-align: center">
                                        {{ $supply->supply_name }}</td>
                                    <td class="text-left">
                                        @if (isset($movements->where('supplies', $supply->id)->first()->balance) and
                                                $movements->where('supplies', $supply->id)->first()->balance != null)
                                            {{ $movements->where('supplies', $supply->id)->first()->balance }}
                                        @else
                                            <p style="text-align: center">0</p>
                                        @endif
                                    </td>
                                    <td width="15%">
                                        <div class="input-group-btn">
                                            <input class="col-md-12" name="quantity[{{ $supply->id }}]" type="number">
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
