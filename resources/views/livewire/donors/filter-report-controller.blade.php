<div>
    {{--   @dump($reportElements) --}}
    {{-- filter --}}
    <div>
        <div class="card">
            <h6 class="card-header text-xl">Filters for reporting</h6>
            <div class="card-body">
                <div>
                    <label>Donation type
                        <div class="input-group ">
                            <select wire:model="reportElements.type_donor" class="form-select  rounded-md border-1"
                                aria-label="Default select example">
                                <option selected>Choose the type of donor</option>
                                @foreach ($donortypes as $donortype)
                                    <option value="{{ $donortype->ID_DONATIONTYPE }}">
                                        {{ $donortype->DES_DONATIONTYPE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                    <label class="ml-3">Date range
                        <div class="input-group">
                            <span class="input-group-text mr-2" id="">From:</span>
                            <input wire:model="reportElements.fromdate"type="date" aria-label="Sizing example input"
                                aria-describedby="From:" class="rounded-md border-1">
                            <span class="input-group-text ml-2 mr-2" id="">To:</span>
                            <input wire:model="reportElements.todate" type="date" aria-label="Sizing example input"
                                aria-describedby="To:" class="rounded-md border-1">
                        </div>
                    </label>
                    <label class="ml-4">Reporting options
                        <div class="input-group">
                            <label class="ml-4" for="flexRadioDefault1">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                Excel
                            </label>
                            <label class="ml-8" for="flexRadioDefault2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault">
                                PDF
                            </label>
                        </div>
                    </label>
                    <div class="modal" id="create_Report" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                            <div class="modal-content ">
                                <div class="modal-body">
                                    <div class="modal-header">
                                        <h5 class="modal-title text text-red-600 text-xl" id="exampleModalLabel">
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
                                                                <form action="{{ route('donor.Reports.exportPost') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @foreach ($arrayTables as $key => $arrayTable)
                                                                        <span>
                                                                            <input type="checkbox" value=""
                                                                                name="{{ $arrayTable->Field }}"></span>
                                                                        <label class="text text-xs"
                                                                            style="width:190px; padding-right: 2%">{{ $arrayTable->Field }}</label>
                                                                    @endforeach
                                                                    <div class="modal-footer">
                                                                        <button
                                                                            class="btn
                                                                            btn-outline-success w-full"
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

            <button wire:click="generateReport" class="btn btn-primary flex-row mb-4 ml-4 mr-4 text-center">Generate
                report</button>
        </div>
    </div>
</div>
{{-- @dd($arrayTable->Field); --}}
{{-- table --}}
<div>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Identification document</th>
                <th scope="col">1st Surname</th>
                <th scope="col">2nd Surname</th>
                <th scope="col">1st Name</th>
                <th scope="col">middle name</th>
                <th scope="col">Donation Type</th>
                <th scope="col">Date of Entry</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donoreports as $donoreport)
                <tr class="bg-white border-b">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $donoreport->COD_CIVILID }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $donoreport->DES_SURNAME1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $donoreport->DES_SURNAME2 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $donoreport->DES_NAME1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $donoreport->DES_NAME2 }}
                    </td>
                    <td class="px-6 py-4">

                        {{ $donoreport->donationtype->DES_DONATIONTYPE }}

                    </td>
                    <td class="px-6 py-4">
                        <?php $dat_entry = $donoreport->DAT_ENTRY;
                        $dat_register = Carbon::createFromFormat('Y-m-d h:i:s', $dat_entry)->format('d/m/Y'); ?>
                        {{ $dat_register }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $donoreports->links() }}
</div>


</div>
