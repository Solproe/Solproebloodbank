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
                                        <form action="{{ route('admin.center.store') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="text" id="tax" name="TAX_IDENTIFICATION"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Tax identification" required>
                                                <input type="text" id="name" name="DES_CENTRE"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-48
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Name" required>
                                                <input type="text" id="nickname" name="COD_CENTRE"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control"
                                                    placeholder="Nickname" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="address" name="ADDRESS"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Address" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select id="state" wire:model='selectedState' name="TOWN"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                         focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                         dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                         dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="state" required>
                                                    <option selected>Choose Town</option>
                                                    @foreach ($towns as $town)
                                                        <option value="{{ $town->ID_TOWN}}">{{ $town->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="ip"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Public IP">
                                                <input type="text" id="db_name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-48
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Db name">
                                                <input type="text" id="db_user"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Db user">
                                                <input type="text" id="passwd"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                 focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                 dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                    placeholder="Password">
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
                                <td class="text-center">{{ $center->TAX_IDENTIFICATION }}</td>
                                <td class="col-md-6 text-center" width="10px" class="text-left">{{ $center->DES_CENTRE }}</td>
                                <td class="text-left">{{ $center->COD_CENTRE }}</td>
                                <td class="text-center">{{ $center->PUBLIC_IP }}</td>
                                {{-- CREATE UPDATE MODAL --}}
                                <div class="text-center col">
                                    <td width="4px" align="center">
                                        <button class="far fa-edit btn btn-outline-info btn-med" data-toggle="modal"
                                            data-target="#modal-center">
                                        </button>
                                    </td>
                                    <div class="modal" tabindex="-1" id="modal-center">
                                        <div class="modal-dialog modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal to create blood banks</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.center.update', $center) }}" method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="tax" name="TAX_IDENTIFICATION"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="{{ $center->TAX_IDENTIFICATION}}">
                                                            <input type="text" id="name" name="DES_CENTRE"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-48
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="{{ $center->DES_CENTRE}}">
                                                            <input type="text" id="nickname" name="COD_CENTRE"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control"
                                                                placeholder="{{ $center->COD_CENTRE}}">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="address" name="ADDRESS"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="{{ $center->ADDRESS }}">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select id="state" wire:model='selectedState' name="TOWN"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                     focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                     dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="{{ $center->Towns}}">
                                                                <option selected>Choose Town</option>
                                                                @foreach ($towns as $town)
                                                                    <option value="{{ $town->ID_TOWN}}">{{ $town->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="ip"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="Public IP">
                                                            <input type="text" id="db_name"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-48
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="Db name">
                                                            <input type="text" id="db_user"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="Db user">
                                                            <input type="text" id="passwd"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                             focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                                                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                             dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2 form-control"
                                                                placeholder="Password">
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
                                    <td>
                                        <div class="text-center col">
                                            <form action="{{ route('admin.center.destroy', $center) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
