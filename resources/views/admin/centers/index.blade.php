@extends('adminlte::page')

@section('title', 'Center')

@section('content_header')
    <h1>Center List</h1>
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
                                        <form action="{{ route('admin.centers.index') }}">
                                            <div class="input-group mb-3">
                                                <input type="text" id="tax"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Tax identification" required>
                                                <input type="text" id="name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-48
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Name" required>
                                                <input type="text" id="nickname"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control"
                                                    placeholder="Nickname" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="address"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Address" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select id="country"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="country" required>
                                                    <option selected>Choose country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="id">{{ $country->countryname }}</option>
                                                    @endforeach
                                                </select>
                                                <select id="state" wire:model='selectedState'
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                         focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                         dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                         dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="state" required>
                                                    <option selected>Choose state</option>
                                                    @foreach ($states as $state)
                                                        <option value="$state->ID_STATES">{{ $state->statename }}</option>
                                                    @endforeach
                                                </select>
                                                <select id="town"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="town" required>
                                                    <option selected>Choose town</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="ip"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Public IP" required>
                                                <input type="text" id="db_name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-48
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Db name" required>
                                                <input type="text" id="db_user"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Db user" required>
                                                <input type="text" id="passwd"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Password" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
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
                            <th class="text-center">TAX ID</th>
                            <th class="text-center">NAME</th>
                            <th class="text-center">NICKNAME</th>
                            <th class="text-center">PUBLIC IP</th>
                            <th class="text-center" colspan="2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($centers as $center)
                            <tr>
                                <td class="text-right">{{ $center->TAX_IDENTIFICATION }}</td>
                                <td class="col-sm-2" width="10px" class="text-left">{{ $center->DES_CENTRE }}</td>
                                <td class="text-left">{{ $center->COD_CENTRE }}</td>
                                <td class="text-left">{{ $center->PUBLIC_IP }}</td>
                                {{-- CREATE UPDATE MODAL --}}
                                <div class="text-center col">
                                    <td width="4px" align="center">
                                        <button class="far fa-edit btn btn-outline-info btn-med" data-toggle="modal"
                                            data-target="#modal-center">
                                        </button>
                                    </td>
                                    <div class="modal" tabindex="-1" id="modal-center">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
