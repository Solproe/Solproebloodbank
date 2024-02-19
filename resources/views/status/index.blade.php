@extends('adminlte::page')

@section('title', 'status')

@section('content_header')
    <h1>Status</h1>
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
                                    <form action="{{ route('status.store') }}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" id="name" name="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                placeholder="Name" required>
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
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th class="text-center">DESCRIPTION</th>
                    <th class="text-center">NAME</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allStatus as $status)
                    <tr>
                        <td class="text-center">{{ $status->status_name }}</td>
                        <td class="col-md-6 text-center" width="10px" class="text-left">empty description</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
