<div>
    {{-- @dump($reportElementsShipping) --}}
    <div>
        <div class="card">
            <h6 class="mb-2 text-xl card-header">Filters for shipping</h6>
            <div class="card-body">
                <div>
                    <label>Customer
                        <div class="input-group col-xs-3">
                            <select wire:model="reportElementsShipping.center"
                                class="rounded-md form-select border-1 form-control input-lg"
                                aria-label="Default select example">
                                <option selected>Choose the customer</option>
                                @foreach ($centres as $centre)
                                    <option value="{{ $centre->ID_CENTRE }}">
                                        {{ $centre->DES_CENTRE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                    <label class="ml-1">Date range
                        <div class="input-group">
                            <span class="mr-1 input-group-text" id="">From:</span>
                            <input wire:model="reportElementsShipping.fromdate"type="date"
                                aria-label="Sizing example input" aria-describedby="From:"
                                class="border-2 rounded-md form-input input-lg">
                            <span class="ml-1 mr-2 input-group-text" id="">To:</span>
                            <input wire:model="reportElementsShipping.todate" type="date"
                                aria-label="Sizing example input" aria-describedby="To:" class="rounded-md border-1">
                        </div>
                    </label>
                    <label class="ml-1">Throgh
                        <div class="input-group colo-xs-3">
                            <select wire:model="reportElementsShipping.through"
                                class="rounded-md form-select border-1 form-control input-lg"
                                aria-label="Default select example">
                                <option selected>Choose the through</option>
                                @foreach ($deliveries as $delivery)
                                    <option value="{{ $delivery->id_delivery }}">
                                        {{ $delivery->des_delivery }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                    <label class="ml-2">Reporting options
                        <div>
                            <div>
                                <label class="ml-4" for="excel">
                                    <input wire:click="excel" class="form-check-input" type="radio" name="excel"
                                        id="excel">
                                    Excel
                                </label>
                                <label class="ml-4">
                                    <input wire:click="pdf" class="form-check-input" type="radio" name="pdf"
                                        id="pdf">
                                    PDF
                                </label>
                            </div>
                        </div>
                    </label>
                    <div class="modal" id="create_Report" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                            <div class="modal-content ">
                                <div class="modal-body">
                                    <div class="modal-header">
                                        <h5 class="text-xl text-red-600 modal-title text" id="exampleModalLabel">
                                            Select the variables to display in the report</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <Tbody>
                                        <div class="container ">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="row-fluid ">
                                                            <div style="display:inline-bloc">
                                                                <form
                                                                    action="{{ route('admin.inventories.delivery.exportPost') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @foreach ($arrayTables as $key => $arrayTable)
                                                                        <span>
                                                                            <input type="checkbox" value=""
                                                                                name="{{ $arrayTable->Field }}"></span>
                                                                        <label class="text-xs text"
                                                                            style="width:190px; padding-right: 2%">{{ $arrayTable->Field }}</label>
                                                                    @endforeach
                                                                    <div class="modal-footer">
                                                                        <button class="w-full btn btn-outline-success"
                                                                            type="submit">
                                                                            Send variables
                                                                        </button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </Tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <button wire:click="generateReportShipping"
                class="flex-row mb-4 ml-4 mr-4 text-center btn btn-primary">Generate
                report</button> --}}
        </div>
    </div>
    <div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">CUSTOMER</th>
                    <th scope="col">BOXES</th>
                    <th scope="col">UNITIES</th>
                    <th scope="col">THROUGH</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">NEWS</th>
                    <th scope="col">DATE RECEPTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveryreports as $deliveryreport)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        </td>
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $deliveryreport->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->center->DES_CENTRE }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->boxes }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->unities }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->delivery->des_delivery }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->status->status_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->news }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deliveryreport->date }}
                        </td>
                        {{--  <td class="px-6 py-4">

                            {{ $donoreport->donationtype->DES_DONATIONTYPE }}

                        </td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $deliveryreports->links() }}
    </div>
</div>
