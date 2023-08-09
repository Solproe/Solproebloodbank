@extends('adminlte::page')

@section('title', 'Delivery')


@section('content_header')
    <br>
    <br>
    <h1>Edit Delivery</h1>
@stop

@section('content')

    <script src="{{ asset('js/components/Nozeroornegativenumber.js') }}"></script>

    @vite('resources/css/app.css')

    <form action="{{ route('admin.inventories.delivery.validateReceived.update', $validateReceived->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="body mt-8">
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
                                action="{{ route('admin.inventories.delivery.validateReceived.index') }}"class="d-inline form-update">
                                <tr>
                                    <td class="" width="25%">
                                        <select
                                            class="form-select justify-center rounded-xl border-1 py-1.5
                                        text-gray-900 shadow-xl ring-1 ring-inset
                                        ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                        focus:ring-indigo-600 md:text-md md:leading-6"
                                            aria-label="Default select example" name="customer">

                                            <option value="{{ $validateReceived->center->ID_CENTRE ?? '' }}">
                                                {{ $validateReceived->center->DES_CENTRE ?? '' }}
                                            </option>
                                            @foreach ($centers as $center)
                                                <option value="{{ $center->ID_CENTRE }}">{{ $center->DES_CENTRE }}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td width="50px">
                                        <input type="number" name="unities"
                                            oninput="if( this.value.length > 3 )  this.value = this.value.slice(0,3)"
                                            onKeyPress="return onlyNumbers(event)" onKeyUp="losesfocus(this)"
                                            class="block w-full rounded-xl border-1 py-1.5
                                             text-gray-900 shadow-xl ring-1 ring-inset
                                             ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                             focus:ring-indigo-600 xl:text-xl xl:leading-6 text-right"
                                            style="width: 100%" value="{{ $validateReceived->unities }}">
                                    </td>
                                    <td width="50px">
                                        <input type="number" name="boxes"
                                            oninput="if( this.value.length > 3 )  this.value = this.value.slice(0,3)"
                                            onKeyPress="onlyNumbers(event)" onKeyUp="losesfocus(this)"
                                            class="block w-full rounded-xl border-1 py-1.5 text-gray-900 shadow-xl ring-1 ring-inset
                                            ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                            focus:ring-indigo-600 xl:text-xl xl:leading-6 text-right"
                                            style="width: 100%" value="{{ $validateReceived->boxes }}">
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
                                    <td class="text-center" width="15%"">
                                        <select
                                            class="form-select justify-center rounded-xl border-1 py-1.5
                                    text-gray-900 shadow-xl ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                    focus:ring-indigo-600 xl:text-xl xl:leading-6"
                                            aria-label="Default select example" name="customer">
                                            <option value="{{ $validateReceived->delivery->id_delivery }}">
                                                {{ $validateReceived->delivery->des_delivery }}
                                            </option>
                                            @foreach ($deliveries as $delivery)
                                                <option value="{{ $delivery->id_delivery }}">
                                                    {{ $delivery->des_delivery }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td width="70px"><input type="" name="date"
                                            class="block w-full rounded-xl border-1 py-1.5
                                            text-gray-900 shadow-xl ring-1 ring-inset
                                            ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                            focus:ring-indigo-600 xl:text-xl xl:leading-6 text-center"
                                            style="width: 100%" value="{{ $validateReceived->created_at }}">
                                    </td>
                                    <td width="25px"><input type="" name="time"
                                            class="block w-full rounded-md border-0 py-1.5
                                            text-gray-900 shadow-xl ring-1 ring-inset
                                            ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                            focus:ring-indigo-600 xl:text-xl xl:leading-6 text-center"
                                            style="width: 100%" value="{{ $validateReceived->date }}">
                                    </td>
                                </tr>
                                {{--   </form> --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <a class="fas fa-backward  rounded-xl bg-indigo-300 px-3 py-2 text-xl font-semibold
                text-blue shadow-xl hover:bg-indigo-500 focus-visible:outline
                focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600 btn-xl"
                    href="{{ route('admin.inventories.delivery.validateReceived.index', $validateReceived) }}">
                </a>
                <button type="submit"
                    class="fas fa-share-square  rounded-xl bg-indigo-300 px-3 py-2 text-xl font-semibold
                    text-red shadow-sm hover:bg-indigo-500 focus-visible:outline d-inline form-update
                    focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600 btn-xl">
                </button>
            </div>
        </div>

    </form>


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--  @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Update!',
                'Your file has been update.',
                'success'
            )
        </script>
    @endif --}}
    <script>
        $('.form-update').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to update the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                    /*  this.submit(); */
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });
    </script>
@endsection
