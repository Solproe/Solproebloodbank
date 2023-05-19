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
                        <th class="text-center" colspan="2">ACTION</th>
                    </tr>
                </thead>
                <Tbody>
                    <form action="{{ route('admin.validatereceived.store') }}" method="POST">
                        @csrf
                        <tr>
                            <td width="10px">
                                <select class="form-select" aria-label="Default select example" name="customer">
                                    <option selected>Select Customer</option>
                                    <option value="WAACAR">WAACAR</option>
                                    <option value="BANCO NACIONAL">BANCO NACIONAL</option>
                                </select>
                            </td>
                            <td width="10px"><input type="number" name="unities"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </td>

                            <td class="col-md-4" width="12px"><input type="number" name="boxes" id="first-name"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </td>

                            <td width="10px">
                                <select class="form-select" aria-label="Default select example" name="through">
                                    <option selected>Select through</option>
                                    <option value="CHEVALIER">CHEVALIER</option>
                                    <option value="TERMINAL">TERMINAL A TERMINAL</option>
                                    <option value="AVANSA">AVANSA</option>
                                </select>
                            </td>
                            <td width="10px">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2  focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </td>
                        </tr>
                </Tbody>
                {{-- <form action="{{ route('admin.validatereceived.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-2">
                        <div class="space-y-12">

                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="md:col-span-6">
                                        <label for="first-name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Unities</label>
                                        <div class="mt-2">
                                            <input type="number" name="unities"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="first-name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Boxes</label>
                                        <div class="mt-">
                                            <input type="number" name="boxes" id="first-name" autocomplete="given-name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6 mt-4 mb-2">
                                        <select class="form-select" aria-label="Default select example" name="customer">
                                            <option selected>Select Customer</option>
                                            <option value="WAACAR">WAACAR</option>
                                            <option value="BANCO NACIONAL">BANCO NACIONAL</option>
                                        </select>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="first-name"
                                            class="block text-sm font-medium leading-6 text-gray-900">through</label>
                                        <div class="mt-">
                                            <input type="text" name="through" id="first-name" autocomplete="given-name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <div class="space-y-12">
                            <div class="row">
                                <div class="relative">
                                    <label>Hour</label>
                                    <input type="time" name="hour"
                                        class="peer block rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
                                </div>

                                <div class="relative">
                                    <label>Date</label>
                                    <input type="date" name="date"
                                        class="peer block rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
              focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </div>
                </form>
                > --}}
            </table>
        </div>
    </div>

@endsection
