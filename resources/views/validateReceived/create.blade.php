@extends('adminlte::page')

@section('title', 'Delivery')


@section('content_header')
    <h1>Delivery Create</h1>
@stop

@section('content')
    @vite('resources/css/app.css')
    <div class="card">
        <div class="card_body">
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        <th class="text-center">CUSTOMER</th>
                        <th class="text-center">UNITIES</th>
                        <th class="text-center">BOXES</th>
                        <th class="text-center">THROUGH</th>
                        <th class="text-center">DATE OF DELIVERY</th>
                        <th class="text-center">TIME OF DELIVERY</th>
                        <th class="text-center" colspan="2">ACTION</th>
                    </tr>
                </thead>
                <Tbody>
                    <form action="{{ route('admin.validatereceived.store') }}" method="POST">
                        @csrf
                        <tr>
                            <td class="text-center" width="10px">
                                <select class="form-select justify-center" aria-label="Default select example"
                                    name="customer">
                                    <option selected>Select Customer</option>
                                    <option value="WAACAR">WAACAR</option>
                                    <option value="BANCO NACIONAL">BANCO NACIONAL</option>
                                </select>
                            </td>
                            <td width="10px"><input type="number" name="unities"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </td>

                            <td width="10px"><input type="number" name="boxes" id="first-name"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </td>

                            <td class="text-center" width="10px">
                                <select class="form-select" aria-label="Default select example"
                                        name="through[dateDelivery=>{{$date_delivery}},timeDelivery=>{{$time_delivery}}]">
                                    <option selected>Select through</option>
                                    <option value="CHEVALIER">CHEVALIER</option>
                                    <option value="TERMINAL">TERMINAL A TERMINAL</option>
                                    <option value="AVANSA">AVANSA</option>
                                </select>
                            </td>
                            <td class="text-center" width="10px" name="dateDelivery[{{$date_delivery}}]">
                                {{ $date_delivery }}
                            </td>
                            <td class="text-center" width="10px" name="deliveryTime[{{$time_delivery}}]">
                                {{ $time_delivery }}
                            </td>
                            <td class="text-center" width="10px">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </td>
                        </tr>
                </Tbody>
            </table>
        </div>
    </div>
@endsection
