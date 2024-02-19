@extends('adminlte::page')

@section('title', 'States')

@section('content_header')
    <h1>States List</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-heard">
                <div class="input-group mb-3 mt-3">
                    <input wire:model="search" class="form-control mt-2 ml-4 mr-4 "
                        placeholder="Type what you want to search for">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-outline-info btn-med mr-4 mt-2" data-toggle="modal"
                            data-target="#modal-center-create">Create
                        </button>
                        {{--  Modal design to create distribution centers or blood banks --}}
                        <div class="modal" tabindex="-1" id="modal-center-create">
                            <div class="modal-dialog modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal to create blood banks</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.towns.store') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" id="name" name="name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-48
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Name" required>
                                            </div>
                                            <div class="input-group ms-3">
                                                <select id="state" wire:model='selectedState' name="ID_STATE"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                         focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                         dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                         dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="state" required>
                                                    <option selected>Choose State</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->ID_STATE}}">{{ $state->statename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm ">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">State</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                        <tr>
                            <td class="text-center">{{ $city->name }}</td>
                            <td class="col-md-6 text-center" width="10px" class="text-left">{{ $city->states->statename }}</td>        
                            <td>
                                <div class="text-center col flex">
                                    <form action="{{ route('admin.towns.edit', $city->ID_TOWN)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning">
                                            edit
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
@endsection
