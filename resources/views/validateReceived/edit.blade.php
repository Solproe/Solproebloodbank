@extends('adminlte::page')

@section('title', 'Delivery')


@section('content_header')
    <h1>Edit Delivery</h1>
@stop

@section('content')

    <script src="{{ asset('js/components/Nozeroornegativenumber.js') }}"></script>

    @vite('resources/css/app.css')


    <div class="border-b border-gray-900/10 pb-12">
        <div class="card-heard">
            <div class="mt-3 mb-3 input-group">
                {{--  <input wire:model="search" class="mt-2 ml-4 mr-4 form-control " placeholder="Type what you want to search for">
                <!-- Button trigger modal -->
                <button type="button" class="mt-2 mr-2 btn btn-outline-info btn-med" data-toggle="modal"
                    data-target="#create_delivery">
                    Create
                </button>
                {{--  @dd($centers) --}}
                <!-- Modal -->
                <div class="modal fade" id="edit_delivery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="false">
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
                                                    <th class="text-center">DELIVERY DATE</th>
                                                    <th class="text-center">DELIVERY TIME</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form
                                                    action="{{ route('admin.warehouse.validatereceived.update', $validateReceived) }}"
                                                    method="POST">
                                                    @csrf
                                                    <tr>
                                                        <td class="text-center" width="8px">
                                                            <select class="form-select justify-center"
                                                                aria-label="Default select example" name="customer">
                                                                <option selected>Select BloodBank</option>
                                                                @foreach ($centers as $center)
                                                                    <option value="{{ $center->ID_CENTRE }}">
                                                                        {{ $center->DES_CENTRE }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td width="10px"><input type="number" name="unities"
                                                                oninput="if( this.value.length > 3 )  this.value = this.value.slice(0,3)"
                                                                onKeyPress="return onlyNumbers(event)"
                                                                onKeyUp="losesfocus(this)"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                                 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                  focus:ring-indigo-600 sm:text-sm sm:leading-6 text-right">
                                                        </td>
                                                        <td width="10px"><input type="number" name="boxes"
                                                                oninput="if( this.value.length > 3 )  this.value = this.value.slice(0,3)"
                                                                onKeyPress="onlyNumbers(event)" onKeyUp="losesfocus(this)"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                 focus:ring-indigo-600 sm:text-sm sm:leading-6 text-right">
                                                        </td>

                                                        {{--  Unscroll in numerical input --}}
                                                        <style>
                                                            input[type=number]::-webkit-outer-spin-button,
                                                            input[type=number]::-webkit-inner-spin-button {
                                                                -webkit-appearance: none;
                                                                margin: 0;
                                                            }

                                                            input[type=number] {
                                                                -moz-appearance: textfield;
                                                            }
                                                        </style>

                                                        <td class="text-center" width="10px">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="through">
                                                                <option selected>Select SHIPPING TRANSPORTATION</option>
                                                                @foreach ($deliveries as $delivery)
                                                                    <option value="{{ $delivery->id_delivery }}">
                                                                        {{ $delivery->des_delivery }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td width="10px"><input type="date" name="date"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </td>
                                                        <td width="10px"><input type="time" name="time"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
    </div>



@endsection
