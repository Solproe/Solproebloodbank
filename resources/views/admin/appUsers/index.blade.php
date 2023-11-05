@extends('adminlte::page')

@section('title', 'Users')


@section('content_header')
    <h1>List Delivery</h1>
@stop

@section('content')

    @vite('resources/css/app.css')

    <div class="border-b border-gray-900/10 pb-12">
        <div class="card-heard">
            <div class="mt-3 mb-3 input-group">
                <input wire:model="search" class="mt-2 ml-4 mr-4 form-control " placeholder="Type what you want to search for">
                <!-- Button trigger modal -->
                <button type="button" class="mt-2 mr-2 btn btn-outline-info btn-med" data-toggle="modal"
                    data-target="#create_delivery">
                    Create
                </button>

                <!-- Modal -->
                <div class="modal fade" id="create_delivery" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Record delivery</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card_body">
                                        <table class="table table-striped table-bordered table-sm ">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">BLOODBANK</th>
                                                    <th class="text-center">Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="{{ route('admin.appUsers.store') }}" method="POST">
                                                    @csrf
                                                    <tr>
                                                        <td class="text-center" width="8px">
                                                            <select class="form-select justify-center"
                                                                aria-label="Default select example" name="bloodBank">
                                                                <option selected>Select BloodBank</option>
                                                                @foreach ($centers as $center)
                                                                    <option value="{{ $center->ID_CENTRE }}">
                                                                        {{ $center->COD_CENTRE }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="email" name="email"
                                                                class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </td>    
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn btn-secondary rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-red shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    data-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-primary rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Blood Bank</th>
                        <th scope="col">Email</th>
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($appUsers) and $appUsers != null)
                        @foreach ($appUsers as $appUser)
                            <tr>
                                <th scope="row"> {{ $appUser->center->DES_CENTRE }} </th>
                                <td> {{ $appUser->user->email }} </td>
                                <td> duss </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection
