<div>
    <div card-heard>
        <x-jet-input class="w-full" placeholder="Type what you want to search for" type="text"
            wire:model="search" />
        {{ $search }}

        <a class="btn btn-outline-success" href="{{ route('admin.requestorings.create') }}">Create</a>
    </div>
    <table class="table table-striped table-bordered table-sm ">

        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">TAX IDENTIFICATION</th>
                <th class="text-center">CUSTOMER</th>
                <th class="text-center">CITY</th>
                <th class="text-center">STATE</th>
                <th class="text-center" colspan="2">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requestorings as $requestoring)
                <tr>
                    <td width="10px">{{ $requestoring->ID_REQUESTORIG }}</td>
                    <td width="10px">{{ $requestoring->NIT }}</td>
                    <td class="col-md-4" width="12px">{{ $requestoring->DES_REQUESTORIG }}</td>
                    <td width="10px">{{ $requestoring->DES_AREA }}</td>
                    <td width="10px">{{ $requestoring->state->DES_STATE}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
