@extends('adminlte::page')

@section('title', 'Delivery')


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
                                                    <th class="text-center">UNITIES</th>
                                                    <th class="text-center">BOXES</th>
                                                    <th class="text-center">SHIPPING TRANSPORTATION</th>
                                                    <th class="text-center">DATE OF DELIVERY</th>
                                                    <th class="text-center">TIME OF DELIVERY</th>
                                                </tr>
                                            </thead>
                                            <Tbody>
                                                <form action="{{ route('admin.validatereceived.store') }}" method="POST">
                                                    @csrf
                                                    <tr>
                                                        <td class="text-center" width="8px">
                                                            <select class="form-select justify-center"
                                                                aria-label="Default select example" name="customer">
                                                                <option selected>Select BloodBank</option>
                                                                @foreach ($centers as $center)
                                                                    <option value="{{ $center->DES_CENTRE }}">
                                                                        {{ $center->DES_CENTRE }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td width="10px"><input type="number" name="unities"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </td>
                                                        <td width="10px"><input type="number" name="boxes"
                                                                id="first-name" autocomplete="given-name"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </td>
                                                        <td class="text-center" width="10px">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="through[dateDelivery=>{{ $date_delivery }},timeDelivery=>{{ $time_delivery }}]">
                                                                <option selected>Select SHIPPING TRANSPORTATION</option>
                                                                @foreach ($deliverys as $delivery)
                                                                    <option value="{{ $delivery->des_delivery }}">
                                                                        {{ $delivery->des_delivery }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center mb-2" width="10px">
                                                            {{ $date_delivery }}
                                                        </td>
                                                        <td class="text-center" width="10px">
                                                            {{ $time_delivery }}
                                                        </td>
                                                    </tr>
                                            </Tbody>
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
                        <th scope="col">Customer</th>
                        <th scope="col">Unities</th>
                        <th scope="col">Boxes</th>
                        <th scope="col">Status</th>
                        <th scope="col">Through</th>
                        <th scope="col">Date</th>
                        <th scope="col">Received Date</th>
                        <th scope="col">News</th>
                        <th scope="col">User</th>
                        <th scope="col">Sender</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($validateReceived) and $validateReceived != null)
                        @foreach ($validateReceived as $validate)
                            <tr>
                                <th scope="row"> {{ $validate->customer }} </th>
                                <td> {{ $validate->unities }} </td>
                                <td> {{ $validate->boxes }} </td>
                                <td> {{ $validate->status->status_name }} </td>
                                <td> {{ $validate->through }} </td>
                                <td> {{ $validate->date }} </td>
                                @if ($validate->received_date == null)
                                    <td> NULL </td>
                                @else
                                    <td> {{ $validate->received_date }} </td>
                                @endif
                                @if ($validate->news == null)
                                    <td> NULL </td>
                                @else
                                    <td> {{ $validate->news }} </td>
                                @endif
                                <td> {{ $validate->users->name }} </td>

                                @if ($validate->sender == null)
                                    <td> NULL </td>
                                @else
                                    <td> {{ $validate->sender }} </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>

    </div>


@endsection
