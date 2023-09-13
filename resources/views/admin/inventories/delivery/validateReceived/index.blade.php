@extends('adminlte::page')
@section('title', 'Delivery')
@section('content_header')
    <h1>List Delivery</h1>
@stop

@section('content')
    <script src="{{ asset('js/components/Nozeroornegativenumber.js') }}"></script>

    <div class="border-b border-gray-900/10 pb-12">
        <div class="card-heard">
            <div class="mt-2 mb-2 input-group">
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
                                    Record delivery
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.inventories.delivery.validateReceived.store') }}"
                                    method="POST">
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
                                                    @csrf
                                                    @method('POST')
                                                    <tr>
                                                        <td width="25%">
                                                            <select
                                                                class="form-select justify-center rounded-xl border-1 py-1.5
                                                        text-gray-900 shadow-xl ring-1 ring-inset
                                                        ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                        focus:ring-indigo-600 md:text-md md:leading-6"
                                                                aria-label="Default select example" name="customer">
                                                                <option
                                                                    class="form-select justify-center rounded-xl border-1 py-1.5  text-gray-900 shadow-xl ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                focus:ring-indigo-600 xl:text-xl xl:leading-6">
                                                                    Select BloodBank</option>
                                                                @foreach ($centers as $center)
                                                                    <option
                                                                        class="form-select justify-center rounded-xl border-1 py-1.5  text-gray-900 shadow-xl"
                                                                        value="{{ $center->ID_CENTRE }}">
                                                                        {{ $center->DES_CENTRE }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td width="10px">
                                                            <input type="number" name="unities"
                                                                oninput="if( this.value.length > 3 )  this.value = this.value.slice(0,3)"
                                                                onKeyPress="return onlyNumbers(event)"
                                                                onKeyUp="losesfocus(this)"
                                                                class="block w-full rounded-xl border-1 py-1.5
                                                                 text-gray-900 shadow-xl ring-1 ring-inset
                                                                 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                 focus:ring-indigo-600 xl:text-xl xl:leading-6 text-right"
                                                                style="width: 100%">
                                                        </td>
                                                        <td width="10px"><input type="number" name="boxes"
                                                                oninput="if( this.value.length > 3 )  this.value = this.value.slice(0,3)"
                                                                onKeyPress="onlyNumbers(event)" onKeyUp="losesfocus(this)"
                                                                class="block w-full rounded-xl border-1 py-1.5 text-gray-900 shadow-xl ring-1 ring-inset
                                                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                focus:ring-indigo-600 xl:text-xl xl:leading-6 text-right"
                                                                style="width: 100%">
                                                        </td>

                                                        {{--  Unscroll in numerical input --}}
                                                        <style>
                                                            input[type=number]::-webkit-outer-spin-button,
                                                            input[type=number]::-webkit-inner-spin-button {
                                                                -webkit-appearance: none;
                                                                margin: 0;
                                                            }

                                                            input[type=number] {
                                                                appearance: textfield;
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
                                                                class="block w-full rounded-md border-0 py-1.5
                                                                text-gray-900 shadow-sm ring-1 ring-inset
                                                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </td>
                                                        <td width="10px"><input type="time" name="time"
                                                                class="block w-full rounded-md border-0 py-1.5
                                                                text-gray-900 shadow-sm ring-1 ring-inset
                                                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                                                focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-warning grounded-md
                                        bg-yellow-300 px-3 py-2 text-sm
                                        font-semibold text-red shadow-sm
                                        hover:bg-white-100 focus-visible:outline
                                        focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-yellow-100"
                                            data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit"
                                            class="btn btn-primary rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                                        text-white shadow-sm hover:bg-indigo-500 focus-visible:outline
                                        focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Customer</th>
                            <th scope="col">Unities</th>
                            <th scope="col">Boxes</th>
                            <th scope="col">Status</th>
                            <th scope="col">Through</th>
                            <th scope="col">Date Delivery</th>
                            <th scope="col">Time Delivery</th>
                            <th scope="col">News</th>
                            {{--   <th scope="col">User</th>
                            <th scope="col">Sender</th> --}}
                            <th class="text-center" colspan="2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($validateReceived) and $validateReceived != null)
                            @foreach ($validateReceived as $validate)
                                <tr>
                                    <td> {{ $validate->center->DES_CENTRE ?? '' }} </td>
                                    <td class="text-right"> {{ $validate->unities }} </td>
                                    <td class="text-right"> {{ $validate->boxes }} </td>
                                    <td> {{ $validate->status->status_name }} </td>
                                    <td> {{ $validate->delivery->des_delivery }} </td>
                                    <td> {{ $validate->date_delivery->toDateString() }} </td>
                                    <td> {{ $validate->time_created }} </td>
                                    <td> {{ $validate->news }} </td>
                                    {{--  @if ($validate->date == null)
                                        <td> NULL </td>
                                    @else
                                        <td> {{ $validate->time_created }} </td>
                                    @endif
                                    @if ($validate->news == null)
                                        <td> NULL </td>
                                    @else

                                    @endif --}}
                                    {{--  <td>
                                        {{ $validate->users->name }}
                                    </td> --}}

                                    {{-- @if ($validate->sender == null)
                                        <td> NULL </td>
                                    @else
                                        <td> {{ $validate->sender }} </td>
                                    @endif --}}

                                    {{-- CREATE BUTTONS --}}
                                    <div class="text-center col">

                                        <td width="10px" align="center">
                                            <a type="submit" class=" far fa-edit btn btn-outline-info btnEdit btn-sm"
                                                href="{{ route('admin.inventories.delivery.validateReceived.edit', $validate) }}">
                                            </a>
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('admin.inventories.delivery.validateReceived.destroy', $validate->id) }}"
                                                class="d-inline form-delete" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="far fa-trash-alt btn btn-outline-danger btn-sm">
                                                </button>

                                            </form>
                                        </td>
                                    </div>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $validateReceived->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
    </script>
@endsection
