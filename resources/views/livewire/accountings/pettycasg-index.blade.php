<div>

    <div class="card-heard">
        <div class="mt-3 mb-3 input-group">
            <input wire:model="search" class="mt-2 ml-4 mr-4 form-control " placeholder="Type what you want to search for">
            <div class="input-group-btn">
                <a class="mt-2 mr-2 btn btn-outline-info btn-med"
                    href="{{ route('admin.accountings.pettycash.create') }}">
                    Petty
                    Cash Voucher
                    Create</a>

            </div>
        </div>
    </div>


    <div class="card-body">
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    {{--  <th class="text-center">ID</th> --}}
                    <th class="text-center">ID</th>
                    <th class="text-center">DATE</th>
                    <th class="text-center">Petty Cash Voucher</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center" colspan="3">ACTION</th>
                </tr>
            </thead>
            <tbody>



            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{--  {{ $provider->links() }} --}}
    </div>

</div>
